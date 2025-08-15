@extends('admin.layouts.app')
@section('breadcrumb')
<li><a href="{{url('/admin/dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
<li class="active">Admins</li>
@stop
@section('page-content')
	 
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h6 class="panel-title"><i class="icon-users"> </i> All Admins
							<a href="{{url('/admin/add-admin')}}" class="btn btn-sm btn-info pull-right"> <b style="color: #fff;"><i class="icon-add"></i> Add New</b></a>
						</h6>

						<hr>
					</div>
					<div class="container-fluid">
						
						<table class="table datatable-basic table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th>No.</th>
									<th>Name</th>
									<th>Email</th>
									<th>Type</th>
									<th>Active</th>
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 0; ?>
								@foreach($users as $user)
										<tr>
											<td>{{ ++$i}}</td>
											<td>{{$user->name}}</td>
											<td>{{$user->email}}</td>
											<td>
												@foreach($roles as $role)
													@if($user->role == $role->id ) {{$role->type}} @endif
												@endforeach
											</td>
											<td>
											@if($user->role != 1)
												<form action="{{url('/admin/admin-status/'.$user->id)}}" method="post" onChange='submit();'>
													{{ csrf_field() }}
													<div class="checkbox checkbox-switchery">
														<label>
															<input type="checkbox" name="active" class="switchery" @if($user->status == '1') checked @elseif($user->status == 0) '' @endif >
														</label>
													</div>
												</form>
											@else
											<p>Active</p>
											@endif
											</td>
											<td class="text-center">@if($user->role == 1)
												<p><b>Owner</b></p>
												@else
												<a href="{{url('/admin/edit-admin/'.$user->id)}}" class="text-info"><i class="icon-pencil5"></i> Edit</a>
												@endif
											</td>
										</tr> 
									
								@endforeach
							</tbody>
						</table>
                        <div class="clearfix"></div>
                        <br><br>
					</div>
				</div>
			</div>
		</div>
@stop