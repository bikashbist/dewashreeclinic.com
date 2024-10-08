@extends('admin.admin-dashboard')

@section('content')
<div class="container">
    <h1>Edit Banner</h1>
    <form action="{{ route('banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="image_name">Image Name</label>
            <input type="text" name="image_name" id="image_name" class="form-control" value="{{ $banner->image_name }}" required>
        </div>
        <div class="form-group">
            <label for="image">Current Image</label>
            <div>
                <img src="{{ asset('storage/' . $banner->image) }}" alt="{{ $banner->image_name }}" style="width: 100px;">
            </div>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Update Banner</button>
    </form>
</div>
@endsection
