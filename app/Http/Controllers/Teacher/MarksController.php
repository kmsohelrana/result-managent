<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Services\MarkService;
use App\Services\StudentService;
use Illuminate\Http\Request;

class MarksController extends Controller
{

    protected  $markService;
    protected  $studentService;

    public function __construct()
    {
        $this->markService = new MarkService();
        $this->studentService = new StudentService();
    }

    public function index()
    {
        $data = $this->markService->index();


        return view ('teacher.student.index',compact('data'));
    }


    public function create($id)
    {
        $data = $this->markService->allCourse();
        $student = $this->studentService->getById($id);
        return view ('teacher.marks.create',compact('data','student'));
    }




    public function store(Request $request)
    {
        $inputs=$request->all();

        $response=$this->markService->store($inputs);

        if (is_null($response) === false) {
            $message = "Marks Added Successfully";

        } else {
            $message = "Something Went Wrong";;

        }

        session()->flash("status",$message);

        return redirect()->route('students.index');

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
