
@extends('backend.layouts.app')

@section('title','Add User Role')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="card-title">@yield('title')</div>
                        <div class="card-title"><a href="{{route('admin.userrole.index')}}"><i class="fa fa-users mr-1"></i>Manage User Role</a></div>
                    </div>
                    <hr>

                    <x-auth-validation-errors></x-auth-validation-errors>

                    <form action="{{route('admin.userrole.store')}}" method="post">
                        @csrf

                        <div class="form-group row">
                            <label for="sl" class="col-sm-4 col-form-label">Serial No</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="sl"  name="sl" value="{{old('sl')}}" placeholder="Enter serial number">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label">Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name"  name="name" value="{{old('name')}}" placeholder="Enter Your Name">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="active" class="col-sm-4 col-form-label">Status</label>
                            <div class="col-sm-8">
                                <div class="icheck-material-success icheck-inline">
                                    <input type="radio" id="active" name="status" {{old('status') =='active'?'checked':''}} value="active">
                                    <label for="active">Active</label>
                                </div>

                                <div class="icheck-material-danger icheck-inline">
                                    <input type="radio" id="inactive" name="status" {{old('status') =='inactive'?'checked':''}} value="inactive">
                                    <label for="inactive">Inactive</label>
                                </div>
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <label class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-primary px-5"><i class="fa fa-save"></i> Add User Role</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!--End Row-->


@endsection
