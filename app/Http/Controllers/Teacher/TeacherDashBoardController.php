<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;

class TeacherDashBoardController extends Controller
{
    public function index()
    {
        return view('teacher.home');
    }

}
