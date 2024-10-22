
@extends('users.user-dashboard')

@section('content')

@foreach($category->sproducts as $product)
<div class="section pt-lg-5 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="section-title">{{ $product->title }}</h1>
                <div class="clearfix">

                    <p>
                        {!! $product->description !!}
                    </p>
                  
                    

                 
                </div>
            </div>
        </div>
    </div>


</div>
@endforeach
@endsection



