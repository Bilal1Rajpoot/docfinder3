@extends('layouts.master')

@section('title', 'Profile Settings')

@section('content')

    <div class="col-md-7 col-lg-8 col-xl-9">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 ">
                                <nav>
                                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab"
                                           data-toggle="tab" href="#nav-home" role="tab"
                                           aria-controls="nav-home" aria-selected="true">Basic
                                            Information</a>
                                        <a class="nav-item nav-link " id="nav-profile-tab" data-toggle="tab"
                                           href="#nav-profile" role="tab" aria-controls="nav-profile"
                                           aria-selected="false">Contact Details</a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab"
                                           href="#nav-contact" role="tab" aria-controls="nav-contact"
                                           aria-selected="false">Education</a>
                                        <a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab"
                                           href="#nav-about" role="tab" aria-controls="nav-about"
                                           aria-selected="false">Clinic Info</a>
                                        <a class="nav-item nav-link" id="nav-services-tab" data-toggle="tab"
                                           href="#nav-services" role="tab" aria-controls="nav-about"
                                           aria-selected="false">Services</a>
                                        <a class="nav-item nav-link" id="nav-experience-tab"
                                           data-toggle="tab"
                                           href="#nav-experience" role="tab" aria-controls="nav-experience"
                                           aria-selected="false">Experience</a>
                                        <a class="nav-item nav-link" id="nav-award-tab" data-toggle="tab"
                                           href="#nav-award" role="tab" aria-controls="nav-award"
                                           aria-selected="false">Other</a>

                                    </div>
                                </nav>
                                <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                                    <div class="tab-pane fade show active " id="nav-home" role="tabpanel"
                                         aria-labelledby="nav-home-tab">
                                        <!-- Basic Information -->

                                        @if(session()->has('message'))
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                <strong>{{ session('message') }}</strong>
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif

                                        <div class="card">
                                            <div class="card-body">
                                                <form action="{{ route('doctor.upload.cv') }}" method="post"
                                                      enctype="multipart/form-data">
                                                    @csrf
                                                    <h4 class="card-title">Upload CV(optional)</h4>
                                                    <div class="col-md-6">
                                                        <div class="col-md-12">
                                                            <div class="change-avatar">
                                                                <div class="profile-img">
                                                                    <a href="{{ $doctor->cv_path ? asset('cv/'.$doctor->cv_path) : asset('assets/img/cv.jpg') }}"
                                                                       target="_blank">
                                                                        <img
                                                                            src="{{ asset('assets/img/cv.jpg') }}">
                                                                    </a>

                                                                </div>
                                                                <div class="upload-img">
                                                                    @if($doctor->cv_path)
                                                                        <a href="{{ $doctor->cv_path ? asset('cv/'.$doctor->cv_path) : asset('assets/img/cv.jpg') }}"
                                                                           class="btn btn-sm bg-info-light"
                                                                           target="_blank">
                                                                            <i class="far fa-eye"></i> View CV
                                                                        </a>
                                                                    @endif
                                                                    <small class="form-text text-muted"
                                                                           style="color: red">Allowed docx,
                                                                        docx, pdf. Max size of 2MB</small>

                                                                    @error('cv')
                                                                    <small
                                                                        class="form-text"
                                                                        style="color: red">{{ $message }}</small>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mt-1">

                                                            <input name='cv' type="file"
                                                                   class="upload mb-1 form-control-sm" required>

                                                            <button class="btn btn-primary btn-block "><i
                                                                    class="fa fa-upload"></i>Upload CV
                                                            </button>
                                                        </div>

                                                    </div>

                                                </form>
                                            </div>
                                        </div>

                                        <div class="col-md-6">


                                        </div>
                                        <form action="{{ route('doctor.basic_information') }}" method="post"
                                              enctype="multipart/form-data">
                                            @csrf

                                            <div class="card">

                                                <div class="card-body">
                                                    <h4 class="card-title">Basic Information</h4>
                                                    <div class="row form-row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <div class="change-avatar">
                                                                    <div class="profile-img">
                                                                        <img
                                                                            src="{{ $doctor->image_path ? asset('images/'.$doctor->image_path) : asset('images/default-doctor.jpg') }}">
                                                                    </div>
                                                                    <div class="upload-img">
                                                                        <div class="change-photo-btn">
                                                                            <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                                            <input name='image' type="file"
                                                                                   class="upload">
                                                                        </div>
                                                                        <small class="form-text text-muted">Allowed JPG,
                                                                            GIF or PNG. Max size of 2MB</small>

                                                                        @error('image')
                                                                        <span class="invalid-feedback" role="alert">
                                                                                   <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Username <span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" name="username" class="form-control"
                                                                       required readonly
                                                                       value='{{ $doctor->user_name }}'>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Email <span class="text-danger">*</span></label>
                                                                <input name='email' type="email" class="form-control"
                                                                       required readonly value='{{ $doctor->email }}'>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>First Name <span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" name='first_name'
                                                                       class="form-control" required
                                                                       value='{{ $doctor->first_name }}'>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Last Name <span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" name='last_name' class="form-control"
                                                                       required value='{{ $doctor->last_name }}'>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Phone Number <span
                                                                        class="text-danger">*</span></label>
                                                                <input type="number" name="phone_number" required
                                                                       class="form-control"
                                                                       value='{{ $doctor->phone_number }}'>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Gender <span class="text-danger">*</span></label>
                                                                <select class="form-control select" name="gender"
                                                                        required>
                                                                    <option>Select</option>
                                                                    <option value='Male'
                                                                            @if($doctor->gender == 'Male') selected @endif >
                                                                        Male
                                                                    </option>
                                                                    <option value='Female'
                                                                            @if($doctor->gender == 'Female') selected @endif>
                                                                        Female
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group mb-0">
                                                                <label>Date of Birth <span
                                                                        class="text-danger">*</span></label>
                                                                <input type="date" name="date_of_birth"
                                                                       class="form-control"
                                                                       value='{{ $doctor->date_of_birth }}' required>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group mb-0">
                                                                <label>Biography </label>
                                                                <input type="text" name="biography" class="form-control"
                                                                       value='{{ $doctor->biography }}'>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mt-2">
                                                            <div class="form-group mb-0">
                                                                <button type="submit" class="btn btn-primary">Save
                                                                    Record
                                                                </button>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- /Basic Information -->

                                    </div>

                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                         aria-labelledby="nav-profile-tab">
                                        <!-- Contact Details -->
                                        @livewire('doctor.form.contact-details', [$address])
                                        <!-- /Contact Details -->

                                    </div>
                                    <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                         aria-labelledby="nav-contact-tab">
                                        <!-- Education -->
                                        <form id="education">
                                            @csrf
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title">Education</h4>
                                                    <div class="education-info">
                                                        <div class="row form-row education-cont">
                                                            <div class="col-12 col-md-10 col-lg-11">
                                                                <div class="row form-row">
                                                                    <div class="col-12 col-md-6 col-lg-4">
                                                                        <div class="form-group">
                                                                            <label>Degree <span
                                                                                    class="text-danger">*</span></label>
                                                                            <input name='degree_name' required
                                                                                   type="text"
                                                                                   class="form-control"
                                                                                   value=''>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 col-lg-4">
                                                                        <div class="form-group">
                                                                            <label>College/Institute <span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="text" required
                                                                                   name='institute_name'
                                                                                   class="form-control"
                                                                                   value=''>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 col-lg-4">
                                                                        <div class="form-group">
                                                                            <label>Year of Completion <span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="year" required
                                                                                   name='rocurment_year'
                                                                                   class="form-control"
                                                                                   value=''>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-12 col-md-6 col-lg-4">
                                                                        <div class="form-group">
                                                                            <button type="submit"
                                                                                    class="btn btn-primary">Save Record
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                        <div class="card">
                                            <div class="body">
                                                <table class="table table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">Degree</th>
                                                        <th scope="col">College/Institute</th>
                                                        <th scope="col">Year</th>
                                                        <th scope="col"></th>

                                                    </tr>
                                                    </thead>
                                                    <tbody id="qualificationTable">
                                                    @if(count($qualification) != 0)
                                                        @foreach($qualification as $qualification)
                                                            <tr id="{{ $qualification->id }}">
                                                                <td>{{ $qualification->degree_name }}</td>
                                                                <td>{{ $qualification->institute_name }}</td>
                                                                <td>{{ $qualification->rocurment_year }}</td>
                                                                <td>
                                                                    <button class="btn btn-danger"
                                                                            onclick="deleteQualification({{ $qualification->id  }})">
                                                                        Delete
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- /Education -->
                                    </div>
                                    <div class="tab-pane fade" id="nav-about" role="tabpanel"
                                         aria-labelledby="nav-about-tab">
                                        <!-- Clinic Info -->
                                        <form id='clinic_form'>
                                            @csrf
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title">Clinic Info</h4>
                                                    <div class="row form-row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Clinic Name</label>
                                                                <input type="text" required name="clinic_name"
                                                                       class="form-control"
                                                                       value='{{$clinic->clinic_name}}'>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Clinic Address</label>
                                                                <input type="text" required name="clinic_address"
                                                                       class="form-control"
                                                                       value='{{$clinic->clinic_address}}'>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">

                                                            <button type="submit" class="btn btn-primary">Save Record
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                        <!-- /Clinic Info -->

                                    </div>
                                    <div class="tab-pane fade" id="nav-services" role="tabpanel"
                                         aria-labelledby="nav-services-tab">
                                        <!-- Services and Specialization -->

                                        <div class="card services-card">
                                            <div class="card-body">
                                                <h4 class="card-title">Services and Specialization</h4>


                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <b>Services</b>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <b>Specialization</b>
                                                    </div>
                                                </div>
                                                <div class="row">

                                                    <!-- Services -->


                                                    <div class="col-lg-6">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <form id="services_form">
                                                                    <div class="row">

                                                                        <div class="col-md-8">

                                                                            <div class="form-group">

                                                                                <input type="text"
                                                                                       class="input-tags form-control"
                                                                                       placeholder="Enter Services"
                                                                                       name="services"
                                                                                       value="" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">

                                                                                <button type="submit"
                                                                                        class="btn btn-primary btn-block">
                                                                                    Add
                                                                                </button>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </form>
                                                                <div class="row">

                                                                    <ul class="list-group" id="services_list">

                                                                        @foreach($service as $service)
                                                                            <li id="service{{ $service->id }}"
                                                                                class="list-group-item">{{ $service->services }}
                                                                                <i onclick="deleteServices({{ $service->id }})"
                                                                                   class="fa fa-remove mt-2"
                                                                                   style="font-size:24px; color:red"></i>
                                                                            </li>
                                                                        @endforeach


                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <!-- specialization -->

                                                    <div class="col-lg-6">

                                                        <div class="card">
                                                            <div class="card-body">
                                                                <form id="specialization_form">
                                                                    <div class="row">
                                                                        <div class="col-md-8">
                                                                            <div class="form-group">

                                                                                <input type="text"
                                                                                       class="input-tags form-control"
                                                                                       placeholder="Enter Services"
                                                                                       name="specialization"
                                                                                       value="" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">

                                                                                <button type="submit"
                                                                                        class="btn btn-primary btn-block">
                                                                                    Add
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                                <div class="row">

                                                                    <ul class="list-group" id="specialization_list">
                                                                        @foreach($specialization as $specialization)
                                                                            <li id="specialization{{ $specialization->id }}"
                                                                                class="list-group-item">{{ $specialization->specialization }}
                                                                                <i onclick="deleteSpecialization({{ $specialization->id }})"
                                                                                   class="fa fa-remove mt-2"
                                                                                   style="font-size:24px; color:red"></i>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>


                                        </div>


                                    </div>
                                    <div class="tab-pane fade" id="nav-award" role="tabpanel"
                                         aria-labelledby="nav-award-tab">
                                        <!-- Pricing -->
                                        <form id="pricing_form">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="alert alert-warning alert-dismissible fade show"
                                                         id="price_alert" role="alert">
                                                        <strong>Price Saved Successfully</strong>
                                                        <button type="button" class="close" data-dismiss="alert"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <h4 class="card-title">Pricing</h4>

                                                    <div class="form-group mb-0">
                                                        <div id="pricing_select">
                                                            <div
                                                                class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" id="price_free"
                                                                       name="rating_option"
                                                                       class="custom-control-input"
                                                                       value="price_free"
                                                                       @if($doctor->doctor_fee == "free")checked @endif>
                                                                <label class="custom-control-label"
                                                                       for="price_free">Free</label>
                                                            </div>
                                                            <div
                                                                class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" id="price_custom"
                                                                       name="rating_option" value="custom_price"
                                                                       class="custom-control-input"
                                                                       @if($doctor->doctor_fee != "free")checked @endif>
                                                                <label class="custom-control-label"
                                                                       for="price_custom">Custom Price (per
                                                                    hour)</label>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row custom_price_cont" id="custom_price_cont"
                                                         style="display: none;">
                                                        <div class="col-md-4">
                                                            <input type="number" class="form-control"
                                                                   id="custom_rating_input"
                                                                   name="custom_rating_count"
                                                                   value="{{ ($doctor->doctor_fee != "free") ? $doctor->doctor_fee : '' }}">
                                                            <small class="form-text text-muted">Custom price you
                                                                can add</small>
                                                        </div>
                                                    </div>

                                                    <div class="row">

                                                        <button class="btn btn-primary ml-2 mt-3">Save Pricing</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </form>
                                        <!-- /Pricing -->

                                        <!-- Awards -->
                                        <div class="card">
                                            <div class="card-body">

                                                <form id="awards_form">
                                                    <h4 class="card-title">Awards</h4>

                                                    <div class="awards-info">
                                                        <div class="row form-row awards-cont" id="award_row1">
                                                            <div class="col-12 col-md-3">
                                                                <div class="form-group">
                                                                    <label>Awards</label>
                                                                    <input type="text" name="award_name"  required class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-5">
                                                                <div class="form-group">
                                                                    <label>Description</label>
                                                                    <input type="text"  name="description" required class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-3">
                                                                <div class="form-group">
                                                                    <label>Year</label>
                                                                    <input type="date" name="award_year" class="form-control" required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="add-more">
                                                        <button class="btn btn-primary">Save Award</button>
                                                    </div>
                                                </form>
                                                <div class="card mt-2">
                                                    <div class="body">
                                                        <table class="table table-hover">
                                                            <thead>
                                                            <tr>
                                                                <th scope="col">Award Name</th>
                                                                <th scope="col">Description</th>
                                                                <th scope="col">Year</th>
                                                                <th scope="col"></th>

                                                            </tr>
                                                            </thead>
                                                            <tbody id="awardTable">
                                                            @if(count($awards) != 0)
                                                                @foreach($awards as $award)
                                                                    <tr id="award{{$award->id}}">
                                                                        <td>{{ $award->award_name }}</td>
                                                                        <td>{{ $award->description }}</td>
                                                                        <td>{{ $award->year }}</td>
                                                                        <td>
                                                                            <button class="btn btn-danger"
                                                                                    onclick="deleteAward({{ $award->id  }})">
                                                                                Delete
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif


                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- /Awards -->


                                    </div>
                                    <div class="tab-pane fade" id="nav-experience" role="tabpanel"
                                         aria-labelledby="nav-experience-tab">

                                        <!-- Experience -->

                                        <form id="experience_form">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title">Experience</h4>
                                                    <div class="experience-info">
                                                        <div class="row form-row experience-cont">
                                                            <div class="col-12 col-md-10 col-lg-11">
                                                                <div class="row form-row">
                                                                    <div class="col-12 col-md-6 col-lg-4">
                                                                        <div class="form-group">
                                                                            <label>Hospital Name</label>
                                                                            <input type="text"
                                                                                   class="form-control" required
                                                                                   name="hospital_name">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 col-lg-4">
                                                                        <div class="form-group">
                                                                            <label>From</label>
                                                                            <input type="date"
                                                                                   class="form-control" required
                                                                                   name="from">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 col-lg-4">
                                                                        <div class="form-group">
                                                                            <label>To</label>
                                                                            <input type="date"
                                                                                   class="form-control" required
                                                                                   name="to">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 col-lg-4">
                                                                        <div class="form-group">
                                                                            <label>Designation</label>
                                                                            <input type="text"
                                                                                   class="form-control" required
                                                                                   name="designation">
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="form-row">

                                                                <div class="form-group">
                                                                    <button class="btn btn-primary  ml-2">Add Record
                                                                    </button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                        <div class="card">
                                            <div class="body">
                                                <table class="table table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">Hospital Name</th>
                                                        <th scope="col">From</th>
                                                        <th scope="col">to</th>
                                                        <th scope="col">designation</th>
                                                        <th scope="col"></th>

                                                    </tr>
                                                    </thead>
                                                    <tbody id="experience_list">
                                                    @if(count($experience) != 0)
                                                        @foreach($experience as $experience)
                                                            <tr id="{{ 'experience'.$experience->id }}">
                                                                <td>{{ $experience->hospital_name }}</td>
                                                                <td>{{ $experience->from }}</td>
                                                                <td>{{ $experience->to }}</td>
                                                                <td>{{ $experience->designation }}</td>
                                                                <td>
                                                                    <button class="btn btn-danger"
                                                                            onclick="deleteExperience({{ $experience->id  }})">
                                                                        Delete
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <!-- /Experience -->


                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('MyScript')
    <script>

        $(document).ready(function () {

            //saving education
            var qualificationID;

            $("#education").submit(function (e) {
                e.preventDefault()
                var token = $("input[name=_token]").val();
                var degree_name = $("input[name=degree_name]").val();
                var institute_name = $("input[name=institute_name]").val();
                var rocurment_year = $("input[name=rocurment_year]").val();
                $.post("{{ route('doctor.education') }}",
                    {
                        degree_name: degree_name,
                        institute_name: institute_name,
                        rocurment_year: rocurment_year,
                        _token: token,
                    },
                    function (data, status) {

                        if (status == 'success') {
                            $("#qualificationTable").append("<tr id='" + data[0] + "'><td>" + data[1] + "</td><td>" + data[2] + "</td><td>" + data[3] + "</td><td><button class='btn btn-danger' onclick='deleteQualification(" + data[0] + ")'>Delete</button></td></tr>");
                            $("input[name=degree_name]").val('');
                            $("input[name=institute_name]").val('');
                            $("input[name=rocurment_year]").val('');
                        } else
                            alert('Something Wrong. Data no Inserted')
                    });

            });


            // saving clinic form data
            $("#clinic_form").submit(function (e) {
                e.preventDefault()
                var token = $("input[name=_token]").val();
                var clinic_name = $("input[name=clinic_name]").val();
                var clinic_address = $("input[name=clinic_address]").val();

                $.post("{{ route('doctor.clinic') }}",
                    {
                        clinic_name: clinic_name,
                        clinic_address: clinic_address,
                        _token: token,
                    },
                    function (data, status) {

                        if (status == 'success') {
                            if (data[0]) {
                                alert("Data Saved Successfuly");
                            } else {

                            }

                        } else
                            alert('Something Wrong. Data no Inserted')
                    });


            });

            // saving service form data
            $("#services_form").submit(function (e) {
                e.preventDefault()

                var token = $("input[name=_token]").val();
                var services = $("input[name=services]").val();

                $.post("{{ route('doctor.services') }}",
                    {
                        services: services,

                        _token: token,
                    },
                    function (data, status) {

                        if (status == 'success') {
                            if (data[0]) {
                                $("#services_list").append('<li id="service' + data[1] + '" class="list-group-item">' + data[2] + '<i class="fa fa-remove mt-2" onclick="deleteServices(' + data[1] + ')"  style="font-size:24px; color:red"></i> </li>');
                                $("input[name=services]").val('');
                            } else {
                                alert('Something Wrong. Data not Saved');
                            }

                        } else
                            alert('Something Wrong. Data not Saved');
                    });


            });

            // saving specilization form data
            $("#specialization_form").submit(function (e) {
                e.preventDefault()

                var token = $("input[name=_token]").val();
                var specialization = $("input[name=specialization]").val();

                $.post("{{ route('doctor.specialization') }}",
                    {
                        specialization: specialization,
                        _token: token,
                    },
                    function (data, status) {

                        if (status == 'success') {
                            if (data[0]) {

                                $("#specialization_list").append('<li id="specialization' + data[1] + '" class="list-group-item">' + data[2] + '<i class="fa fa-remove mt-2" onclick="deleteSpecialization(' + data[1] + ')"  style="font-size:24px; color:red"></i> </li>');
                                $("input[name=specialization]").val('');
                            } else {
                                alert('Something Wrong. Data not Saved');
                            }

                        } else
                            alert('Something Wrong. Data not Saved');
                    });


            });

            // saving experience form data
            $("#experience_form").submit(function (e) {

                e.preventDefault()

                var token = $("input[name=_token]").val();
                var hospital_name = $("input[name=hospital_name]").val();
                var from = $("input[name=from]").val();
                var to = $("input[name=to]").val();
                var designation = $("input[name=designation]").val();
                $.post("{{ route('doctor.experience') }}",
                    {
                        hospital_name: hospital_name,
                        from: from,
                        to: to,
                        designation: designation,
                        _token: token,
                    },
                    function (data, status) {

                        if (status == 'success') {
                            alert('sucess');
                            if (data[0]) {

                                $("#experience_list").append('<tr id="experience' + data[1] + ' "> <td>' + data[2] + '</td> <td>' + data[3] + '</td> <td>' + data[4] + '</td> <td>' + data[5] + '</td> <td> <button class="btn btn-danger"onclick="deleteExperience(' + data[1] + ')">Delete </button> </td> </tr>');

                                $("input[name=hospital_name]").val('');
                                $("input[name=from]").val('');
                                $("input[name=to]").val('');
                                $("input[name=designation]").val('');
                            } else {
                                alert('Something Wrong. Data not Saved');
                            }

                        } else
                            alert('Something Wrong. Data not Saved');
                    });


            });


            //pricing
            var price;
            $("#pricing_form").submit(function (e) {

                e.preventDefault()

                var token = $("input[name=_token]").val();

                if ($("#price_free").prop("checked")) {
                    price = 'free';

                } else if ($("#price_custom").prop("checked")) {
                    price = $("input[id=custom_rating_input]").val();

                }
                if (price) {
                    $('#price_alert').hide();
                    $.post("{{ route('doctor.fee') }}",
                        {
                            fee: price,
                            _token: token,
                        },
                        function (data, status) {

                            if (status == 'success') {

                                if (data[0]) {
                                    $('#price_alert').show();
                                    if (data[1] == 'free')
                                        $('#custom_price_cont').hide();

                                } else {
                                    alert('Something Wrong. Price not Saved');
                                }

                            } else
                                alert('Something Wrong. Price not Saved');
                        });
                } else
                    alert('Please Enter Valid Fee');


            });

            //saving Awards

            $("#awards_form").submit(function (e) {
                e.preventDefault()
                var token = $("input[name=_token]").val();
                var award_name = $("input[name=award_name]").val();
                var description = $("input[name=description]").val();
                var year = $("input[name=award_year]").val();

                $.post("{{ route('doctor.award') }}",
                    {
                        award_name: award_name,
                        description: description,
                        year: year,
                        _token: token,
                    },
                    function (data, status) {

                        if (status == 'success') {

                            $("#awardTable").append('<tr id="award'+ data[1] +'"><td>'+ data[2] +'</td> <td>'+ data[3] +'</td> <td>'+ data[4] +'</td> <td> <button class="btn btn-danger"onclick="deleteAward('+ data[1] +')">Delete </button> </td> </tr>');
                            $("input[name=award_name]").val("");
                            $("input[name=description]").val("");
                            $("input[name=award_year]").val("");
                        } else
                            alert('Something Wrong. Data no Inserted')
                    });

            });

        });

        function deleteQualification(id) {
            qualificationID = id;
            $('#delete_education').modal('show');
        }

        function confirmDeleteQualification() {


            $('#delete_education').modal('hide');
            var token = $("input[name=_token]").val();

            $.post("{{ route('doctor.education.delete') }}",
                {
                    id: qualificationID,
                    _token: token,
                },
                function (data, status) {

                    if (status == 'success') {
                        if (data[0]) {

                            $('#' + data[1]).remove()
                        }

                    } else
                        alert('Something Wrong. Data not Inserted')
                });
        }

        var serviceID;

        function deleteServices(id) {
            serviceID = id;
            $('#delete_service').modal('show');
        }

        function confirmDeleteService() {

            $('#delete_service').modal('hide');
            $.get("{{ route('doctor.services.delete') }}",
                {
                    id: serviceID,

                },
                function (data, status) {
                    if (data[0]) {
                        $('#service' + data[1]).remove();
                    } else
                        alert("Something Wrong. Data not Deleted")

                });
        }

        //specialization


        function deleteSpecialization(id) {
            alert(id);
            specialization = id;
            $('#delete_specialization_modal').modal('show');
        }

        function confirmDeleteSpecialization() {

            $('#delete_specialization_modal').modal('hide');

            $.get("{{ route('doctor.specialization.delete') }}",
                {
                    id: specialization,

                },
                function (data, status) {

                    if (data[0]) {

                        $('#specialization' + data[1]).remove();
                    } else
                        alert("Something Wrong. Data not Deleted")

                });
        }

        //experience
        var experieneID;

        function deleteExperience(id) {
            experieneID = id;
            $('#delete_experience_modal').modal('show');

        }

        function confirmDeleteExperience() {
            $('#delete_experience_modal').modal('hide');

            $.get("{{ route('doctor.experience.delete') }}",
                {
                    id: experieneID,

                },
                function (data, status) {

                    if (data[0]) {

                        $('#experience' + data[1]).remove();
                    } else
                        alert("Something Wrong. Data not Deleted")

                });
        }


        //pricing
        $('#price_free').click(function () {
            $('#custom_price_cont').hide();
        });
        $('#price_custom').click(function () {
            $('#custom_price_cont').show();
        });

        $('#price_alert').hide();

        @if($doctor->doctor_fee != 'free')
        $('#custom_price_cont').show();
        @endif





        var waradID;
        function deleteAward(rowID) {
            waradID=rowID;
            $("#delete_award_modal").modal('show');

        }
        function confirmDeleteAward() {

            $('#delete_award_modal').modal('hide');

            $.get("{{ route('doctor.award.delete') }}",
                {
                    id: waradID,

                },
                function (data, status) {

                    if (data[0]) {

                        $("#award" +data[1]).remove();
                    } else
                        alert("Something Wrong. Data not Deleted")

                });
        }

    </script>
