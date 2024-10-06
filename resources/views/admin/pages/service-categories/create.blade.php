@extends('admin.admin-dashboard')

@section('content')
<div class="container">
    <h2>Create Service Category</h2>
    <form action="{{ route('service-categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
