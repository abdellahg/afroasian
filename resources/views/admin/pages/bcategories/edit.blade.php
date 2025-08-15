@extends('admin.layouts.app')
@section('breadcrumb')
<li><a href="{{url('/admin/dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
<li><a href="{{url('/admin/blog/categories')}}">Blog Categories</a></li>
<li class="active">Edit Category : {{$bcategory['en']->name}}</li>
@stop
@section('page-content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title"><i class="icon-pencil5"> </i> Edit Blog Category
                    </h6>

                    <hr>
                </div>
                <div class="container-fluid">
                    {!! Form::model($bcategory, ['url' => '/admin/blog/categories/update/'.$bcategory['id'], 'method' => 'POST','enctype'=>'multipart/form-data']) !!}
                        @include('admin.pages.bcategories.form')
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
   
@endsection

