@extends('admin.layouts.app')
@section('breadcrumb')
<li><a href="{{url('/admin/dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
<li class="active">Local Destinations</li>
@stop
@section('page-content')
	 
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h6 class="panel-title"><i class="icon-location4"> </i>Local Destinations
							<a href="{{url('/admin/destinations/add')}}" class="btn btn-sm btn-info pull-right"> 
                                <b style="color: #fff;"><i class="icon-add"></i> Add New</b></a>
						</h6>

						<hr>
					</div>
					<div class="container-fluid">
						
						<table class="table datatable-basic table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th>No.</th>
									<th>Name</th>
									<th>Destination Type</th>
                                    <th>Order</th>
									<th>Active</th>
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
                                <?php $i = 0; ?>
                                @foreach($destinations as $destination)
                                <tr>
                                    <td>{{ ++$i}}</td>
                                    <td>{{$destination->name}}</td>
                                    <td>@if($destination->foreign == 0) Local @elseif($destination->foreign == 1) Foreign  @endif </td>
                                    <td>{{$destination->order}}</td>
                                    <td>
                                        <form action="{{url('/admin/destinations/destination-status/'.$destination->id)}}" 
                                              method="post" onChange='submit();'>
                                            {{ csrf_field() }}
                                            <div class="checkbox checkbox-switchery">
                                                <label>
                                                    <input type="checkbox" name="active" class="switchery" 
                                                           @if($destination->active == '1') checked 
                                                            @elseif($destination->active == 0) '' @endif >
                                                </label>
                                            </div>
                                        </form>

                                    </td>
                                    <td class="text-center">
                                        <a href="{{url('/admin/destinations/edit/'.$destination->id)}}" 
                                           class="text-info"><i class="icon-pencil5"></i> Edit</a>
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