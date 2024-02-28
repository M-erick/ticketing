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
            .btn-edit-event {
                display: inline; /* Change from inline-block to inline */
                padding: 8px 16px; /* Adjust the padding as needed */
                font-size: 1rem;
                color: #3498db;
                text-decoration: none;
                border: 1px solid #3498db;
                border-radius: 8px; /* Add border-radius for rounded corners */
                background-color: #fff;
                transition: background-color 0.3s ease, color 0.3s ease, border 0.3s ease;
            }
        
            .btn-edit-event:hover {
                background-color: #3498db;
                color: #fff;
            }
        </style>
        
        
    </head>

    {{-- success message --}}
    @if (session('success'))
        <div class="alert alert-success" id="success-alert">
            {{ session('success') }}

        </div>
        <script>
            // Add a timeout to hide the success message after 5 seconds (5000 milliseconds)
            setTimeout(function() {
                document.getElementById('success-alert').style.display = 'none';
            }, 5000);
        </script>
    @endif

    <div style="display: flex; flex-direction: column; overflow: hidden; background-color: white;">

        <!-- Image Card -->
        <div style="overflow: hidden; border-radius: 10px; padding: 10px;">
            <img src="{{ asset('storage/' . $event->image_path) }}" alt="Event Image"
                style="width: 100%; height: 75%; object-fit: cover; border-radius: 10px; padding:10px; ">
        </div>
        <div style="height: 10px; background-color: #f0f0f0; margin-bottom: 20px; "></div>
        <!-- Gray background gap -->

        <!-- Event Details Card -->
        <div style="padding: 20px; background-color: white;">
            <h2 style="font-size: 2rem; margin-bottom: 10px;">{{ $event->title }}</h2>
            <p style="font-size: 1.25rem; color: #333; margin-bottom: 20px; font-weight:bold">{{ $event->location }}
            </p>
            <p style="font-size: 1.25rem; color: #333; margin-bottom: 20px;">{{ $event->description }}</p>
            <p style="font-size: 1rem; color: #666;">Max Attendees: {{ $event->max_attendees }}</p>

            <div style=" margin-bottom: 10px;">
                <p style="font-size: 1rem; color: #666;">Starts: {{ $event->start_datetime }}</p>
                <p style="font-size: 1rem; color: #666;">Ends: {{ $event->end_datetime }}</p>
            </div>

        </div>

        @admin
       <!-- Your link styled as a button with rounded borders -->
<a href="{{ route('events.edit', $event->id) }}" class="btn-edit-event">
    Edit Event
</a>



    @endadmin

        <div style="height: 10px; background-color: #f0f0f0; margin-bottom: 20px; "></div>

        <!-- Buy Ticket Section -->
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
                                <h6 class="card-price text-center">${{ $event->regular_ticket_price }}</h6>
                                <hr>
                                <ul class="fa-ul">
                                    <li><span class="fa-li"><i class="fa fa-check"></i></span>Regular Seating</li>
                                    <li><span class="fa-li"><i class="fa fa-check"></i></span>Basic Amenities</li>
                                    <li><span class="fa-li"><i class="fa fa-check"></i></span>Standard Access</li>
                                    <li class="text-muted"><span class="fa-li"><i
                                                class="fa fa-times"></i></span>Community Access</li>
                                    <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Custom
                                        Badge</li>
                                    <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>After
                                        Party</li>
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
                                <h6 class="card-price text-center">${{ $event->vip_ticket_price }}</h6>
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
                                        placeholder=" Name"  value="{{ Auth::user()->name }}" readonly required>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="text" class="form-control" name="user_email"
                                        placeholder=" Email" value="{{ Auth::user()->email }}" readonly  required>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="event">Select Event:</label>
                                    <select id="event" name="event" class="form-select" required>
                                        <option value="">-- Select Event --</option>
                                        @foreach ($events as $event)
                                            <option value="{{ $event->title }}">{{ $event->title }}</option>
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

        <!-- Display "Edit Event" link for logged-in users -->
       
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
