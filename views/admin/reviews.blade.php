@extends('admin.layouts.master')

@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Reviews</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Reviews</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="datatable table table-hover table-center mb-0">
                                    <thead>
                                    <tr>
                                        <th>Patient Name</th>
                                        <th>Doctor Name</th>
                                        <th>Ratings</th>
                                        <th>Description</th>
                                        <th>Date</th>

                                    </tr>
                                    </thead>
                                    <tbody>

                                    @forelse ($reviews as $review)
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{ $review->patient->image_path ? asset('images/'.$review->patient->image_path) : asset('images/default-patient.jpg') }}" alt="User Image"></a>
                                                    <a href="profile.html">{{ $review->patient->first_name." ".$review->patient->last_name }} </a>
                                                </h2>
                                            </td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{ $review->doctor->image_path ? asset('images/'.$review->doctor->image_path) : asset('images/default-doctor.jpg') }}" alt="User Image"></a>
                                                    <a href="profile.html">Dr. {{ $review->doctor->first_name.' '.$review->doctor->last_name }}</a>
                                                </h2>
                                            </td>

                                            <td>
                                                <div class=" rating">

                                                    @if($review->rating == 1)
                                                        <i class="fe fe-star text-warning"></i>
                                                        <i class="fe fe-star-o text-secondary"></i>
                                                        <i class="fe fe-star-o text-secondary"></i>
                                                        <i class="fe fe-star-o text-secondary"></i>
                                                        <i class="fe fe-star-o text-secondary"></i>
                                                    @elseif($review->rating == 2)
                                                        <i class="fe fe-star text-warning"></i>
                                                        <i class="fe fe-star text-warning"></i>

                                                        <i class="fe fe-star-o text-secondary"></i>
                                                        <i class="fe fe-star-o text-secondary"></i>
                                                        <i class="fe fe-star-o text-secondary"></i>
                                                    @elseif($review->rating == 3)
                                                        <i class="fe fe-star text-warning"></i>
                                                        <i class="fe fe-star text-warning"></i>
                                                        <i class="fe fe-star text-warning"></i>

                                                        <i class="fe fe-star-o text-secondary"></i>
                                                        <i class="fe fe-star-o text-secondary"></i>
                                                    @elseif($review->rating == 4)
                                                        <i class="fe fe-star text-warning"></i>
                                                        <i class="fe fe-star text-warning"></i>
                                                        <i class="fe fe-star text-warning"></i>
                                                        <i class="fe fe-star text-warning"></i>
                                                        <i class="fe fe-star-o text-secondary"></i>
                                                    @elseif($review->rating == 5)
                                                        <i class="fe fe-star text-warning"></i>
                                                        <i class="fe fe-star text-warning"></i>
                                                        <i class="fe fe-star text-warning"></i>
                                                        <i class="fe fe-star text-warning"></i>
                                                        <i class="fe fe-star text-warning"></i>

                                                    @else
                                                        <i class="fe fe-star-o text-secondary"></i>
                                                        <i class="fe fe-star-o text-secondary"></i>
                                                        <i class="fe fe-star-o text-secondary"></i>
                                                        <i class="fe fe-star-o text-secondary"></i>
                                                        <i class="fe fe-star-o text-secondary"></i>
                                                    @endif

                                            </td>

                                            <td>
                                                {{ $review->review }}
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($review->created_at)->format('d M Y') }}</td>

                                        </tr>
                                    @empty
                                        <div class="card">
                                            <div class="card-body">
                                                <h3 class="text-wrap badge badge-primary text-lg">
                                                    No review Found!
                                                </h3>

                                            </div>
                                        </div>
                                    @endforelse


                                    </tbody>
                                </table>


                                <div class="d-flex justify-content-center">
                                    {{ $reviews->links() }}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /Page Wrapper -->

    <!-- Delete Modal -->
    <div class="modal fade" id="delete_modal" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document" >
            <div class="modal-content">
                <!--	<div class="modal-header">
                        <h5 class="modal-title">Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>-->
                <div class="modal-body">
                    <div class="form-content p-2">
                        <h4 class="modal-title">Delete</h4>
                        <p class="mb-4">Are you sure want to delete?</p>
                        <button type="button" class="btn btn-primary">Save </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Delete Modal -->

@endsection
