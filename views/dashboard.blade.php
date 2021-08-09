@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
    <div class="col-md-7 col-lg-8 col-xl-9">


        <div class="row">
            <div class="col-md-12">
                <div class="card dash-card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-4">
                                <div class="dash-widget dct-border-rht">
                                    <div class="circle-bar circle-bar1">
                                        <div class="circle-graph1" data-percent="75">
                                            <img src="assets/img/icon-01.png" class="img-fluid" alt="patient">
                                        </div>
                                    </div>
                                    <div class="dash-widget-info">
                                        <h6>Total Patient</h6>
                                        <h3>{{ $totalAppointments }}</h3>
                                        <p class="text-muted">Till Today</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 col-lg-4">
                                <div class="dash-widget dct-border-rht">
                                    <div class="circle-bar circle-bar2">
                                        <div class="circle-graph2" data-percent="65">
                                            <img src="assets/img/icon-02.png" class="img-fluid" alt="Patient">
                                        </div>
                                    </div>
                                    <div class="dash-widget-info">
                                        <h6>Today Patient</h6>
                                        <h3>{{ count($todayAppointments) }}</h3>
                                        <p class="text-muted">{{ \Carbon\Carbon::now()->toFormattedDateString()  }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 col-lg-4">
                                <div class="dash-widget">
                                    <div class="circle-bar circle-bar3">
                                        <div class="circle-graph3" data-percent="50">
                                            <img src="assets/img/icon-03.png" class="img-fluid" alt="Patient">
                                        </div>
                                    </div>
                                    <div class="dash-widget-info">
                                        <h6>Appoinments</h6>
                                        <h3>{{ count($todayAppointments) + count($futureAppointments)  }}</h3>
                                        <p class="text-muted">{{  \Carbon\Carbon::now()->toFormattedDateString() }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4">Patient Appoinment</h4>
                <div class="appointment-tab">

                    <!-- Appointment Tab -->
                    <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">
                        <li class="nav-item">
                            <a class="nav-link active" href="#upcoming-appointments" data-toggle="tab">Upcoming</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#today-appointments" data-toggle="tab">Today</a>
                        </li>
                    </ul>
                    <!-- /Appointment Tab -->

                    <div class="tab-content">

                        <!-- Upcoming Appointment Tab -->
                        <div class="tab-pane show active" id="upcoming-appointments">
                            <div class="card card-table mb-0">
                                <div class="card-body">
                                    @if(count($futureAppointments)==0)
                                        <div class="alert alert-success m-4" role="alert">
                                            <h4 class="alert-heading">Oops!</h4>
                                            <p>No Future Appointments Found
                                            <hr>
                                        </div>
                                    @else

                                        <div class="table-responsive">
                                            <table class="table table-hover table-center mb-0">
                                                <thead>
                                                <tr>
                                                    <th>Patient Name</th>
                                                    <th>Appt Date</th>
                                                    <th>Purpose</th>
                                                    <th>Status</th>
                                                    <th class="text-center">Paid Amount</th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                @foreach($futureAppointments as $appointment)
                                                    <tr>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href="#"
                                                                   class="avatar avatar-sm mr-2"><img
                                                                        class="avatar-img rounded-circle"
                                                                        src="assets/img/patients/patient3.jpg"
                                                                        alt="User Image"></a>
                                                                <a href="#">{{ $appointment->patient->first_name }} {{ $appointment->patient->last_name }}
                                                                    <span>#PT{{ $appointment->patient->id }}</span></a>
                                                            </h2>
                                                        </td>
                                                        <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->toFormattedDateString() }}
                                                            <span
                                                                class="d-block text-info">{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('g:i A') }}</span>
                                                        </td>
                                                        <td>{{$appointment->purpose }}</td>
                                                        <td>{{ $appointment->status }}</td>
                                                        <td class="text-center">{{ $appointment->paid_amount }}</td>
                                                        <td class="text-right">
                                                            <div class="table-action">



                                                                @if($appointment->status == 'Pending')
                                                                    <a href="{{ url('meeting/'.$appointment->id."#".$appointment->link) }}"
                                                                       class="btn btn-sm bg-info-light" target="_blank">
                                                                        <i class="far fa-eye"></i> Start Meeting
                                                                    </a>
                                                                    <a href="javascript:void(0);"
                                                                       class="btn btn-sm bg-success-light">
                                                                        <i class="fas fa-check"></i> Accepted
                                                                    </a>
                                                                    <a onclick="cancelAppointment('{{ $appointment->id }}')"
                                                                       class="btn btn-sm bg-danger-light">
                                                                        <i class="fas fa-times"></i> Cancel
                                                                    </a>
                                                                @elseif($appointment->status == 'Completed')
                                                                    <a href="javascript:void(0);"
                                                                       class="btn btn-sm bg-success-light">
                                                                        <i class="fas fa-check"></i> Completed
                                                                    </a>
                                                                @elseif($appointment->status == 'Cancel')
                                                                    <a href="javascript:void(0);"
                                                                       class="btn btn-sm bg-success-light">
                                                                        <i class="fas fa-check"></i> Cancelled
                                                                    </a>
                                                                @endif


                                                            </div>
                                                        </td>
                                                    </tr>

                                                @endforeach


                                                </tbody>
                                            </table>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- /Upcoming Appointment Tab -->

                        <!-- Today Appointment Tab -->
                        <div class="tab-pane" id="today-appointments">
                            <div class="card card-table mb-0">
                                <div class="card-body">
                                    @if(count($todayAppointments)==0)
                                        <div class="alert alert-success m-4" role="alert">
                                            <h4 class="alert-heading">Oops!</h4>
                                            <p>No Appointments Found
                                            <hr>
                                        </div>
                                    @else

                                        <div class="table-responsive">
                                            <table class="table table-hover table-center mb-0">
                                                <thead>
                                                <tr>
                                                    <th>Patient Name</th>
                                                    <th>Appt Date</th>
                                                    <th>Purpose</th>
                                                    <th>Status</th>
                                                    <th class="text-center">Paid Amount</th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                @foreach($todayAppointments as $appointment)
                                                    <tr>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a href="#"
                                                                   class="avatar avatar-sm mr-2"><img
                                                                        class="avatar-img rounded-circle"
                                                                        src="assets/img/patients/patient3.jpg"
                                                                        alt="User Image"></a>
                                                                <a href="#">{{ $appointment->patient->first_name }} {{ $appointment->patient->last_name }}
                                                                    <span>#PT{{ $appointment->patient->id }}</span></a>
                                                            </h2>
                                                        </td>
                                                        <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->toFormattedDateString() }}
                                                            <span
                                                                class="d-block text-info">{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('g:i A') }}</span>
                                                        </td>
                                                        <td>{{$appointment->purpose }}</td>
                                                        <td>{{ $appointment->status }}</td>
                                                        <td class="text-center">{{ $appointment->paid_amount }}</td>
                                                        <td class="text-right">
                                                            <div class="table-action">



                                                                @if($appointment->status == 'Pending')
                                                                    <a href="{{ url('meeting/'.$appointment->id."#".$appointment->link) }}"
                                                                       class="btn btn-sm bg-info-light" target="_blank">
                                                                        <i class="far fa-eye"></i> Start Meeting
                                                                    </a>
                                                                    <a href="javascript:void(0);"
                                                                       class="btn btn-sm bg-success-light">
                                                                        <i class="fas fa-check"></i> Accepted
                                                                    </a>
                                                                    <a onclick="cancelAppointment({{ $appointment->id }})"
                                                                       class="btn btn-sm bg-danger-light">
                                                                        <i class="fas fa-times"></i> Cancel
                                                                    </a>
                                                                @elseif($appointment->status == 'Completed')
                                                                    <a href="javascript:void(0);"
                                                                       class="btn btn-sm bg-success-light">
                                                                        <i class="fas fa-check"></i> Completed
                                                                    </a>
                                                                @elseif($appointment->status == 'Cancel')
                                                                    <a href="javascript:void(0);"
                                                                       class="btn btn-sm bg-success-light">
                                                                        <i class="fas fa-check"></i> Cancelled
                                                                    </a>
                                                                @endif


                                                            </div>
                                                        </td>
                                                    </tr>

                                                @endforeach


                                                </tbody>
                                            </table>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <!-- /Today Appointment Tab -->

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('Modal')

    <!-- Cancel Appointment -->
    <div class="modal fade" id="cancel_appointment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Canceling Appointment</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">
                        <strong>Warning!</strong> Do you want to Cancel the appointment.
                    </div>

                </div>
                <div class="modal-footer">
                    <form action="{{ route('doctor.appointment.cancel') }}" method="post">
                        @csrf
                        <input type="text" readonly name="appointment_id" id="appointment_id" value="" hidden>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Cancel Appointment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('MyScript')
    <script>


        function cancelAppointment(id) {
            alert(id);
            $('#appointment_id').val(id);
            $('#cancel_appointment').modal('show');
        }

        $(document).ready(function () {

        });


        @if(session()->has('cancel'))
        alert('{{ session('cancel') }}')
        @endif
    </script>
@endsection


