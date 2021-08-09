@extends('admin.layouts.master')

@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Manage Doctor</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item active">Manage Doctor</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            @livewire('admin.search-doctor')

        </div>
    </div>
    <!-- /Page Wrapper -->

@endsection


@section('custom-script')
    <script>

        function blockDoctor(id) {
            if (confirm("Do you want to Block Doctor!")) {


                $.get("{{ route('admin.manage.doctor.block') }}",
                    {
                        id: id,

                    },
                    function (data, status) {

                        if (data[0]) {
                            alert('Doctor Blocked Successfully');
                            $("#block_doctor"+data[1]).attr("class","btn btn-secondary");

                            $("#block_doctor"+data[1]).text("unblock Doctor");
                            $("#block_doctor"+data[1]).attr("onclick","unblockDoctor('"+data[1]+"')");
                            $("#block_doctor"+data[1]).attr("id","unblock_doctor"+data[1]);

                        } else
                            alert("Something Wrong. Data not Deleted")

                    });
            } else {

            }


        }

        function unblockDoctor(id) {

            if (confirm("Do you want to unBlock Doctor!")) {


                $.get("{{ route('admin.manage.doctor.unblock') }}",
                    {
                        id: id,

                    },
                    function (data, status) {
                        if (data[0]) {
                            $("#unblock_doctor"+data[1]).attr("class","btn btn-danger");

                            $("#unblock_doctor"+data[1]).text("block Doctor");
                            $("#unblock_doctor"+data[1]).attr("onclick","blockDoctor('"+data[1]+"')");
                            $("#unblock_doctor"+data[1]).attr("id","block_doctor"+data[1]);
                        } else
                            alert("Something Wrong. Data not Deleted")

                    });
            } else {

            }
        }
    </script>
@endsection
