
@extends('admin.admin-dashboard')
@section('content')
<div class="row">
    <div class="col-12">
        <h4>Edit Menu Product</h4>
        <form action="{{ route('menu-products.update', $menuProduct->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="menu_category_id" class="form-label">Menu Category</label>
                <select name="menu_category_id" id="menu_category_id" class="form-control" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $menuProduct->menu_category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $menuProduct->name }}" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Product Price</label>
                <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{ $menuProduct->price }}" required>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</div>
@endsection
