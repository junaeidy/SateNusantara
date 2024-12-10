@extends('layouts.admin')

@section('title', 'Create About')

@section('header', 'Create')


@section('content')
<form action="{{ route('abouts.store') }}" method="POST">
    @csrf
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Head Title</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" required>
  </div>
  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Content</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
  </div>
  <div class="mb-3">
    <label for="formFile" class="form-label">Default file input example</label>
    <input class="form-control" type="file" id="formFile">
  </div>

  <div>
</div>
<div class="mb-3">
    <button class="btn btn-primary">Submit</button>
    <button class="btn btn-info" type="reset">Cancel</button>
</div>
</form>
@endsection

@section('js')
    
@endsection