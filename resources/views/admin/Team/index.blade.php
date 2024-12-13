@extends('layouts.admin')

@section('title', 'Team')

@section('header', 'Team')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Team Pages</h6>
        <div class="float-right">
            <a href="{{ route('team.create') }}" class="btn btn-primary">New</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                @foreach ($teams as $key => $team)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$team->name}}</td>
                        <td class="text-uppercase">{{$team->position}}</td>
                        <td>@if ($team->image_path)
                            <img src="{{ asset('storage/' .$team->image_path) }}" alt="{{ $team->title }}" width="100px">
                        @endif
                        </td>
                        <td style="display: flex; gap: 10px; align-items: center;">
                            <a href="{{route('team.edit', $team->id)}}" class="btn btn-warning">Edit</a> | 
                            <form action="{{ route('team.destroy', $team->id) }}" method="POST" id="deleteForm">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger mt-3" id="deleteButton">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('js')
<script>
    document.getElementById('deleteButton').addEventListener('click', function () {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm').submit();
            }
        });
    });
</script>
@endsection