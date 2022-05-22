@extends('layouts.home_layout')

{{-- External Style Section --}}
@section('style')
    <link href="{{ asset('assets/libs/data-table/datatables.min.css') }}">
@endsection

@section('content')
    <div class="container">
        @include('notification.notify')

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success testB" href="{{ route('designation.add-designation') }}">Add
                            Designation</a>
                    </div>


                    <div class="col-lg-12">
                        <div class="panel">
                            <div class="panel-heading">
                            </div>
                            <div class="panel-body p-none">
                                <table class="table data-table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script src="{{ asset('assets/libs/data-table/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/js/designation.js') }}"></script>
@endsection
