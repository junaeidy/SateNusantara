@extends('layouts.admin')

@section('title', 'Create Team')

@section('header', 'Create Team')

@section('content')

<div class="mb-3">
    @if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
  <form action="{{route('team.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
    <label for="exampleFormControlInput1" class="form-label">Name</label>
    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" required>
  </div>
  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Position</label>
    <select class="form-select form-control" name="position" aria-label="Default select example">
        <option selected>Position</option>
        <option value="ceo">CEO</option>
        <option value="chef">CHEF</option>
        <option value="ass">Ass CHEF</option>
      </select>
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