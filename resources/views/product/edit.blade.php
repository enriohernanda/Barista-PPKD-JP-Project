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
<form action="{{ route('product.update', $edit->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-sm-6">
            <div class="mb-3">
                <label for="" class="form-label mt-2">Category</label>
                <select name="category_id" id="" class="form-select">
                    <option value="">Select One</option>
                    @foreach ($categories as $category)
                    <option {{ $edit->category_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Price</label>
                <input type="number" name="product_price" class="form-control" placeholder="Enter your product price" value="{{ $edit->product_price }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Photo</label>
                <input type="file" name="product_photo" class="form-control">
                <img src="{{ asset('storage/' . $edit->product_photo) }}" class="mt-2" alt="{{ $edit->product_name }}" width="150"></td>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" name="product_name" class="form-control" placeholder="Enter your product name" value="{{ $edit->product_name }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Description</label>
                <textarea name="product_description" id="" class="form-control">{{ $edit->product_description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Status</label>
                <br>
                <input type="radio" class="form-check-input" id="is_active_1" name="is_active" value="1" {{ $edit->is_active == 1 ? 'checked' : '' }}> Publish
                <input type="radio" class="form-check-input" id="is_active_0" name="is_active" value="0" {{ $edit->is_active == 0 ? 'checked' : '' }}> Draft
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-2">Save Change</button>
</form>
@endsection
