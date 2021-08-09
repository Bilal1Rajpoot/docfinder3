<!-- Header -->
<header class="header">
    <nav class="navbar navbar-expand-lg header-nav">
        <div class="navbar-header">
            <a id="mobile_btn" href="javascript:void(0);">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>


            <a href="#" class="navbar-brand logo">
                <img src="{{ asset('assets/img/logo.png') }}" class="img-fluid" alt="Logo">
            </a>
        </div>
        <div class="main-menu-wrapper">
            <div class="menu-header">
                <a href="index.html" class="menu-logo">
                    <img src="{{ asset('assets/img/logo.png') }}" class="img-fluid" alt="Logo">
                </a>
                <a id="menu_close" class="menu-close" href="javascript:void(0);">
                    <i class="fas fa-times"></i>
                </a>
            </div>

        </div>
        <ul class="nav header-navbar-rht">
            <li class="nav-item contact-item">
                <div class="header-contact-img">
                    <i class="far fa-hospital"></i>
                </div>
                <div class="header-contact-detail">
                    <p class="contact-header">Contact</p>
                    <p class="contact-info-header">+92-51-9207091-4</p>
                </div>
            </li>
        @if(session()->has('LoggedPatient'))
            <!-- User Menu -->
                <li class="nav-item dropdown has-arrow logged-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
								<span class="user-img">
									<img class="rounded-circle" src="{{ $patient->image_path ? asset('images/'.$patient->image_path) : asset('images/default-patient.jpg') }}" width="31"
                                         alt="Ryan Taylor">
								</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="user-header">
                            <div class="avatar avatar-sm">
                                <img src="{{ $patient->image_path ? asset('images/'.$patient->image_path) : asset('images/default-patient.jpg') }}" alt="User Image"
                                     class="avatar-img rounded-circle">
                            </div>
                            <div class="user-text">
                                <h6>{{ $patient->first_name }} {{ $patient->last_name }}</h6>
                                <p class="text-muted mb-0">Patient</p>
                            </div>
                        </div>
                        <a class="dropdown-item" href="{{ route('patient.dashboard') }}">Dashboard</a>
                        <a class="dropdown-item" href="{{ route('patient.profile') }}">Profile Settings</a>
                        <a class="dropdown-item" href="{{ route('patient.logout') }}">Logout</a>
                    </div>
                </li>
                <!-- /User Menu -->

            @else
                <li class="nav-item">
                    <a class="nav-link header-login" href="{{ route('patient.login') }}">login</a>
                </li>
            @endif
        </ul>
    </nav>
</header>
<!-- /Header -->
