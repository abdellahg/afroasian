@extends('admin.layouts.app')
@section('breadcrumb')
<li><a href="{{url('/admin/dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
<li class="active">Sub Categories</li>
@stop
@section('page-content')
	 
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h6 class="panel-title"><i class="icon-tree6"> </i> Sub Categories
							<a href="{{url('/admin/categories/sub/add')}}" class="btn btn-sm btn-info pull-right"> 
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
									<th>Parent</th>
									<th>Order</th>
									<th>Show at menu</th>
									<th>Active</th>
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
                                <?php $i = 0; ?>
                                @foreach($categories as $category)
                                <tr>
											<td>{{ ++$i}}</td>
											<td>{{$category->name}}</td>
											<td>
											    @foreach ($parents as $parent)
                                                    @if($parent->id == $category->parent_id)
                                                    {{ $parent->name }}
                                                    @endif
                                                @endforeach
											</td>
                                            <td>{{$category->order}}</td>
                                            <td>@if($category->at_menu == 1) Yes @else No @endif </td>
											<td>
												<form action="{{url('/admin/categories/category-status/'.$category->id)}}" 
                                                      method="post" onChange='submit();'>
													{{ csrf_field() }}
													<div class="checkbox checkbox-switchery">
														<label>
															<input type="checkbox" name="active" class="switchery" 
                                                                   @if($category->active == '1') checked 
                                                                    @elseif($category->active == 0) '' @endif >
														</label>
													</div>
												</form>
											
											</td>
											<td class="text-center">
												<a href="{{url('/admin/categories/sub/edit/'.$category->id)}}" 
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