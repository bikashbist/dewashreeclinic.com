@extends('admin.admin-dashboard')

@section('content')
<div class="container">
    <h1>Edit Advertisements</h1>
    <form action="{{ route('advertisements.update', $advertisement->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="image_name">Image Name</label>
            <input type="text" name="image_name" id="image_name" class="form-control" value="{{ $advertisement->image_name }}" required>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
            <img src="{{ asset('storage/' . $advertisement->image) }}" alt="{{ $advertisement->image_name }}" width="100">
        </div>
        <button type="submit" class="btn btn-success">Update Advertisement</button>
    </form>
</div>
@endsection
