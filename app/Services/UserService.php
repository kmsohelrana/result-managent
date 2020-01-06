<?php

namespace App\Services;

use App\Student;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public static function getById(){

        return User::whereId(Auth::user()->id)->first();

    }

    public static function studentResult(){

      return  User::with('score.course')->find(Auth::user()->id);

    }


    public static  function store($data){

        $student = new User();
        $student->name = $data['name'];
        $student->email = $data['email'];
        $student->phone = $data['phone'];
        $student->gender = $data['gender'];
        $student->password = Hash::make(12345678);
        return  $student->save() ? $student : null;
    }

    public static  function update($data){


        $student=Self::getById();

        if(empty($student)){
            abort(404, 'Not Found.');
        }

        $student->name = $data['name'];
        $student->email = $data['email'];
        $student->phone = $data['phone'];
        $student->gender = $data['gender'];

        return  $student->save() ? $student : null;
    }

    public static function delete($student)
    {
        $status = $student->delete();
        return $status;
    }

}
