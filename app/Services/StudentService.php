<?php


namespace App\Services;

use App\RoleUser;
use App\User;
use Illuminate\Support\Facades\Hash;

class StudentService
{


    public static  function store($data){

        $user=User::create(
                [
                    'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'gender' => $data['gender'],
                'password' => Hash::make(12345678),
            ]);

        RoleUser::create([
            'user_id' => $user->id,
            'role_id' => $data['role_id'],
        ]);

        return  $user ? $user : null;
    }

    public static  function update($data ,$id){

        $student = Self::getById($id);

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


    public static function getById($id)
    {
        return User::whereId($id)->first();
    }

    public static function index()
    {

        $user = RoleUser::join('users','role_users.user_id','=','users.id')
         ->where('role_users.role_id',2)
         ->select('users.*')
         ->paginate(40);

        return $user;

    }

}
