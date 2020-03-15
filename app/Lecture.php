<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    protected $table = 'lectures';

    public function grade()
    {
        return $this->hasMany('App\Grade', 'lecture_id', 'id');
    }
}
