@extends('courses.layout')
@section('content')

<div class="card">
  <div class="card-header">Course Details</div>
  <div class="card-body">
    <h5 class="card-title">Course Name: {{ $courses->course_name }}</h5>
    <p class="card-text">Course Duration: {{ $courses->course_duration }}</p>
    <p class="card-text">Course Code: {{ $courses->courseID }}</p>
  </div>
</div>

@endsection