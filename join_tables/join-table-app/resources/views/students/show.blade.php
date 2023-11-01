@extends('students.layout')
@section('content')

<div class="card">
  <div class="card-header">Student Details</div>
  <div class="card-body">
    <h5 class="card-title">Student Name: {{ $student->student_name }}</h5>
    <p class="card-text">Student Email: {{ $student->student_email }}</p>
    <p class="card-text">Student Phone: {{ $student->student_phone }}</p>
    @if(isset($student->course))
        <p class="card-text">Course Name: {{ $student->course->course_name }}</p>
        <p class="card-text">Course Code: {{ $student->course->course_code }}</p>
        <p class="card-text">Course Duration: {{ $student->course->course_duration }}</p>
    @else
        <p class="card-text">No Course Assigned</p>
    @endif
    <a href="{{ url('/student') }}" class="btn btn-primary">Back</a>
    <a href="{{ url('/student/' . $student->id . '/edit') }}" title="Edit Student">
      <button class="btn btn-primary btn-sm">
          <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
      </button>
    </a>     
    <form method="POST" action="{{ url('/student' . '/' . $student->id) }}" accept-charset="UTF-8" style="display:inline">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
    </form>
    <br />
  </div>
</div>
@endsection