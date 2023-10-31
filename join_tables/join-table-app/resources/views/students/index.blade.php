@extends('students.layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">CRUD-Students</div>
                <div class="card-body">
                    <a href="{{ url('/student/create') }}" class="btn btn-success btn-sm" title="Add New Student">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>
                    <br />
                    <br />
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Student Name</th>
                                    <th>Student Email</th>
                                    <th>Student Phone</th>
                                    <th>Course Name</th>
                                    <th>Course Code</th>
                                    <th>Course Duration</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->student_name }}</td>
                                    <td>{{ $item->student_email }}</td>
                                    <td>{{ $item->student_phone }}</td>
                                    <td>{{ $item->course_name }}</td>
                                    <td>{{ $item->course_code }}</td>
                                    <td>{{ $item->course_duration }}</td>
                                    <td>
                                        <a href="{{ url('/student/' . $item->student_id) }}" title="View Student"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a> {{-- Changed to $item->student_id --}}
                                        <a href="{{ url('/student/edit/' . $item->student_id) }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a> {{-- Changed to $item->student_id --}}

                                        <form method="POST" action="{{ url('/student/' . $item->student_id) }}" accept-charset="UTF-8" style="display:inline"> {{-- Changed to $item->student_id --}}
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
