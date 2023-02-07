<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use HasFactory;
    use SoftDeletes;
    public static $teacher;
    public static $teachers;
    public static $image;
    public static $imageName;
    public static $imageUrl;
    public static $directory;
    // public static function getImageUrl($request)
    // {
    //     self::$image = $request->file('image');
    //     self::$imageName = self::$image->getClientOriginalName();
    //     self::$directory = 'teacher-images/';
    //     self::$image->move(self::$directory, self::$imageName);
    //     self::$imageUrl = self::$directory.self::$imageName;
    //     return self::$imageUrl;
    // }
    // public static function addTeacher($request,$code)
    // {
    //     self::$teacher = new Teacher();
    //     self::$teacher->name = $request->name;
    //     self::$teacher->code = $code;
    //     self::$teacher->email = $request->email;
    //     self::$teacher->password = bcrypt($request->number);
    //     self::$teacher->number = $request->number;
    //     self::$teacher->address = $request->address;
    //     self::$teacher->image = self::getImageUrl($request);
    //     self::$teacher->save();
    // }
    public static function updateTeacher($request,$id,$code)
    {
        self::$teacher = Teacher::find($id);
        if($request->file('image'))
        {
            if(file_exists(self::$teacher->image))
            {
                unlink(self::$teacher->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$teacher->image;
        }
        self::$teacher->email = $request->email;
        self::$teacher->code = $code;
        self::$teacher->number = $request->number;
        self::$teacher->address = $request->address;
        self::$teacher->image = self::$imageUrl;
        self::$teacher->status = $request->status;
        self::$teacher->save();
    }
}
