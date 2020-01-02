<?php

namespace App\Http\Controllers\Teacher;

use App\Course;
use App\Http\Controllers\Controller;
use App\Score;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MarksController extends Controller
{

    public function index()
    {
        $data=Student::paginate(40);

        return view ('teacher.student.index',compact('data'));
    }


    public function create($id)
    {

        $data=Course::all();

        $student=Student::find($id);

        return view ('teacher.marks.create',compact('data','student'));
    }




    public function store(Request $request)
    {
        $inputs=$request->all();
        foreach ($inputs['marks'] as $row) {
            $score=new Score();
            $score->student_id=$inputs['student_id'];
            $score->course_id=$row['course_id'];
            $score->marks=$row['marks'];
            $score->save();
        }
        session()->flash('status',' Marks Added Successfully');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
