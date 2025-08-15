@extends('admin.layouts.app')
@section('breadcrumb')
<li><a href="{{url('/admin/dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
<li class="active">Messages</li>
@stop
@section('page-content')
	 
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h6 class="panel-title"><i class="icon-envelop3"> </i> Messages
						</h6>
						<hr>
					</div>
					<div class="container-fluid">
						
						<table class="table datatable-basic table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th>Num</th>
									<th>From</th>
									<th>Name</th>
									<th>Email</th>
									<th>Date</th>
									<th class="text-center">Details</th>
								</tr>
							</thead>
							<tbody>
                               @php $i=1; @endphp
                                @foreach($messages as $message)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>
                                        @if( $message->item == 0) 
                                            Contact us 
                                        @else 
                                            @foreach($items as $item)
                                                @if($item->id == $message->item)
                                                    {{$item->name}}
                                                @endif
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>{{$message->name}}</td>
                                    <td>{{$message->email}}</td>
                                    <td>{{$message->created_at}}</td>
                                    <td class="text-center">
                                        <a href="{{url('/admin/messages/'.$message->id)}}" 
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