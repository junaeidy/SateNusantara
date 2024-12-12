@extends('layouts.admin')
@section('title', 'Create About')
@section('header', 'Create')
@section('content')
<div class="mb-3">
  <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
    <label for="exampleFormControlInput1" class="form-label">Head Title</label>
    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" required>
  </div>
  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Content</label>
    <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
  </div>
  <div class="mb-3">
    <label for="formFile" class="form-label">Default file input example</label>
    <input name="image_path" type="file" class="form-control-file" id="formFile" required>
  </div>
  <div>
</div>
<div class="mb-3">
    <button class="btn btn-primary" type="submit">Save</button>
    <button class="btn btn-info" type="reset">Cancel</button>
</div>
</form>
@endsection
@section('js')
    
@endsection