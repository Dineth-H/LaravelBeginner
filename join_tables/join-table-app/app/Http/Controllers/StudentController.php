<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    private $student = null;
    private $course = null;
    public function __construct()
    {
        $this->student = new Student();
        $this->course = new Course();
    }

    public function index()
    {
        $data = $this->student->course();
        // return $data;
        return view('students.index', compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = $this->course->get_all_course_data();
        return view('students.create', ['data' => $data]);
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
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
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
        $student = DB::table('students')
            ->where('students.id', $id)
            ->first();

        if (!$student) {
            return redirect()->action([StudentController::class, 'create']);
        }

        $course = DB::table('courses')
            ->where('id', $student->course_id)
            ->first();

        $student->course = $course;

        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = $this->course->get_all_course_data();

        $student = DB::table('students')->where('id', $id)->first();
        return view('students.edit', ['data' => $data], compact('student'));
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