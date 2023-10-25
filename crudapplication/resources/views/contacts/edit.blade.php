@extends('contacts.layout')
@section('content')

<div class="card">
  <div class="card-header">Contact Update Page</div>
  <div class="card-body">

    <form action="{{ url('contact/' . $contacts->id) }}" method="post">
      @csrf
      @method('PATCH')
      <input type="hidden" name="id" value="{{ $contacts->id }}" id="id" />
      <label for="name">Name</label><br />
      <input type="text" name="name" id="name" value="{{ $contacts->name }}" class="form-control"><br />
      <label for="address">Address</label><br />
      <input type="text" name="address" id="address" value="{{ $contacts->address }}" class="form-control"><br />
      <label for="mobile">Mobile</label><br />
      <input type="text" name="mobile" id="mobile" value="{{ $contacts->mobile }}" class="form-control"><br />
      <input type="submit" value="Update" class="btn btn-success"><br />
    </form>

  </div>
</div>

@endsection