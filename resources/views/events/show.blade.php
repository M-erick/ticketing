<x-app-layout>
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
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800"
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
    <div style="display: flex; flex-direction: column; overflow: hidden; background-color: white;">

        <!-- Image Card -->
        <div style="overflow: hidden; border-radius: 10px; padding: 10px;">
            <img src="{{ asset('storage/' . $event->image_path) }}" alt="Event Image"
                style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px ">
        </div>
        <div
            style="height: 10px; background-color: #f0f0f0; margin-bottom: 20px; "></div>
        <!-- Gray background gap -->

        <!-- Event Details Card -->
        <div style="padding: 20px; background-color: white;">
            <h2 style="font-size: 2rem; margin-bottom: 10px;">{{ $event->title }}</h2>
            <p style="font-size: 1.25rem; color: #333; margin-bottom: 20px;">{{ $event->location }}</p>
            <p style="font-size: 1.25rem; color: #333; margin-bottom: 20px;">{{ $event->description }}</p>
            <div style="display: flex; justify-content: space-between; margin-bottom: 20px;">
                <p style="font-size: 1rem; color: #666;">Starts: {{ $event->start_datetime }}</p>
                <p style="font-size: 1rem; color: #666;">Ends: {{ $event->end_datetime }}</p>
            </div>
            <div style="display: flex; justify-content: space-between; margin-bottom: 20px;">
                <p style="font-size: 1rem; color: #666;">VIP Ticket Price: {{ $event->vip_ticket_price }}</p>
                <p style="font-size: 1rem; color: #666;">Regular Ticket Price: {{ $event->regular_ticket_price }}</p>
            </div>
            <p style="font-size: 1rem; color: #666;">Max Attendees: {{ $event->max_attendees }}</p>

            <!-- Buy Ticket Section -->
            <section id="buy-tickets" class="section-with-bg">
                <div class="container" data-aos="fade-up">
                    <div class="section-header">
                        <h2>Buy Tickets</h2>
                        <p>Velit consequatur consequatur inventore iste fugit unde omnis eum aut.</p>
                    </div>
                    <div class="row">
                        <!-- Standard Access Ticket -->
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
                                            data-bs-target="#buy-ticket-modal"
                                            data-ticket-type="standard-access">Buy Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pro Access Ticket -->
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

                        <!-- Premium Access Ticket -->
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

            <!-- Display "Edit Event" link for logged-in users -->
            @auth
            <a href="{{ route('events.edit', $event->id) }}"
                style="font-size: 1rem; color: #3498db; text-decoration: none;">Edit Event</a>
            @endauth
        </div>
    </div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</x-app-layout>
