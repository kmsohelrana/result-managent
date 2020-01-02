<?php

namespace App\Http\Controllers\Student;

use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

class StudentDashBoardController extends Controller
{
    public function index()
    {
        $student=Student::find(Auth::user()->id);

        return view('student.home',compact('student'));
    }

    public function studentEdit(){
        $students=Student::find(Auth::user()->id);

        if(empty($students)){
            abort(403, 'Unauthorized action.');
        }

        return view('student.edit',compact('students'));
    }

    public function showResult()
    {

        $student=Student::with('score.course')->find(Auth::user()->id);

//        return response()->json($data);

       return view ('student.result',compact('student'));
    }


    public function studentUpdate(Request $request)
    {

        $students=Student::find(Auth::user()->id);

        if(empty($students)){
            abort(403, 'Unauthorized Action.');
        }


        $validatedData = $request->validate([
            'name' => 'required',
            'email' =>'required|email|unique:students,email,'.$students->id,
            'phone' => 'required|unique:students,phone,'.$students->id,
            'gender' => 'required',
        ]);

        $students->update($request->all());

        session()->flash('status','Data Updated Successfully');

        return redirect()->route('student.home');
    }


    public function imageUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required',
        ]);

        $student=Student::find(Auth::user()->id);

        $student->image=$this->upload($request->image);
        $student->save();

        session()->flash('status','Image Updated Successfully');

        return back();
    }
}
