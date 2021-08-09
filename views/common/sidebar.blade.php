<!-- Profile Sidebar -->
<div class="profile-sidebar">
    <div class="widget-profile pro-widget-content">
        <div class="profile-info-widget">
            <a href="#" class="booking-doc-img">
                <img src="{{ $doctor->image_path ? asset('images/'.$doctor->image_path) : asset('images/default-doctor.jpg') }}" alt="User Image">
            </a>
            <div class="profile-det-info">
                <h3>Dr. {{ $doctor->first_name ? $doctor->first_name." ".$doctor->last_name : $doctor->user_name }}</h3>

                <div class="patient-details">
                    <h5 class="mb-0"></h5>
                </div>
            </div>
        </div>
    </div>
    <div class="dashboard-widget">
        <nav class="dashboard-menu">
            <ul>
                <li class="@if(Request::path() == '/' or Request::path() == 'dashboard' ) active @endif">
                    <a href={{ url('/') }}>
                        <i class="fas fa-columns"></i>
                        <span>Dashboard</span>
                    </a>
                </li>



                <li class="@if(Request::path() == 'schedule-timings') active @endif">
                    <a href={{ url('/schedule-timings') }}>
                        <i class="fas fa-hourglass-start"></i>
                        <span>Schedule Timings</span>
                    </a>
                </li>

                <li  class="@if(Request::path() == 'reviews') active @endif">
                    <a href={{ url('/reviews') }}>
                        <i class="fas fa-star"></i>
                        <span>Reviews</span>
                    </a>
                </li>

                <li class="@if(Request::path() == 'doctor-profile-settings') active @endif">
                    <a href={{ url('/doctor-profile-settings') }}>
                        <i class="fas fa-user-cog"></i>
                        <span>Profile Settings</span>
                    </a>
                </li>
                <li class="@if(Request::path() == 'social-media') active @endif">
                    <a href={{ url('/social-media') }}>
                        <i class="fas fa-share-alt"></i>
                        <span>Social Media</span>
                    </a>
                </li>
                <li class="@if(Request::path() == 'doctor-change-password') active @endif">
                    <a href={{ url('/doctor-change-password') }}>
                        <i class="fas fa-lock"></i>
                        <span>Change Password</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" }} onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        {{ __('Logout') }}

                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- /Profile Sidebar -->
