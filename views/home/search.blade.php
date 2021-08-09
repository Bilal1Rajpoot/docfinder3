<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from doccure-html.dreamguystech.com/template/search.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Dec 2020 06:20:28 GMT -->

<head>
    <meta charset="utf-8">
    <title>Doccure</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="assets/plugins/fancybox/jquery.fancybox.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- Main Wrapper -->
<div class="main-wrapper">

    @include('common.homeheader');

    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-8 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Search</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">{{ count($doctors) }} matches found</h2>
                </div>
                <div class="col-md-4 col-12 d-md-block d-none">
                    <div class="sort-by">
                        <span class="sort-title">Sort by</span>
                        <span class="sortby-fliter">
                                <select class="select">
                                    <option>Select</option>
                                    <option class="sorting">Rating</option>
                                    <option class="sorting">Popular</option>
                                    <option class="sorting">Latest</option>
                                    <option class="sorting">Free</option>
                                </select>
                            </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Page Content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">

                    <!-- Search Filter -->
                    <div class="card search-filter">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Search Filter</h4>
                        </div>
                        <div class="card-body">
                            <div class="filter-widget">
                                <div class="cal-icon">
                                    <input type="text" class="form-control datetimepicker"
                                           placeholder="Select Date">
                                </div>
                            </div>
                            <div class="filter-widget">
                                <h4>Gender</h4>
                                <div>
                                    <label class="custom_check">
                                        <input type="checkbox" name="gender_type" checked>
                                        <span class="checkmark"></span> Male Doctor
                                    </label>
                                </div>
                                <div>
                                    <label class="custom_check">
                                        <input type="checkbox" name="gender_type">
                                        <span class="checkmark"></span> Female Doctor
                                    </label>
                                </div>
                            </div>
                            <div class="filter-widget">
                                <h4>Select Specialist</h4>
                                <div>
                                    <label class="custom_check">
                                        <input type="checkbox" name="select_specialist" checked>
                                        <span class="checkmark"></span> Urology
                                    </label>
                                </div>
                                <div>
                                    <label class="custom_check">
                                        <input type="checkbox" name="select_specialist" checked>
                                        <span class="checkmark"></span> Neurology
                                    </label>
                                </div>
                                <div>
                                    <label class="custom_check">
                                        <input type="checkbox" name="select_specialist">
                                        <span class="checkmark"></span> Dentist
                                    </label>
                                </div>
                                <div>
                                    <label class="custom_check">
                                        <input type="checkbox" name="select_specialist">
                                        <span class="checkmark"></span> Orthopedic
                                    </label>
                                </div>
                                <div>
                                    <label class="custom_check">
                                        <input type="checkbox" name="select_specialist">
                                        <span class="checkmark"></span> Cardiologist
                                    </label>
                                </div>
                                <div>
                                    <label class="custom_check">
                                        <input type="checkbox" name="select_specialist">
                                        <span class="checkmark"></span> Cardiologist
                                    </label>
                                </div>
                            </div>
                            <div class="btn-search">
                                <button type="button" class="btn btn-block">Search</button>
                            </div>
                        </div>
                    </div>
                    <!-- /Search Filter -->

                </div>

                <div class="col-md-12 col-lg-8 col-xl-9">
                @if(count($doctors) != 0)

                    @foreach ($doctors as $doctor)

                        <!-- Doctor Widget -->
                            <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                            <div class="card">
                                <div class="card-body">
                                    <div class="doctor-widget">
                                        <div class="doc-info-left">
                                            <div class="doctor-img">
                                                <a href="{{ url('doctor/'.$doctor->id) }}">
                                                    <img src="{{ $doctor->image_path ? asset('images/'.$doctor->image_path) : asset('images/default-doctor.jpg') }}" class="rounded" height="160" width="150"
                                                         alt="User Image">
                                                </a>
                                            </div>
                                            <div class="doc-info-cont">
                                                <h4 class="doc-name"><a href="{{ url('doctor/'.$doctor->id) }}">Dr.
                                                        {{ $doctor->first_name ? $doctor->first_name." ".$doctor->last_name : $doctor->user_name }}
                                                    </a></h4>
                                                <p class="doc-speciality">
                                                    {{ $doctor->specialization()->get()->first() ? $doctor->specialization()->get()->first()->specialization : 'specialization'}}
                                                </p>
                                                <h5 class="doc-department"><img
                                                        src="assets/img/specialities/specialities-05.png"
                                                        class="img-fluid"
                                                        alt="Speciality"></h5>
                                                <div class="rating">


                                                    @if($doctor->avg_rating==1)
                                                        <div class="review-count rating">
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star "></i>
                                                            <i class="fas fa-star "></i>
                                                            <i class="fas fa-star "></i>
                                                            <i class="fas fa-star "></i>
                                                        </div>
                                                    @elseif ($doctor->avg_rating==2)
                                                        <div class="review-count rating">
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star "></i>
                                                            <i class="fas fa-star "></i>
                                                            <i class="fas fa-star "></i>
                                                        </div>
                                                    @elseif ($doctor->avg_rating==3)
                                                        <div class="review-count rating">
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star "></i>
                                                            <i class="fas fa-star "></i>
                                                        </div>
                                                    @elseif ($doctor->avg_rating==4)
                                                        <div class="review-count rating">
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star "></i>
                                                        </div>
                                                    @elseif ($doctor->avg_rating==5)
                                                        <div class="review-count rating">
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star filled"></i>
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
                                                <div class="clinic-details">
                                                    <p class="doc-location"><i class="fas fa-map-marker-alt"></i>
                                                        {{ $doctor->address()->get()->first()->city }},
                                                        {{ $doctor->address()->get()->first()->country }}</p>

                                                </div>
                                                <div class="clinic-services">
                                                    @foreach ($doctor->services()->get() as $servic)
                                                        <span> {{ $servic->services }}</span>
                                                    @endforeach


                                                </div>
                                            </div>
                                        </div>
                                        <div class="doc-info-right">
                                            <div class="clini-infos">
                                                <ul>
                                                    <li><i class="far fa-thumbs-up"></i> 98%</li>
                                                    <li>
                                                        <i class="far fa-comment"></i> {{ count($doctor->reviews()->get()) }}
                                                        Feedback
                                                    </li>

                                                    <li><i class="far fa-money-bill-alt"></i> {{ $doctor->doctor_fee }}
                                                        <i
                                                            class="fas fa-info-circle" data-toggle="tooltip"
                                                            title="Lorem Ipsum"></i></li>
                                                </ul>
                                            </div>
                                            <div class="clinic-booking">
                                                <a class="view-pro-btn" href="doctor/{{ $doctor->id }}">View Profile</a>
                                                <a class="apt-btn" href="{{ url('doctor/'.$doctor->id) }}">Book Appointment</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Doctor Widget -->


                        @endforeach

                    @else
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>No record Found!</strong>
                            <button type="button" class="close"  data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>


                @endif




                </div>
            </div>

        </div>

    </div>
    <!-- /Page Content -->

    @include('common.footer')

</div>
<!-- /Main Wrapper -->

<!-- jQuery -->
<script src="assets/js/jquery.min.js"></script>

<!-- Bootstrap Core JS -->
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- Sticky Sidebar JS -->
<script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
<script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>

<!-- Select2 JS -->
<script src="assets/plugins/select2/js/select2.min.js"></script>

<!-- Datetimepicker JS -->
<script src="assets/js/moment.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

<!-- Fancybox JS -->
<script src="assets/plugins/fancybox/jquery.fancybox.min.js"></script>

<!-- Custom JS -->
<script src="assets/js/script.js"></script>

</body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/search.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Dec 2020 06:20:28 GMT -->

</html>
