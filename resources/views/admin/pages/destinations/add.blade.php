@extends('admin.layouts.app')
@section('breadcrumb')
<li><a href="{{url('/admin/dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
<li><a href="{{url('/admin/destinations')}}">Destinations</a></li>
<li class="active">New Destination</li>
@stop
@section('page-content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title"><i class="icon-add"> </i> New Destination
                    </h6>

                    <hr>
                </div>
                <div class="container-fluid">
                    {!! Form::Open(['url' => '/admin/destinations/store', 'method' => 'POST','enctype'=>'multipart/form-data']) !!}
                        @include('admin.pages.destinations.form')
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection

