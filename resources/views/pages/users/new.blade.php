@extends('layouts.main')
@section('content')
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-9 col-12 mx-auto position-relative">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-dark shadow text-center border-radius-xl mt-n4 me-3 float-start">
                            <i class="material-icons opacity-10">person_add</i>
                        </div>
                        <h6 class="mb-0">New User</h6>
                    </div>
                    <div class="card-body pt-2">
                        <form id="new_user_form" action="/users" method="post">
                            {{ csrf_field() }}

                            <div class="input-group input-group-static my-4">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" name="first_name" id="first_name"
                                    value="{{ old('first_name') }}">
                            </div>
                            <div class="input-group input-group-static my-4">
                                <label for="surname">Surname</label>
                                <input type="text" class="form-control" name="surname" id="surname"
                                    value="{{ old('surname') }}">
                            </div>
                            <div class="input-group input-group-static my-4">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" name="email_address" id="email"
                                    value="{{ old('email_address') }}">
                            </div>
                            <div class="select my-4">
                                <select class="selectpicker col-lg-12 col-md-12" name="role" id="role">
                                    <option disabled selected value="">Select Role</option>
                                    <option value="admin">Administrator</option>
                                    <option value="HOD">Head of Department</option>
                                    <option value="deputy_HOD">Deputy HOD</option>
                                </select>
                            </div>
                            <div class="d-flex justify-content-end mt-4">
                                <button type="submit" name="button" class="btn bg-gradient-dark m-0 ms-2">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#new_user_for').validate({
                rules: {
                    first_name: {
                        required: true
                    },
                    surname: {
                        required: true,
                    },
                    email_address: {
                        required: true,
                        email: true
                    },
                    role: {
                        required: true,
                    },
                },
                messages:{
                    first_name:'Please fill out this field.',
                    surname:'Please fill out this field.',
                    email_address:{
                        required:'Please enter an email address.',
                        email:'Please enter a valid email address.',
                    },
                    role:'Please select a role in the list.',
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.input-group').append(error);
                    element.closest('.select').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endsection
