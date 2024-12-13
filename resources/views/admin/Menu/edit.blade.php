@extends('layouts.admin')

@section('title', 'Edit Menu')

@section('header', 'Edit Menu')

@section('content')

<div class="mb-3">
  <form action="{{route('menu.update', $menu->id)}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      @if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
    <label for="exampleFormControlInput1" class="form-label">Name</label>
    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="{{ old('name', $menu->name) }}" required>
  </div>
  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Price</label>
    <input type="text" name="price" class="form-control" id="exampleFormControlInput1" value="{{ old('price', $menu->price) }}" required>
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Description</label>
    <textarea name="description" class="form-control" id="exampleFormControlInput1" rows="3">{{ old('description', $menu->description) }}</textarea>

  </div>
  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Category</label>
    <select name="category" class="form-control text-uppercase" id="exampleFormControlSelect1" >
        <option value="{{ old('position', $menu->category) }}" class="text-uppercase">{{ old('position', $menu->category) }}</option>
        <option value="special">Special Menu</option>
        <option value="recipe">Special Recipe</option>
        <option value="regular">Regular Menu</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="formFile" class="form-label">Image</label>
    <input name="image_path" type="file" class="form-control-file" id="formFile">
</div>
@if ($menu->image_path)
    <span>Current Image</span>
    <img src="{{ asset('storage/' . $menu->image_path) }}" alt="Current Image" width="200">
@endif
<div class="mt-4 mb-3">
    <button class="btn btn-primary" type="submit">Save</button>
    <button class="btn btn-secondary" type="reset">Reset</button>
</div>
</form>

@endsection

@section('js')
    
@endsection