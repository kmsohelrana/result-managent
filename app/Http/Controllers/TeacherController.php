<?php

namespace App\Http\Controllers;

use App\Student;
use App\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('teacher.home');
    }

    public function create()
    {
        return view('teacher.student.create');
    }

    public function showStudent()
    {
        $data=Student::paginate(40);
        return view('teacher.student.index',compact('data'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:students|max:255',
            'phone' => 'required|unique:students|max:255',
            'gender' => 'required',
        ]);

        $input = $request->only(['name', 'email','phone','gender']);

        try{

            Student::student_create($input);

            session()->flash('status','Data Inserted Successfully');
            return back();

        } catch (\Exception $e){

            return $e->getMessage();
        }

    }

}
