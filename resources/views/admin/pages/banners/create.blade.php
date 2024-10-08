@extends('admin.admin-dashboard')

@section('content')
<div class="container">
    <h1>Add New Banner</h1>
    <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image_name">Image Name</label>
            <input type="text" name="image_name" id="image_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Image</button>
    </form>
</div>
@endsection
