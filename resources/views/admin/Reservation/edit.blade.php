@extends('layouts.admin')

@section('title', 'Edit Reservation')

@section('header', 'Edit Reservation')

@section('content')

<div class="mb-3">
  <form action="{{ route('reservation.update', $reservation->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      @if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
    <label for="exampleFormControlInput1" class="form-label">Nama</label>
    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="{{ old('name', $reservation->name) }}" required>
  </div>
  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Email</label>
    <input type="text" name="email" class="form-control" id="exampleFormControlTextarea1" value="{{ old('email', $reservation->email) }}" required>
  </div>
  <div class="mb-3">
    <label for="formFile" class="form-label">Phone Number</label>
    <input type="text" name="phoneNumber" class="form-control" id="exampleFormControlTextarea1" value="{{ old('phoneNumber', $reservation->phoneNumber) }}" required>
</div>

    <div class="mb-3">
      <label for="exampleFormControlInput4" class="form-label">Tanggal</label>
      <input type="datetime-local" name="date" class="form-control" id="exampleFormControlInput4" value="{{ old('date', $reservation->date) }}" required>
    </div>
    <div class="mb-3">
      <label for="exampleFormControlInput5" class="form-label">Jumlah Orang</label>
      <select class="form-control" id="selectPerson" name="selectPerson" required>
        <option value="{{ old('position', $reservation->selectPerson) }}" class="text-uppercase">{{ old('selectPerson', $reservation->selectPerson) }}</option>
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
      <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="3" required>{{ old('message', $reservation->message) }}</textarea>
    </div>

<div class="mt-4 mb-3">
    <button class="btn btn-primary" type="submit">Save</button>
    <button class="btn btn-secondary" type="reset">Reset</button>
</div>
</form>

@endsection

@section('js')
    
@endsection