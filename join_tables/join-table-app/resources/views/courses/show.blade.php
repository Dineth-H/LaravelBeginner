@extends('courses.layout')
@section('content')

<div class="card">
  <div class="card-header">Course Details</div>
  <div class="card-body">
    <h5 class="card-title">Course Name: {{ $course->course_name }}</h5>
    <p class="card-text">Course Code: {{ $course->course_code }}</p>
    <p class="card-text">Course Duration: {{ $course->course_duration }}</p>
    <a href="{{ url('/course') }}" class="btn btn-primary">Back</a>
    <a href="{{ url('/course/' . 'edit/' . $course->id ) }}" class="btn btn-primary">Edit</a>
    <form method="POST" action="{{ url('/course/' . $course->id) }}" accept-charset="UTF-8" style="display:inline">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <button type="submit" class="btn btn-danger btn-sm" title="Delete Course" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
    </form>
    <br />
  </div>
</div>
@endsection