@extends('layouts.basic-layout')

@section('title', 'Booking')

@section('content')


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
                @if(count($specializations) != 0)

                    @foreach ($specializations as $specialization)

                        <!-- Doctor Widget -->
                            <input type="hidden" name="doctor_id" value="{{ $specialization->doctor->id }}">
                            <div class="card">
                                <div class="card-body">
                                    <div class="doctor-widget">
                                        <div class="doc-info-left">
                                            <div class="doctor-img">
                                                <a href="{{ url('doctor/'.$specialization->doctor->id) }}">
                                                    <img src="{{ $specialization->doctor->image_path ? asset('images/'.$specialization->doctor->image_path) : asset('images/default-doctor.jpg') }}" class="rounded" height="160" width="150"
                                                         alt="User Image">
                                                </a>
                                            </div>
                                            <div class="doc-info-cont">
                                                <h4 class="doc-name"><a href="{{ url('doctor/'.$specialization->doctor->id) }}">Dr.
                                                        {{ $specialization->doctor->first_name ? $specialization->doctor->first_name." ".$specialization->doctor->last_name : $specialization->doctor->user_name }}
                                                    </a></h4>
                                                <p class="doc-speciality">
                                                    {{ $specialization->doctor->specialization()->get()->first() ? $specialization->doctor->specialization()->get()->first()->specialization : 'specialization'}}
                                                </p>
                                                <h5 class="doc-department"><img
                                                        src="{{ asset('assets/img/specialities/specialities-05.png') }}"
                                                        class="img-fluid"
                                                        alt="Speciality"></h5>
                                                <div class="rating">


                                                    @if($specialization->doctor->avg_rating==1)
                                                        <div class="review-count rating">
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star "></i>
                                                            <i class="fas fa-star "></i>
                                                            <i class="fas fa-star "></i>
                                                            <i class="fas fa-star "></i>
                                                        </div>
                                                    @elseif ($specialization->doctor->avg_rating==2)
                                                        <div class="review-count rating">
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star "></i>
                                                            <i class="fas fa-star "></i>
                                                            <i class="fas fa-star "></i>
                                                        </div>
                                                    @elseif ($specialization->doctor->avg_rating==3)
                                                        <div class="review-count rating">
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star "></i>
                                                            <i class="fas fa-star "></i>
                                                        </div>
                                                    @elseif ($specialization->doctor->avg_rating==4)
                                                        <div class="review-count rating">
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star "></i>
                                                        </div>
                                                    @elseif ($specialization->doctor->avg_rating==5)
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
                                                        {{ $specialization->doctor->address()->get()->first()->city }},
                                                        {{ $specialization->doctor->address()->get()->first()->country }}</p>

                                                </div>
                                                <div class="clinic-services">
                                                    @foreach ($specialization->doctor->services()->get() as $servic)
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
                                                        <i class="far fa-comment"></i> {{ count($specialization->doctor->reviews()->get()) }}
                                                        Feedback
                                                    </li>

                                                    <li><i class="far fa-money-bill-alt"></i> {{ $specialization->doctor->doctor_fee }}
                                                        <i
                                                            class="fas fa-info-circle" data-toggle="tooltip"
                                                            title="Lorem Ipsum"></i></li>
                                                </ul>
                                            </div>
                                            <div class="clinic-booking">
                                                <a class="view-pro-btn" href="{{ url('doctor/'.$specialization->doctor->id ) }}">View Profile</a>
                                                <a class="apt-btn" href="{{ url('doctor/'.$specialization->doctor->id) }}">Book Appointment</a>
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
@endsection
