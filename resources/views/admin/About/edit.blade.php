@extends('layouts.admin')

@section('title', 'Edit About')

@section('header', 'Edit About')

@section('content')

<div class="mb-3">
  <form action="{{ route('about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      @if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
    <label for="exampleFormControlInput1" class="form-label">Head Title</label>
    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{ old('title', $about->title) }}" required>
  </div>
  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Content</label>
    <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3" required>{{ old('content', $about->content) }}</textarea>
  </div>
  <div class="mb-3">
    <label for="formFile" class="form-label">Image</label>
    <input name="image_path" type="file" class="form-control-file" id="formFile">
</div>
@if ($about->image_path)
    <span>Current Image</span>
    <img src="{{ asset('storage/' . $about->image_path) }}" alt="Current Image" width="200">
@endif
<div class="mt-4 mb-3">
    <button class="btn btn-primary" type="submit">Save</button>
    <button class="btn btn-secondary" type="reset">Reset</button>
</div>
</form>

@endsection

@section('js')
    
@endsection