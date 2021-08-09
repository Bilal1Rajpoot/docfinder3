<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Doccure</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <!-- Favicons -->
    <link href="{{asset('assets/img/favicon.png') }}" rel="icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/all.min.css') }}">

    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="{{asset('assets/plugins/fancybox/jquery.fancybox.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css') }}">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->

    @livewireStyles
</head>
<body>
@csrf
<!-- Main Wrapper -->
<div class="main-wrapper">

    @include('common.homeheader');

    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Doctor Profile</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">Doctor Profile</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Page Content -->
    <div class="content">
        <div class="container">

            <!-- Doctor Widget -->
            <div class="card">
                <div class="card-body">
                    <div class="doctor-widget">
                        <div class="doc-info-left">
                            <div class="doctor-img">
                                <img
                                    src="{{ $doctor->image_path ? asset('images/'.$doctor->image_path) : asset('images/default-doctor.jpg') }}
                                        " class="rounded" height="160" width="150"
                                    alt="User Image">

                            </div>
                            <div class="doc-info-cont">
                                <h4 class="doc-name">
                                    Dr. {{ $doctor->first_name ? $doctor->first_name." ".$doctor->last_name : $doctor->user_name }}
                                </h4>
                                <i class="fas fa-check-circle"
                                   @if($doctor->is_verified) style="color: green" @endif>{{ $doctor->is_verified ? ' Verified' : ' Not Verified' }}</i>
                                <p class="doc-speciality">@foreach($doctor->specialization()->get() as $specialization ) @if($loop->index > 0)
                                        - @endif {{ $specialization->specialization  }} @endforeach</p>

                                <p class="doc-department"><img
                                        src="{{ asset('assets/img/specialities/specialities-05.png') }}"
                                        class="img-fluid" alt="Speciality">Dentist</p>
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
                                <div class="clinic-details">
                                    <p class="doc-location"><i
                                            class="fas fa-map-marker-alt"></i> {{ $doctor->address()->get()->first()->city }}
                                        ,
                                        {{ $doctor->address()->get()->first()->country }} </p>

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
                                    <li><i class="far fa-thumbs-up"></i> 99%</li>
                                    <li><i class="far fa-comment"></i> {{ count($doctor->reviews()->get()) }} Feedback
                                    </li>

                                    <li><i class="far fa-money-bill-alt"></i> {{ $doctor->doctor_fee }} </li>
                                </ul>
                            </div>
                            <div class="doctor-action">
                                <a onclick="bookmarkDoctor({{$doctor->id}})" class="btn btn-white fav-btn">
                                    <i class="far fa-bookmark"></i>
                                </a>
                                <a href="chat.html" class="btn btn-white msg-btn">
                                    <i class="far fa-comment-alt"></i>
                                </a>
                                <a href="javascript:void(0)" class="btn btn-white call-btn" data-toggle="modal"
                                   data-target="#voice_call">
                                    <i class="fas fa-phone"></i>
                                </a>
                                <a href="javascript:void(0)" class="btn btn-white call-btn" data-toggle="modal"
                                   data-target="#video_call">
                                    <i class="fas fa-video"></i>
                                </a>
                            </div>
                            <div class="clinic-booking">
                                <a class="apt-btn" href="">Book Appointment</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-sm-4 col-md-6 mb-1">
                    <h4 class="mb-1">Available Slots</h4>

                </div>

            </div>
            <!-- /Doctor Widget -->
            <div class="card booking-schedule schedule-widget">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card schedule-widget mb-0">

                            <!-- Schedule Header -->
                            <div class="schedule-header">

                                <!-- Schedule Nav -->
                                <div class="schedule-nav">
                                    <ul class="nav nav-tabs nav-justified">
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#slot_sunday">Sunday</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab"
                                               href="#slot_monday">Monday</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab"
                                               href="#slot_tuesday">Tuesday</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab"
                                               href="#slot_wednesday">Wednesday</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab"
                                               href="#slot_thursday">Thursday</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#slot_friday">Friday</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab"
                                               href="#slot_saturday">Saturday</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /Schedule Nav -->

                            </div>
                            <!-- /Schedule Header -->

                            <!-- Schedule Content -->
                            <div class="tab-content schedule-cont">

                                <!-- Sunday Slot -->
                                <div id="slot_sunday" class="tab-pane fade">
                                    <h4 class="card-title d-flex justify-content-between">
                                        <span>Time Slots</span>

                                    </h4>
                                    @if(count($sun)== '0')
                                        <p class="text-muted mb-0">Not Available</p>
                                    @else
                                    <!-- Slot List -->
                                        <div class="doc-times">
                                            @foreach ($sun as $sun)
                                                @if($sun->is_available == '1')
                                                    <div class="doc-slot-list"
                                                         onclick="myFunction({{ $doctor->id }}, {{ $sun->id }}, '{{$doctor->first_name}} {{$doctor->last_name }}', '{{ \Carbon\Carbon::parse($sun->slot_start_time)->format('g:i A') }}- {{ \Carbon\Carbon::parse($sun->slot_end_time)->format('g:i A') }}', 'Sunday', '{{ $doctor->doctor_fee }}')">


                                                        {{ \Carbon\Carbon::parse($sun->slot_start_time)->format('g:i A') }}
                                                        - {{ \Carbon\Carbon::parse($sun->slot_end_time)->format('g:i A') }}

                                                    </div>
                                                @endif
                                            @endforeach


                                        </div>
                                        <!-- /Slot List -->
                                    @endif


                                </div>


                                <!-- /Sunday Slot -->

                                <!-- Monday Slot -->
                                <div id="slot_monday" class="tab-pane fade show active">
                                    <h4 class="card-title d-flex justify-content-between">
                                        <span>Time Slots</span>

                                    </h4>

                                    @if(count($mon)== '0')
                                        <p class="text-muted mb-0">Not Available</p>
                                    @else
                                    <!-- Slot List -->
                                        <div class="doc-times">
                                            @foreach ($mon as $mon)
                                                @if($mon->is_available == '1')
                                                    <div class="doc-slot-list"
                                                         onclick="myFunction({{ $doctor->id }}, {{ $mon->id }}, '{{$doctor->first_name}} {{$doctor->last_name }}', '{{ \Carbon\Carbon::parse($mon->slot_start_time)->format('g:i A') }}- {{ \Carbon\Carbon::parse($mon->slot_end_time)->format('g:i A') }}', 'Monday', '{{ $doctor->doctor_fee }}')">
                                                        {{ \Carbon\Carbon::parse($mon->slot_start_time)->format('g:i A') }}
                                                        - {{ \Carbon\Carbon::parse($mon->slot_end_time)->format('g:i A') }}

                                                    </div>
                                                @endif
                                            @endforeach

                                        </div>
                                        <!-- /Slot List -->
                                    @endif
                                </div>
                                <!-- /Monday Slot -->

                                <!-- Tuesday Slot -->
                                <div id="slot_tuesday" class="tab-pane fade">
                                    <h4 class="card-title d-flex justify-content-between">
                                        <span>Time Slots</span>
                                    </h4>
                                    @if(count($tue)== '0')
                                        <p class="text-muted mb-0">Not Available</p>
                                    @else
                                    <!-- Slot List -->
                                        <div class="doc-times">
                                            @foreach ($tue as $tue)
                                                @if($tue->is_available == '1')
                                                    <div class="doc-slot-list"
                                                         onclick="myFunction({{ $doctor->id }}, {{ $tue->id }}, '{{$doctor->first_name}} {{$doctor->last_name }}', '{{ \Carbon\Carbon::parse($tue->slot_start_time)->format('g:i A') }}- {{ \Carbon\Carbon::parse($tue->slot_end_time)->format('g:i A') }}', 'Tuesday', '{{ $doctor->doctor_fee }}')">
                                                        {{ \Carbon\Carbon::parse($tue->slot_start_time)->format('g:i A') }}
                                                        - {{ \Carbon\Carbon::parse($tue->slot_end_time)->format('g:i A') }}

                                                    </div>
                                                @endif
                                            @endforeach

                                        </div>
                                        <!-- /Slot List -->
                                    @endif
                                </div>
                                <!-- /Tuesday Slot -->

                                <!-- Wednesday Slot -->
                                <div id="slot_wednesday" class="tab-pane fade">
                                    <h4 class="card-title d-flex justify-content-between">
                                        <span>Time Slots</span>

                                    </h4>
                                    @if(count($wed)== '0')
                                        <p class="text-muted mb-0">Not Available</p>
                                    @else
                                    <!-- Slot List -->
                                        <div class="doc-times">
                                            @foreach ($wed as $wed)
                                                @if($wed->is_available == '1')
                                                    <div class="doc-slot-list"
                                                         onclick="myFunction({{ $doctor->id }}, {{ $wed->id }}, '{{$doctor->first_name}} {{$doctor->last_name }}', '{{ \Carbon\Carbon::parse($wed->slot_start_time)->format('g:i A') }}- {{ \Carbon\Carbon::parse($wed->slot_end_time)->format('g:i A') }}', 'Wednesday', '{{ $doctor->doctor_fee }}')">
                                                        {{ \Carbon\Carbon::parse($wed->slot_start_time)->format('g:i A') }}
                                                        - {{ \Carbon\Carbon::parse($wed->slot_end_time)->format('g:i A') }}

                                                    </div>
                                                @endif
                                            @endforeach

                                        </div>
                                        <!-- /Slot List -->
                                    @endif
                                </div>
                                <!-- /Wednesday Slot -->

                                <!-- Thursday Slot -->
                                <div id="slot_thursday" class="tab-pane fade">
                                    <h4 class="card-title d-flex justify-content-between">
                                        <span>Time Slots</span>

                                    </h4>
                                    @if(count($thu)== '0')
                                        <p class="text-muted mb-0">Not Available</p>
                                    @else
                                    <!-- Slot List -->
                                        <div class="doc-times">

                                            @foreach ($thu as $thu)
                                                @if($thu->is_available == '1')
                                                    <div class="doc-slot-list"
                                                         onclick="myFunction({{ $doctor->id }}, {{ $thu->id }}, '{{$doctor->first_name}} {{$doctor->last_name }}', '{{ \Carbon\Carbon::parse($thu->slot_start_time)->format('g:i A') }}- {{ \Carbon\Carbon::parse($thu->slot_end_time)->format('g:i A') }}', 'Thursday', '{{ $doctor->doctor_fee }}')">

                                                        {{ \Carbon\Carbon::parse($thu->slot_start_time)->format('g:i A') }}
                                                        - {{ \Carbon\Carbon::parse($thu->slot_end_time)->format('g:i A') }}

                                                    </div>
                                                @endif
                                            @endforeach

                                        </div>
                                        <!-- /Slot List -->
                                    @endif
                                </div>
                                <!-- /Thursday Slot -->

                                <!-- Friday Slot -->
                                <div id="slot_friday" class="tab-pane fade">
                                    <h4 class="card-title d-flex justify-content-between">
                                        <span>Time Slots</span>

                                    </h4>
                                    @if(count($fri)== '0')
                                        <p class="text-muted mb-0">Not Available</p>
                                    @else
                                    <!-- Slot List -->
                                        <div class="doc-times">
                                            @foreach ($fri as $fri)
                                                @if($fri->is_available == '1')
                                                    <div class="doc-slot-list"
                                                         onclick="myFunction({{ $doctor->id }}, {{ $fri->id }}, '{{$doctor->first_name}} {{$doctor->last_name }}', '{{ \Carbon\Carbon::parse($fri->slot_start_time)->format('g:i A') }}- {{ \Carbon\Carbon::parse($fri->slot_end_time)->format('g:i A') }}', 'Friday', '{{ $doctor->doctor_fee }}')">
                                                        {{ \Carbon\Carbon::parse($fri->slot_start_time)->format('g:i A') }}
                                                        - {{ \Carbon\Carbon::parse($fri->slot_end_time)->format('g:i A') }}

                                                    </div>
                                                @endif
                                            @endforeach

                                        </div>
                                        <!-- /Slot List -->
                                    @endif
                                </div>
                                <!-- /Friday Slot -->

                                <!-- Saturday Slot -->
                                <div id="slot_saturday" class="tab-pane fade">
                                    <h4 class="card-title d-flex justify-content-between">
                                        <span>Time Slots</span>

                                    </h4>
                                    @if(count($sat)== '0')
                                        <p class="text-muted mb-0">Not Available</p>
                                    @else
                                    <!-- Slot List -->
                                        <div class="doc-times">
                                            @foreach ($sat as $sat)
                                                @if($sat->is_available == '1')
                                                    <div class="doc-slot-list"
                                                         onclick="myFunction({{ $doctor->id }}, {{ $sat->id }}, '{{$doctor->first_name}} {{$doctor->last_name }}', '{{ \Carbon\Carbon::parse($sat->slot_start_time)->format('g:i A') }}- {{ \Carbon\Carbon::parse($sat->slot_end_time)->format('g:i A') }}', 'Saturday', '{{ $doctor->doctor_fee }}')">
                                                        {{ \Carbon\Carbon::parse($sat->slot_start_time)->format('g:i A') }}
                                                        - {{ \Carbon\Carbon::parse($sat->slot_end_time)->format('g:i A') }}

                                                    </div>
                                                @endif
                                            @endforeach

                                        </div>
                                        <!-- /Slot List -->
                                    @endif
                                </div>
                                <!-- /Saturday Slot -->

                            </div>
                            <!-- /Schedule Content -->

                        </div>
                    </div>
                </div>

            </div>
            <!-- /Schedule Widget -->


            <!-- Doctor Details Tab -->
            <div class="card">
                <div class="card-body pt-0">

                    <!-- Tab Menu -->
                    <nav class="user-tabs mb-4">
                        <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                            <li class="nav-item">
                                <a class="nav-link active" href="#doc_overview" data-toggle="tab">Overview</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#doc_locations" data-toggle="tab">Locations</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#doc_reviews" data-toggle="tab">Reviews</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#doc_business_hours" data-toggle="tab">Business Hours</a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /Tab Menu -->

                    <!-- Tab Content -->
                    <div class="tab-content pt-0">

                        <!-- Overview Content -->
                        <div role="tabpanel" id="doc_overview" class="tab-pane fade show active">
                            <div class="row">
                                <div class="col-md-12 col-lg-9">

                                    <!-- About Details -->
                                    <div class="widget about-widget">
                                        <h4 class="widget-title">About Me</h4>
                                        <p>{{ $doctor->biography}}</div>
                                    <!-- /About Details -->

                                    <!-- Education Details -->
                                    <div class="widget education-widget">
                                        <h4 class="widget-title">Education</h4>
                                        <div class="experience-box">
                                            <ul class="experience-list">
                                                @foreach($doctor->qualification()->get() as $qualification)
                                                    <li>
                                                        <div class="experience-user">
                                                            <div class="before-circle"></div>
                                                        </div>
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <a href="#/"
                                                                   class="name">{{ $qualification->institute_name }}</a>
                                                                <div>{{ $qualification->degree_name }}</div>
                                                                <span
                                                                    class="time">{{ $qualification->rocurment_year }}</span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach


                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /Education Details -->

                                    <!-- Experience Details -->
                                    <div class="widget experience-widget">
                                        <h4 class="widget-title">Work & Experience</h4>
                                        <div class="experience-box">
                                            <ul class="experience-list">
                                                @foreach($doctor->experience()->get() as $experience)
                                                    <li>
                                                        <div class="experience-user">
                                                            <div class="before-circle"></div>
                                                        </div>
                                                        <div class="experience-content">
                                                            <div class="timeline-content">
                                                                <a href="#/"
                                                                   class="name">{{ $experience->hospital_name }}</a>
                                                                <span class="time">{{ \Carbon\Carbon::parse($experience->from)->format('Y') }} -  {{ \Carbon\Carbon::parse($experience->to)->format('Y') }} ({{ \Carbon\Carbon::parse($experience->to)->diffForHumans($experience->from) }})</span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach


                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /Experience Details -->
                                @if(count($doctor->awards()->get()) != 0)
                                    <!-- Awards Details -->
                                        <div class="widget awards-widget">
                                            <h4 class="widget-title">Awards</h4>
                                            <div class="experience-box">
                                                <ul class="experience-list">
                                                    @foreach($doctor->awards()->get() as $award)
                                                        <li>
                                                            <div class="experience-user">
                                                                <div class="before-circle"></div>
                                                            </div>
                                                            <div class="experience-content">
                                                                <div class="timeline-content">
                                                                    <p class="exp-year"> {{ $award->year }}</p>
                                                                    <h4 class="exp-title">{{ $award->award_name }}</h4>

                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach


                                                </ul>
                                            </div>
                                        </div>
                                        <!-- /Awards Details -->





                                @endif

                                @if(count($doctor->services()->get() ) != 0)
                                    <!-- Services List -->
                                        <div class="service-list">
                                            <h4>Services</h4>
                                            <ul class="clearfix">
                                                @foreach($doctor->services()->get() as $services)
                                                    <li>{{ $services->services }}</li>
                                                @endforeach


                                            </ul>
                                        </div>
                                        <!-- /Services List -->

                                @endif

                                @if(count($doctor->specialization()->get()) !=0)
                                    <!-- Specializations List -->
                                        <div class="service-list">
                                            <h4>Specializations</h4>

                                            <ul class="clearfix">
                                                @foreach($doctor->specialization()->get() as $specialization )
                                                    <li>{{ $specialization->specialization }}</li>
                                                @endforeach


                                            </ul>
                                        </div>
                                        <!-- /Specializations List -->

                                    @endif


                                </div>
                            </div>
                        </div>
                        <!-- /Overview Content -->

                        <!-- Locations Content -->
                        <div role="tabpanel" id="doc_locations" class="tab-pane fade">

                            <!-- Location List -->
                            <div class="location-list">
                                <div class="row">


                                @forelse ($doctor->clinic()->get() as $clinic)
                                    <!-- Clinic Content -->
                                        <div class="col-md-6">
                                            <div class="clinic-content">
                                                <h4 class="clinic-name"><a href="#">{{ $clinic->clinic_name }}</a></h4>

                                                <div class="rating">
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star"></i>
                                                    <span class="d-inline-block average-rating">(4)</span>
                                                </div>
                                                <div class="clinic-details mb-0">
                                                    <h5 class="clinic-direction"><i class="fas fa-map-marker-alt"></i> {{ $clinic->clinic_address }}<br><a
                                                            href="javascript:void(0);">Get Directions</a></h5>

                                                </div>
                                            </div>
                                        </div>

                                        <!-- /Clinic Content -->

                                    @empty
                                        <p>No Clicni Found</p>
                                @endforelse






                                </div>
                            </div>
                            <!-- /Location List -->


                        </div>
                        <!-- /Locations Content -->

                        <!-- Reviews Content -->
                        <div role="tabpanel" id="doc_reviews" class="tab-pane fade">

                            <!-- Review Listing -->
                            <div class="widget review-listing">
                                <ul class="comments-list">


                                @forelse ($doctor->reviews()->get() as $review)
                                    <!-- Comment List -->
                                        <li>
                                            <div class="comment">
                                                <img class="avatar avatar-sm rounded-circle" alt="User Image"
                                                     src="{{ asset('assets/img/patients/patient.jpg') }}">
                                                <div class="comment-body">
                                                    <div class="meta-data">
                                                        <span
                                                            class="comment-author">{{ $review->patient->first_name." ".$review->patient->last_name }}</span>
                                                        <span class="comment-date">Reviewed 2 Days ago</span>
                                                        <div class="review-count rating">

                                                            @if($review->rating == 1)
                                                                <i class="fe fe-star text-warning"></i>
                                                                <i class="fe fe-star-o text-secondary"></i>
                                                                <i class="fe fe-star-o text-secondary"></i>
                                                                <i class="fe fe-star-o text-secondary"></i>
                                                                <i class="fe fe-star-o text-secondary"></i>
                                                            @elseif($review->rating == 2)
                                                                <i class="fe fe-star text-warning"></i>
                                                                <i class="fe fe-star text-warning"></i>

                                                                <i class="fe fe-star-o text-secondary"></i>
                                                                <i class="fe fe-star-o text-secondary"></i>
                                                                <i class="fe fe-star-o text-secondary"></i>
                                                            @elseif($review->rating == 3)
                                                                <i class="fe fe-star text-warning"></i>
                                                                <i class="fe fe-star text-warning"></i>
                                                                <i class="fe fe-star text-warning"></i>

                                                                <i class="fe fe-star-o text-secondary"></i>
                                                                <i class="fe fe-star-o text-secondary"></i>
                                                            @elseif($review->rating == 4)
                                                                <i class="fe fe-star text-warning"></i>
                                                                <i class="fe fe-star text-warning"></i>
                                                                <i class="fe fe-star text-warning"></i>
                                                                <i class="fe fe-star text-warning"></i>
                                                                <i class="fe fe-star-o text-secondary"></i>
                                                            @elseif($review->rating == 5)
                                                                <i class="fe fe-star text-warning"></i>
                                                                <i class="fe fe-star text-warning"></i>
                                                                <i class="fe fe-star text-warning"></i>
                                                                <i class="fe fe-star text-warning"></i>
                                                                <i class="fe fe-star text-warning"></i>

                                                            @else
                                                                <i class="fe fe-star-o text-secondary"></i>
                                                                <i class="fe fe-star-o text-secondary"></i>
                                                                <i class="fe fe-star-o text-secondary"></i>
                                                                <i class="fe fe-star-o text-secondary"></i>
                                                                <i class="fe fe-star-o text-secondary"></i>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <p class="recommended"><i
                                                            class="far fa-thumbs-up"></i> {{ $review->review }}</p>

                                                </div>
                                            </div>


                                        </li>
                                        <!-- /Comment List -->

                                    @empty
                                        <p>No Reviews Found</p>
                                    @endforelse


                                </ul>


                            </div>
                            <!-- /Review Listing -->



                            </div>
                            <!-- /Write Review -->

                        </div>
                        <!-- /Reviews Content -->

                        <!-- Business Hours Content -->
                        <div role="tabpanel" id="doc_business_hours" class="tab-pane fade">
                            <div class="row">
                                <div class="col-md-6 offset-md-3">

                                    <!-- Business Hours Widget -->
                                    <div class="widget business-widget">
                                        <div class="widget-content">
                                            <div class="listing-hours">
                                                @if(count($schedule)== '0')
                                                    <p class="text-muted mb-0">Not Available</p>
                                                @else

                                                <!-- Slot List -->
                                                    @foreach($schedule as $schedule)
                                                        <div class="listing-day">
                                                            @if($schedule->day_of_week=='1')
                                                                <div class="day">Monday</div>
                                                            @elseif($schedule->day_of_week=='2')
                                                                <div class="day">Tuesday</div>
                                                            @elseif($schedule->day_of_week=='3')
                                                                <div class="day">Wednesday</div>
                                                            @elseif($schedule->day_of_week=='4')
                                                                <div class="day">Thursday</div>
                                                            @elseif($schedule->day_of_week=='5')
                                                                <div class="day">Friday</div>
                                                            @elseif($schedule->day_of_week=='6')
                                                                <div class="day">Saturday</div>
                                                            @elseif($schedule->day_of_week=='7')
                                                                <div class="day">Sunday</div>
                                                            @endif
                                                            <div class="time-items">
                                                                    <span
                                                                        class="time">{{ \Carbon\Carbon::parse($schedule->start_time)->format('g:i A') }}
                                                    - {{ \Carbon\Carbon::parse($schedule->end_time)->format('g:i A') }}</span>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                @endif


                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Business Hours Widget -->

                                </div>
                            </div>
                        </div>
                        <!-- /Business Hours Content -->

                    </div>
                </div>
            </div>
            <!-- /Doctor Details Tab -->

        </div>
    </div>
    <!-- /Page Content -->

    @include('common.footer')

</div>
<!-- /Main Wrapper -->


<!-- Modal -->
<div class="modal fade" id="booked_appointment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">

                    Booking Details

                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <form method="post" action="{{ route('patient.book.appointment') }}">
                    @csrf
                    <input type="text" name="slot_id" value="" id="slot_id" hidden>
                    <input type="text" name="doctor_id" id="doctor_id" value="" hidden>


                    <div class="form-group row mb-0">

                        <label for="doctor_name" class="col-sm-2 col-form-label font-weight-bold">Doctor
                            Name</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="doctor_name"
                                   value="">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <label for="doctor_slot" class="col-sm-2 col-form-label font-weight-bold">Doctor
                            Slot</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="doctor_slot"
                                   value="">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="doctor_slot" class="col-sm-2 col-form-label font-weight-bold">Week</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="week"
                                   value="">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="doctor_slot" class="col-sm-2 col-form-label font-weight-bold">Fee</label>
                        <div class="col-sm-10">
                            <input type="text" readonly name="fee" class="form-control-plaintext" id="fee"
                                   value="">
                        </div>
                    </div>
                    <div class="form-group row mb-0 mr-1 ml-1 ">
                        <button type="submit" class="btn btn-primary btn-block">Confirm Your Booking</button>
                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Login doctor -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">

                    Patient Login

                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <div class="alert alert-success">
                    Your are not login into account <br> Please login and Try Again
                </div>
                <form action="{{ route('patient.booking.authenticate') }}" method="post">
                    @csrf

                    @if(session()->has('invalid'))
                        <div class="alert alert-success">
                            {{ session()->get('invalid') }}
                        </div>
                    @endif


                    <div class="form-group form-focus">
                        <input type="email" name="email" value="{{ old('email') }}" required
                               class="form-control floating @error('email') is-invalid @enderror">
                        <label class="focus-label">Email</label>
                    </div>
                    <div class="form-group form-focus">
                        <input type="password" name="password" required
                               class="form-control floating @error('password') is-invalid @enderror">
                        <label class="focus-label">Password</label>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                        @enderror
                    </div>
                    <div class="text-right">
                        <a class="forgot-link" href="forgot-password.html">Forgot Password ?</a>
                    </div>
                    <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Login</button>


                    <div class="text-center dont-have">Don’t have an account? <a
                            href="{{ route('patient.registration') }}" target="_blank">Register</a></div>
                </form>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
