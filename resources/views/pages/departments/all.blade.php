@extends('layouts.main')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Departments Table</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped align-items-center justify-content-center mb-5" id="dept">
                                <thead>
                                    <tr>
                                        <th class="text-capitalize text-secondary text-s fw-bold opacity-10">
                                            Dept_id</th>
                                        <th
                                            class="text-capitalize text-secondary text-s fw-bold opacity-10">
                                            Dept_name</th>
                                        <th
                                            class="text-capitalize text-secondary text-s fw-bold opacity-10">
                                            Created_at</th>
                                        <th
                                            class="text-capitalize text-secondary text-s fw-bold text-center opacity-7">
                                            Updated_at</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            //CORS
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#dept').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: "{{ url('departments') }}",
                columns: [{
                        data: 'dept_id',
                        name: 'dept_id'
                    },
                    {
                        data: 'dept_name',
                        name: 'dept_name'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at'
                    }
                ]
            });
        });
    </script>
@endsection
