@extends('courses.layout')
@section('content')

<div class="card">
  <div class="card-header">Courses Update Page</div>
  <div class="card-body">

    <form action="{{ url('course/' . $courses->id) }}" method="post">
      @csrf
      @method('PATCH')
      <input type="hidden" name="id" value="{{ $courses->id }}" id="id" />
      <label for="course_name">Course Name</label><br />
      <input type="text" name="course_name" id="course_name" value="{{ $courses->course_name }}" class="form-control"><br />
      <label for="course_duration">Course Duration</label><br />
      <input type="text" name="course_duration" id="course_duration" value="{{ $courses->course_duration }}" class="form-control"><br />
      <label for="courseID">Course Code</label><br />
      <input type="text" name="courseID" id="courseID" value="{{ $courses->courseID }}" class="form-control"><br />
      <input type="submit" value="Update" class="btn btn-success"><br />
    </form>

  </div>
</div>

@endsection