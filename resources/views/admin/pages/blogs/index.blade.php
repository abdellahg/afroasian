@extends('admin.layouts.app')
@section('breadcrumb')
<li><a href="{{url('/admin/dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
<li class="active">Blogs</li>
@stop
@section('page-content')
	 
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h6 class="panel-title"><i class=" icon-newspaper"> </i> Blogs
							<a href="{{url('/admin/blogs/add')}}" class="btn btn-sm btn-info pull-right"> 
                                <b style="color: #fff;"><i class="icon-add"></i> Add New</b></a>
						</h6>

						<hr>
					</div>
					<div class="container-fluid">
						
						<table class="table datatable-basic table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th>No.</th>
									<th>Title</th>
                                    <th>Category</th>
                                    <th>Order</th>
									<th>Active</th>
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
                                <?php $i = 0; $ch = 0; ?>
                                @foreach($blogs as $blog)
                                <tr>
                                    <td>{{ ++$i}}</td>
                                    <td>{{$blog->title}}</td>
                                    <td>{{$blog->catName}}</td>
                                    <td>{{$blog->order}}</td>
                                    <td>
                                        <form action="{{url('/admin/blogs/blog-status/'.$blog->id)}}" 
                                              method="post" onChange='submit();'>
                                            {{ csrf_field() }}
                                            <div class="checkbox checkbox-switchery">
                                                <label>
                                                    <input type="checkbox" name="active" class="switchery" 
                                                           @if($blog->active == '1') checked 
                                                            @elseif($blog->active == 0) '' @endif >
                                                </label>
                                            </div>
                                        </form>

                                    </td>
                                    
                                    <td class="text-center">
                                        <a href="{{url('/admin/blogs/edit/'.$blog->id)}}" 
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