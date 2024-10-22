@php
    use App\Models\ServiceCategory;

    // Fetch categories and their related products directly
    $serviceCategories = ServiceCategory::with('sproducts')->get();
@endphp
<header class="ltn__header-area ltn__header-3">
    <div class="ltn__header-top-area border-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="ltn__top-bar-menu">
                        @if($contactInfo)
                    
                       
                        <ul>
                            <li><a class="text-white" href="mailto:{{ $contactInfo->email }}"><i
                                        class="icon-mail"></i> {{ $contactInfo->email }}</a></li>
                            <li><a class="text-white" href="#"><i class="icon-placeholder"></i> {{ $contactInfo->address }}</a></li>
                        </ul>
                        @else
                        <p>No contact information found. </p>
                    @endif
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="top-bar-right text-right text-end">
                        <div class="ltn__top-bar-menu">
                            <ul>

                                <li>
                                    <!-- ltn__social-media -->
                                    <div class="ltn__social-media">
                                        <ul>
                                            <li><a class="text-white" href="#" title="Facebook"><i
                                                        class="fab fa-facebook-f"></i></a></li>
                                            <!-- <li><a class="text-white" href="#" title="Twitter"><i
                                                        class="fab fa-twitter"></i></a>
                                            </li> -->

                                            <li><a class="text-white" href="#" title="Instagram"><i
                                                        class="fab fa-instagram"></i></a></li>
                                            <li><a class="text-white" href="#" title="Viber"><i
                                                        class="fab fa-viber"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ltn__header-top-area end -->
    <!-- ltn__header-middle-area start -->
    <div class="ltn__header-middle-area">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="site-logo">
                        @if($contactInfo)
                        @if($contactInfo->logo)
                        <a href="/">

                            <img src="{{ asset( $contactInfo->logo) }}" alt="logo" height="80px" style="object-fit: contain;">
                        </a>
                    @else
                        No Logo
                    @endif
                    @endif
                       
                    </div>
                </div>
                <div class="col header-contact-serarch-column d-none d-lg-block">
                    <div class="header-contact-search">

                        <!-- header-search-2 -->
                        <div class="header-search-2">
                            <form id="#123" method="get" action="#">
                                <input type="text" name="search" value="" placeholder="Search here..." />
                                <button type="submit">
                                    <span><i class="icon-search"></i></span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col d-none d-lg-block d-md-block">

                    <div class="ltn__header-options">
                        <ul>


                            <li>

                                <div class="mini-cart-icon mini-cart-icon-2">
                                    <div class="header-feature-item">
                                        <div class="header-feature-icon">
                                            <i class="fa-brands fa-whatsapp fs-1 text-success"></i>
                                        </div>
                                        <div class="header-feature-info">
                                            @if($contactInfo)
                                            <h6>Phone</h6>
                                            <p><a href="tel:{{ $contactInfo->phone }}">+977-{{ $contactInfo->phone }}</a></p>
                                            @else
                                            <p>No contact information found. </p>
                                        @endif
                                            
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ltn__header-middle-area end -->
    <!-- header-bottom-area start -->
    <div
        class="header-bottom-area ltn__border-top ltn__header-sticky  ltn__sticky-bg-white--- ltn__sticky-bg-secondary ltn__secondary-bg section-bg-1 menu-color-white d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col header-menu-column justify-content-center">
                    <div class="sticky-logo">
                        <div class="site-logo">
                            @if($contactInfo)
                            @if($contactInfo->logo)
                            <img src="{{ asset( $contactInfo->logo) }}" alt="Logo" height="80px" style="object-fit: contain;">
                        @else
                            No Logo
                        @endif
                        @endif
                        </div>
                    </div>
                    <div class="header-menu header-menu-2">
                        <nav>
                            <div class="ltn__main-menu">
                                <ul>
                                    <li><a href="/">Home</a>

                                    </li>
                                    <li><a href="{{route('about')}}">About</a>

                                    </li>
                                    <li><a href="{{route('shop')}}">Shop</a>

                                    </li> 
                                    <li class="menu-icon"><a href="#">Services</a>
                                        <ul>
                                            @foreach($serviceCategories as $category)
                                            <li><a href="{{ route('services.show', $category->id) }}">{{ $category->name }}</a></li>
                                        @endforeach
                                          
                                        </ul>
                                    </li>
                                  

                                    <li><a href="{{route('contact')}}">Contact</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header-bottom-area end -->
</header>
<!-- HEADER AREA END -->