<!-- End Modal -->


<!-- Modal -->
<div class="modal fade" id="bookingConfirmation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @if(session()->has('success'))

                    <h1 class="modal-title align-items-center" id="exampleModalLabel">Congratulations!</h1>


                @elseif(session()->has('fail'))

                    <h1 class="modal-title align-items-center" id="exampleModalLabel">Oops!</h1>


                @endif
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>


            </div>
            <div class="modal-body">
                @if(session()->has('success'))
                    <div class="alert alert-primary" role="alert">
                        {{ session('success') }}

                    </div>
                @elseif(session()->has('fail'))
                    <div class="alert alert-primary" role="alert">
                        {{ session('fail') }}

                    </div>
                @endif
            </div>

        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Voice Call Modal -->
<div class="modal fade call-modal" id="voice_call">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <!-- Outgoing Call -->
                <div class="call-box incoming-box">
                    <div class="call-wrapper">
                        <div class="call-inner">
                            <div class="call-user">
                                <img alt="User Image" src="{{ asset('assets/img/doctors/doctor-thumb-02.jpg') }}"
                                     class="call-avatar">
                                <h4>Dr. Darren Elder</h4>
                                <span>Connecting...</span>
                            </div>
                            <div class="call-items">
                                <a href="javascript:void(0);" class="btn call-item call-end" data-dismiss="modal"
                                   aria-label="Close"><i class="material-icons">call_end</i></a>
                                <a href="voice-call.html" class="btn call-item call-start"><i class="material-icons">call</i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Outgoing Call -->

            </div>
        </div>
    </div>
