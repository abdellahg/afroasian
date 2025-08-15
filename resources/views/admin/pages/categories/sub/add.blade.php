@extends('admin.layouts.app')
@section('breadcrumb')
<li><a href="{{url('/admin/dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
<li><a href="{{url('/admin/categories/sub')}}">Sub Categories</a></li>
<li class="active">New Sub Category</li>
@stop
@section('page-content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title"><i class="icon-add"> </i> New Sub Category
                    </h6>

                    <hr>
                </div>
                <div class="container-fluid">
                    {!! Form::Open(['url' => '/admin/categories/sub/store', 'method' => 'POST']) !!}
                        @include('admin.pages.categories.sub.form')
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection

