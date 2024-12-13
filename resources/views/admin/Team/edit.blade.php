@extends('layouts.admin')

@section('title', 'Edit Team')

@section('header', 'Edit Team')

@section('content')

<div class="mb-3">
  <form action="{{route('team.update', $team->id)}}" method="POST" enctype="multipart/form-data">
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
    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="{{ old('name', $team->name) }}" required>
  </div>
  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Position</label>
    <select name="position" class="form-control text-uppercase" id="exampleFormControlSelect1" >
        <option value="{{ old('position', $team->position) }}" class="text-uppercase">{{ old('position', $team->position) }}</option>
        <option value="ceo">CEO</option>
        <option value="chef">CHEF</option>
        <option value="ass">Ass Chef</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="formFile" class="form-label">Image</label>
    <input name="image_path" type="file" class="form-control-file" id="formFile">
</div>
@if ($team->image_path)
    <span>Current Image</span>
    <img src="{{ asset('storage/' . $team->image_path) }}" alt="Current Image" width="200">
@endif
<div class="mt-4 mb-3">
    <button class="btn btn-primary" type="submit">Save</button>
    <button class="btn btn-secondary" type="reset">Reset</button>
</div>
</form>

@endsection

@section('js')
    
@endsection