
@extends('backend.layouts.app')

@section('title','Manage User')

@section('content')

    <!-- Breadcrumb-->
    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">Form Input</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javaScript:void();">Bulona</a></li>
                <li class="breadcrumb-item"><a href="javaScript:void();">Forms</a></li>
                <li class="breadcrumb-item active" aria-current="page">Form Input</li>
            </ol>
        </div>
        <div class="col-sm-3">
            <div class="btn-group float-sm-right">
                <a href="{{route('admin.user.create')}}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-cog mr-1"></i> Add User</a>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb-->


    <x-alert/>

                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="card">
                            <div class="card-header border-0">Recent Order Tables
                                <div class="card-action">
                                    <div class="dropdown">
                                        <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
                                            <i class="icon-options"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="javascript:void();">Action</a>
                                            <a class="dropdown-item" href="javascript:void();">Another action</a>
                                            <a class="dropdown-item" href="javascript:void();">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="javascript:void();">Separated link</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Action</th>


                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            <img alt="Image placeholder"
                                                 src="http://127.0.0.1:8000/backend/assets/images/avatars/avatar-13.png"
                                                 class="product-img">
                                        </td>
                                        <td>{{$user->name}}</td>
                                        <td><a href="mailto:{{ $user->email }}">{{$user->email}}</a></td>
                                        <td class="text-{{textcolor($user->role->name)}}">{{$user->role->name}}</td>
                                        <td class="text-capitalize">
                        <span class="badge-dot">
                        <i class="bg-danger"></i> </span>
                        <span class="badge badge-{{$user->status=="active"?'success':'danger'}}">{{$user->status}}</span>
                                        </td>
                                        <td>
                                            <a href="{{route('admin.user.edit',$user->id)}}" class="btn-social btn-outline-pinterest waves-effect waves-light"><i class="fa fa-pencil"></i></a>

                                          {{--     <form action="{{route('admin.user.destroy',$user->id)}}" method="post">
                                                @csrf
                                                @method('delete')

                                              <button type="submit">Delete</button>

                                                <a href="{{route('admin.user.destroy',$user->id)}}" onclick="event.preventDefault();this.closest('form').submit()" class="btn-social btn-outline-twitter waves-effect waves-light"><i class="fa fa-trash"></i></a>

                                            </form>--}}

                                            <a href="" onclick="event.preventDefault();document.getElementById('delete-form-{{$user->id}}').submit()" class="btn-social btn-outline-twitter waves-effect waves-light"><i class="fa fa-trash"></i></a>


                                            <form id="delete-form-{{$user->id}}" action="{{route('admin.user.destroy',$user->id)}}" method="POST" style="display: none;">
                                                @csrf
                                                @method('delete')
                                            </form>



                                        </td>
                                    </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

@endsection
