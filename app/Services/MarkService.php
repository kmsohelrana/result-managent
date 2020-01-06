<?php


namespace App\Services;


use App\Course;
use App\Score;
use App\Student;
use App\User;

class MarkService
{

    public static function index(){

        return         User::paginate(40);

    }

    public static function allCourse(){

        return          Course::all();

    }


    public static function store($inputs){

        foreach ($inputs['marks'] as $row) {
            $score=new Score();
            $score->user_id=$inputs['user_id'];
            $score->course_id=$row['course_id'];
            $score->marks=$row['marks'];
            $score->save();
        }


        return $score ? $score : null ;
    }

}
