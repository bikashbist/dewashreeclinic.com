@extends('admin.admin-dashboard')

@section('content')
    <div class="container">
        <h1>Gallery</h1>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <a href="{{ route('gallery.create') }}" class="btn btn-primary">Add New Image</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image Name</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($galleries as $gallery)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $gallery->image_name }}</td>
                        <td><img src="{{ asset('storage/' . $gallery->image_path) }}" alt="{{ $gallery->image_name }}"
                                width="100"></td>
                        <td>
                            <a href="{{ route('gallery.edit', $gallery->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
