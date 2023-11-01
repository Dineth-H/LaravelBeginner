<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Student
{
    protected $fillable = [
        'student_name',
        'student_email',
        'student_phone',
        'course_id',
    ];

    public function course()
    {
        return DB::table('courses')
            ->join('students', 'courses.id', '=', 'students.course_id')
            ->select('students.*', 'courses.course_name', 'courses.course_code', 'courses.course_duration')
            ->get();
    }
}