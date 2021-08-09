<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Docfinder</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('ad/assets/img/favicon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('ad/assets/css/bootstrap.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('ad/assets/css/font-awesome.min.css') }}">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{ asset('ad/assets/css/feathericon.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('ad/assets/css/style.css') }}">

<!--[if lt IE 9]>
    <script src="{{ asset('ad/assets/js/html5shiv.min.js') }}"></script>
    <script src="{{ asset('ad/assets/js/respond.min.js') }}"></script>
    <![endif]-->
</head>
<body>

<!-- Main Wrapper -->
<div class="main-wrapper login-body">
    <div class="login-wrapper">
        <div class="container">
            <div class="loginbox">
                <div class="login-left" style="background: #15558d">
                    <img class="img-fluid" src="{{ asset('ad/assets/img/footer-logo.png') }}" alt="Logo"
                         style="width: 300px; height: 300px; ">
                </div>
                <div class="login-right">
                    <div class="login-right-wrap">
                        <h1>Admin Login</h1>


                        <!-- Form -->
                        <form action="{{ route('admin.authenticate') }}" method="post" >

                            @csrf

                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif

                            <div class="form-group">
                                <input type="email" name="email" value="{{ old('email') }}" required class="form-control floating @error('email') is-invalid @enderror" placeholder="Email">
                                @error('email')
                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" required class="form-control floating @error('password') is-invalid @enderror" placeholder="Password" >
                                @error('password')
                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit">Login</button>
                            </div>
                        </form>
                        <!-- /Form -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Main Wrapper -->

<!-- jQuery -->
<script src="{{ asset('ad/assets/js/jquery-3.2.1.min.js') }}"></script>

<!-- Bootstrap Core JS -->
<script src="{{ asset('ad/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('ad/assets/js/bootstrap.min.js') }}"></script>

<!-- Slimscroll JS -->
<script src="{{ asset('ad/assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

<!-- Custom JS -->
<script src="{{ asset('ad/assets/js/script.js') }}"></script>

</body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Dec 2020 06:24:24 GMT -->
</html>
