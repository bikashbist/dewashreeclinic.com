@extends('admin.admin-dashboard')

@section('content')
<div class="container">
    <h1>Advertisements</h1>
    <a href="{{ route('advertisements.create') }}" class="btn btn-primary mb-3">Add New Advertisement</a>
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
            @foreach($advertisements as $advertisement)
            <tr>
                <td>{{ $advertisement->id }}</td>
                <td>{{ $advertisement->image_name }}</td>
                <td><img src="{{ asset('storage/' . $advertisement->image) }}" alt="{{ $advertisement->image_name }}" width="100"></td>
                <td>
                    <a href="{{ route('advertisements.edit', $advertisement->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('advertisements.destroy', $advertisement->id) }}" method="POST" style="display:inline-block;">
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
