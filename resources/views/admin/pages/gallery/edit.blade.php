@extends('admin.admin-dashboard')

@section('content')
<div class="container">
    <h1>Edit Image</h1>
    <form action="{{ route('gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="image_name">Image Name</label>
            <input type="text" name="image_name" id="image_name" class="form-control" value="{{ $gallery->image_name }}" required>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
            <img src="{{ asset('storage/' . $gallery->image_path) }}" alt="{{ $gallery->image_name }}" width="100" class="mt-2">
        </div>
        <button type="submit" class="btn btn-primary">Update Image</button>
    </form>
</div>
@endsection
