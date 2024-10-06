
@extends('admin.admin-dashboard')
@section('content')
<div class="row">
    <div class="col-12">
        <h4>About Us</h4>
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
        @if($aboutUs)
            <a href="{{ route('about-us.edit', $aboutUs->id) }}" class="btn btn-warning btn-sm">Edit About Us</a>
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>{{ $aboutUs->title }}</td>
                        <td>{!! $aboutUs->description !!}</td>
                        <td>
                            @if ($aboutUs->image)
                                <img src="{{ asset('storage/' . $aboutUs->image) }}" alt="About Us Image" width="100">
                            @else
                                <p>No image available</p>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('about-us.edit', $aboutUs->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('about-us.destroy', $aboutUs->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        @else
            <p>No About Us information found. <a href="{{ route('about-us.create') }}">Create About Us</a></p>
        @endif
    </div>
</div>
@endsection
