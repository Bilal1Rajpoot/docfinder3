<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Doccure</title>

    <!-- Favicons -->
    <link type="image/x-icon" href="assets/img/favicon.png" rel="icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
    @livewireStyles
</head>
<body>

<!-- Main Wrapper -->
<div class="main-wrapper">

    @include('common.homeheader');

    <!-- Home Banner -->
    <section class="section section-search">
        <div class="container-fluid">
            <div class="banner-wrapper">
                <div class="banner-header text-center">
                    <h1>Search Doctor, Make an Appointment</h1>
                    <p>Discover the best doctors, clinic & hospital the city nearest to you.</p>
                </div>

                <!-- Search -->
                <div class="search-box d-flex justify-content-center">
                    @livewire('search-doctor')
                </div>
                <!-- /Search -->

            </div>
        </div>
    </section>
    <!-- /Home Banner -->

    <section class="section home-tile-section">
        <div class="container-fluid">

        </div>
    </section>

    <!-- Category Section -->
    <section class="section section-category">
        <div class="container">
            <div class="section-header text-center">
                <h2>Browse by Specialities</h2>
                <p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <a href="{{ url('doctor/category/urology') }}">
                        <div class="category-box">
                            <div class="category-image">
                                <img src="assets/img/category/1.png" alt="">
                            </div>
                            <div class="category-content">
                                <h4>Urology</h4>
                                <span>{{ $urology }} Doctors</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3">
                    <a href="{{ url('doctor/category/Neurology') }}">
                        <div class="category-box">
                            <div class="category-image">
                                <img src="assets/img/category/2.png" alt="">
                            </div>
                            <div class="category-content">
                                <h4>Neurology</h4>
                                <span>{{ $Neurology }} Doctors</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3">
                    <a href="{{ url('doctor/category/Orthopedic') }}">
                        <div class="category-box">
                            <div class="category-image">
                                <img src="assets/img/category/3.png" alt="">
                            </div>
                            <div class="category-content">
                                <h4>Orthopedic</h4>
                                <span>{{ $Orthopedic }} Doctors</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3">
                    <a href="{{ url('doctor/category/Cardiologist') }}">
                        <div class="category-box">
                            <div class="category-image">
                                <img src="assets/img/category/4.png" alt="">
                            </div>
                            <div class="category-content">
                                <h4>Cardiologist</h4>
                                <span>{{ $Cardiologist }} Doctors</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3">
                    <a href="{{ url('doctor/category/Dentist') }}">
                        <div class="category-box">
                            <div class="category-image">
                                <img src="assets/img/category/5.png" alt="">
                            </div>
                            <div class="category-content">
                                <h4>Dentist</h4>
                                <span>{{ $Dentist }} Doctors</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3">
                    <a href="{{ url('doctor/category/Ophthalmologists') }}">
                        <div class="category-box">
                            <div class="category-image">
                                <img src="assets/img/category/1.png" alt="">
                            </div>
                            <div class="category-content">
                                <h4>Ophthalmologists</h4>
                                <span>{{ $Ophthalmologists }} Doctors</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3">
                    <a href="{{ url('doctor/category/Gynecologists') }}">
                        <div class="category-box">
                            <div class="category-image">
                                <img src="assets/img/category/4.png" alt="">
                            </div>
                            <div class="category-content">
                                <h4>Gynecologists</h4>
                                <span>{{ $Gynecologists }} Doctors</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3">
                    <a href="{{ url('doctor/category/Oncologists') }}">
                        <div class="category-box">
                            <div class="category-image">
                                <img src="assets/img/category/3.png" alt="">
                            </div>
                            <div class="category-content">
                                <h4>Oncologists</h4>
                                <span>{{ $Oncologists }} Doctors</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Category Section -->

    <!-- Popular Section -->
    <section class="section section-doctor">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-header ">
                        <h2>Book Our Doctor</h2>
                        <p>Lorem Ipsum is simply dummy text </p>
                    </div>
                    <div class="about-content">
                        <p class="text-justify">Docfinder is Pakistan’s digital healthcare platform that aims to revolutionize the local
                            healthcare market. It connects patients with the right doctors and enables the doctors to
                            optimize their medical practices. Patients can use docfinder (web app) for the online doctor
                            appointment, e-consultation and manage their medical record in single plase. On the other
                            hand, the doctors can manage their appointments, automate their scheduling, manage medical
                            records, etc.
                        </p></div>
                </div>
                <div class="col-lg-8">
                    <div class="doctor-slider slider">

                    @forelse ($doctors as $user)

                        <!-- Doctor Widget -->
                            <div class="profile-widget">
                                <div class="doc-img">
                                    <a href="{{ url('doctor/'.$user->id) }}" target="_blank">
                                        <img class="img-fluid" alt="User Image"
                                             src="{{ $user->image_path ? asset('images/'.$user->image_path) : asset('images/default-doctor.jpg') }}">
                                    </a>

                                </div>
                                <div class="pro-content">
                                    <h3 class="title">
                                        <a href="{{ url('doctor/'.$user->id) }}"
                                           target="_blank">Dr. {{ $user->first_name." ".$user->last_name }}</a>
                                        @if($user->is_verified == '1')
                                            <i class="fas fa-check-circle verified"></i>
                                        @else
                                            <i class="fas fa-check-circle"> <span
                                                    class="text-sm small">Not Verified</span></i>
                                        @endif

                                    </h3>
                                    <p class="speciality">@foreach($user->specialization()->get() as $specialization ) @if($loop->index > 0)
                                            - @endif {{ $specialization->specialization  }} @endforeach</p>
                                    <div class="rating">
                                        @if($user->avg_rating==1)
                                            <div class="review-count rating">
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star "></i>
                                                <i class="fas fa-star "></i>
                                                <i class="fas fa-star "></i>
                                                <i class="fas fa-star "></i>
                                            </div>
                                        @elseif ($user->avg_rating==2)
                                            <div class="review-count rating">
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star "></i>
                                                <i class="fas fa-star "></i>
                                                <i class="fas fa-star "></i>
                                            </div>
                                        @elseif ($user->avg_rating==3)
                                            <div class="review-count rating">
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star "></i>
                                                <i class="fas fa-star "></i>
                                            </div>
                                        @elseif ($user->avg_rating==4)
                                            <div class="review-count rating">
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star "></i>
                                            </div>
                                        @elseif ($user->avg_rating==5)
                                            <div class="review-count rating">
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star "></i>
                                            </div>
                                        @else
                                            <div class="review-count rating">
                                                <i class="fas fa-star "></i>
                                                <i class="fas fa-star "></i>
                                                <i class="fas fa-star "></i>
                                                <i class="fas fa-star "></i>
                                                <i class="fas fa-star "></i>
                                            </div>
                                        @endif
                                    </div>
                                    <ul class="available-info">
                                        <li>
                                            <i class="fas fa-map-marker-alt"></i> {{ $user->address()->get()->first()->city }}
                                            , {{ $user->address()->get()->first()->country }}
                                        </li>

                                        <li>
                                            <i class="far fa-money-bill-alt"></i> {{ $user->doctor_fee }}
                                            <i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
                                        </li>
                                    </ul>
                                    <div class="row row-sm">
                                        <div class="col-6">
                                            <a href="{{ url('doctor/'.$user->id) }}" target="_blank"
                                               class="btn view-btn">View Profile</a>
                                        </div>
                                        <div class="col-6">
                                            <a href="{{ url('doctor/'.$user->id) }}" target="_blank"
                                               class="btn book-btn">Book Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Doctor Widget -->
                        @empty
                            <p>No Douctor Found</p>
                        @endforelse


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Popular Section -->

    @include('common.footer')

</div>
<!-- /Main Wrapper -->

<!-- jQuery -->
<script src="assets/js/jquery.min.js"></script>

<!-- Bootstrap Core JS -->
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- Slick JS -->
<script src="assets/js/slick.js"></script>

<!-- Custom JS -->
<script src="assets/js/script.js"></script>
@livewireScripts
</body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Dec 2020 06:16:39 GMT -->
</html>
