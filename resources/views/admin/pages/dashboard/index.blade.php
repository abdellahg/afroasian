@extends('admin.layouts.app')
@section('breadcrumb')
<li class="active"><i class="icon-home2 position-left"></i> Dashboard</li>
@stop

@section('page-content')


<div class="col-md-4">
    <div class="panel panel-body border-top-primary text-center gdash">
        <a href="{{url('/admin/messages')}}">
            <button type="button" class="btn bg-danger-600 btn-float btn-float-lg btn-rounded"><i class="icon-envelop3"></i></button>
        </a>
        <hr>
        <h1 class="no-margin text-semibold">{{$messages}} <span class="text-muted content-group-sm">Messages</span></h1>
    </div>
</div>
 <div class="col-md-4">
    <div class="panel panel-body border-top-primary text-center gdash">
        <a href="{{url('/admin/reservations')}}">
            <button type="button" class="btn bg-danger-600 btn-float btn-float-lg btn-rounded"><i class="icon-archive"></i></button>
        </a>
        <hr>
        <h1 class="no-margin text-semibold">{{$reservations}} <span class="text-muted content-group-sm">Reservations</span></h1>
    </div>
</div>
 <div class="col-md-4">
    <div class="panel panel-body border-top-primary text-center gdash">
        <a href="{{url('/admin/reviews')}}">
            <button type="button" class="btn bg-danger-600 btn-float btn-float-lg btn-rounded"><i class="icon-comments"></i></button>
        </a>
        <hr>
        <h1 class="no-margin text-semibold">{{$reviews}} <span class="text-muted content-group-sm">Reviews</span></h1>
    </div>
</div>
<div class="col-md-4">
    <div class="panel panel-body border-top-primary text-center gdash">
        <a href="{{url('/admin/items')}}">
            <button type="button"  class="btn bg-danger-600 btn-float btn-float-lg btn-rounded"><i class="icon-earth"></i></button>
        </a>
        <hr>
        <h1 class="no-margin text-semibold">{{$items}} <span class="text-muted content-group-sm">Tours</span></h1>       
    </div>
</div>
 <div class="col-md-4">
    <div class="panel panel-body border-top-primary text-center gdash">
        <a href="{{url('/admin/blogs')}}">
            <button type="button" class="btn bg-danger-600 btn-float btn-float-lg btn-rounded"><i class="icon-newspaper"></i></button>
        </a>
        <hr>
        <h1 class="no-margin text-semibold">{{$blogs}} <span class="text-muted content-group-sm">Blogs</span></h1>
    </div>
</div>

<div class="col-md-4">
    <div class="panel panel-body border-top-primary text-center gdash">
        <a href="{{url('/admin/galleries')}}">
            <button type="button" class="btn bg-danger-600 btn-float btn-float-lg btn-rounded"><i class="icon-camera"></i></button>
        </a>
        <hr>
        <h1 class="no-margin text-semibold">{{$gallery}} <span class="text-muted content-group-sm">Gallaries</span></h1>
    </div>
</div>
@endsection