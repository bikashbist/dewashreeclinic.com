@extends('admin.admin-dashboard')

@section('content')
<div class="container">
    <h1>Banner List</h1>
    <a href="{{ route('banner.create') }}" class="btn btn-primary mb-3">Add New Banner</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Image Name</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($banners as $banner)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $banner->image_name }}</td>
                    <td><img src="{{ asset('storage/' . $banner->image) }}" alt="{{ $banner->image_name }}" style="width: 100px;"></td>
                    <td>
                        <a href="{{ route('banner.edit', $banner->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('banner.destroy', $banner->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
