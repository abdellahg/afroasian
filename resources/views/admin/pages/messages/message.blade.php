@extends('admin.layouts.app')
@section('breadcrumb')
<li><a href="{{url('/admin/dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
<li><a href="{{url('/admin/messages')}}"> Messages</a></li>
<li class="active">Message:  {{$message->id}}</li>
@stop
@section('page-content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h6 class="panel-title"><i class="icon-user"> </i> Message Number : {{$message->id}}
					</h6>
					<hr>
				</div>
				<div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="col-md-4">
                                <div class="col-md-3"> From : </div>
                                <div class="col-md-9"> {{$item_name}} </div>
                                
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-3"> Name : </div>
                                <div class="col-md-8"> {{$message->name}} </div>
                                
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-3"> Email : </div>
                                <div class="col-md-8"> {{$message->email}}</div>
                            </div>
                            
                        </div>
                    </div>
                    <hr>
				    <div class="row">
				        <div class="col-xs-12">
    				        <div class="col-md-12">
    				            <b>Content:</b>
    				        </div>
                            <br><br>
                            <div class="col-xs-12">
                                {{$message->text}}
                            </div>
                       </div>
				    </div>
                    <br>
                </div>
			</div>
		</div>
	</div>
@stop