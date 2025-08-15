@extends('admin.layouts.app')
@section('breadcrumb')
<li><a href="{{url('/admin/dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
<li><a href="{{url('/admin/blogs')}}">Blogs</a></li>
<li class="active">Edit Blog : {{$blog['en']->title}}</li>
@stop
@section('page-content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title"><i class="icon-pencil5"> </i> Edit Blog
                    </h6>

                    <hr>
                </div>
                <div class="container-fluid">
                    {!! Form::model($blog, ['url' => '/admin/blogs/update/'.$blog['id'], 'method' => 'POST','enctype'=>'multipart/form-data']) !!}
                        @include('admin.pages.blogs.form')
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
   
@endsection

