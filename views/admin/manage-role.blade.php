@extends('admin.layouts.master')

@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Manage Role</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item active">Manage Role</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="card">
                <div class="card-body">
                    @if(session()->has('message'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong> {{ session()->get('message') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                    @endif
                    <div class="row">
                        <div class="col-sm-12">
                            <a class="edit-link" data-toggle="modal" data-target="#add_new_role"
                               href=""><i class="fa fa-edit mr-1"></i>Add New Role</a>
                        </div>
                    </div>

                    <!-- Admin List -->
                    <div class="card card-table flex-fill mt-3">
                        <div class="card-header">
                            <h4 class="card-title">Admin List</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-center mb-0">
                                    <thead>
                                    <tr>
                                        <th>Admin Name</th>

                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @forelse ($admins as $user)

                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="#" class="avatar avatar-sm mr-2"><img
                                                            class="avatar-img rounded-circle"
                                                            src="{{ $user->image_path ? asset('ad/images/'.$user->image_path) : asset('images/default-admin.jpg') }}"
                                                            alt="User Image"></a>
                                                    <a href="profile.html">Mr. {{ $user->first_name." ".$user->last_name }}</a>
                                                </h2>
                                            </td>


                                            <td>
                                                {{ $user->role }}
                                            </td>
                                            <td>
                                                @if($user->role == 'super admin')
                                                    <button class="btn btn-light" data-toggle="modal"
                                                            data-target="#adminID{{ $user->id }}"><i class="fa fa-eye"></i> View
                                                    </button>
                                                @else
                                                    <button class="btn btn-light" data-toggle="modal"
                                                            data-target="#adminID{{ $user->id }}"><i class="fa fa-eye"></i> View
                                                    </button>
                                                    <button class="btn btn-danger" onclick="deleteRole('{{ $user->id }}')"><i class="fa fa-eye"></i> Delete Role
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>


                                    @empty
                                        <p>No users</p>
                                    @endforelse


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>
    <!-- /Page Wrapper -->

    <!-- Edit Details Modal -->
    <div class="modal fade" id="add_new_role" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Admin Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.role.create') }}">
                        @csrf
                        <div class="row form-row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" name="first_name" required
                                           class="form-control @error('first_name') is-invalid @enderror"
                                           value="{{ old('first_name') }}">
                                    @error('first_name')
                                    <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" name="last_name" required
                                           class="form-control @error('last_name') is-invalid @enderror"
                                           value="{{ old('last_name') }}">
                                    @error('last_name')
                                    <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Email ID</label>
                                    <input type="email" name="email" required
                                           class="form-control @error('email') is-invalid @enderror"
                                           value="{{ old('email') }}">
                                    @error('email')
                                    <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Default Passwordd</label>
                                    <input type="text" name="password" required value="admin@123" class="form-control">
                                </div>
                            </div>
                            <div class="col-12">
                                <h5 class="form-title"><span>Role</span></h5>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Role</label>
                                    <select class="custom-select @error('role') is-invalid @enderror" name="role"
                                            required id="inputGroupSelect01">

                                        <option value="admin">Admin</option>
                                        <option value="super admin">Super Admin</option>
                                        <option value="manager">Manager</option>
                                    </select>
                                    @error('role')
                                    <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Edit Details Modal -->


    @forelse ($admins as $admin)
        <!-- View Profile -->
        <div class="modal fade" id="adminID{{ $admin->id }}" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
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
                                <div class="user-Location"><i class="fa fa-map-marker"></i> {{$admin->city}}
                                    , {{ $admin->country }}</div>
                                <div class="about-text">{{ $admin->country }}
                                </div>
                            </div>

                            <div class="col-auto profile-btn">


                            </div>
                        </div>

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
                                            </h5>
                                            <div class="row">
                                                <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
                                                <p class="col-sm-10">{{ $admin->first_name." ".$admin->last_name }}</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Date of
                                                    Birth</p>
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


                                </div>


                            </div>
                            <!-- /Personal Details -->

                        </div>
                        <!-- /Personal Details Tab -->


                    </div>
                </div>
            </div>
        </div>
        <!-- /Edit Details Modal -->
    @empty
        <p>No users</p>
    @endforelse




@endsection

@section('custom-script')
    <script>
        @if(session()->has('errors'))

        $('#add_new_role').modal('show');

        @endif

        function deleteRole(id)
        {

            if (confirm("Do you want to delete!")) {



                $.get("{{ route('admin.role.delete') }}",
                    {
                        id: id,

                    },
                    function (data, status) {
                        if (data[0]) {
                            window.location.replace("{{route('admin.roles')}}");
                        } else
                            alert("Something Wrong. Data not Deleted")

                    });
            } else {

            }
        }

    </script>
@endsection



