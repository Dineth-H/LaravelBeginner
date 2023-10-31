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
        return DB::table('students')
            ->join('courses', 'courses.id', '=', 'students.course_id')
            ->select('courses.id as course_id', 'courses.course_name', 'courses.course_code', 'courses.course_duration', 'students.student_name', 'students.student_email', 'students.student_phone', 'students.id as student_id')
            ->get();
    }
}