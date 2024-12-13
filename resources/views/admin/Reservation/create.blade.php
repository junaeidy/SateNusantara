@extends('layouts.admin')

@section('title', 'Create Reservation')

@section('header', 'Create Reservation')

@section('content')

<div class="container">
    @if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
    @endif
    <div class="mb-3">
        <form action="{{ route('reservation.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
          <label for="exampleFormControlInput1" class="form-label">Nama</label>
          <input type="text" name="name" class="form-control" id="exampleFormControlInput1" required>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput2" class="form-label">Email</label>
          <input type="text" name="email" class="form-control" id="exampleFormControlInput2" required>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput3" class="form-label">Nomor HP</label>
          <input type="text" name="phoneNumber" class="form-control" id="exampleFormControlInput3" required>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput4" class="form-label">Tanggal</label>
          <input type="datetime-local" name="date" class="form-control" id="exampleFormControlInput4" required>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput5" class="form-label">Jumlah Orang</label>
          <select class="form-control" id="selectPerson" name="selectPerson" required>
            <option></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
        </div>
        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">Pesan</label>
          <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
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