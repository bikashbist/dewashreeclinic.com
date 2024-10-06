
@extends('admin.admin-dashboard')
@section('content')
<div class="row">
    <div class="col-12">
        <h4>Edit Menu Category</h4>
        <form action="{{ route('menu-categories.update', $menuCategory->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="menu-category" class="form-label">Menu Category</label>
                <input type="text" class="form-control" id="menu-category" name="name" value="{{ $menuCategory->name }}">
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</div>
@endsection
