
@extends('backend.layouts.app')

@section('title','Manage User Role')

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
                <a href="{{route('admin.userrole.create')}}" class="btn btn-primary waves-effect waves-light"><i class="fa fa-cog mr-1"></i> Add User Role</a>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb-->

                <div class="row justify-content-center">
                    <div class="col-8 col-lg-8">
                        <div class="card">
                            <div class="card-header border-0">User Role Tables
                            </div>
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Action</th>


                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($userroles as $userrole)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$userrole->name}}</td>
                                        <td>
                      <span class="badge-dot">
                        <i class="bg-danger"></i> {{$userrole->status}}
                      </span>
                                        </td>
                                        <td>
                                            <a href="{{route('admin.userrole.destroy',$userrole->id)}}" class="btn-social btn-outline-pinterest waves-effect waves-light"><i class="fa fa-pencil"></i></a>

                                          {{--     <form action="{{route('admin.user.destroy',$user->id)}}" method="post">
                                                @csrf
                                                @method('delete')

                                              <button type="submit">Delete</button>

                                                <a href="{{route('admin.user.destroy',$user->id)}}" onclick="event.preventDefault();this.closest('form').submit()" class="btn-social btn-outline-twitter waves-effect waves-light"><i class="fa fa-trash"></i></a>

                                            </form>--}}

                                            <a href="" onclick="event.preventDefault();document.getElementById('delete-form-{{$userrole->id}}').submit()" class="btn-social btn-outline-twitter waves-effect waves-light"><i class="fa fa-trash"></i></a>


                                            <form id="delete-form-{{$userrole->id}}" action="{{route('admin.userrole.destroy',$userrole->id)}}" method="POST" style="display: none;">
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
