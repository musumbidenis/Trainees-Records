@extends('layouts.main')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Users Table</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            {!! $dataTable->table() !!}
                            {{-- <table class="table table-striped align-items-center justify-content-center mb-5" id="user">
                                <thead>
                                    <tr>
                                        <th class="text-capitalize text-secondary text-s fw-bold opacity-10">
                                            No</th>
                                        <th class="text-capitalize text-secondary text-s fw-bold opacity-10">
                                            First_name</th>
                                        <th class="text-capitalize text-secondary text-s fw-bold opacity-10">
                                            Surname</th>
                                        <th class="text-capitalize text-secondary text-s fw-bold opacity-10">
                                            Email_address</th>
                                        <th class="text-capitalize text-secondary text-s fw-bold opacity-10">
                                            Role</th>
                                        <th class="text-capitalize text-secondary text-s fw-bold opacity-10">
                                            Created_at</th>
                                        <th class="text-capitalize text-secondary text-s fw-bold text-center opacity-7">
                                            Updated_at</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    {!! $dataTable->scripts() !!}
    {{-- <script>
        $(document).ready(function() {
            //CORS
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#user').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: "{{ url('users') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'first_name',
                        name: 'first_name'
                    },
                    {
                        data: 'surname',
                        name: 'surname'
                    },
                    {
                        data: 'email_address',
                        name: 'email_address'
                    },
                    {
                        data: 'role',
                        name: 'role'
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                ]
            });
            var table = $('#user').DataTable();
            table.on('click', '#edit', function() {
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                alert(data);
            });
        });
    </script> --}}
@endsection
