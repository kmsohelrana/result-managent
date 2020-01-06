<?php

namespace App\Http\Controllers\Student;

use App\Http\Requests\UpdateStudent;
use App\Services\UserService;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StudentDashBoardController extends Controller
{

    protected $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }


    public function index()
    {
        $student = $this->userService->getById();

        return view('student.home',compact('student'));
    }

    public function studentEdit()
    {
        $students = $this->userService->getById();

        if(empty($students)){
            abort(404, 'Not Found');
        }

        return view('student.edit',compact('students'));
    }

    public function showResult()
    {
        $student = $this->userService->studentResult();

        return view ('student.result',compact('student'));
    }




    public function studentUpdate(UpdateStudent $request)
    {
        $validated = $request->validated();

        $response = $this->userService->update($validated );

        if (is_null($response) === false) {
            $message = "Data Updated Successfully Done";

        } else {
            $message = "Something Went Wrong";;
        }

        session()->flash("status",$message);

        return redirect()->route('student.home');
    }


    public function imageUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required',
        ]);

        $student = $this->userService->getById();
        $student->image = $this->upload($request->image);
        $student->save();

        session()->flash('status','Image Updated Successfully');

        return back();
    }
}
