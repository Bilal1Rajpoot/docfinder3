<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main</span>
                </li>
                <li>
                    <a href="{{ route('admin.dashboard') }}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                </li>
                @if($admin->role == 'super admin')
                <li>
                    <a href="{{ route('admin.roles') }}"><i class="fe fe-layout"></i> <span>Roles</span></a>
                </li>
                @endif
                <li>
                    <a href="specialities.html"><i class="fe fe-users"></i> <span>Specialities</span></a>
                </li>
                <li>
                    <a href="{{ route('admin.doctor.verify') }}"><i class="fe fe-user-plus"></i> <span>Verify Doctors</span></a>
                </li>
                <li>
                    <a href="{{ route('admin.manage.doctor') }}"><i class="fe fe-user-plus"></i> <span>Manage Doctors</span></a>
                </li>
                <li>
                    <a href="patient-list.html"><i class="fe fe-user"></i> <span>Patients</span></a>
                </li>
                <li>
                    <a href="{{ route('admin.reviews') }}"><i class="fe fe-star-o"></i> <span>Reviews</span></a>
                </li>



                <li>
                    <a href="{{ route('admin.profile') }}"><i class="fe fe-user-plus"></i> <span>Profile</span></a>
                </li>

                <li>
                    <a href="{{ route('admin.logout') }}">
                        <i class="fas fa-arrow-circle-o-right"></i>
                        <span>Logout</span>
                    </a>
                </li>


            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
