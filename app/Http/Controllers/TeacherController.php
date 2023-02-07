<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Flasher\Prime\FlasherInterface;

class TeacherController extends Controller
{
    public $teacher;
    public $teachers;
    public $code;
    public $id;
    public $name;
    public $year;
    public $updateString;
    public $search;
    public $image;
    public $imageName;
    public $directory;
    public $imageUrl;
    public function add()
    {
        return view('teacher.add-teacher');
    }
    public function getTeacherCode($request)
    {
         // $this->teacher = Teacher::orderBy('id','desc')->first();
        // if($this->teacher)
        // {
        //     $this->id = $this->teacher+1;
        // }
        // else
        // {
        //     $this->id = 1;
        // }
        $this->year = date('y');
        $this->updateString = preg_replace('/[^A-Za-z0-0]/',"",$request->name);
        $this->name = strtoupper(substr($this->updateString,0,3));
        $this->code = $this->name.$this->year;
        // return $this->code;
    }
    public function getImageUrl($request)
    {
        $this->image = $request->file('image');
        $this->imageName = $this->image->getClientOriginalName();
        $this->directory = 'teacher-images/';
        $this->image->move($this->directory, $this->imageName);
        $this->imageUrl = $this->directory.$this->imageName;
    }
    public function getCode($request)
    {
        $this->year = date('y');
        $this->updateString = preg_replace('/[^A-Za-z0-0]/',"",$request->name);
        $this->name = strtoupper(substr($this->updateString,0,3));
        $this->code = $this->name.$this->year;
        return $this->code;
    }
    public function get_image_url($request)
    {
        $this->image = $request->file('image');
        $this->imageName = $this->image->getClientOriginalName();
        $this->directory = 'teacher-images/';
        $this->image->move($this->directory, $this->imageName);
        $this->imageUrl = $this->directory.$this->imageName;
        return $this->imageUrl;
    }
    public function create(Request $request,FlasherInterface $flasher)
    {
        $this->teacher = new Teacher();
        $this->teacher->name = $request->name;
        $this->teacher->code = $this->getCode($request);
        $this->teacher->email = $request->email;
        $this->teacher->password = bcrypt($request->number);
        $this->teacher->number = $request->number;
        $this->teacher->address = $request->address;

        $this->teacher->image = $this->get_image_url($request);
        $this->teacher->save();
        // Teacher::addTeacher($request,$this->getTeacherCode($request));
        $flasher->addSuccess('Teacher Successfully Added');
        return redirect('/manage-teacher');
    }
    public function manage(Request $request)
    {
        $this->search = $request['search'] ?? '';
        if($this->search != '')
        {
            $this->teachers = Teacher::where('name','LIKE',"%$this->search%")->orWhere('email','LIKE',"%$this->search%")->orWhere('code','LIKE',"%$this->search%")->paginate(2);
        }
        else
        {
            // $this->teachers = Teacher::all();
            $this->teachers = Teacher::paginate(2);
        }
        return view('teacher.manage-teacher',['teachers'=>$this->teachers,'search'=>$this->search]);
    }
    public function edit($id)
    {
        $this->teacher = Teacher::findOrfail($id);
        return view('teacher.edit-teacher',['teacher'=>$this->teacher]);
    }
    public function update(Request $request,$id,FlasherInterface $flasher)
    {

        $this->teacher = Teacher::find($id);
        if($request->file('image'))
        {
            if(file_exists($this->teacher->image))
            {
                unlink($this->teacher->image);
            }
            $this->imageUrl = $this->get_image_url($request);
        }
        else
        {
            $this->imageUrl = $this->teacher->image;
        }
        $this->teacher->email = $request->email;
        $this->teacher->code = $this->getCode($request);
        $this->teacher->number = $request->number;
        $this->teacher->address = $request->address;

        $this->teacher->image = $this->imageUrl;

        $this->teacher->status = $request->status;
        $this->teacher->save();

        // Teacher::updateTeacher($request,$id,$this->getTeacherCode($request));?       
        $flasher->addSuccess('Teacher updated Successfully');
        return redirect('/manage-teacher');
    }
    public function trash()
    {
        $this->teachers = Teacher::onlyTrashed()->get();
        // $this->teachers = Teacher::withTrashed()->get();
        return view('teacher.teacher_trash',['trashTeachers'=>$this->teachers]);
    }
    public function delete($id,FlasherInterface $flasher)
    {
        Teacher::find($id)->delete();
        $flasher->addSuccess('Teacher Deleted Successfully');
        return redirect('/manage-teacher');
    }
    public function forceDelete($id,FlasherInterface $flasher)
    {
        $this->teacher = Teacher::withTrashed()->find($id);
        $this->teacher->forceDelete();
        $flasher->addSuccess('Teacher Deleted Successfully');
        return redirect()->back();
    }
    public function restore($id,FlasherInterface $flasher)
    {
        $this->teacher = Teacher::withTrashed()->find($id);
        $this->teacher->restore();
        $flasher->addSuccess('Teacher Deleted Successfully');
        return redirect('/manage-teacher');
    }
}
