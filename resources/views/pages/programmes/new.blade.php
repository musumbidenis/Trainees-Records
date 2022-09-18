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
                        <h6 class="mb-0">New Programme</h6>
                    </div>
                    <div class="card-body pt-2">
                        <form id="new_programme_form" action="/programmes" method="post">
                            {{ csrf_field() }}

                            <div class="input-group input-group-static my-4">
                                <label for="programme_name">programme Name</label>
                                <input type="text" class="form-control" name="programme_name" id="programme_name"
                                    value="{{ old('programme_name') }}">
                            </div>
                            <div class="select my-4">
                                <select class="selectpicker col-lg-12 col-md-12" name="dept" id="dept">
                                    <option disabled selected value="">Select Department</option>
                                    @foreach ($departments as $department)
                                        <option value={{ $department->dept_id }}>{{ $department->dept_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="select my-4">
                                <select class="selectpicker col-lg-12 col-md-12" name="duration" id="duration">
                                    <option disabled selected value="">Select Programme Duration</option>
                                    <option value="1">One Year</option>
                                    <option value="2">Two Years</option>
                                    <option value="3">Three Years</option>
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
            $('#new_programme_form').validate({
                rules: {
                    programme_name: {
                        required: true
                    },
                    duration: {
                        required: true,
                    },
                    dept: {
                        required: true,
                    },
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
