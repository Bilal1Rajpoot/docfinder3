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
                            <form wire:submit.prevent="submit">

                                <input type="text" class="form-control" wire:model.defer="search"
                                       placeholder="Search Doctor by Name or ID">
                                <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <table class="datatable table table-hover table-center mb-0">
                            <thead>
                            <tr>
                                <th>Doctor Name</th>
                                <th>Speciality</th>
                                <th>Member Since</th>

                                <th>Account Status</th>

                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($doctors as $doctor)
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="3" class="avatar avatar-sm mr-2"><img
                                                    class="avatar-img rounded-circle"
                                                    src="{{ $doctor->image_path ? asset('images/'.$doctor->image_path) : asset('images/default-doctor.jpg') }}"
                                                    alt="User Image"></a>
                                            <a href="profile.html">Dr. {{ $doctor->first_name." ".$doctor->last_name }}</a>
                                        </h2>
                                    </td>
                                    <td>{{ $doctor->specialization->first()->specialization }}</td>

                                    <td>{{ \Illuminate\Support\Carbon::parse($doctor->created_at)->format('d M Y') }}
                                        <br><small>{{ \Illuminate\Support\Carbon::parse($doctor->created_at)->format('g:i A') }}</small>
                                    </td>


                                    <td>
                                        @if($doctor->status == 'active' or $doctor->status == null )
                                            <button class="btn btn-danger" wire:click="blockDoctor({{$doctor->id}})">
                                                Block Doctor
                                            </button>
                                        @elseif($doctor->status == 'blocked')
                                            <button class="btn btn-secondary"
                                                    wire:click="unblockDoctor({{$doctor->id}})">unblock Doctor
                                            </button>


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
