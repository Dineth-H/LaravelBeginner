<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Contact;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::with('contacts')->get(); // Using eager loading
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        Course::create($input);
        return redirect('course')->with('flash_message', 'Course added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $courses = Course::where('id', $id)->first();
        return view('courses.show')->with('courses', $courses);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // print_r($id);
        // exit();
        // $course = Course::find($id);
        $course = Course::where('id', $id)->first();

        // print_r($course);
        // exit();
        return view('courses.edit')->with('courses', $course);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $input = $request->all();
        $courses = Course::where('id', $id)->first();
        $courses->update($input);
        return redirect('course')->with('flash_message', 'Course updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $courses = Course::where('id', $id)->first();
        $courses->delete();
        return redirect('course')->with('flash_message', 'Course Deleted!');
    }
}