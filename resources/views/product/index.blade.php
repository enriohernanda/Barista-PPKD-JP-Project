@extends('app')
@section('content')
@section('title', 'Data Categories')
{{-- @dd($users) --}}
<div class="d-flex justify-content-end my-2">
    <a href="{{ route('product.create') }}" class="btn btn-primary">Add Product <i class="bi bi-plus-circle"></i></a>
</div>
<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Category</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Price</th>
        <th>Active</th>
        <th>Actions</th>
    </tr>
    @foreach ($datas as $i => $data)
    <tr>
        <td>{{ $i + 1 }}</td>
        <td>{{ $data->category->category_name }}</td>
        <td><img src="{{ asset('storage/' . $data->product_photo) }}" alt="{{ $data->product_name }}" width="100"></td>
        <td>{{ $data->product_name }}</td>
        <td>{{ $data->product_price }}</td>
        <td>{{ $data->is_active }}</td>
        <td>
            <a href="{{ route('product.edit', $data->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
            <form action="{{ route('product.destroy', $data->id) }}" class="d-inline" method="post" onsubmit="return confirm('Are you sure want to delete?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
