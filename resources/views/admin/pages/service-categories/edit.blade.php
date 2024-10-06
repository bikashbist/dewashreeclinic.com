@extends('admin.admin-dashboard')

@section('content')
<div class="container">
    <h2>Edit Service Category</h2>
    <form action="{{ route('service-categories.update', $serviceCategory->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" name="name" class="form-control" value="{{ $serviceCategory->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
