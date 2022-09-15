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
                        <h6 class="mb-0">New Class</h6>
                    </div>
                    <div class="card-body pt-2">
                        <form id="new_class_form" action="/classes" method="post">
                            {{ csrf_field() }}

                            <div class="input-group input-group-static my-4">
                                <label for="class_name">Class Name</label>
                                <input type="text" class="form-control" name="class_name" id="class_name"
                                    value="{{ old('class_name') }}">
                            </div>
                            <div class="input-group input-group-static my-4">
                                <label for="number_of_students">Number of Students</label>
                                <input type="text" class="form-control" name="number_of_students" id="number_of_students"
                                    value="{{ old('number_of_students') }}">
                            </div>
                            <div class="select my-4">
                                <select class="selectpicker col-lg-12 col-md-12" name="department" id="department">
                                    <option disabled selected value="">Select Department</option>
                                    @foreach ($departments as $department)
                                        <option value={{ $department->dept_id }}>{{ $department->dept_name }}</option>
                                    @endforeach
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
            $('#new_class_form').validate({
                rules: {
                    class_name: {
                        required: true
                    },
                    number_of_students: {
                        required: true,
                        number: true,
                    },
                    department: {
                        required: true,
                    }
                },
                messages: {
                    class_name: 'Please fill out this field.',
                    number_of_students: {
                        required: 'Please fill out this field.',
                        number: 'Please enter a numeric value.',
                    },
                    department: 'Please select a department in the list.',
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
