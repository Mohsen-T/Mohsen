@extends('admin.layout.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="col-md-6">
                        <div class="caption">
                            <i class="icon-list font-blue"></i>
                            <span class="caption-subject font-green bold uppercase">Stuff Management</span>

                            <a class="btn btn-primary btn-md pull-right" href="{{route('admin.register')}}">
                                <i class="fa fa-plus"></i>   ADD NEW
                            </a>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                        @foreach($admins as $admin)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    {{$admin->name}}
                                </td>
                                <td>{{$admin->username}}</td>
                                <td>{{$admin->email}}</td>
                                <td>
                                    @if($admin->role == 'super')
                                        <p class="btn green btn-outline sbold uppercase btn-xs"> SUPER ADMIN </p>
                                    @else
                                        <p class="btn green btn-outline sbold uppercase btn-xs"> ADMIN </p>
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm pass_button" data-toggle="modal" data-target="#PasswordModal" data-id="{{$admin->id}}">
                                        <i class="fa fa-edit"></i> CHANGE PASSWORD
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm delete_button" data-toggle="modal" data-target="#DelModal" data-id="{{$admin->id}}">
                                        <i class="fa fa-times"></i> DELETE
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <?php echo $admins->render(); ?>
                </div>
            </div>
        </div>
    </div>
@endsection

