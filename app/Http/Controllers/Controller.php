<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Intervention\Image\Facades\Image;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function upload($request)
    {
        if($request->isValid()){
            //        $path = '/uploads/profile_pic';
            $uniqueFileName = uniqid() . time() . '.' . $request->getClientOriginalExtension();
            $directory= 'uploads/images/';
            $imgUrl=$directory.$uniqueFileName;
            //        $request->move('uploads/images/' , $uniqueFileName);
            Image::make($request)->resize(200, 200)->save($imgUrl);
            return $imgUrl;
        } else {
            return 'Request is not valid';
        }
    }
}
