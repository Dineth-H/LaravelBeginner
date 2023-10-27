<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Student;
use App\Models\Course;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = DB::table('students')
        ->leftJoin('courses', 'students.course_id', '=', 'courses.id')
        ->select('students.id', 'students.student_name', 'students.student_email', 'students.student_phone', 'courses.course_name', 'courses.course_code', 'courses.course_duration')
        ->get();

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'student_name' => 'required',
            'student_email' => 'required',
            'student_phone' => 'required',
            'course_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->action([StudentController::class, 'create'])
                ->withErrors($validator);
        }

        $data = [
            'student_name' => $request->input('student_name'),
            'student_email' => $request->input('student_email'),
            'student_phone' => $request->input('student_phone'),
            'course_id' => $request->input('course_id'),
        ];

        DB::table('students')->insert($data);
        return redirect()->action([StudentController::class, 'index']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::with('course')->find($id);

        if (!$student) {
            return redirect()->action([StudentController::class,'create']);
        }

        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = DB::table('students')->where('id', $id)->first();
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->all();
        $validator = Validator::make($request->all(), [
            'student_name' => 'required',
            'student_email' => 'required',
            'student_phone' => 'required',
            'course_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->action([StudentController::class, 'edit', $id])
                ->withErrors($validator)
                ->withInput();
        }

        $data = [
            'student_name' => $request->input('student_name'),
            'student_email' => $request->input('student_email'),
            'student_phone' => $request->input('student_phone'),
            'course_id' => $request->input('course_id'),
        ];

        DB::table('students')->where('id', $id)->update($data);
        return redirect()->action([StudentController::class, 'index'])->with('flash_message', 'Student Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('students')->where('id', $id)->delete();
        return redirect('student')->with('flash_message', 'Student Removed!');
    }
}