</div>
<!-- /Voice Call Modal -->

<!-- Video Call Modal -->
<div class="modal fade call-modal" id="video_call">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">

                <!-- Incoming Call -->
                <div class="call-box incoming-box">
                    <div class="call-wrapper">
                        <div class="call-inner">
                            <div class="call-user">
                                <img class="call-avatar" src="{{ asset('assets/img/doctors/doctor-thumb-02.jpg') }}"
                                     alt="User Image">
                                <h4>Dr. Darren Elder</h4>
                                <span>Calling ...</span>
                            </div>
                            <div class="call-items">
                                <a href="javascript:void(0);" class="btn call-item call-end" data-dismiss="modal"
                                   aria-label="Close"><i class="material-icons">call_end</i></a>
                                <a href="video-call.html" class="btn call-item call-start"><i class="material-icons">videocam</i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Incoming Call -->

            </div>
        </div>
    </div>
</div>
<!-- Video Call Modal -->


<!-- jQuery -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>

<!-- Bootstrap Core JS -->
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<!-- Fancybox JS -->
<script src="{{ asset('assets/plugins/fancybox/jquery.fancybox.min.js') }}"></script>

<!-- Custom JS -->
<script src="{{ asset('assets/js/script.js') }}"></script>


@livewireScripts


@if(session()->has('invalid') || $errors->any())
    <script type="text/javascript">
        $(document).ready(function () {

            $('#loginModal').modal('show');

        });

    </script>
@endif

<script type="text/javascript">


    function myFunction(doctor_id, slot_id, doc_name, doc_slot, week, fee) {

        $('#doctor_id').val(doctor_id);
        $('#slot_id').val(slot_id);
        $('#doctor_name').val(doc_name);
        $('#doctor_slot').val(doc_slot);
        $('#week').val(week);
        $('#fee').val(fee);


        $.get("{{ route('patient.isLogin') }}",
            {},
            function (data, status) {
                if (data[0]) {
                    $('#booked_appointment').modal('show');
                } else {
                    $('#loginModal').modal('show');
                }


            });

    }


    @if(session()->has('success') || session()->has('fail'))
    $('#bookingConfirmation').modal('show');
    @endif

    var bookmarkDoctorID;

    function bookmarkDoctor(id) {
        bookmarkDoctorID = id;

        var token = $("input[name=_token]").val();

        $.post("{{ route('patient.bookmark') }}",
            {
                id: bookmarkDoctorID,

                _token: token,

            },
            function (data, status) {

                if (data[0]) {
                    alert(data[1]);
                } else {
                    $('#loginModal').modal('show');
                }


            });
    }


</script>
</body>

</html>
