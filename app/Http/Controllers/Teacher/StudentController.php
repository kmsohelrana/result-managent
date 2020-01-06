<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudent;
use App\Http\Requests\UpdateStudent;
use App\Services\StudentService;
use App\User;

class StudentController extends Controller
{
    protected  $studentService;

    public function __construct()
    {
        $this->studentService = new StudentService();
    }

    public function index()
    {
        $data = $this->studentService->index();
        return view ('teacher.student.index',compact('data'));
    }


    public function create()
    {
        return view('teacher.student.create');
    }


    public function store(StoreStudent $request)
    {
        $validated = $request->validated();

        $response = $this->studentService->store($validated);

        if (is_null($response) === false) {
            $message = "Data Inserted Successfully Done";

        } else {
            $message = "Something Went Wrong";;

        }

        session()->flash("status",$message);

        return redirect()->route('students.index');


    }


    public function show($id)
    {
        $where = array('id' => $id);
        $user  = User::where($where)->first();
        return response()->json($user);

    }

    public function getStudent($id)
    {
        $where = array('id' => $id);
        $user  = User::where($where)->first();
        return response()->json($user);

    }


    public function edit($id){

        $students = $this->studentService->getById($id);

        if(empty($students)){
            abort(404, 'Unauthorized Action.');
        }

        return view('teacher.student.edit',compact('students'));
    }


    public function update(UpdateStudent $request, $id)
    {
        $validated = $request->validated();

        $response = $this->studentService->update($validated , $id);

        if (is_null($response) === false) {
            $message = "Data Updated Successfully Done";

        } else {
            $message = "Something Went Wrong";;
        }

        session()->flash("status",$message);

        return redirect()->route('students.index');

    }

    public function destroy($id)
    {

        $student=$this->studentService->getById($id);
        $response=$this->studentService->delete($student);

        if (is_null($response) === false) {
            $message = "Data Deleted Successfully Done";

        } else {
            $message = "Something Went Wrong";;

        }

        session()->flash("status",$message);

//        session()->flash('status','Data Deleted Successfully');

        return back();
    }

}
