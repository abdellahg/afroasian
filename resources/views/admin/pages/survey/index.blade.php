@extends('admin.layouts.app')
@section('breadcrumb')
<li><a href="{{url('/admin/dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
<li class="active">Surveys</li>
@stop
@section('page-content')
	 
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h6 class="panel-title"><i class="icon-question4"> </i> Surveys
						    
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
									<th>Arrival Date</th>
									<th>Feedback</th>
									<th class="text-center">Details</th>
								</tr>
							</thead>
							<tbody>
                               @php $i=1; @endphp
                                @foreach($surveys as $survey)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$survey->name}}</td>
                                    <td>{{$survey->email}}</td>
                                    <td>{{ $survey->arrivaldate}}</td>
                                    <td>{{ $survey->feedback}} </td>
                                    
                                    <td class="text-center">
                                        <a href="{{url('/admin/survey/'.$survey->id)}}" 
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