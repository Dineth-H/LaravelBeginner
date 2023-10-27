<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = DB::table('courses')->get();
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("courses.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'course_name' => $request->input('course_name'),
            'course_code' => $request->input('course_code'),
            'course_duration' => $request->input('course_duration'),
        ];

        DB::table('courses')->insert($data);
        return redirect()->action([CourseController::class, 'index']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $course = DB::table('courses')->where('id', $id)->first();
        return view('courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $course = DB::table('courses')->where('id', $id)->first();
        if (!$course) {
            return redirect()->route('courses.index')->with('error', 'Course not found');
        }
        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = [
            'course_name' => $request->input('course_name'),
            'course_code' => $request->input('course_code'),
            'course_duration' => $request->input('course_duration'),
        ];

        DB::table('courses')->where('id', $id)->update($data);
        return redirect()->action([CourseController::class,'index']);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $course = DB::table('courses')->where('id', $id)->first();
        if (empty($course)) {
            return redirect()->action([CourseController::class, 'index']);
        }
        DB::table('courses')->where('id', $id)->delete();
        return view('courses.index', compact('course'));
    }
}