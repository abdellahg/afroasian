@extends('admin.layouts.app')
@section('breadcrumb')
<li><a href="{{url('/admin/dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
<li class="active">Tours</li>
@stop
@section('page-content')
	 
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h6 class="panel-title"><i class="icon-earth"> </i> Tours
							<a href="{{url('/admin/items/add')}}" class="btn btn-sm btn-info pull-right"> 
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
									<th>Destinations</th>
                                    <th>Category</th>
									<th>Active</th>
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
                                <?php $i = 0; ?>
                                @foreach($items as $item)
                                <tr>
                                    <td>{{ ++$i}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>
                                        @php 
                                         if(isset($item)){
                                            $dests = explode(',',$item->destination_id);
                                            $dests = array_map('trim', $dests);
                                         }
                                        $destNames = array();
                                        @endphp
                                        @foreach ($destinations as $destination)
                                            @if( in_array($destination->id ,$dests) ) 
                                                @php  $destNames[] = $destination->name @endphp
                                            @endif
                                        @endforeach
                                        {{ implode(' | ',$destNames) }}
                                        
                                    </td>
                                    <td>{{$item->catName}}</td>
                                    <td>
                                        <form action="{{url('/admin/items/item-status/'.$item->id)}}" 
                                              method="post" onChange='submit();'>
                                            {{ csrf_field() }}
                                            <div class="checkbox checkbox-switchery">
                                                <label>
                                                    <input type="checkbox" name="active" class="switchery" 
                                                           @if($item->active == '1') checked 
                                                            @elseif($item->active == 0) '' @endif >
                                                </label>
                                            </div>
                                        </form>

                                    </td>
                                    <td class="text-center">
                                        <a href="{{url('/admin/items/edit/'.$item->id)}}" 
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