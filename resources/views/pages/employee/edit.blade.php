@extends('layouts.home_layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Update Employee</h3>
                    </div>

                    @include('notification.notify')

                    <div class="card-body">
                        <form class="" role="form" method="post" action="{{ route('employee.edit.post') }}"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label>First Name</label><span class="validate_star">*</span>
                                    <input type="text" class="form-control" name="first_name"
                                        value="{{ old('first_name', $employee->first_name) }}" required>
                                    <input type="hidden" class="form-control" name="employee_id"
                                        value="{{ $employee->id }}" required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Last Name</label><span class="validate_star">*</span>
                                    <input type="text" class="form-control" name="last_name"
                                        value="{{ old('last_name', $employee->last_name) }}" required>
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label>Joining Date</label><span class="validate_star">*</span>
                                    <input type="date" class="form-control " name="joining_date"
                                        value="{{ date('Y-m-d', strtotime($employee->joining_date)) }}" required>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Date of Birth</label><span class="validate_star">*</span>
                                    <input type="date" class="form-control" name="date_of_birth"
                                        value="{{ date('Y-m-d', strtotime($employee->date_of_birth)) }}" required>
                                </div>
                            </div>
                            <div class="row">

                                <div class="form-group col-lg-12">
                                    <label>Designation</label><span class="validate_star">*</span>
                                    <select class="form-control" name="designation_id" id="designation_id">

                                        @foreach ($designations as $designation)
                                            <option @if (old('designation_id', $employee->designation_id) == $designation->id) selected @endif
                                                value="{{ $designation->id }}">{{ $designation->designation }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label>Gender</label><span class="validate_star">*</span>
                                    <div class="form-check">
                                        <input class="form-check-input" value="male" name="gender" type="radio"
                                            @if (old('gender', $employee->gender) == 'male') checked @endif id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" value="female" name="gender" type="radio"
                                            @if (old('gender', $employee->gender) == 'female') checked @endif id="flexRadioDefault2" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Female
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label>Mobile Number</label><span class="validate_star">*</span>
                                    <input type="text" class="form-control" name="mobile"
                                        value="{{ old('mobile', $employee->mobile) }}" required>
                                </div>


                                <div class="form-group col-lg-12">
                                    <label>Land Line</label><span class="validate_star">*</span>
                                    <input type="text" class="form-control" name="landline"
                                        value="{{ old('landline,', $employee->landline) }}">
                                </div>

                                <div class="form-group col-lg-12">
                                    <label>Email</label><span class="validate_star">*</span>
                                    <input type="email" class="form-control" name="email"
                                        value="{{ old('email,', $employee->email) }}" required>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label>Present Address</label><span class="validate_star">*</span>
                                    <textarea class="form-control" name="present_address" id="exampleFormControlTextarea1"
                                        rows="3">{{ old('present_address,', $employee->present_address) }}</textarea>

                                </div>

                                <div class="form-group col-lg-12">
                                    <input type="checkbox" id="same" name="same" value="same">
                                    <label for="same">Same as present Address</label><br>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label>Permanent Address</label><span class="validate_star">*</span>
                                    <textarea class="form-control" name="permanent_address" id="exampleFormControlTextarea1"
                                        rows="3">{{ old('permanent_address,', $employee->permanent_address) }}</textarea>

                                </div>

                                <div class="form-group col-lg-12">
                                    <label>Status</label><span class="validate_star">*</span>
                                    <select class="form-control" name="status" id="status">
                                        <option @if (old('status', $employee->status) == 1) selected @endif value="1">Active</option>
                                        <option @if (old('status', $employee->status) == 2) selected @endif value="2">Inactive
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label>Profile Picture</label><span class="validate_star">*</span>

                                    <input type="file" class="form-control" name="image" id="image" accept="image/*">
                                </div>

                                <div class="form-group col-lg-12">
                                    <label>Resume</label><span class="validate_star">*</span>
                                    <input type="file" class="form-control" name="resume" id="resume" accept="application/pdf,application/msword,
                                        application/vnd.openxmlformats-officedocument.wordprocessingml.document" />
                                </div>

                            </div>

                            <div class="btn-wrap">
                                <div class="btn-box">
                                    <button type="submit" class="btn btn-success btn-sm pull-right"><i
                                            class="fa fa-plus"></i> Update</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
