@extends('courses.layout')
@section('content')

<div class="card">
  <div class="card-header">Courses Add Page</div>
  <div class="card-body">
    <form action="{{ url('course') }}" method="post">
      @csrf
      <label for="course_name">Course Name</label><br />
      <input type="text" name="course_name" id="course_name" class="form-control"><br />
      <label for="course_code">Course Code</label><br />
      <input type="text" name="course_code" id="course_code" class="form-control"><br />
      <label for="course_duration">Course Duration</label><br />
      <input type="text" name="course_duration" id="course_duration" class="form-control"><br />
      <input type="submit" value="Save" class="btn btn-success"><br />
    </form>
  </div>
</div>
@endsection