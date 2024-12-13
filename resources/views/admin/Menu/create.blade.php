@extends('layouts.admin')

@section('title', 'Create Menu')

@section('header', 'Create Menu')

@section('content')

<div class="mb-3">
    @if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
  <form action="{{route('menu.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
    <label for="exampleFormControlInput1" class="form-label">Name</label>
    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" required>
  </div>
  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Category</label>
    <select class="form-select form-control" name="category" aria-label="Default select example">
        <option selected>Category</option>
        <option value="special">Special Menu</option>
        <option value="recipe">Special Recipe</option>
        <option value="regular">Regular Menu</option>
      </select>
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput2" class="form-label">Price</label>
    <input type="number" name="price" class="form-control" id="exampleFormControlInput2" required>
  </div>
  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea> 
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

@endsection

@section('js')
    
@endsection