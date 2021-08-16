
@extends('backend.layouts.app')

@section('title','Update User')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="card-title">@yield('title')</div>
                        <div class="card-title"><a href="{{route('admin.user.index')}}"><i class="fa fa-users mr-1"></i>Manage User</a></div>
                    </div>
                    <hr>

                    <x-auth-validation-errors></x-auth-validation-errors>

                    <form action="{{route('admin.user.update',$user->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label">Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name"  name="name" value="{{$user->name}}" placeholder="Enter Your Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}" placeholder="Enter Your Email Address">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mobile" class="col-sm-4 col-form-label">Mobile</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="mobile" name="mobile" value="{{$user->mobile}}" placeholder="Enter Your Mobile Number">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role" class="col-sm-4 col-form-label">User Role</label>
                            <div class="col-sm-8">
                                <select name="role_id" id="role" class="form-control">
                                    <option value="3">Select User Role</option>
                                    @foreach($userroles as $userrole)
                                        <option value="{{$userrole->id}}" {{$userrole->sl == $user->role_id ?'selected':''}}>{{$userrole->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-4 col-form-label">Password</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="password"  name="password" placeholder="Enter Password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password_confirmation" class="col-sm-4 col-form-label">Confirm Password</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="active" class="col-sm-4 col-form-label">Status</label>
                            <div class="col-sm-8">
                                <div class="icheck-material-success icheck-inline">
                                    <input type="radio" id="active" name="status" {{$user->status =='active'?'checked':''}} value="active">
                                    <label for="active">Active</label>
                                </div>

                                <div class="icheck-material-danger icheck-inline">
                                    <input type="radio" id="inactive" name="status" {{$user->status =='inactive'?'checked':''}} value="inactive">
                                    <label for="inactive">Inactive</label>
                                </div>
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <label class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-primary px-5"><i class="fa fa-save"></i> Update User</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!--End Row-->


@endsection
