<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;

class UserController extends Controller
{
    public $user;
    public $users;
    public $searchUsers;
    public $search;
    public function dashboard()
    {
        return view('dashboard');
    }
    public function addUser()
    {
        return view('user.add-user');
    }
    public function create(Request $request,FlasherInterface $flasher)
    {
        $this->user = new User();
        $this->user->name = $request->name;
        $this->user->email = $request->email;
        $this->user->password = bcrypt($request->password);
        $this->user->save();
        $flasher->addSuccess('Add User Successfully');
        return redirect('/manage-user');
    }
    public function manage(Request $request)
    {
        $this->search = $request['search'] ?? '';
        if($this->search !='')
        {
            // $this->users = User::where('name','=',$this->search)->get();
            // Must use "$this->search"
            // $this->users = User::where('name','LIKE',"%$this->search")->get();
            // $this->users = User::where('name','LIKE',"$this->search%")->get(); 
            $this->users = User::where('name','LIKE',"%$this->search%")->orWhere('email','LIKE',"%$this->search%")->paginate(2);
        }
        else
        {
            // $this->users = User::all();
            $this->users = User::paginate(2);
        }
        return view('user.manage-user',['users'=>$this->users,'search'=>$this->search]);
    }
    public function edit($id)
    {
        $this->user = User::find($id);
        return view('user.edit-user',['user'=>$this->user]);
    }
    public function update(Request $request, $id,FlasherInterface $flasher)
    {
        $this->user = User::find($id);
        $this->user->name = $request->name;
        $this->user->email = $request->email;
        if(isset($request->password))
        {
            $this->user->password = bcrypt($request->password);
        }
        $this->user->save();
        $flasher->addSuccess('Update User Successfull');
        return redirect('/manage-user');
    }
    public function delete($id,FlasherInterface $flasher)
    {
        $this->user = User::find($id)->delete();
        $flasher->addSuccess('Delete User Successfull');
        return redirect('/manage-user');
    }

}
