
@extends('admin.admin-dashboard')
@section('content')
<div class="container">
    <h2>Edit Contact Info</h2>
    
    <form action="{{ route('contact-info.update', $contactInfo->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $contactInfo->phone) }}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $contactInfo->email) }}">
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control" value="{{ old('address', $contactInfo->address) }}">
        </div>

        <div class="form-group">
            <label for="logo">Logo</label>
            @if($contactInfo->logo)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $contactInfo->logo) }}" alt="Logo" width="100">
                </div>
            @endif
            <input type="file" name="logo" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
