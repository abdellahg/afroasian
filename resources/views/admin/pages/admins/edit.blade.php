@extends('admin.layouts.app')
@section('breadcrumb')
<li><a href="{{url('/admin/dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
<li><a href="{{url('/admin/admins')}}">Admins</a></li>
<li class="active">Edit: {{$user->name}}</li>
@stop
@section('page-content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title"><i class="icon-pencil5"> </i> Edit Admin
                    </h6>

                    <hr>
                </div>
                <div class="container-fluid">
                    {!! Form::model($user, ['url' => '/admin/update-admin/'.$user->id, 'method' => 'POST']) !!}
                        @include('admin.pages.admins.form')
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title"><i class="icon-pencil5"> </i> Edit Password
                    </h6>

                    <hr>
                </div>
                <div class="container-fluid">
                    {!! Form::Open(['url' => '/admin/changePassword/'.$user->id, 'method' => 'POST']) !!}
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-md-6 col-md-offset-3">
                                <input type="hidden" value="{{ $user->id }}" name="user_id">
                                <input id="password" type="password" class="form-control" name="password" placeholder="New Password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                      <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                <br>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3 text-center">
                                <button type="submit" class="btn btn-info">
                                    <i class="fa fa-btn fa-user"></i> Change Password
                                </button>
                                <br><br>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

