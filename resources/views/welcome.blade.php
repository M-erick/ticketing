<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>EventPulse</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />


    <!-- Favicons -->
    <link href="{{ asset('assets/img/eveNT.png') }}" rel="icon">
    <link href="{{ asset('assets/img/eveNT.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">


    <!-- Styles -->

</head>

<body class="antialiased">
    <header id="header" class="d-flex align-items-center">
        <div class="container-fluid container-xxl d-flex align-items-center">
            <div id="logo" class="me-auto" style="display: flex; align-items: center;">
                <a href="index.html" class="scrollto">
                    <img src="{{ asset('assets/img/eveNT.png') }}" style="object-fit: cover; height: 50px;"
                        alt="" title="">
                </a>
                <h2 style="margin-left:3px; font-weight:bold; color:white;">EventPulse</h2>
            </div>




            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">About</a></li>
                    <li><a class="nav-link scrollto" href="#speakers">Events</a></li>
                    <li><a class="nav-link scrollto" href="#venue">Venue</a></li>
                    <li><a class="nav-link scrollto" href="#gallery">Gallery</a></li>

                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                    @if (Route::has('login'))
                        @auth
                            <li><a class="nav-link " href="{{ url('/dashboard') }}">Dashboard</a></li>
                            <li><a class="nav-link " href="{{ url('events.index') }}">Events</a></li>
                        @else
                            <li><a class="nav-link " href="{{ url('login') }}">Login</a></li>
                            @if (Route::has('register'))
                                <li><a class="nav-link " href="{{ url('register') }}">Register</a></li>
                            @endif
                        @endauth
                    @endif

                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <a class="buy-tickets scrollto" href="#buy-tickets">Buy Tickets</a>


        </div>
    </header>
    <section id="hero">
        <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
            <h1 class="mb-4 pb-0">The Annual<br><span>Marketing</span> Conference</h1>
            <p class="mb-4 pb-0">10-12 December, Downtown Conference Center, New York</p>
            <a href="#" class="glightbox play-btn mb-4"></a>
            <a href="#about" class="about-btn scrollto">About The Event</a>
        </div>
    </section><!-- End Hero Section -->
    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about">
            <div class="container position-relative" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-6">
                        <h2>About The Event</h2>
                        <p>Sed nam ut dolor qui repellendus iusto odit. Possimus inventore eveniet accusamus error amet
                            eius aut
                            accusantium et. Non odit consequatur repudiandae sequi ea odio molestiae. Enim possimus sunt
                            inventore in
                            est ut optio sequi unde.</p>
                    </div>
                    <div class="col-lg-3">
                        <h3>Where</h3>
                        <p>Downtown Conference Center, New York</p>
                    </div>
                    <div class="col-lg-3">
                        <h3>When</h3>
                        <p>Monday to Wednesday<br>10-12 December</p>
                    </div>
                </div>
            </div>
        </section><!-- End About Section -->

        <!-- ======= Speakers Section ======= -->
        <section id="events">
            <div class="container" style="margin-top: 10px" data-aos="fade-up">
                <div class="section-header">
                    <h2>Events</h2>
                    <!-- You can modify the heading as needed -->
                    <p>Explore our upcoming events</p>
                </div>
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div  class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
 
                    @foreach ($events_display as $event)
                    <div style="margin-bottom: 20px; display: flex; border-radius: 10px; overflow: hidden; background-color: white;">
                        <div style="flex-shrink: 0; width:55%; overflow: hidden; border-radius: 10px 0 0 10px; margin-right: 10px;">
                            <img src="{{ asset('storage/' . $event->image_path) }}" alt="Event Image" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div style="width: 50%; padding: 20px; background-color: white; height: 100%;">
                            <h3 style="font-size: 1.5rem; margin-bottom: 10px;">{{ $event->title }}</h3>
                            <p style="font-size: 1rem; color: #666;">{{ $event->description }}</p>
                            <p style="font-size: 1.5rem; margin-bottom: 10px;" >{{ $event->location }}</p>

                            <p style="font-size: 0.9rem; color: #999;">Starts: {{ $event->start_datetime }}</p>
                            <p style="font-size: 0.9rem; color: #999;">Ends: {{ $event->end_datetime }}</p>
                            <a href="{{ route('events.show', $event->id) }}" style="font-size: 1rem; color: #3498db; text-decoration: none;">Read More</a>
                        </div>
                    </div>
                    <div style="height: 10px; background-color: #f0f0f0; margin-bottom: 20px; "></div> <!-- Gray background gap -->

                    @endforeach
                </div>
            </div>
        </section>



        <!-- ======= Venue Section ======= -->
        <section id="venue">

            <div class="container-fluid" data-aos="fade-up">

                <div class="section-header">
                    <h2>Event Venue</h2>
                    <p>Event venue location info and gallery</p>
                </div>

                <div class="row g-0">
                    <div class="col-lg-6 venue-map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
                            frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>

                    <div class="col-lg-6 venue-info">
                        <div class="row justify-content-center">
                            <div class="col-11 col-lg-8 position-relative">
                                <h3>Downtown Conference Center, New York</h3>
                                <p>Iste nobis eum sapiente sunt enim dolores labore accusantium autem. Cumque beatae
                                    ipsam. Est quae sit qui voluptatem corporis velit. Qui maxime accusamus possimus.
                                    Consequatur sequi et ea suscipit enim nesciunt quia velit.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>




        </section><!-- End Venue Section -->



        <!-- ======= Gallery Section ======= -->
        <section id="gallery">

            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h2>Gallery</h2>
                    <p>Check our gallery from the recent events</p>
                </div>
            </div>

            <div class="gallery-slider swiper">
                <div class="swiper-wrapper align-items-center">
                    <div class="swiper-slide"><a href="assets/img/gallery/1.jpg" class="gallery-lightbox"><img
                                src="{{ asset('assets/img/gallery/1.jpg') }}" class="img-fluid" alt=""></a>
                    </div>
                    <div class="swiper-slide"><a href="assets/img/gallery/2.jpg" class="gallery-lightbox"><img
                                src="{{ asset('assets/img/gallery/2.jpg') }}" class="img-fluid" alt=""></a>
                    </div>
                    <div class="swiper-slide"><a href="assets/img/gallery/3.jpg" class="gallery-lightbox"><img
                                src="{{ asset('assets/img/gallery/3.jpg') }}" class="img-fluid" alt=""></a>
                    </div>
                    <div class="swiper-slide"><a href="assets/img/gallery/4.jpg" class="gallery-lightbox"><img
                                src="{{ asset('assets/img/gallery/4.jpg') }}" class="img-fluid" alt=""></a>
                    </div>
                    <div class="swiper-slide"><a href="assets/img/gallery/5.jpg" class="gallery-lightbox"><img
                                src="{{ asset('assets/img/gallery/5.jpg') }}" class="img-fluid" alt=""></a>
                    </div>
                    <div class="swiper-slide"><a href="assets/img/gallery/6.jpg" class="gallery-lightbox"><img
                                src="{{ asset('assets/img/gallery/6.jpg') }}" class="img-fluid" alt=""></a>
                    </div>
                    <div class="swiper-slide"><a href="assets/img/gallery/7.jpg" class="gallery-lightbox"><img
                                src="{{ asset('assets/img/gallery/7.jpg') }}" class="img-fluid" alt=""></a>
                    </div>
                    <div class="swiper-slide"><a href="assets/img/gallery/8.jpg" class="gallery-lightbox"><img
                                src="{{ asset('assets/img/gallery/8.jpg') }}" class="img-fluid" alt=""></a>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </section><!-- End Gallery Section -->

        <!-- ======= Supporters Section ======= -->


        <!-- =======  F.A.Q Section ======= -->


        <!-- ======= Subscribe Section ======= -->
        <section id="subscribe">
            <div class="container" data-aos="zoom-in">
                <div class="section-header">
                    <h2>Newsletter</h2>
                    <p>Rerum numquam illum recusandae quia mollitia consequatur.</p>
                </div>

                <form method="POST" action="#">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-10 d-flex">
                            <input type="text" class="form-control" placeholder="Enter your Email">
                            <button type="submit" class="ms-2">Subscribe</button>
                        </div>
                    </div>
                </form>

            </div>
        </section><!-- End Subscribe Section -->

        <!-- ======= Buy Ticket Section ======= -->
        <section id="buy-tickets" class="section-with-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Buy Tickets</h2>
                    <p>Velit consequatur consequatur inventore iste fugit unde omnis eum aut.</p>
                </div>

                <div class="row">
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card mb-5 mb-lg-0">
                            <div class="card-body">
                                <h5 class="card-title text-muted text-uppercase text-center">Standard Access</h5>
                                <h6 class="card-price text-center">$150</h6>
                                <hr>
                                <ul class="fa-ul">
                                    <li><span class="fa-li"><i class="fa fa-check"></i></span>Regular Seating</li>
                                    <li><span class="fa-li"><i class="fa fa-check"></i></span>Coffee Break</li>
                                    <li><span class="fa-li"><i class="fa fa-check"></i></span>Custom Badge</li>
                                    <li class="text-muted"><span class="fa-li"><i
                                                class="fa fa-times"></i></span>Community Access</li>
                                    <li class="text-muted"><span class="fa-li"><i
                                                class="fa fa-times"></i></span>Workshop Access</li>
                                    <li class="text-muted"><span class="fa-li"><i
                                                class="fa fa-times"></i></span>After Party</li>
                                </ul>
                                <hr>
                                <div class="text-center">
                                    <button type="button" class="btn" data-bs-toggle="modal"
                                        data-bs-target="#buy-ticket-modal" data-ticket-type="standard-access">Buy
                                        Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="card mb-5 mb-lg-0">
                            <div class="card-body">
                                <h5 class="card-title text-muted text-uppercase text-center">Pro Access</h5>
                                <h6 class="card-price text-center">$250</h6>
                                <hr>
                                <ul class="fa-ul">
                                    <li><span class="fa-li"><i class="fa fa-check"></i></span>Regular Seating</li>
                                    <li><span class="fa-li"><i class="fa fa-check"></i></span>Coffee Break</li>
                                    <li><span class="fa-li"><i class="fa fa-check"></i></span>Custom Badge</li>
                                    <li><span class="fa-li"><i class="fa fa-check"></i></span>Community Access</li>
                                    <li class="text-muted"><span class="fa-li"><i
                                                class="fa fa-times"></i></span>Workshop Access</li>
                                    <li class="text-muted"><span class="fa-li"><i
                                                class="fa fa-times"></i></span>After Party</li>
                                </ul>
                                <hr>
                                <div class="text-center">
                                    <button type="button" class="btn" data-bs-toggle="modal"
                                        data-bs-target="#buy-ticket-modal" data-ticket-type="pro-access">Buy
                                        Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Pro Tier -->
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-muted text-uppercase text-center">Premium Access</h5>
                                <h6 class="card-price text-center">$350</h6>
                                <hr>
                                <ul class="fa-ul">
                                    <li><span class="fa-li"><i class="fa fa-check"></i></span>Regular Seating</li>
                                    <li><span class="fa-li"><i class="fa fa-check"></i></span>Coffee Break</li>
                                    <li><span class="fa-li"><i class="fa fa-check"></i></span>Custom Badge</li>
                                    <li><span class="fa-li"><i class="fa fa-check"></i></span>Community Access</li>
                                    <li><span class="fa-li"><i class="fa fa-check"></i></span>Workshop Access</li>
                                    <li><span class="fa-li"><i class="fa fa-check"></i></span>After Party</li>
                                </ul>
                                <hr>
                                <div class="text-center">
                                    <button type="button" class="btn" data-bs-toggle="modal"
                                        data-bs-target="#buy-ticket-modal" data-ticket-type="premium-access">Buy
                                        Now</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Modal Order Form -->
            <div id="buy-ticket-modal" class="modal fade">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Buy Tickets</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="#">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="your-name"
                                        placeholder="Your Name">
                                </div>
                                <div class="form-group mt-3">
                                    <input type="text" class="form-control" name="your-email"
                                        placeholder="Your Email">
                                </div>
                                <div class="form-group mt-3">
                                    <select id="ticket-type" name="ticket-type" class="form-select">
                                        <option value="">-- Select Your Ticket Type --</option>
                                        <option value="standard-access">Standard Access</option>
                                        <option value="pro-access">Pro Access</option>
                                        <option value="premium-access">Premium Access</option>
                                    </select>
                                </div>
                                <div class="text-center mt-3">
                                    <button type="submit" class="btn">Buy Now</button>
                                </div>
                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

        </section><!-- End Buy Ticket Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="section-bg">

            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Contact Us</h2>
                    <p>Nihil officia ut sint molestiae tenetur.</p>
                </div>

                <div class="row contact-info">

                    <div class="col-md-4">
                        <div class="contact-address">
                            <i class="bi bi-geo-alt"></i>
                            <h3>Address</h3>
                            <address>A108 Adam Street, NY 535022, USA</address>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="contact-phone">
                            <i class="bi bi-phone"></i>
                            <h3>Phone Number</h3>
                            <p><a href="tel:+155895548855">+1 5589 55488 55</a></p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="contact-email">
                            <i class="bi bi-envelope"></i>
                            <h3>Email</h3>
                            <p><a href="mailto:info@example.com">info@example.com</a></p>
                        </div>
                    </div>

                </div>




            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->




    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>


</body>

</html>
