<!doctype html>
<html lang="en">


@include('users.layout.head')

<body class="position-relative">

    <div class="overlay"></div>

    <div class="main">

        <button class="toggle-button btn-menu d-flex align-items-center justify-content-center"> ☰</button>
        @include('users.layout.mobile-navbar')
        <div class="content" id="home">
            <div class="banner d-flex justify-content-center align-items-center">
                <video autoplay muted loop playsinline>
                    <source src="https://yummie.wpengine.com/wp-content/uploads/2024/03/vd-2.mp4" type="video/mp4">

                </video>
                <div class="container ">
                    <div class="login-cart py-3 d-flex align-items-center">
                        <!-- <button class="toggle-button d-flex align-items-center justify-content-center me-2">☰</button> -->

                        @include('users.layout.desktop-navbar')
                    </div>

                    <div class="banner__details">
                        <div class="container">
                            <!-- <img src="{{ asset('bakers/images/menu.jpg') }}logo.jpg" alt="logo" width="170"> <br> -->

                            <div class="w-50">
                                <span> Welcome to Bakers's Gallery! </span>
                                <h1>Great Tasting Cafe </h1>
                                <div class="py-4">
                                    <p>Bakers Gallery is a delightful cafe known for its variety of delicious offerings.
                                        Specializing in mouthwatering burgers, flavorful momos, savory chow mein, and
                                        freshly
                                        baked pizzas, it caters to every craving. Whether you're looking for a quick
                                        snack or a
                                        satisfying meal.
                                    </p>
                                </div>

                                <div class="what-app d-flex flex-wrap align-items-center">
                                    <a class="whatapp-btn" href="https://wa.me/9779769360688" target="_blank">Contact Us
                                        On <i class="fa-brands fa-whatsapp"></i></a>
                                    <a class="ms-lg-4 ms-md-4 my-lg-0 my-md-0 m-3" href="tel:+9779769360688">+977
                                        9769360688</a>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="container">
                <div class="about mt-lg-4" id="about">
                    <div class="row">
                        <div class="col-lg-4 col-md-6" id="gallery">

                            <a href="{{ asset('bakers/images/menu.jpg') }}" data-caption="Image #1">
                                <img height="300px" src="{{ asset('bakers/images/menu.jpg') }}" />
                            </a>

                        </div>
                        <div class="col-lg-8">
                            <h3 class="py-3"> <strong>Baker's Gallery</strong> <span>Pizza and Pasta Bar</span>

                            </h3>
                            <p> Bakers Gallery is a delightful cafe known for its variety of delicious offerings.
                                Specializing in mouthwatering burgers, flavorful momos, savory chow mein, and freshly
                                baked pizzas, it caters to every craving. Whether you're looking for a quick snack or a
                                satisfying meal, Bakers Gallery serves up a menu that's sure to please, with delivery
                                services available to bring your favorite dishes right to your door!</p>
                        </div>
                    </div>
                </div>
                <div class="text-center title-top " id="photo-gallery">
                    <h1 class=" my-4 my-lg-5"> PHOTO <span>GALLERY</span>
                    </h1>
                </div>
                <div id="gallery" class="mt-4">
                    <div class="row g-4">
                        <div class="col-lg-4 col-md-6">
                            <a href="{{ asset('bakers/images/menu.jpg') }}" data-caption="Image #1">
                                <img height="300px" src="{{ asset('bakers/images/menu.jpg') }}" />
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <a href="{{ asset('bakers/images/menu.jpg') }}" data-caption="Image #1">
                                <img height="300px" src="{{ asset('bakers/images/menu.jpg') }}" />
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <a href="{{ asset('bakers/images/chowmin.jpg') }}" data-caption="Image #2">
                                <img src="{{ asset('bakers/images/chowmin.jpg') }}" />
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <a href="{{ asset('bakers/images/Cold-Coffee-2-3.jpg') }}" data-caption="Image #2">
                                <img src="{{ asset('bakers/images/Cold-Coffee-2-3.jpg') }}" />
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <a href="{{ asset('bakers/images/ice-coffee.jpg') }}" data-caption="Image #2">
                                <img src="{{ asset('bakers/images/ice-coffee.jpg') }}" />
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <a href="{{ asset('bakers/images/bg.jpg') }}" data-caption="Image #2">
                                <img src="{{ asset('bakers/images/bg.jpg') }}" />
                            </a>
                        </div>
                    </div>
                </div>
                <div class="text-center title-top ">
                    <h1 class=" my-4 my-lg-5" id="menu"> OUR SPECIAL <span>MENU</span>
                    </h1>
                </div>
                <div class="menu mt-4">

                    <h1 class=" mb-4 "> SNACKS
                    </h1>
                    <p>
                        (Our house made soup and Chowder are Gluten free,
                        Swap for Gluten-free bread roll $3)</p>
                    <div class="row g-5">
                        <div class="col-lg-6">
                            <div class="menu__details my-2">
                                <div class="menu__title d-flex justify-content-between align-items-center dotted-line">
                                    <h3 class="text-uppercase">
                                        Chicken Momo
                                    </h3>
                                    <div class="price">
                                        RS. 150
                                    </div>
                                </div>
                            </div>

                            <div class="menu__details my-2">
                                <div class="menu__title d-flex justify-content-between align-items-center dotted-line">
                                    <h3 class="text-uppercase">
                                        Chicken Sandwich
                                    </h3>
                                    <div class="price">
                                        RS. 120
                                    </div>
                                </div>
                            </div>
                            <div class="menu__details my-2">
                                <div class="menu__title d-flex justify-content-between align-items-center dotted-line">
                                    <h3 class="text-uppercase">
                                        Veg Paneer Momo
                                    </h3>
                                    <div class="price">
                                        RS. 140
                                    </div>
                                </div>
                            </div>
                            <div class="menu__details my-2">
                                <div class="menu__title d-flex justify-content-between align-items-center dotted-line">
                                    <h3 class="text-uppercase">
                                        Chicken Chowmein
                                    </h3>
                                    <div class="price">
                                        RS. 140
                                    </div>
                                </div>
                            </div>
                            <div class="menu__details my-2">
                                <div class="menu__title d-flex justify-content-between align-items-center dotted-line">
                                    <h3 class="text-uppercase">
                                        Burger-Chicken /veg
                                    </h3>
                                    <div class="price">
                                        RS. 120
                                    </div>
                                </div>
                            </div>
                            <div class="menu__details my-2">
                                <div class="menu__title d-flex justify-content-between align-items-center dotted-line">
                                    <h3 class="text-uppercase">
                                        Burger-Chicken /veg
                                    </h3>
                                    <div class="price">
                                        RS. 120
                                    </div>
                                </div>
                            </div>
                            <div class="menu__details my-2">
                                <div class="menu__title d-flex justify-content-between align-items-center dotted-line">
                                    <h3 class="text-uppercase">
                                        veg Sandwich
                                    </h3>
                                    <div class="price">
                                        RS. 80 &nbsp;
                                    </div>
                                </div>
                            </div>
                            <div class="menu__details my-2">
                                <div class="menu__title d-flex justify-content-between align-items-center dotted-line">
                                    <h3 class="text-uppercase">
                                        Chicken pizza
                                    </h3>
                                    <div class="price">
                                        RS. 200
                                    </div>
                                </div>
                            </div>
                            <div class="menu__details my-2">
                                <div class="menu__title d-flex justify-content-between align-items-center dotted-line">
                                    <h3 class="text-uppercase">
                                        cheese pizza
                                    </h3>
                                    <div class="price">
                                        RS. 160
                                    </div>
                                </div>
                            </div>
                            <div class="menu__details my-2">
                                <div class="menu__title d-flex justify-content-between align-items-center dotted-line">
                                    <h3 class="text-uppercase">
                                        Veg pizza
                                    </h3>
                                    <div class="price">
                                        RS. 160
                                    </div>
                                </div>
                            </div>
                            <div class="menu__details my-2">
                                <div class="menu__title d-flex justify-content-between align-items-center dotted-line">
                                    <h3 class="text-uppercase">
                                        chicken sausage
                                    </h3>
                                    <div class="price">
                                        RS. 40 &nbsp;
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6 px-lg-5">
                            <img src="{{ asset('bakers/images/snacks.jpg') }}" style="width: 100%;" />
                        </div>
                    </div>
                    <h1 class=" my-4 "> TEA & COFFEE
                    </h1>
                    <p>
                        (Our house made soup and Chowder are Gluten free,
                        Swap for Gluten-free bread roll $3)</p>
                    <div class="row g-5">
                        <div class="col-lg-6">
                            <div class="menu__details my-2">
                                <div class="menu__title d-flex justify-content-between align-items-center dotted-line">
                                    <h3 class="text-uppercase">
                                        MAsala tea
                                    </h3>
                                    <div class="price">
                                        RS. 40
                                    </div>
                                </div>
                            </div>

                            <div class="menu__details my-2">
                                <div class="menu__title d-flex justify-content-between align-items-center dotted-line">
                                    <h3 class="text-uppercase">
                                        special masala tea
                                    </h3>
                                    <div class="price">
                                        RS. 50
                                    </div>
                                </div>
                            </div>
                            <div class="menu__details my-2">
                                <div class="menu__title d-flex justify-content-between align-items-center dotted-line">
                                    <h3 class="text-uppercase">
                                        coconut tea
                                    </h3>
                                    <div class="price">
                                        RS. 60
                                    </div>
                                </div>
                            </div>
                            <div class="menu__details my-2">
                                <div class="menu__title d-flex justify-content-between align-items-center dotted-line">
                                    <h3 class="text-uppercase">
                                        clack tea
                                    </h3>
                                    <div class="price">
                                        RS. 30
                                    </div>
                                </div>
                            </div>
                            <div class="menu__details my-2">
                                <div class="menu__title d-flex justify-content-between align-items-center dotted-line">
                                    <h3 class="text-uppercase">
                                        lemon tea
                                    </h3>
                                    <div class="price">
                                        RS. 35
                                    </div>
                                </div>
                            </div>
                            <div class="menu__details my-2">
                                <div class="menu__title d-flex justify-content-between align-items-center dotted-line">
                                    <h3 class="text-uppercase">
                                        hot tea
                                    </h3>
                                    <div class="price">
                                        RS. 40
                                    </div>
                                </div>
                            </div>
                            <div class="menu__details my-2">
                                <div class="menu__title d-flex justify-content-between align-items-center dotted-line">
                                    <h3 class="text-uppercase">
                                        black coffee
                                    </h3>
                                    <div class="price">
                                        RS. 60
                                    </div>
                                </div>
                            </div>
                            <div class="menu__details my-2">
                                <div class="menu__title d-flex justify-content-between align-items-center dotted-line">
                                    <h3 class="text-uppercase">
                                        milk coffee
                                    </h3>
                                    <div class="price">
                                        RS. 80
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6 px-lg-5">


                            <img src="{{ asset('bakers/images/tea-coffee.jpg') }}" class="menu-img" />


                        </div>




                    </div>
                    <h1 class=" my-4 "> COLD BEVERAGE
                    </h1>
                    <p>
                        (Our house made soup and Chowder are Gluten free,
                        Swap for Gluten-free bread roll $3)</p>
                    <div class="row g-5">
                        <div class="col-lg-6">
                            <div class="menu__details my-2">
                                <div class="menu__title d-flex justify-content-between align-items-center dotted-line">
                                    <h3 class="text-uppercase">
                                        cold drink
                                    </h3>
                                    <div class="price">
                                        RS. 70 &nbsp;
                                    </div>
                                </div>
                            </div>

                            <div class="menu__details my-2">
                                <div class="menu__title d-flex justify-content-between align-items-center dotted-line">
                                    <h3 class="text-uppercase">
                                        iced tea
                                    </h3>
                                    <div class="price">
                                        RS. 60 &nbsp;
                                    </div>
                                </div>
                            </div>
                            <div class="menu__details my-2">
                                <div class="menu__title d-flex justify-content-between align-items-center dotted-line">
                                    <h3 class="text-uppercase">
                                        mojito
                                    </h3>
                                    <div class="price">
                                        RS. 100
                                    </div>
                                </div>
                            </div>
                            <div class="menu__details my-2">
                                <div class="menu__title d-flex justify-content-between align-items-center dotted-line">
                                    <h3 class="text-uppercase">
                                        cold coffee black
                                    </h3>
                                    <div class="price">
                                        RS. 80 &nbsp;
                                    </div>
                                </div>
                            </div>
                            <div class="menu__details my-2">
                                <div class="menu__title d-flex justify-content-between align-items-center dotted-line">
                                    <h3 class="text-uppercase">
                                        cold coffee milk
                                    </h3>
                                    <div class="price">
                                        RS. 110
                                    </div>
                                </div>
                            </div>
                            <div class="menu__details my-2">
                                <div class="menu__title d-flex justify-content-between align-items-center dotted-line">
                                    <h3 class="text-uppercase">
                                        green tea
                                    </h3>
                                    <div class="price">
                                        RS. 35 &nbsp
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6 px-lg-5">


                            <img src="{{ asset('bakers/images/soft-drinks.jpg') }}" style="width: 100%;"
                                class="menu-img1" />


                        </div>




                    </div>
                </div>
                <div class="contact-form-part bg-white p-4 mt-4 rounded">
                    <div class=" title-top ">
                        <h1 class="" id="menu"> CONTACT <span>US</span>
                        </h1>
                    </div>
                    <div class="row">
                        <form class="row g-3">
                            <div class="col-md-6">
                              <label for="inputEmail4" class="form-label text-white ">Email</label>
                              <input type="email" class="form-control" id="inputEmail4">
                            </div>
                            <div class="col-md-6">
                              <label for="phoneNumber" class="form-label text-white ">Phone</label>
                              <input type="number" class="form-control" id="phoneNumber">
                            </div>
                            <div class="col-12">
                              <label for="messager" class="form-label text-white ">Message</label>
                              <textarea class="form-control" id="messager" rows="3"></textarea>
                            </div>
                           
                            <div class="col-12">
                              <button type="submit" class="btn  btn-submit">Sign in</button>
                            </div>
                          </form>
                    </div>
                </div>

            </div>
            <div class="footer mt-4">
                <p>© Baker's Gallery. All rights reserved. Designed and developed by <a class="text-warning"
                        href="https://www.facebook.com/bikas.bist.96" target="_blank">Bikash Bist</a>.</p>
            </div>


        </div>


    </div>
    <a href="#home">
        <div class="got-to-top" id="goToTop">
            <div class="icon">
                <i class="fa-solid fa-jet-fighter-up"></i>

            </div>
        </div>
    </a>


    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        Fancybox.bind("#gallery a", {
            groupAll: true,
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const loginCart = document.querySelector(".login-cart");
            const cartLogo = document.querySelector(".cart img");
            let lastScrollTop = 0;

            window.addEventListener("scroll", function() {
                let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

                if (scrollTop > lastScrollTop) {
                    // Scrolling down
                    loginCart.classList.add("scroll-active");
                } else {
                    // Scrolling up
                    loginCart.classList.remove("scroll-active");
                }
                lastScrollTop = scrollTop;
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButton = document.querySelector('.toggle-button');
            const sidebar = document.querySelector('.sidebar');
            const overlay = document.querySelector('.overlay');
            const navLinks = document.querySelectorAll('nav ul li a'); // Select all nav items

            function toggleSidebar() {
                sidebar.classList.toggle('active');
                overlay.classList.toggle('active');
            }

            toggleButton.addEventListener('click', function() {
                toggleSidebar();
            });

            overlay.addEventListener('click', function() {
                toggleSidebar();
            });

            // Close sidebar when clicking on nav items
            navLinks.forEach(function(link) {
                link.addEventListener('click', function() {
                    if (sidebar.classList.contains('active')) {
                        toggleSidebar();
                    }
                });
            });

            document.addEventListener('click', function(event) {
                if (!sidebar.contains(event.target) && !toggleButton.contains(event.target) && sidebar
                    .classList.contains('active')) {
                    toggleSidebar();
                }
            });
        });
    </script>
    <script>
        window.onscroll = function() {
            scrollFunction();
        };

        function scrollFunction() {
            const goToTopButton = document.getElementById("goToTop");
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                goToTopButton.style.display = "block";
            } else {
                goToTopButton.style.display = "none";
            }
        }
    </script>


</body>

</html>
