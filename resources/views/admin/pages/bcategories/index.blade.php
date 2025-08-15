@extends('admin.layouts.app')
@section('breadcrumb')
<li><a href="{{url('/admin/dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
<li class="active">Blog Cotegories</li>
@stop
@section('page-content')
	 
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h6 class="panel-title"><i class="icon-archive"> </i> Blog Categories
							<a href="{{url('/admin/blog/categories/add')}}" class="btn btn-sm btn-info pull-right"> 
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
                                <?php $i = 0; $ch = 0; ?>
                                @foreach($bcategories as $bcategory)
                                <tr>
                                    <td>{{ ++$i}}</td>
                                    <td>{{$bcategory->name}}</td>
                                    <td>{{$bcategory->order}}</td>
                                    <td>{{$bcategory->created_at}}</td>
                                    <td>
                                        <form action="{{url('/admin/blog/categories/bcategory-status/'.$bcategory->id)}}" 
                                              method="post" onChange='submit();'>
                                            {{ csrf_field() }}
                                            <div class="checkbox checkbox-switchery">
                                                <label>
                                                    <input type="checkbox" name="active" class="switchery" 
                                                           @if($bcategory->active == '1') checked 
                                                            @elseif($bcategory->active == 0) '' @endif >
                                                </label>
                                            </div>
                                        </form>

                                    </td>
                                    <td class="text-center">
                                        <a href="{{url('/admin/blog/categories/edit/'.$bcategory->id)}}" 
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