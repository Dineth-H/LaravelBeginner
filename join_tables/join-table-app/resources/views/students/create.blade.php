@extends('students.layout')
@section('content')

<div class="card">
  <div class="card-header">Student Add Page</div>
  <div class="card-body">
    <form action="{{ url('student') }}" method="post">
      @csrf
      <label for="student_name">Student Name</label><br />
      <input type="text" name="student_name" id="student_name" class="form-control"><br />
      <label for="student_email">Student Email</label><br />
      <input type="text" name="student_email" id="student_email" class="form-control"><br />
      <label for="student_phone">Student Phone</label><br />
      <input type="text" name="student_phone" id="student_phone" class="form-control"><br />
      <label for="course_id">Course ID</label><br />
      <select name="dropdown">
        @foreach($data as $item)
            <option value="{{ $item->id }}">{{ $item->course_name }}</option>
        @endforeach
    </select>
      <input type="submit" value="Save" class="btn btn-success"><br />
    </form>
  </div>
</div>
@endsection