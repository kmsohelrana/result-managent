<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    public function course()
    {
        return $this->belongsTo('App\Course','course_id');
    }
}
