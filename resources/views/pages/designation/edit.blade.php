@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Designation</h3>
                    </div>

                    @include('notification.notify')

                    <div class="card-body">
                        <form class="" role="form" method="post"
                            action="{{ route('designation.edit.post') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="form-group col-lg-4">
                                    <label>Designation Name</label><span class="validate_star">*</span>
                                    <input type="text" class="form-control" name="designation"
                                        value="{{ old('designation', $designation->designation) }}" required>
                                    <input type="hidden" class="form-control" name="designation_id"
                                        value="{{ $designation->id }}" required>

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
