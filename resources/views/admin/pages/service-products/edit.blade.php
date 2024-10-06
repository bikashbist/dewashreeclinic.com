@extends('admin.admin-dashboard')

@section('content')
<div class="container">
    <h2>Edit Service Product</h2>
    <form action="{{ route('service-products.update', $serviceProduct->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="service_category_id">Category</label>
            <select name="service_category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $serviceProduct->service_category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $serviceProduct->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="editor" class="form-control" rows="5" required>{{ $serviceProduct->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
