@extends('layouts.master')

@section('title', 'Appointments')

@section('content')

<div class="col-md-7 col-lg-8 col-xl-9">
    <div class="appointments">

        <!-- Appointment List -->
        <div class="appointment-list">
            <div class="profile-info-widget">
                <a href="patient-profile.html" class="booking-doc-img">
                    <img src="assets/img/patients/patient.jpg" alt="User Image">
                </a>
                <div class="profile-det-info">
                    <h3><a href="patient-profile.html">Richard Wilson</a></h3>
                    <div class="patient-details">
                        <h5><i class="far fa-clock"></i> 14 Nov 2019, 10.00 AM</h5>
                        <h5><i class="fas fa-map-marker-alt"></i> Newyork, United States</h5>
                        <h5><i class="fas fa-envelope"></i> richard@example.com</h5>
                        <h5 class="mb-0"><i class="fas fa-phone"></i> +1 923 782 4575</h5>
                    </div>
                </div>
            </div>
            
        <!-- /Appointment List -->

        
        

        

    </div>
</div>
@endsection

@section('Modal')
<!-- Appointment Details Modal -->
<div class="modal fade custom-modal" id="appt_details">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Appointment Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="info-details">
                    <li>
                        <div class="details-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <span class="title">#APT0001</span>
                                    <span class="text">21 Oct 2019 10:00 AM</span>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-right">
                                        <button type="button" class="btn bg-success-light btn-sm"
                                            id="topup_status">Completed</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <span class="title">Status:</span>
                        <span class="text">Completed</span>
                    </li>
                    <li>
                        <span class="title">Confirm Date:</span>
                        <span class="text">29 Jun 2019</span>
                    </li>
                    <li>
                        <span class="title">Paid Amount</span>
                        <span class="text">$450</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- /Appointment Details Modal -->

@endsection