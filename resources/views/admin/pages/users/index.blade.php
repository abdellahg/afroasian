@extends('admin.layouts.app')
@section('breadcrumb')
<li><a href="{{url('/admin/dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
<li class="active">Users</li>
@stop
@section('page-content')
	 
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h6 class="panel-title"><i class="icon-users4"> </i> Users
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
									<th>Gander</th>
									<th>Mobile</th>
									<th>Nationality</th>
									
								</tr>
							</thead>
							<tbody>
                               @php $i=1; @endphp
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @if($user->gender == '1') Male 
                                        @elseif($user->gender == 0) Female @endif
                                    </td>
                                    <td>{{$user->country_code}} {{$user->mobile}}
                                    </td>
                                    <td>
                                       {{$user->nationality}}
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