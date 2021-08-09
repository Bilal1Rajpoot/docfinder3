@extends('admin.layouts.master')

@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Profile</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif

            <div class="row">
                <div class="col-md-12">
                    <div class="profile-header">
                        <div class="row align-items-center">
                            <div class="col-auto profile-image">
                                <a href="#">
                                    <img class="rounded-circle" alt="User Image"
                                         src="{{ $admin->image_path ? asset('ad/images/'.$admin->image_path) : asset('images/default-admin.jpg') }}">
                                </a>
                            </div>

                            <div class="col ml-md-n2 profile-user-info">
                                <h4 class="user-name mb-0">{{ $admin->first_name." ".$admin->last_name }}</h4>
                                <h6 class="text-muted">{{ $admin->email }}</h6>
                                <div class="user-Location"><i class="fa fa-map-marker"></i> {{$admin->city}}, {{ $admin->country }}</div>
                                <div class="about-text">{{ $admin->country }}
                                </div>
                            </div>

                            <div class="col-auto profile-btn">


                            </div>
                        </div>
                        @error('image')
                        <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                        @enderror
                        <form action="{{ route('admin.profile.image') }}" method="post" enctype='multipart/form-data'>
                            @csrf
                            <input type="file" class="upload" name="image">

                        <button class="btn btn-primary btn-primary mt-2"><i
                                class="fa fa-upload" type="submit"></i>Upload Profile
                        </button>
                        </form>
                    </div>
                    <div class="profile-menu">
                        <ul class="nav nav-tabs nav-tabs-solid">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#per_details_tab">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#password_tab">Password</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content profile-tab-cont">

                        <!-- Personal Details Tab -->
                        <div class="tab-pane fade show active" id="per_details_tab">

                            <!-- Personal Details -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title d-flex justify-content-between">
                                                <span>Personal Details</span>
                                                <a class="edit-link" data-toggle="modal"
                                                   href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Edit</a>
                                            </h5>
                                            <div class="row">
                                                <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
                                                <p class="col-sm-10">{{ $admin->first_name." ".$admin->last_name }}</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Date of Birth</p>
                                                <p class="col-sm-10">{{ \Carbon\Carbon::parse($admin->date_of_birth)->format('d M Y')  }}</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
                                                <p class="col-sm-10">{{ $admin->email }}</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Mobile</p>
                                                <p class="col-sm-10">{{ $admin->mobile_number }}</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-2 text-muted text-sm-right mb-0">Address</p>
                                                <p class="col-sm-10 mb-0">{{ $admin->address }},<br>
                                                    {{ $admin->city }},<br>
                                                    {{ $admin->state }},<br>
                                                    {{ $admin->country }}.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Edit Details Modal -->
                                    <div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Personal Details</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="{{ route('admin.profile.save') }}">
                                                        @csrf
                                                        <div class="row form-row">
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label>First Name</label>
                                                                    <input type="text" name='first_name' required class="form-control"
                                                                           value="{{ $admin->first_name }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Last Name</label>
                                                                    <input type="text" class="form-control" name='last_name' required value="{{ $admin->last_name }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6 ">
                                                                <div class="form-group">
                                                                    <label>Date of Birth</label>
                                                                    <div class="">
                                                                        <input type="date" class="form-control"
                                                                               value="{{ $admin->date_of_birth }}" name='date_of_birth' required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6 ">
                                                                <div class="form-group">
                                                                    <label>About</label>
                                                                    <div >
                                                                        <input type="text" class="form-control"
                                                                               value="{{ $admin->about }}" name='about' required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Email ID</label>
                                                                    <input type="email" class="form-control"
                                                                           value="{{ $admin->email }}" name='email' required>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Mobile</label>
                                                                    <input type="text" value="{{ $admin->mobile_number }}"
                                                                           class="form-control" name='mobile_number' required>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <h5 class="form-title"><span>Address</span></h5>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label>Address</label>
                                                                    <input type="text" class="form-control"
                                                                           value="{{ $admin->address }}" name='address' required>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label>City</label>
                                                                    <input type="text" class="form-control"
                                                                           value="{{ $admin->city }}" name='city' required>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label>State</label>
                                                                    <input type="text" class="form-control"
                                                                           value="{{ $admin->state }}" name='state' required>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Zip Code</label>
                                                                    <input type="text" class="form-control"
                                                                           value="{{ $admin->zip_code }}" name='zip_code' required>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Country</label>
                                                                    <input type="text" class="form-control"
                                                                           value="{{ $admin->country }}" name='country' required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary btn-block">Save
                                                            Changes
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Edit Details Modal -->

                                </div>


                            </div>
                            <!-- /Personal Details -->

                        </div>
                        <!-- /Personal Details Tab -->

                        <!-- Change Password Tab -->
                        <div id="password_tab" class="tab-pane fade">

                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Change Password</h5>
                                    <div class="row">
                                        <div class="col-md-10 col-lg-6">
                                            @livewire('admin.change-password')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Change Password Tab -->

                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /Page Wrapper -->
@endsection
