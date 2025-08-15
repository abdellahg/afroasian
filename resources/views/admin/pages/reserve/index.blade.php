@extends('admin.layouts.app')
@section('breadcrumb')
<li><a href="{{url('/admin/dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
<li class="active">Rservations</li>
@stop
@section('page-content')
	 
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h6 class="panel-title"><i class="icon-stack"> </i> Reservations
						</h6>
						<hr>
					</div>
					<div class="container-fluid">
						
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
					</div>
				</div>
			</div>
		</div>
@stop