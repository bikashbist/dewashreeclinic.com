
@extends('admin.admin-dashboard')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0"> Menu Category</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                    <li class="breadcrumb-item active">Create Menu Category</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <h4>Create Menu Category</h4>
        <form action="{{ route('menu-categories.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="menu-category" class="form-label">Menu Category</label>
                <input type="text" class="form-control" id="menu-category" name="name" placeholder="Menu Name">
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
</div>
@endsection