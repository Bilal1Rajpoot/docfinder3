<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
    <div class="profile-sidebar">
        <div class="widget-profile pro-widget-content">
            <div class="profile-info-widget">
                <a href="#" class="booking-doc-img">
                    <img src="{{ $patient->image_path ? asset('images/'.$patient->image_path) : asset('images/default-patient.jpg') }}" alt="User Image">
                </a>
                <div class="profile-det-info">
                    <h3>{{ $patient->first_name }} {{ $patient->last_name }}</h3>
                    <div class="patient-details">
                        <h5><i class="fas fa-birthday-cake"></i>@if($patient->date_of_birth) {{ \Carbon\Carbon::parse($patient->date_of_birth)->toFormattedDateString() }} @else Date of Birth @endif, {{ \Carbon\Carbon::parse($patient->date_of_birth)->diff(\Carbon\Carbon::now())->format('%y') }} years</h5>
                        <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> {{ $patient->city ? $patient->city : 'City' }}, {{ $patient->country  ? $patient->country : 'Country' }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboard-widget">
            <nav class="dashboard-menu">
                <ul>
                    <li class="@if (Request::path() == 'patient/dashboard' or Request::path() == 'patient' ) active @endif">
                        <a href="{{ route('patient.dashboard') }}">
                            <i class="fas fa-columns"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="@if (Request::path() == 'patient/favourites') active @endif">
                        <a href="{{ route('patient.favourites') }}">
                            <i class="fas fa-bookmark"></i>
                            <span>Favourites</span>
                        </a>
                    </li>
                    <li class="@if (Request::path() == 'patient/medical_record') active @endif">
                        <a href="{{ route('patient.medical_record') }}">
                            <i class="fas fa-plus-square"></i>
                            <span>Medical Record</span>
                        </a>
                    </li>

                    <li class="@if (Request::path() == 'patient/profile') active @endif">
                        <a href="{{ route('patient.profile') }}">
                            <i class="fas fa-user-cog"></i>
                            <span>Profile Settings</span>
                        </a>
                    </li>
                    <li class="@if (Request::path() == 'patient/password') active @endif">
                        <a href="{{ route('patient.password') }}">
                            <i class="fas fa-lock"></i>
                            <span>Change Password</span>
                        </a>
                    </li>
                    <li class="@if (Request::path() == 'patient/logout') active @endif">
                        <a href="{{ route('patient.logout') }}">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

    </div>
</div>
