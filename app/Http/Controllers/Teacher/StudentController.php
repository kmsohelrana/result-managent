<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{

    public function index()
    {
        $data=Student::paginate(40);

        return view ('teacher.student.index',compact('data'));
    }


    public function create()
    {
        return view('teacher.student.create');
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


    public function show($id)
    {
        //
    }


    public function edit($id){
        $students=Student::find($id);

        if(empty($students)){
            abort(403, 'Unauthorized action.');
        }

        return view('teacher.student.edit',compact('students'));
    }


    public function update(Request $request, $id)
    {

        $students=Student::find($id);

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

        return redirect()->route('students.index');


    }

    public function destroy($id)
    {
        $students=Student::find($id);

        if(empty($students)){
            abort(403, 'Unauthorized action.');
        }

        $students->delete();

        session()->flash('status','Data Deleted Successfully');

        return back();
    }
}