@endsection

@section('Modal')

    <!-- Cancel Appointment -->
    <div class="modal fade" id="delete_education" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Deleting Record</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">
                        <strong>Warning!</strong> Are sure you want to delete this record.
                    </div>

                </div>
                <div class="modal-footer">


                    <input type="text" readonly name="appointment_id" id="id" value="" hidden>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" onclick="confirmDeleteQualification()">Delete Record
                    </button>

                </div>
            </div>
        </div>
    </div>

    <!-- Delete Service -->
    <div class="modal fade" id="delete_service" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Deleting Services</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">
                        <strong>Warning!</strong> Are sure you want to delete this record.
                    </div>

                </div>
                <div class="modal-footer">


                    <input type="text" readonly name="appointment_id" id="id" value="" hidden>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" onclick="confirmDeleteService()">Delete Record
                    </button>

                </div>
            </div>
        </div>
    </div>

    <!-- Delete Specialization-->
    <div class="modal fade" id="delete_specialization_modal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Deleting Specialization</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">
                        <strong>Warning!</strong> Are sure you want to delete this record.
                    </div>

                </div>
                <div class="modal-footer">


                    <input type="text" readonly name="appointment_id" id="id" value="" hidden>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" onclick="confirmDeleteSpecialization()">Delete Record
                    </button>

                </div>
            </div>
        </div>
    </div>

    <!-- Delete Experience-->
    <div class="modal fade" id="delete_experience_modal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Deleting Experience Details</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">
                        <strong>Warning!</strong> Are sure you want to delete this record.
                    </div>

                </div>
                <div class="modal-footer">


                    <input type="text" readonly name="appointment_id" id="id" value="" hidden>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" onclick="confirmDeleteExperience()">Delete Record
                    </button>

                </div>
            </div>
        </div>
    </div>

    <!-- Delete Award-->
    <div class="modal fade" id="delete_award_modal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Deleting Award Details</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">
                        <strong>Warning!</strong> Are sure you want to delete this record.
                    </div>

                </div>
                <div class="modal-footer">


                    <input type="text" readonly name="appointment_id" id="id" value="" hidden>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" onclick="confirmDeleteAward()">Delete Record
                    </button>

                </div>
            </div>
        </div>
    </div>

@endsection

