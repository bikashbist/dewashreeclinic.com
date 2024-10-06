@extends('admin.admin-dashboard')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="mb-sm-0">Menu Categories</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('menu-categories.create') }}" class="btn btn-primary mb-3">Create New Category</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>
                            @if($category->image)
                                <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" width="100">
                            @else
                                No image
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('menu-categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('menu-categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
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
</div>
@endsection
