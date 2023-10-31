<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Course 
{
    protected $fillable = [
        'course_name',
        'course_code',
        'course_duration',
    ];

    public function students()
    {
        return DB::table('courses')
            ->join('students', 'courses.id', '=', 'students.course_id')
            ->select('students.*')
            ->get();
    }
    
    public function get_all_course_data()
    {
        return DB::table('courses')
            ->select('courses.*')
            ->get();
    }
}