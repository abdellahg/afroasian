@extends('admin.layouts.app')
@section('breadcrumb')
<li><a href="{{url('/admin/dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
<li class="active">Payments</li>
@stop
@section('page-content')
	 
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h6 class="panel-title"><i class="icon-cash"> </i> Payments
					</h6>
					<hr>
				</div>
				<div class="container-fluid">
					
					<table class="table datatable-basic table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th>Num</th>
								<th>Name</th>
								<th>Email</th>
								<th>Transaction ID</th>
								<th>Amount</th>
								<th>Transaction Time</th>
								
							</tr>
						</thead>
						<tbody>
                           @php $i=1; @endphp
                            @foreach($payments as $payment)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$payment->firstname.' '.$payment->lastname}}</td>
                                <td>{{$payment->email}}</td>
                                <td>{{$payment->order_id }}</td>
                                <td>{{$payment->amount.' $' }}</td>
                                <td>{{date('Y/m/d H:i:s',strtotime($payment->record_time)) }}</td>
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