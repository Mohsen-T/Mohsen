@extends('admin.layout.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="col-md-6">
                        <div class="caption">
                            <i class="icon-list font-blue"></i>
                            <span class="caption-subject font-green bold uppercase">User information</span>
                            <h3>{{ $user->firstname.' '.$user->lastname }}</h3>
                            <h5>Username: <b>{{ $user->username }}</b></h5>
                        </div>
                    </div>
                    <div class="row">

                    </div>

                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="portlet box blue-ebonyclay">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-cogs"></i>Operations
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="{{route('email',$user->id)}}" class="btn btn-lg btn-block btn-primary"
                                           style="margin-bottom:10px;">Send Email</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="portlet box green">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-user"></i>Update Profile
                                </div>
                            </div>
                            <div class="portlet-body">
                                <form id="form" method="POST" action="{{route('user.status', $user->id)}}"
                                      enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    {{method_field('put')}}
                                    <div class="form-group col-md-4">
                                        <label>Users Name</label>
                                        <input type="text" name="username" class="form-control input-sz"
                                               value="{{$user->username}}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control input-sz"
                                               value="{{$user->email}}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Phone</label>
                                        <input type="text" name="phone" class="form-control input-sz"
                                               value="{{$user->phone}}">
                                    </div>

                                    <div class="form-group col-md-4 ">
                                        <label>User Status</label>
                                        <input class="form-control" data-toggle="toggle" data-onstyle="success"
                                               data-offstyle="danger" data-width="100%" data-on="Active"
                                               data-off="Deactive" type="checkbox" value="1"
                                               name="status" {{ $user->status == "1" ? 'checked' : '' }}>
                                    </div>

                                    <hr/>
                                    <button type="submit" class="btn btn-lg btn-primary btn-block">Update</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

