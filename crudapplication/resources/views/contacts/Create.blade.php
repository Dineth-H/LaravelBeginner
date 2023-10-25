@extends('contacts.layout')
@section('content')

<div class="card">
  <div class="card-header">Contact Create Page</div>
  <div class="card-body">

    <form action="{{ url('contact') }}" method="post">
      @csrf
      <label for="name">Name</label><br />
      <input type="text" name="name" id="name" class="form-control"><br />
      <label for="address">Address</label><br />
      <input type="text" name="address" id="address" class="form-control"><br />
      <label for="mobile">Mobile</label><br />
      <input type="text" name="mobile" id="mobile" class="form-control"><br />
      <input type="submit" value="Save" class="btn btn-success"><br />
    </form>

  </div>
</div>

@endsection