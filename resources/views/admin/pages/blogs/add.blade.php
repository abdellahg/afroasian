@extends('admin.layouts.app')
@section('breadcrumb')
<li><a href="{{url('/admin/dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
<li><a href="{{url('/admin/blogs')}}">Blogs</a></li>
<li class="active">New Blog </li>
@stop
@section('page-content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title"><i class="icon-add"> </i> New Blog 
                    </h6>

                    <hr>
                </div>
                <div class="container-fluid">
                    {!! Form::Open(['url' => '/admin/blogs/store', 'method' => 'POST','enctype'=>'multipart/form-data']) !!}
                        @include('admin.pages.blogs.form')
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection

