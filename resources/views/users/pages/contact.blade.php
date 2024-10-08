@extends('users.user-dashboard')

@section('content')

<div class="section mb-5 pt-lg-5 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="section-title">Contact Us</h1>

                <div class="row">
                    <div class="col-lg-6">
                        <img src="{{asset('users/img/Dewashree.png')}} " alt="logo" height="80px" style="object-fit: contain;">

                        <p class="pt-4">
                            Dewashree Medical Clinic is a trusted medical pharmacy located in the heart of
                            Sankhamul, Kathmandu, dedicated to offering a comprehensive range of pharmaceutical
                            services and healthcare products.
                        </p>
                        <br>
                        <h5>Contact  Number</h5>
                        <span class="d-block bg-primary p-4 bordered w-50">
                            <a class="text-white" href="tel:9767920300">+977-9767920300</a></span>
                            <br>
                            <h5>Email Address</h5>
                        <span class="d-block  w-50">
                            <a href="mailto:dewashreeclinic@gmail.com">dewashreeclinic@gmail.com</a></span>
                    </div>
                    <div class="col-lg-6">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d45165.60983148635!2d85.3417225179527!3d27.72656023668883!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x39eb1b9ae43a18ff%3A0xc31f2ae1a4e191b6!2sGokarneshwor%20Municipality%20Ward%20No.%208%2C%20Kathmandu!3m2!1d27.7276971!2d85.37972289999999!4m5!1s0x39eb1b9ae43a18ff%3A0xc31f2ae1a4e191b6!2sKathmandu%2C%20Gokarneshwor%20-8%20map!3m2!1d27.7276971!2d85.37972289999999!5e1!3m2!1sen!2snp!4v1726383773386!5m2!1sen!2snp"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>


            </div>
        </div>
    </div>


</div>

@endsection