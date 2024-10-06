
@extends('admin.admin-dashboard')
@section('content')
<div class="row">
    <div class="col-12">
        <h4>Edit About Us</h4>
        <form action="{{ route('about-us.update', $aboutUs->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $aboutUs->title }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="editor" name="description" rows="5" >{{ $aboutUs->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image">
                @if($aboutUs->image)
                    <img src="{{ asset('storage/' . $aboutUs->image) }}" alt="About Us Image" width="100" class="mt-2">
                @endif
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</div>
@endsection
