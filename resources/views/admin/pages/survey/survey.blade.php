@extends('admin.layouts.app')
@section('breadcrumb')
<li><a href="{{url('/admin/dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
<li><a href="{{url('/admin/surveys')}}"> Surveys</a></li>
<li class="active">Survey:  {{$user->id}}</li>
@stop
@section('page-content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h6 class="panel-title"><i class="icon-user"> </i> Survey : {{$user->id}}
					    <a href="#"   onclick="printData(this.id)" id="printTable"class="btn btn-sm btn-info pull-right"> 
                                <b style="color: #fff;"><i class="icon-printer2"></i> Print</b></a>
					</h6>
					<hr>
				</div>
				<div class="container-fluid" id="tblprintTable">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-5"> Name : </div>
                            <div class="col-md-7"> {{$user->name}} </div>
                            
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-5"> Email : </div>
                            <div class="col-md-7"> {{$user->email}}</div>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-5"> Arrival date : </div>
                            <div class="col-md-7"> {{$user->arrivaldate}}</div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                        <table class="table table-bordered table-striped table-hover">
							<thead>
								<tr>
									<th></th>
									<th>Hotels</th>
									<th>Cars</th>
									<th>Driver</th>
									<th>Tour leader</th>
									<th>Tour guide</th>
									
								</tr>
							</thead>
							<tbody>
                        
                                @foreach($surveys as $survey)
                                <tr>
                                    <td>
                                        @foreach($destinations as $destination)
                                            @if($destination->id == $survey->city_id)
                                            {{$destination->name}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{$survey->hotel}}</td>
                                    <td>{{$survey->cars}}</td>
                                    <td>{{$survey->driver}}</td>
                                    <td>{{$survey->leader}}</td>
                                    <td>{{$survey->guide}}</td>
                                    
                                </tr> 
								@endforeach
							</tbody>
						</table>
						</div>
                        <div class="clearfix"></div>
                    </div>
                    <br>
				    <div class="row">
				        <div class="col-md-12">
				            <b>Feedback:</b>
				        </div>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                {{$user->feedback}}
                            </div>
                        </div>
				    </div>
                    <br><br>
                </div>
			</div>
		</div>
	</div>
@stop
@section('script')
<script>
    function printData(elem) {
    	elem="tbl"+elem;
    	document.getElementById(elem).style.display="block";
      var divToPrint = document.getElementById(elem);	
      newWin = window.open("parent");
      newWin.document.write(divToPrint.outerHTML);
      newWin.print();
         //document.getElementById(elem).style.display="none";
      newWin.close(); 
    }
</script>

@endsection