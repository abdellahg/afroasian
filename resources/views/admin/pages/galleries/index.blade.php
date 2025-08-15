@extends('admin.layouts.app')
@section('breadcrumb')
<li><a href="{{url('/admin/dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
<li class="active">Galleries</li>
@stop
@section('page-content')
	 
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h6 class="panel-title"><i class="icon-camera"> </i> Galleries
							<a href="{{url('/admin/galleries/add')}}" class="btn btn-sm btn-info pull-right"> 
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
									<th>Order</th>
									<th>Created at</th>
									<th>Active</th>
									<th class="text-center">Actions</th>
									
								</tr>
							</thead>
							<tbody>
                                <?php $i = 0; ?>
                                @foreach($galleries as $gallery)
                                <tr>
                                    <td>{{ ++$i}}</td>
                                    <td>{{$gallery->name}}</td>
                                    <td>{{$gallery->order}}</td>
                                    <td>{{$gallery->created_at}}</td>
                                    <td>
                                    <form action="{{url('/admin/galleries/gallery-status/'.$gallery->id)}}" 
                                          method="post" onChange='submit();'>
                                        {{ csrf_field() }}
                                        <div class="checkbox checkbox-switchery">
                                            <label>
                                                <input type="checkbox" name="active" class="switchery" 
                                                       @if($gallery->active == '1') checked 
                                                        @elseif($gallery->active == 0) '' @endif >
                                            </label>
                                        </div>
                                    </form>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{url('/admin/galleries/edit/'.$gallery->id)}}" 
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