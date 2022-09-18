@extends('layouts.main')
@section('content')
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-9 col-12 mx-auto position-relative">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-dark shadow text-center border-radius-xl mt-n4 me-3 float-start">
                            <i class="material-icons opacity-10">library_add</i>
                        </div>
                        <h6 class="mb-0">New Student</h6>
                    </div>
                    <div class="card-body pt-2">
                        <div class="row">
                            <div class="col-12 text-center">
                                <h1 class="font-weight-bolder opacity-10">Upload Excel Form</h1>
                            </div>
                            <div class="input-group input-group-dynamic mt-4">
                                {{-- <label class="form-label">Import Student Details</label> --}}
                                <form id="importStudents" method="post" enctype="multipart/form-data" action="{{ url('/students_import') }}">
                                    {{ csrf_field() }}

                                      <div class="form-group form-file-upload form-file-multiple">
                                        <input type="file" name="excel" class="inputFileHidden">
                                        <div class="input-group">
                                            <input type="submit" name="upload" class="btn btn-primary ml-3" value="Upload">
                                        </div>
                                      </div>
                                    </form>
                            </div>
                            <div class="col-12 text-center">
                                <h1 class="font-weight-bolder opacity-10 my-5">OR</h1>
                            </div>
                            <form id="new_student_form" action="/students" method="post">
                                {{ csrf_field() }}

                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-group input-group-static my-4">
                                            <label for="adm">Admission Number</label>
                                            <input type="text" class="form-control" name="adm_no" id="adm_no"
                                                value="{{ old('adm_no') }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group input-group-static my-4">
                                            <label for="first_name">First Name</label>
                                            <input type="text" class="form-control" name="first_name" id="first_name"
                                                value="{{ old('first_name') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-group input-group-static my-4">
                                            <label for="surname">Surname</label>
                                            <input type="text" class="form-control" name="surname" id="surname"
                                                value="{{ old('surname') }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group input-group-static my-4">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" name="email" id="email"
                                                value="{{ old('email') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-group input-group-static my-4">
                                            <label for="phone">Phone</label>
                                            <input type="phone" class="form-control" name="phone" id="phone"
                                                value="{{ old('phone') }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group input-group-static my-4">
                                            <label for="phone">Joining Date</label>
                                            <input class="form-control datepicker" placeholder="Select date" type="text"
                                                onfocus="focused(this)" onfocusout="defocused(this)" name="joining_year"
                                                id="joining_year">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="input-group input-group-static my-4">
                                            <label for="phone">Expected Completion Date</label>
                                            <input class="form-control datepicker" placeholder="Select date" type="text"
                                                onfocus="focused(this)" onfocusout="defocused(this)" name="completion_year"
                                                id="completion_year">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="select my-4">
                                            <label for="phone">Department</label>
                                            <select class="selectpicker col-lg-12 col-md-12" name="dept"
                                                id="dept">
                                                <option disabled selected value="">Select Department</option>
                                                @foreach ($departments as $department)
                                                    <option value={{ $department->dept_id }}>{{ $department->dept_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="select my-4">
                                            <label for="phone">Programme</label>
                                            <select class="selectpicker col-lg-12 col-md-12" data-style="bs-primary"
                                                name="programme" id="programme">
                                                <option disabled selected value="">Select Programme</option>
                                                @foreach ($programmes as $programme)
                                                    <option value={{ $programme->programme_id }}>
                                                        {{ $programme->programme_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
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
        <script src="../assets/js/plugins/dropzone.min.js"></script>
        <script>
            Dropzone.autoDiscover = false;
            var drop = document.getElementById('dropzone')
            var myDropzone = new Dropzone(drop, {
                url: "/file/post",
                addRemoveLinks: true

            });
        </script>
        <script>
            $(document).ready(function() {
                $('#new_student_form').validate({
                    rules: {
                        adm_no: {
                            required: true
                        },
                        first_name: {
                            required: true
                        },
                        surname: {
                            required: true
                        },
                        email: {
                            required: true,
                            email: true,
                        },
                        phone: {
                            required: true,
                            number: true,
                        },
                        dept: {
                            required: true,
                        },
                        programme: {
                            required: true,
                        },
                        joining_year: {
                            required: true,
                        },
                        completion_year: {
                            required: true,
                        }

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
