@extends('admin.admin-dashboard')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <h4>Create Menu Category</h4>

            <form action="{{ route('menu-categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="menu-category" class="form-label">Menu Category</label>
                    <input type="text" class="form-control" id="menu-category" name="name" placeholder="Menu Name">
                </div>
    
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
    
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
   
    </div>
</div>
@endsection
