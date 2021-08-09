@extends('layouts.basic-layout')

@section('title', 'Booking')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-body">
                            <div class="booking-doc-info">
                                <a href="doctor-profile.html" class="booking-doc-img">
                                    <img src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
                                </a>
                                <div class="booking-info">
                                    <h4><a href="doctor-profile.html">Dr. Darren Elder</a></h4>
                                    <div class="rating">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star"></i>
                                        <span class="d-inline-block average-rating">35</span>
                                    </div>
                                    <p class="text-muted mb-0"><i class="fas fa-map-marker-alt"></i> Newyork, USA</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-4 col-md-6">
                            <h4 class="mb-3">Doctor Available Slots</h4>

                        </div>
                        <div class="col-12 col-sm-8 col-md-6 text-sm-right">

                        </div>
                    </div>
                    <!-- Schedule Widget -->
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
                                                        <div class="doc-slot-list">
                                                            {{ \Carbon\Carbon::parse($sun->slot_start_time)->format('g:i A') }}
                                                            - {{ \Carbon\Carbon::parse($sun->slot_end_time)->format('g:i A') }}

                                                        </div>
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
                                                        <div class="doc-slot-list">
                                                            {{ \Carbon\Carbon::parse($mon->slot_start_time)->format('g:i A') }}
                                                            - {{ \Carbon\Carbon::parse($mon->slot_end_time)->format('g:i A') }}

                                                        </div>
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
                                                        <div class="doc-slot-list">
                                                            {{ \Carbon\Carbon::parse($tue->slot_start_time)->format('g:i A') }}
                                                            - {{ \Carbon\Carbon::parse($tue->slot_end_time)->format('g:i A') }}

                                                        </div>
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
                                                        <div class="doc-slot-list">
                                                            {{ \Carbon\Carbon::parse($wed->slot_start_time)->format('g:i A') }}
                                                            - {{ \Carbon\Carbon::parse($wed->slot_end_time)->format('g:i A') }}

                                                        </div>
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
                                                        <div class="doc-slot-list">
                                                            {{ \Carbon\Carbon::parse($thu->slot_start_time)->format('g:i A') }}
                                                            - {{ \Carbon\Carbon::parse($thu->slot_end_time)->format('g:i A') }}

                                                        </div>
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
                                                        <div class="doc-slot-list">
                                                            {{ \Carbon\Carbon::parse($fri->slot_start_time)->format('g:i A') }}
                                                            - {{ \Carbon\Carbon::parse($fri->slot_end_time)->format('g:i A') }}

                                                        </div>
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
                                                        <div class="doc-slot-list">
                                                            {{ \Carbon\Carbon::parse($sat->slot_start_time)->format('g:i A') }}
                                                            - {{ \Carbon\Carbon::parse($sat->slot_end_time)->format('g:i A') }}

                                                        </div>
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

                    <!-- Submit Section -->
                    <div class="submit-section proceed-btn text-right">
                        <a href="checkout.html" class="btn btn-primary submit-btn">Proceed to Pay</a>
                    </div>
                    <!-- /Submit Section -->

                </div>
            </div>
        </div>

    </div>
    <!-- /Page Content -->
@endsection
