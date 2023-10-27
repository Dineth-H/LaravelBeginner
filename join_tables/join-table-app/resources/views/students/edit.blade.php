@extends('students.layout')
@section('content')

<div class="card">
  <div class="card-header">Student Update Page</div>
  <div class="card-body">
  <form method="POST" action="{{ route('students.update', $student->id) }}">
      @csrf
      @method('PATCH')
      <input type="hidden" name="id" value="{{ $student->id }}" id="id" />
      <label for="student_name">Student Name</label><br />
      <input type="text" name="student_name" id="student_name" value="{{ $student->student_name }}" class="form-control"><br />
      <label for="student_email">Student Email</label><br />
      <input type="text" name="student_email" id="student_email" value="{{ $student->student_email }}" class="form-control"><br />
      <label for="student_phone">Student Phone</label><br />
      <input type="text" name="student_phone" id="student_phone" value="{{ $student->student_phone }}" class="form-control"><br />
      <label for="course_id">Course ID</label><br />
      <input type="text" name="course_id" id="course_id" value="{{ $student->course_id }}" class="form-control"><br />
      <input type="submit" value="Update" class="btn btn-success"><br />
    </form>
  </div>
</div>
@endsection