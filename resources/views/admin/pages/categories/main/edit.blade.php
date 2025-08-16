@extends('admin.layouts.app')
@section('breadcrumb')
<li><a href="{{url('/admin/dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
<li><a href="{{url('/admin/categories/main')}}">Main Categories</a></li>
<li class="active">Edit Category : {{ data_get($category, app()->getLocale().'.name') ?? data_get($category, 'en.name') }}</li>
@stop
@section('page-content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title"><i class="icon-pencil5"> </i> Edit Category
                    </h6>

                    <hr>
                </div>
                <div class="container-fluid">
                    {!! Form::model($category, ['url' => '/admin/categories/main/update/'.$category['id'], 'method' => 'POST']) !!}
                        @include('admin.pages.categories.main.form')
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
   
@endsection

