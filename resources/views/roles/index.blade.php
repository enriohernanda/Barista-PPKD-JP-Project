@extends('app')
@section('content')
@section('title', 'Data Categories')
{{-- @dd($users) --}}
<div class="d-flex justify-content-end my-2">
    <a href="{{ route('role.create') }}" class="btn btn-primary">Add Role <i class="bi bi-plus-circle"></i></a>
</div>
<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Actions</th>
    </tr>
    @foreach ($datas as $i => $data)
    <tr>
        <td>{{ $i + 1 }}</td>
        <td>{{ $data->name }}</td>
        <td>
            <a href="{{ route('role.edit', $data->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
            <form action="{{ route('role.destroy', $data->id) }}" class="d-inline" method="post" onsubmit="return confirm('Are you sure want to delete?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
