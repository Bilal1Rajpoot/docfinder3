@extends('admin.layouts.master')

@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">

    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Welcome Admin!</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
										<span class="dash-widget-icon text-primary border-primary">
											<i class="fe fe-users"></i>
										</span>
                            <div class="dash-count">
                                <h3>{{ count($doctors) }}</h3>
                            </div>
                        </div>
                        <div class="dash-widget-info">
                            <h6 class="text-muted">Doctors</h6>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-primary w-50"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
										<span class="dash-widget-icon text-success">
											<i class="fe fe-credit-card"></i>
										</span>
                            <div class="dash-count">
                                <h3>{{ count($patients) }}</h3>
                            </div>
                        </div>
                        <div class="dash-widget-info">

                            <h6 class="text-muted">Patients</h6>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-success w-50"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
										<span class="dash-widget-icon text-danger border-danger">
											<i class="fe fe-money"></i>
										</span>
                            <div class="dash-count">
                                <h3>{{ count($appointments) }}</h3>
                            </div>
                        </div>
                        <div class="dash-widget-info">

                            <h6 class="text-muted">Appointment</h6>
                            <div class="progress progress-sm">
                                <div class="progress-bar bg-danger w-50"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-6 d-flex">

                <!-- Recent Orders -->
                <div class="card card-table flex-fill">
                    <div class="card-header">
                        <h4 class="card-title">Doctors List</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0">
                                <thead>
                                <tr>
                                    <th>Doctor Name</th>

                                    <th>Reviews</th>
                                </tr>
                                </thead>
                                <tbody>

                                @forelse ($doctors as $doctor)

                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile.html" class="avatar avatar-sm mr-2"><img
                                                        class="avatar-img rounded-circle"
                                                        src="{{ $doctor->image_path ? asset('images/'.$doctor->image_path) : asset('images/default-doctor.jpg') }}" alt="User Image"></a>
                                                <a href="profile.html">Dr. {{ $doctor->first_name." ".$doctor->last_name }}</a>
                                            </h2>
                                        </td>


                                        <td>
                                            @if($doctor->avg_rating == 1)
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star-o text-secondary"></i>
                                                <i class="fe fe-star-o text-secondary"></i>
                                                <i class="fe fe-star-o text-secondary"></i>
                                                <i class="fe fe-star-o text-secondary"></i>
                                            @elseif($doctor->avg_rating == 2)
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>

                                                <i class="fe fe-star-o text-secondary"></i>
                                                <i class="fe fe-star-o text-secondary"></i>
                                                <i class="fe fe-star-o text-secondary"></i>
                                            @elseif($doctor->avg_rating == 3)
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>

                                                <i class="fe fe-star-o text-secondary"></i>
                                                <i class="fe fe-star-o text-secondary"></i>
                                            @elseif($doctor->avg_rating == 4)
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star-o text-secondary"></i>
                                            @elseif($doctor->avg_rating == 5)
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
                                        </td>
                                    </tr>

                                    @break($loop->index == 4)
                                @empty
                                    <p>No users</p>
                                @endforelse



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /Recent Orders -->

            </div>
            <div class="col-md-6 d-flex">

                <!-- Feed Activity -->
                <div class="card  card-table flex-fill">
                    <div class="card-header">
                        <h4 class="card-title">Patients List</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0">
                                <thead>
                                <tr>
                                    <th>Patient Name</th>
                                    <th>Phone</th>

                                </tr>
                                </thead>
                                <tbody>

                                @forelse ($patients as $user)
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile.html" class="avatar avatar-sm mr-2"><img
                                                        class="avatar-img rounded-circle"
                                                        src="{{ $user->image_path ? asset('images/'.$user->image_path) : asset('images/default-patient.jpg') }}" alt="User Image"></a>
                                                <a href="profile.html">{{ $user->first_name." ".$user->last_name }} </a>
                                            </h2>
                                        </td>
                                        <td>{{ $user->mobile_number }}</td>


                                    </tr>

                                    @break($loop->index == 4)
                                @empty
                                    <p>No Patients found</p>
                                @endforelse


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /Feed Activity -->

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                <!-- Recent Orders -->
                <div class="card card-table">
                    <div class="card-header">
                        <h4 class="card-title">Appointment List</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0">
                                <thead>
                                <tr>
                                    <th>Doctor Name</th>

                                    <th>Patient Name</th>
                                    <th>Apointment Time</th>
                                    <th>Status</th>
                                    <th class="text-right">Amount</th>
                                </tr>
                                </thead>
                                <tbody>

                                @forelse ($appointments as $appointment)
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile.html" class="avatar avatar-sm mr-2"><img
                                                        class="avatar-img rounded-circle"
                                                        src="{{ $appointment->doctor->image_path ? asset('images/'.$appointment->doctor->image_path) : asset('images/default-doctor.jpg') }}" alt="User Image"></a>
                                                <a href="profile.html">Dr. {{ $appointment->doctor->first_name." ".$appointment->doctor->last_name }}</a>
                                            </h2>
                                        </td>

                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile.html" class="avatar avatar-sm mr-2"><img
                                                        class="avatar-img rounded-circle"
                                                        src="{{ $appointment->patient->image_path ? asset('images/'.$appointment->patient->image_path) : asset('images/default-patient.jpg') }}" alt="User Image"></a>
                                                <a href="profile.html">Charlene Reed </a>
                                            </h2>
                                        </td>
                                        <td>{{ \Illuminate\Support\Carbon::parse($appointment->appointment_date)->format('d M Y') }} <span class="text-primary d-block">{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('g:i A') }} -{{ \Carbon\Carbon::parse($appointment->timeSlots->slot_end_time)->format('g:i A') }}  </span></td>
                                        <td>
                                            <div class="status-toggle">
                                                @if($appointment->status == 'Pending')

                                                    <a href="javascript:void(0);"
                                                       class="btn btn-sm bg-success-light">
                                                        <i class=""></i> Pending
                                                    </a>

                                                @elseif($appointment->status == 'Completed')
                                                    <a href="javascript:void(0);"
                                                       class="btn btn-sm bg-success">
                                                        <i class=""></i> Completed
                                                    </a>
                                                @elseif($appointment->status == 'Cancel')
                                                    <a href="javascript:void(0);"
                                                       class="btn btn-sm bg-danger-light">
                                                        <i class=""></i> Cancelled
                                                    </a>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            {{ $appointment->paid_amount }}
                                        </td>
                                    </tr>

                                    @break($loop->index == 9)
                                @empty
                                    <p>No Appointment Found</p>
                                @endforelse


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /Recent Orders -->

            </div>
        </div>

    </div>
</div>
<!-- /Page Wrapper -->

@endsection
