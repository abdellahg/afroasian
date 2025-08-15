@extends('admin.layouts.app')
@section('breadcrumb')
<li><a href="{{url('/admin/dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
<li><a href="{{url('/admin/destinations')}}">Destinations</a></li>
<li class="active">Edit Destination : {{$destination['en']->name}}</li>
@stop
@section('page-content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title"><i class="icon-pencil5"> </i> Edit Destination
                    </h6>

                    <hr>
                </div>
                <div class="container-fluid">
                    {!! Form::model($destination, ['url' => '/admin/destinations/update/'.$destination['id'], 'method' => 'POST','enctype'=>'multipart/form-data']) !!}
                        @include('admin.pages.destinations.form')
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
   
@endsection


