@extends('admin.admin-dashboard')

@section('content')
<div class="container">
    <h2>Service Categories</h2>
    <a href="{{ route('service-categories.create') }}" class="btn btn-success mb-3">Add New Category</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('service-categories.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('service-categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
