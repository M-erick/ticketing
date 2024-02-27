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

    <style>
        /* CSS for Pagination Links */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            list-style: none;
            padding: 0;
            margin: 20px 0; /* Adjust margin as needed */
        }
    
        .pagination li {
            margin: 0 5px;
        }
    
        .pagination a,
        .pagination span {
            display: inline-block;
            padding: 8px 12px;
            text-decoration: none;
            color: #3498db;
            border: 1px solid #3498db;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
    
        .pagination a:hover {
            background-color: #3498db;
            color: #fff;
        }
    </style>

</head>

<body class="antialiased">
    <header id="header" class="d-flex align-items-center">
        <div class="container-fluid container-xxl d-flex align-items-center">
            <div id="logo" class="me-auto" style="display: flex; align-items: center;">
                <a href="{{ route('events.index') }}" class="scrollto">
                    <img src="{{ asset('assets/img/eveNT.png') }}" style="object-fit: cover; height: 50px;"
                        alt="" title="">
                </a>
                <h2 style="margin-left:3px; font-weight:bold; color:white;">EventPulse</h2>
            </div>




            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>

                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                    @if (Route::has('login'))
                        @auth
                            <li><a class="nav-link " href="{{ route('events.index') }}">Events</a></li>
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

            @if ($latestEvent)
                <h1 class="mb-4 pb-0">{{ $latestEvent->title }}</span> </h1>
                <p class="mb-4 pb-0">{{ $latestEvent->formattedDate() }}</p>
                <a href="#" class="glightbox play-btn mb-4"></a>
                <a href="#about" class="about-btn scrollto">About The Event</a>
            @else
                <h1 class="mb-4 pb-0">The Annual<br><span>AI</span> Conference</h1>
                <p class="mb-4 pb-0">10-12 December, KICC Conference Center, Nairboi</p>
                <a href="#" class="glightbox play-btn mb-4"></a>
                <a href="#about" class="about-btn scrollto">About The Event</a>
            @endif
        </div>
    </section><!-- End Hero Section -->

    <main id="main">



        <!-- ======= About Section ======= -->
        <section id="about">
            <div class="container position-relative" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-6">

                        <h2>About The Event</h2>
                        @if ($latestEvent)
                            <p>{{ $latestEvent->description }}.</p>
                    </div>
                    <div class="col-lg-3">
                        <h3>Where</h3>
                        <p>{{ $latestEvent->location }}</p>
                    </div>
                    <div class="col-lg-3">
                        <h3>When</h3>
                        <p>{{ $latestEvent->formattedStartDate() }} to {{ $latestEvent->formattedEndDate() }}</p>
                    </div>
                    @endif
                </div>
            </div>
        </section><!-- End About Section -->

        {{-- success message --}}
        @if (session('success'))
            <div class="alert alert-success" id="success-alert" style="margin: 10px">
                {{ session('success') }}

            </div>
            <script>
                // Add a timeout to hide the success message after 5 seconds (5000 milliseconds)
                setTimeout(function() {
                    document.getElementById('success-alert').style.display = 'none';
                }, 5000);
            </script>
        @endif

        <!-- ======= Events Section ======= -->
        <section id="events">
            <div class="container" style="margin-top: 10px" data-aos="fade-up">
                <div class="section-header">
                    <h2>Events</h2>
                    <!-- You can modify the heading as needed -->
                    <p>Explore our upcoming events</p>
                </div>
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                        @foreach ($events_paginate as $event)
                            <div
                                style="margin-bottom: 20px; display: flex; border-radius: 10px; overflow: hidden; background-color: white;">
                                <div
                                    style="flex-shrink: 0; width:55%; overflow: hidden; border-radius: 10px 0 0 10px; margin-right: 10px;">
                                    <img src="{{ asset('storage/' . $event->image_path) }}" alt="Event Image"
                                        style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                                <div style="width: 50%; padding: 20px; background-color: white; height: 100%;">
                                    <h3 style="font-size: 1.5rem; margin-bottom: 10px;">{{ $event->title }}</h3>
                                    <p style="font-size: 1rem; color: #666;">{{ substr($event->description, 0, 100) }} ...</p>
                                    <p style="font-size: 1.5rem; margin-bottom: 10px;">{{ $event->location }}</p>

                                    <p style="font-size: 0.9rem; color: #999;">Starts: {{ $event->start_datetime }}
                                    </p>
                                    <p style="font-size: 0.9rem; color: #999;">Ends: {{ $event->end_datetime }}</p>
                                    <a href="{{ route('events.show', $event->id) }}"
                                        style="font-size: 1rem; color: #3498db; text-decoration: none;">Read More</a>
                                </div>
                            </div>
                            <div style="height: 10px; background-color: #f0f0f0; margin-bottom: 20px; "></div>
                            <!-- Gray background gap -->
                        @endforeach
                        <div class="pagination">
                            {{ $events_paginate->links() }}
                        </div>

                    </div>
                </div>
        </section>
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
                    @foreach ($events_display as $event)
                        <div class="swiper-slide">
                            <a href="{{ asset('storage/' . $event->image_path) }}" class="gallery-lightbox">
                                <img src="{{ asset('storage/' . $event->image_path) }}" class="img-fluid"
                                    alt="">
                            </a>
                        </div>
                    @endforeach
                    
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
                    <p>Subscribe to get updates on upcoming events.</p>
                </div>

                <form method="POST" action="{{ route('subscribe') }}">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-10 d-flex">
                            <input type="text" class="form-control" name="email" placeholder="Enter your Email"
                                required>
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
                    <p>Ticket Pricing .</p>
                </div>
                <div class="row">
                    <!-- Standard Access Ticket -->
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card mb-5 mb-lg-0">
                            <div class="card-body">
                                <h5 class="card-title  text-uppercase text-center" style="font-weight:">Regular</h5>
                                <h6 class="card-price text-center">${{ $latestEvent->regular_ticket_price }}</h6>
                                <hr>
                                <ul class="fa-ul">
                                    <li><span class="fa-li"><i class="fa fa-check"></i></span>Regular Seating</li>
                                    <li><span class="fa-li"><i class="fa fa-check"></i></span>Basic Amenities</li>
                                    <li><span class="fa-li"><i class="fa fa-check"></i></span>Standard Access</li>
                                    <li class="text-muted"><span class="fa-li"><i
                                                class="fa fa-times"></i></span>Community Access</li>
                                    <li class="text-muted"><span class="fa-li"><i
                                                class="fa fa-times"></i></span>Custom Badge</li>
                                    <li class="text-muted"><span class="fa-li"><i
                                                class="fa fa-times"></i></span>After Party</li>
                                    <li class="text-muted"><span class="fa-li"><i
                                                class="fa fa-times"></i></span>Additional access</li>
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



                    <!-- Premium Access Ticket -->
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title  text-uppercase text-center " style="font-weight: bold">VIP</h5>
                                <h6 class="card-price text-center">${{ $latestEvent->vip_ticket_price }}</h6>
                                <hr>
                                <ul class="fa-ul">
                                    <li><span class="fa-li"><i class="fa fa-check"></i></span>VIP Seating</li>
                                    <li><span class="fa-li"><i class="fa fa-check"></i></span>Enhanced Amenities</li>
                                    <li><span class="fa-li"><i class="fa fa-check"></i></span>Custom Badge</li>
                                    <li><span class="fa-li"><i class="fa fa-check"></i></span>Community Access</li>
                                    <li><span class="fa-li"><i class="fa fa-check"></i></span>Additional Access</li>
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
                            <form method="POST" action="{{ route('reservations.store') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" name="user_name"
                                        placeholder="Your Name" required>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="text" class="form-control" name="user_email"
                                        placeholder="Your Email" required>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="event">Select Event:</label>
                                    <select id="event" name="event" class="form-select" required>
                                        <option value="">-- Select Event --</option>
                                        @foreach ($events_display as $events)
                                            <option value="{{ $events->title }}">{{ $events->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="ticket-type">Select Ticket Type:</label>
                                    <select id="ticket-type" name="ticket-type" class="form-select" required>
                                        <option value="">-- Select Your Ticket Type --</option>
                                        <option value="regular-access">Regular</option>
                                        <option value="vip-access">VIP</option>
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
                    <p>Contact details.</p>
                </div>

                <div class="row contact-info">

                    <div class="col-md-4">
                        <div class="contact-address">
                            <i class="bi bi-geo-alt"></i>
                            <h3>Address</h3>
                            <address>kimathi Street, NAIROI 60100, KENYA</address>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="contact-phone">
                            <i class="bi bi-phone"></i>
                            <h3>Phone Number</h3>
                            <p><a href="tel:+254713649428">+254713649428</a></p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="contact-email">
                            <i class="bi bi-envelope"></i>
                            <h3>Email</h3>
                            <p><a href="mailto:info@example.com">muriithierick3758@gmail.com</a></p>
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
