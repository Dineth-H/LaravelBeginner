@extends('courses.layout')
@section('content')

<div class="card">
  <div class="card-header">Courses Update Page</div>
  <div class="card-body">
    <form action="{{ url('course/' . $course->id) }}" method="post">
      @csrf
      @method('PATCH')
      <input type="hidden" name="id" value="{{ $course->id }}" id="id" />
      <label for="course_name">Course Name</label><br />
      <input type="text" name="course_name" id="course_name" value="{{ $course->course_name }}" class="form-control"><br />
      <label for="course_code">Course Code</label><br />
      <input type="text" name="course_code" id="course_code" value="{{ $course->course_code }}" class="form-control"><br />
      <label for="course_duration">Course Duration</label><br />
      <input type="text" name="course_duration" id="course_duration" value="{{ $course->course_duration }}" class="form-control"><br />
      <input type="submit" value="Update" class="btn btn-success"><br />
    </form>
  </div>
</div>
@endsection