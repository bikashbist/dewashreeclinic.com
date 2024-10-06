@extends('admin.admin-dashboard')

@section('content')
<div class="container">
    <h2>Contact Info List</h2>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($contactInfo)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Logo</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $contactInfo->id }}</td>
                    <td>{{ $contactInfo->phone }}</td>
                    <td>{{ $contactInfo->email }}</td>
                    <td>{{ $contactInfo->address }}</td>
                    <td>
                        @if($contactInfo->logo)
                            <img src="{{ asset('storage/' . $contactInfo->logo) }}" alt="Logo" width="100">
                        @else
                            No Logo
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('contact-info.edit', $contactInfo->id) }}" class="btn btn-warning">Edit</a>
                        
                        <form action="{{ route('contact-info.destroy', $contactInfo->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this contact info?')">Delete</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    @else
        <p>No contact information found. <a href="{{ route('contact-info.create') }}">Create New</a></p>
    @endif
</div>
@endsection
