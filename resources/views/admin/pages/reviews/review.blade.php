@extends('admin.layouts.app')
@section('breadcrumb')
<li><a href="{{url('/admin/dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
<li><a href="{{url('/admin/reviews')}}"> Reviews</a></li>
<li class="active">Review:  {{$review->id}}</li>
@stop
@section('page-content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h6 class="panel-title"><i class="icon-user"> </i> Review Number : {{$review->id}}
					</h6>
					<hr>
				</div>
				<div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-4"> Name : </div>
                            <div class="col-md-8"> {{$review->name}} </div>
                        </div>
                        <br><br>
                        <div class="col-md-6">
                            <div class="col-md-4"> Email : </div>
                            <div class="col-md-8"> {{$review->email}}</div>
                        </div>
                        <br><br>
                        <div class="col-md-6">
                            <div class="col-md-4"> Stars : </div>
                            <div class="col-md-8"> {{$review->stars}}</div>
                        </div>
                        <br><br>
                        <div class="col-md-6">
                            <div class="col-md-4"> Status : </div>
                            <div class="col-md-8"> 
                            @if($review->status == 1)
                            <label class="label label-success">Active</label>
                            @else
                            <label class="label label-danger">Deactive</label>
                            @endif
                            </div>
                        </div>
                        <br><br>
                    </div>
                    <hr>
				    <div class="row">
				        <div class="col-md-12">
				            <b>Content:</b>
				        </div>
                        <br><br>
                        
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                {{$review->text}}
                            </div>
                        </div>
				    </div>
                    <br><br>
                </div>
			</div>
		</div>
	</div>
@stop