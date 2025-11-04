@extends('app')
@section('content')
@if ($errors->any())
        <ul>
            @foreach ($errors->all() as $er)
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Alert!</strong> {{ $er }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endforeach
        </ul>
@endif
<form action="{{ route('role.store') }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label mt-2">Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="enter your category name" required>
    </div>
    <button type="submit" class="btn btn-primary mt-2">Save</button>
</form>
@endsection
