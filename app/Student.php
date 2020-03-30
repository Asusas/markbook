<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    public function grade()
    {
        return $this->hasMany('App\Grade', 'student_id', 'id');
    }
    
    public function gradeAverageByLecture($lectureId) {
        $gradesByLecture = Grade::where('student_id', '=', $this->id)->where('lecture_id', '=', $lectureId);
        
        $average = 0;
        foreach($gradesByLecture as $grade) {
            $average += $grade->value;
        }
        
        $average = $average / count($gradesByLecture);
        
        return $average;
    }

}
