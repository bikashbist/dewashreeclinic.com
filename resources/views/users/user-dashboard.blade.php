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

                                    @if ($about)
                                        <p> {!! Str::limit($about->description, 300) !!} </p>
                                    @else
                                        <p>No data available.</p>
                                    @endif
                                </div>
                                @if ($contactInfo)
                                    <div class="what-app d-flex flex-wrap align-items-center">
                                        <a class="whatapp-btn" href="https://wa.me/977{{ $contactInfo->phone }}"
                                            target="_blank">Contact Us
                                            On <i class="fa-brands fa-whatsapp"></i></a>
                                        <a class="ms-lg-4 ms-md-4 my-lg-0 my-md-0 m-3"
                                            href="tel:+977{{ $contactInfo->phone }}">+977
                                            {{ $contactInfo->phone }}</a>
                                    </div>
                                @else
                                    <p>No contact information found. <a href="{{ route('contact-info.create') }}">Create
                                            New</a></p>
                                @endif


                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="container">
                <div class="about mt-4" id="about">
                    <div class="row">
                        @if ($about)
                            <div class="col-lg-4 col-md-6" id="gallery">
                                <a href="{{ asset('storage/' . $about->image) }}" data-caption="Image #1">
                                    <img height="300px" src="{{ asset('storage/' . $about->image) }}" />
                                </a>
                            </div>
                            <div class="col-lg-8">
                                <h3 class="py-3"> <strong>Baker's Gallery</strong> <span>Pizza and Pasta Bar</span>
                                </h3>
                                <h4>{{ $about->title }}</h4>
                                <p> {!! $about->description !!}</p>
                            </div>
                        @else
                            <p>No data available.</p>
                        @endif
                    </div>

                </div>
                <div class="text-center title-top " id="photo-gallery">
                    <h1 class=" my-4 my-lg-5"> PHOTO <span>GALLERY</span>
                    </h1>
                </div>
                <div id="gallery" class="mt-4">
                    <div class="row g-4">
                        @foreach ($gallery as $gallery)
                            <div class="col-lg-4 col-md-6">
                                <a href="{{ asset('storage/' . $gallery->image_path) }}"
                                    data-caption="{{ $about->title }}">
                                    <img height="300px" src="{{ asset('storage/' . $gallery->image_path) }}" />
                                </a>
                            </div>
                        @endforeach


                    </div>
                </div>
                <div class="text-center title-top ">
                    <h1 class=" my-4 my-lg-5" id="menu"> OUR SPECIAL <span>MENU</span>
                    </h1>
                </div>
                <div class="menu mt-4">
                    @foreach ($categories as $category)
                        <h1 class="mb-4">{{ strtoupper($category->name) }}</h1>


                        <div class="row g-5">
                            <div class="col-lg-6">
                                @foreach ($category->products as $product)
                                    <div class="menu__details my-2">
                                        <div
                                            class="menu__title d-flex justify-content-between align-items-center dotted-line">
                                            <h3 class="text-uppercase">{{ $product->name }}</h3>
                                            <div class="price">RS. {{ $product->price }}</div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-lg-6 px-lg-5">
                                <!-- You can add an image for the category here if needed -->
                                <img src="{{ asset('storage/' . $category->image) }}" style="width: 100%;" />
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="menu contact-form-part  p-4 mt-4 rounded" id="ContactUS">
                    <div class=" title-top ">
                        <h1 class="" id="menu"> CONTACT <span>US</span>
                        </h1>

                    </div>
                    <div class="row">
                        <form action="{{ route('messages.store') }}" method="POST" class="row g-3">
                            @csrf <!-- Include CSRF token for security -->
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label text-white">Email</label>
                                <input type="email" name="email" class="form-control" id="inputEmail4" required>
                            </div>
                            <div class="col-md-6">
                                <label for="phoneNumber" class="form-label text-white">Phone</label>
                                <input type="number" name="phone" class="form-control" id="phoneNumber" required>
                            </div>
                            <div class="col-12">
                                <label for="messager" class="form-label text-white">Message</label>
                                <textarea name="message" class="form-control" id="messager" rows="3" required></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-submit">Send Message</button>
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
    <!-- Bootstrap Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Success</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <i class="fas fa-paper-plane fa-3x text-success mb-3"></i> <!-- Send Icon -->
                    @if (session('success'))
                        <p>{{ session('success') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    <style>
        /* Animation for the modal */
        .modal.fade .modal-dialog {
            transform: translate(0, -25%);
            opacity: 0;
            transition: opacity 0.3s ease, transform 0.3s ease;
        }
    
        .modal.show .modal-dialog {
            transform: translate(0, 0);
            opacity: 1;
        }
    
        /* Animation for the icon */
        .fa-paper-plane {
            animation: bounce 0.5s infinite;
        }
    
        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }
    </style>
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if (session('success'))
                var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();
    
                setTimeout(function () {
                    successModal.hide();
                }, 3000);
            @endif
        });
    </script>



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
