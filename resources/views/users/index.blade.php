@extends('users.user-dashboard')

@section('content')
    <!-- SLIDER AREA START (slider-3) -->
    <div class="ltn__slider-area ltn__slider-3---  section-bg-1--- ">
        <div class="container-fluid-x">

            <div class="ltn__slide-active-2 slick-slide-arrow-1 slick-slide-dots-1">
                @foreach ($banner as $banner)
                    <!-- ltn__slide-item -->
                    <div class="ltn__slide-item ltn__slide-item-10 section-bg-1 bg-image"
                        data-bs-bg="{{ asset($banner->image) }}">
                        <div class="ltn__slide-item-inner">

                        </div>
                    </div>
                @endforeach


            </div>

        </div>
    </div>
    <!-- SLIDER AREA END -->
    @include('users.layout.about-us')


    </div>

    <!-- FEATURE AREA START (Feature - 3) -->
    <div class="ltn__feature-area mt-35 mt--65---">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if ($adv->first())
                        <img src="{{ asset($adv->first()->image) }} " alt="{{ $adv->first()->image_name }}"
                            width="100%">
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- FEATURE AREA END -->

    <!-- PRODUCT TAB AREA START (product-item-3) -->
    <div class="ltn__product-tab-area ltn__product-gutter pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2--- text-center">
                        <h1 class="section-title">Our Products</h1>
                        <p>A highly efficient slip-ring scanner for today's diagnostic requirements.</p>
                    </div>
                    <!-- Dynamic Tab Menu -->
                    <div class="ltn__tab-menu ltn__tab-menu-2 ltn__tab-menu-top-right-- text-uppercase text-center">
                        <div class="nav">
                            @foreach ($categories as $category)
                                <a class="@if ($loop->first) active show @endif" data-bs-toggle="tab"
                                    href="#liton_tab_{{ $category->id }}">
                                    {{ $category->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <!-- Dynamic Tab Content -->
                    <div class="tab-content">
                        @foreach ($categories as $category)
                            <div class="tab-pane fade @if ($loop->first) active show @endif"
                                id="liton_tab_{{ $category->id }}">
                                <div class="ltn__product-tab-content-inner">
                                    <div class="row ltn__tab-product-slider-one-active slick-arrow-1">
                                        @foreach ($category->products as $product)
                                            <!-- ltn__product-item -->
                                            <div class="col-lg-12">
                                                <div class="ltn__product-item ltn__product-item-3 text-center">
                                                    <div class="product-img">
                                                        <a href="#"><img
                                                                src="{{ asset( $product->image) }}"
                                                                alt="{{ $product->name }}"></a>
                                                        <div class="product-badge">
                                                            <ul>
                                                                <li class="sale-badge">RS: {{ $product->price }}</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-info">
                                                        <div class="product-ratting">
                                                            <ul>
                                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                <li><a href="#"><i class="fas fa-star"></i></a></li>
                                                                <li><a href="#"><i
                                                                            class="fas fa-star-half-alt"></i></a></li>
                                                                <li><a href="#"><i class="far fa-star"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <h2 class="product-title"><a
                                                                href="#">{{ $product->name }}</a></h2>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ltn__product-item End -->
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PRODUCT TAB AREA END -->

    <!-- COUNTDOWN AREA START -->
    <div class="ltn__call-to-action-area section-bg-1 bg-image">
        @if ($adv->last())
            <img src="{{ asset($adv->last()->image) }}" alt="{{ $adv->last()->image_name }}" width="100%">
        @endif
    </div>
    <!-- COUNTDOWN AREA END -->

    </div>
    <!-- COUNTDOWN AREA END -->
<!-- PRODUCT AREA START (Best Selling Item) -->
<div class="ltn__product-area ltn__product-gutter pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area ltn__section-title-2 text-center">
                    <h1 class="section-title">Best Selling Item</h1>
                </div>
            </div>
        </div>
        <div class="row ltn__tab-product-slider-one-active--- slick-arrow-1">
            <!-- Loop through category with ID 10 -->
            @foreach($featuredproducts as $category)
                @if($category->id == 10 && $category->products->isNotEmpty()) <!-- Check for category ID 10 -->
                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                        <div class="ltn__product-item ltn__product-item-3 text-center">
                            <div class="product-img">
                                <a href="product-details.html">
                                    <img src="{{ asset( $category->products->first()->image) }}" 
                                         alt="{{ $category->products->first()->name }}">
                                </a>
                                <div class="product-badge">
                                    <ul>
                                        <li class="sale-badge">New</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-ratting">
                                    <ul>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                        <li><a href="#"><i class="far fa-star"></i></a></li>
                                    </ul>
                                </div>
                                <h2 class="product-title">
                                    <a href="product-details.html">{{ $category->products->first()->name }}</a>
                                </h2>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
<!-- PRODUCT AREA END -->

<!-- SMALL PRODUCT LIST AREA START (Featured Products) -->
<div class="ltn__small-product-list-area section-bg-1 pt-50 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area ltn__section-title-2 text-center">
                    <h1 class="section-title">Featured Products</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Loop through category with ID 11 -->
            @foreach($featuredproducts as $category)
                @if($category->id == 11 && $category->products->isNotEmpty()) <!-- Check for category ID 11 -->
                    @foreach($category->products as $product)
                        <!-- Small Product Item -->
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="ltn__small-product-item">
                                <div class="small-product-item-img">
                                    <a href="product-details.html">
                                        <img src="{{ asset( $product->image) }}" alt="{{ $product->name }}">
                                    </a>
                                </div>
                                <div class="small-product-item-info">
                                    <div class="product-ratting">
                                        <ul>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star"></i></a></li>
                                            <li><a href="#"><i class="fas fa-star-half-alt"></i></a></li>
                                            <li><a href="#"><i class="far fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <h2 class="product-title">
                                        <a href="product-details.html">{{ $product->name }}</a>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            @endforeach
        </div>
    </div>
</div>
<!-- SMALL PRODUCT LIST AREA END -->


<div class="section-title-area ltn__section-title-2  pt-lg-5 pt-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h1 class="section-title">We value your feedback</h1>
             
                <form action="{{ route('messages.store') }}" method="POST" class="row g-3">
                    @csrf <!-- Include CSRF token for security -->
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label ">Email</label>
                        <input type="email" name="email" class="form-control" id="inputEmail4" required>
                    </div>
                    <div class="col-md-6">
                        <label for="phoneNumber" class="form-label ">Phone</label>
                        <input type="number" name="phone" class="form-control" id="phoneNumber" required>
                    </div>
                    <div class="col-12">
                        <label for="messager" class="form-label ">Message</label>
                        <textarea name="message" class="form-control" id="messager" rows="3" required></textarea>
                    </div>
                    <div class="col-12 ">
                        <button type="submit" class="btn btn-primary mb-5">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>

 

    <!-- TESTIMONIAL AREA START (testimonial-4) -->
    {{-- <div class="ltn__testimonial-area section-bg-1  pb-70">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area ltn__section-title-2 text-center">
                        <h6 class="section-subtitle ltn__secondary-color">Testimonials</h6>
                        <h1 class="section-title">Clients Feedbacks<span>.</span></h1>
                    </div>
                </div>
            </div>
            <div class="row ltn__testimonial-slider-3-active slick-arrow-1 slick-arrow-1-inner">
                <div class="col-lg-12">
                    <div class="ltn__testimonial-item ltn__testimonial-item-4">
                        <div class="ltn__testimoni-img">
                            <img src="img/doctor.jpg" alt="#">
                        </div>
                        <div class="ltn__testimoni-info">
                            <p>Lorem ipsum dolor sit amet, consectetur adipi sicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. </p>
                            <h4>Rosalina D. William</h4>
                            <h6>Founder</h6>
                        </div>
                        <div class="ltn__testimoni-bg-icon">
                            <i class="far fa-comments"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__testimonial-item ltn__testimonial-item-4">
                        <div class="ltn__testimoni-img">
                            <img src="img/doctor.jpg" alt="#">
                        </div>
                        <div class="ltn__testimoni-info">
                            <p>Lorem ipsum dolor sit amet, consectetur adipi sicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. </p>
                            <h4>Rosalina D. William</h4>
                            <h6>Founder</h6>
                        </div>
                        <div class="ltn__testimoni-bg-icon">
                            <i class="far fa-comments"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="ltn__testimonial-item ltn__testimonial-item-4">
                        <div class="ltn__testimoni-img">
                            <img src="img/doctor.jpg" alt="#">
                        </div>
                        <div class="ltn__testimoni-info">
                            <p>Lorem ipsum dolor sit amet, consectetur adipi sicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. </p>
                            <h4>Rosalina D. William</h4>
                            <h6>Founder</h6>
                        </div>
                        <div class="ltn__testimoni-bg-icon">
                            <i class="far fa-comments"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="ltn__testimonial-item ltn__testimonial-item-4">
                        <div class="ltn__testimoni-img">
                            <img src="img/doctor.jpg" alt="#">
                        </div>
                        <div class="ltn__testimoni-info">
                            <p>Lorem ipsum dolor sit amet, consectetur adipi sicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. </p>
                            <h4>Rosalina D. William</h4>
                            <h6>Founder</h6>
                        </div>
                        <div class="ltn__testimoni-bg-icon">
                            <i class="far fa-comments"></i>
                        </div>
                    </div>
                </div>
                <!--  -->
            </div>
        </div>
    </div> --}}
    <!-- TESTIMONIAL AREA END -->
@endsection
