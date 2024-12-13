@extends('layouts.admin')

@section('title', 'Create About')

@section('header', 'Create About')

@section('content')
<div class="container">
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
      <label for="formFile" class="form-label">Image</label>
      <input name="image_path" type="file" class="form-control-file" id="formFile" required>
    </div>
  <div class="mb-3">
      <button class="btn btn-primary" type="submit">Save</button>
      <button class="btn btn-secondary" type="reset">Reset</button>
  </div>
  </form>
</div>


@endsection

@section('js')
    
@endsection