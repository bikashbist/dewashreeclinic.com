@extends('admin.admin-dashboard')

@section('content')
<div class="container">
    <h2>Service Products</h2>
    <a href="{{ route('service-products.create') }}" class="btn btn-success mb-3">Add New Product</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Title</th>
                <th>Desc</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                
                    <td>{{ $product->scategory ? $product->scategory->name : 'No Category' }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{!! $product->description !!}</td>
                    <td>
                        <a href="{{ route('service-products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('service-products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
