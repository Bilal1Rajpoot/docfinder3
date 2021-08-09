<div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <H4>Search Doctor</H4>
                </div>
                <div class="card-body">

                    @if(session()->has('message'))
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>{{ session('message') }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="row">

                        <div class="top-nav-search">
                            <form  wire:submit.prevent="submit">

                                <input type="text" class="form-control"  wire:model.defer="search" placeholder="Search Doctor by ID or Name" >
                                <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <table class="datatable table table-hover table-center mb-0">
                                <thead>
                                <tr>
                                    <th>Doctor Name</th>
                                    <th>Member Since</th>
                                    <th>licence Number</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($doctors as $doctor)
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="{{ url('doctor/'.$doctor->id) }}" target="_blank" class="avatar avatar-sm mr-2"><img
                                                        class="avatar-img rounded-circle"
                                                        src="{{ $doctor->image_path ? asset('images/'.$doctor->image_path) : asset('images/default-doctor.jpg') }}"
                                                        alt="User Image"></a>
                                                <a href="{{ url('doctor/'.$doctor->id) }}" target="_blank">Dr. {{ $doctor->first_name." ".$doctor->last_name }}</a>
                                            </h2>
                                        </td>


                                        <td>{{ \Illuminate\Support\Carbon::parse($doctor->created_at)->format('d M Y') }}
                                            <br><small>{{ \Illuminate\Support\Carbon::parse($doctor->created_at)->format('g:i A') }}</small>
                                        </td>
                                        <td>{{ $doctor->licence_number }}</td>

                                        <td>

                                            @if($doctor->is_verified == false)
                                                <button class="btn btn-primary" wire:click="verify({{$doctor->id}})">Verify</button>
                                                <a href="https://www.pmc.gov.pk/Doctors/Search"  target="_blank">Go to PMC</a>
                                            @else
                                                <a class="btn btn-success"><i class="fa fa-check"></i>Verified</a>
                                            @endif


                                        </td>
                                    </tr>
                                @empty
                                    <p>No users found</p>
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
