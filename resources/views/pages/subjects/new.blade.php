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
                        <h6 class="mb-0">New Subject</h6>
                    </div>
                    <div class="card-body pt-2">
                        <form id="new_subject_form" action="/subjects" method="post">
                            {{ csrf_field() }}

                            <div class="input-group input-group-static my-4">
                                <label for="subject_name">Subject Name</label>
                                <input type="text" class="form-control" name="subject_name" id="subject_name"
                                    value="{{ old('subject_name') }}">
                            </div>
                            <div class="select my-4">
                                <select class="selectpicker col-lg-12 col-md-12" name="subject_type" id="subject_type">
                                    <option disabled selected value="">Select Subject Type</option>
                                    <option value="theory">Theory</option>
                                    <option value="practical">Practical</option>
                                    <option value="theory/practical">Theory/Practical</option>
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
            $('#new_subject_form').validate({
                rules: {
                    subject_name: {
                        required: true
                    },
                    subject_type: {
                        required: true,
                    },
                },
                messages:{
                    subject_name:'Please fill out this field.',
                    subject_type:'Please select a subject type in the list.',
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
