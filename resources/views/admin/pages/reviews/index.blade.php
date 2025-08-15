@extends('admin.layouts.app')
@section('breadcrumb')
<li><a href="{{url('/admin/dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
<li class="active">Reviews</li>
@stop
@section('page-content')
	 
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h6 class="panel-title"><i class="icon-comments"> </i> Reviews
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
									<th>Stars</th>
									<th>Status</th>
									<th>Featured</th>
									<th class="text-center">Details</th>
								</tr>
							</thead>
							<tbody>
                               @php $i=1; @endphp
                                @foreach($reviews as $review)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$review->name}}</td>
                                    <td>{{$review->email}}</td>
                                    <td>{{ $review->stars}}</td>
                                    <td>
                                        <form action="{{url('/admin/reviews/review-status/'.$review->id)}}" 
                                              method="post" onChange='submit();'>
                                            {{ csrf_field() }}
                                            <div class="checkbox checkbox-switchery">
                                                <label>
                                                    <input type="checkbox" name="active" class="switchery" 
                                                           @if($review->status == '1') checked 
                                                            @elseif($review->status == 0) '' @endif >
                                                </label>
                                            </div>
                                        </form>

                                    </td>
                                    <td>
                                        <form action="{{url('/admin/reviews/review-featured/'.$review->id)}}" 
                                              method="post" onChange='submit();'>
                                            {{ csrf_field() }}
                                            <div class="checkbox checkbox-switchery">
                                                <label>
                                                    <input type="checkbox" name="active" class="switchery" 
                                                           @if($review->featured == '1') checked 
                                                            @elseif($review->featured == 0) '' @endif >
                                                </label>
                                            </div>
                                        </form>

                                    </td>
                                    <td class="text-center">
                                        <a href="{{url('/admin/reviews/'.$review->id)}}" 
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