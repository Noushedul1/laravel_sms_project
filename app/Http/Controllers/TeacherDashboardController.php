<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherDashboardController extends Controller
{
    public function teacherDashboard()
    {
        return view('teacher.teacher-dashboard');
    }
}
