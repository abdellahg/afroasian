@extends('admin.layouts.app')
@section('breadcrumb')
<li><a href="{{url('/admin/dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
<li><a href="{{url('/admin/reservations')}}"> Reservations</a></li>
<li class="active">Client:  {{$user->name}}</li>
@stop
@section('page-content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h6 class="panel-title"><i class="icon-user"> </i> Client:  {{$user->name}}
					</h6>
					<hr>
				</div>
				<div class="container-fluid">
				    <div class="row">
				        
				        <div class="col-md-6">
					        
					        <div class="col-md-3"> Client Name : </div>
					        <div class="col-md-9"> {{$user->name}} </div>
					       	<br><br>
					        <div class="col-md-3"> Client Email : </div>
					        <div class="col-md-9"> {{$user->email}}</div>
					        <br><br>
					        <div class="col-md-3"> Gender : </div>
					        <div class="col-md-9">
					          @if($user->gender == 1) Male @else Femail  @endif
					        </div>
					        <br>
					    </div>
					    <div class="col-md-6">
					        <div class="col-md-3"> Type : </div>
					        <div class="col-md-9">
					            @if($user->user_id == 0)
					                <span class="label label-primary">Guest</span>
					            @else
					               <span class="label label-success">User</span>
					            @endif
					        </div>
					        <br><br>
					       	<div class="col-md-3"> Mobile : </div>
					        <div class="col-md-9">
					          +{{$user->country_code}} {{$user->mobile}}
					        </div>
					       	<br><br>
                            <div class="col-md-3"> Nationality : </div>
					        <div class="col-md-9"> {{$user->nationality}} </div>
					       	<br><br>
					    </div>
				    </div>
				    
				    @if(isset($reservations))
                    <hr>
				        <table class="table datatable-basic table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th>Res. Number</th>
									<th>Client</th>
									<th>Tour</th>
									<th>Arrival date</th>
									<th>Depature date</th>
									<th>Total Amount</th>
									<th>Status</th>
									<th class="text-center">Details</th>
								</tr>
							</thead>
							<tbody>
                               
                                @foreach($reservations as $reservation)
                                <tr>
                                    <td>{{$reservation->id}}</td>
                                    <td><a href="{{url('admin/reservation-user/'.$reservation->user_id )}}">{{$reservation->username}}</a></td>
                                    <td><a href="{{url('/tour/'.$reservation->slug)}}" target="_blank">{{$reservation->itemname}}</a></td>
                                    <td>{{$reservation->arrivaldate}}</td>
                                    <td>{{$reservation->depaturedate}}</td>
                                    <td>$ {{$reservation->total_amount}}</td>
                                    <td>
                                        @if($reservation->status == 1)
                                        <span class="label label-primary">pending</span>
                                        @elseif($reservation->status == 0)
                                        <span class="label label-danger">cancelled</span>
                                        @elseif($reservation->status == 2)
                                        <span class="label label-success">confirmed</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{url('/admin/reservations/'.$reservation->id)}}" 
                                           class="text-info"><i class="icon-eye"></i> View Details</a>
                                    </td>
                                    
                                </tr> 
								@endforeach
							</tbody>
						</table>
                        <div class="clearfix"></div>
                        <br><br>
				    
				    @endif
				</div>
			</div>
		</div>
	</div>
@stop