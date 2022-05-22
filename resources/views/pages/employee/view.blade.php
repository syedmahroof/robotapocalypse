@extends('layouts.home_layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>User Profile</h4>
                    </div>
                    <div class="panel-body">

                        <div class="box box-info">
                            <div class="box-body">
                                <div class="col-md-12">
                                    <div align="center"> <img alt="User Pic"
                                            src="{{ asset('assets/employeeImage/' . $employee->profile_pic) }}"
                                            id="profile-image1" class="img-responsive">
                                    </div>
                                    <br>
                                    <!-- /input-group -->
                                </div>
                                <div class="col-sm-6">
                                    <h4 style="color:#00b1b1;">{{ $employee->first_name }} {{ $employee->last_name }}
                                    </h4></span>
                                    <span>
                                        <p>{{ $employee->designation->designation }}</p>
                                    </span>
                                </div>
                                <div class="clearfix"></div>
                                <hr style="margin:5px 0 5px 0;">


                                <div class="col-sm-5 col-xs-6 title ">First Name:</div>
                                <div class="col-sm-7 col-xs-6 ">{{ $employee->first_name }}</div>
                                <div class="clearfix"></div>
                                <div class="bot-border"></div>

                                <div class="col-sm-5 col-xs-6 title ">Last Name:</div>
                                <div class="col-sm-7"> {{ $employee->last_name }}</div>
                                <div class="clearfix"></div>
                                <div class="bot-border"></div>

                                <div class="col-sm-5 col-xs-6 title ">Date Of Joining:</div>
                                <div class="col-sm-7"> {{ $employee->joining_date }}</div>

                                <div class="clearfix"></div>
                                <div class="bot-border"></div>

                                <div class="col-sm-5 col-xs-6 title ">Date Of Birth:</div>
                                <div class="col-sm-7">{{ $employee->date_of_birth }}</div>



                                <div class="clearfix"></div>
                                <div class="bot-border"></div>

                                <div class="col-sm-5 col-xs-6 title ">Email:</div>
                                <div class="col-sm-7">{{ $employee->email }}</div>

                                <div class="clearfix"></div>
                                <div class="bot-border"></div>

                                <div class="col-sm-5 col-xs-6 title ">Mobile:</div>
                                <div class="col-sm-7">{{ $employee->mobile }}</div>

                                <div class="clearfix"></div>
                                <div class="bot-border"></div>

                                <div class="col-sm-5 col-xs-6 title ">LandLine:</div>
                                <div class="col-sm-7">{{ $employee->landline }}</div>


                                <div class="clearfix"></div>
                                <div class="bot-border"></div>
                                <div class="col-sm-5 col-xs-6 title ">Present Address:</div>
                                <div class="col-sm-7">{{ $employee->present_address }}</div>


                                <div class="clearfix"></div>
                                <div class="bot-border"></div>
                                <div class="col-sm-5 col-xs-6 title ">Permanent Address:</div>
                                <div class="col-sm-7">{{ $employee->permanent_address }}</div>


                                <div class="clearfix"></div>
                                <div class="bot-border"></div>

                                <div class="col-sm-5 col-xs-6 title ">Gender:</div>
                                <div class="col-sm-7">{{ $employee->gender }}</div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
