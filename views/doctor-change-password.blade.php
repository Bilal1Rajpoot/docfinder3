@extends('layouts.master')

@section('title', 'Change Password')

@section('content')


<div class="col-md-7 col-lg-8 col-xl-9">
@if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                            @endif
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 col-lg-6">

                    <!-- Change Password Form -->
                    <form action='changePassword' method='POST' enctype='multipart/form-data'>
                        @csrf
                        <div class="form-group">
                            <label>Old Password</label>
                            <input type="password" name='oldPassword' class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" name='password' class="form-control" minlength="8" required>
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name='confirmPassword' minlength="8" class="form-control" required>
                        </div>
                        <div class="submit-section">
                            <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                        </div>
                    </form>
                    <!-- /Change Password Form -->

                </div>
            </div>
        </div>
    </div>
</div>
@endsection