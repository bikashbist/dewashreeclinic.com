<header class="ltn__header-area ltn__header-3">
    <div class="ltn__header-top-area border-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="ltn__top-bar-menu">
                        <ul>
                            <li><a class="text-white" href="mailto:dewashreeclinic@gmail.com"><i
                                        class="icon-mail"></i> dewashreeclinic@gmail.com</a></li>
                            <li><a class="text-white" href="#"><i class="icon-placeholder"></i> Kathmandu,
                                    Gokarneshwor -8, Atterkhel</a></li>
                        </ul>
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
                        <a href="/">

                            <img src="{{asset('users/img/Dewashree.png')}}" alt="logo" height="80px" style="object-fit: contain;">
                        </a>
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
                                            <h6>Phone</h6>
                                            <p><a href="tel:9767920300">+977-9767920300</a></p>
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
                            <img src="{{asset('users/img/Dewashree.png')}}" alt="logo" height="80px" style="object-fit: contain;">
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
                                            <li><a href="shop.html">Shop</a></li>
                                            <li><a href="shop-grid.html">Shop Grid</a></li>
                                            <li><a href="shop-left-sidebar.html">Shop Left sidebar</a></li>
                                            <li><a href="shop-right-sidebar.html">Shop right sidebar</a></li>
                                            <li><a href="product-details.html">Shop details </a></li>
                                          
                                        </ul>
                                    </li>
                                    <li><a href="{{route('services')}}">Services</a>

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