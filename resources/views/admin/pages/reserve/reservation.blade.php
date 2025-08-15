@extends('admin.layouts.app')
@section('breadcrumb')
<li><a href="{{url('/admin/dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
<li><a href="{{url('/admin/reservations')}}"> Reservations</a></li>
<li class="active">Reservation:  {{$reservation->id}}</li>
@stop
@section('page-content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h6 class="panel-title"><i class="icon-user"> </i> Reservation Number : {{$reservation->id}}
					</h6>
					<hr>
				</div>
				<div class="container-fluid">
				    <div class="row">
				        <div class="col-md-12">
				            <b>Client Details:</b>
				        </div>
				        <br><br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="col-md-5"> Client Name : </div>
                                <div class="col-md-7"> {{$user->name}} </div>
                                
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-5"> Client Email : </div>
                                <div class="col-md-7"> {{$user->email}}</div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-5"> Gender : </div>
                                <div class="col-md-7">
                                  @if($user->gender == 1) Male @else Femail  @endif
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="col-md-5"> Type : </div>
                                <div class="col-md-7">
                                    @if($user->user_id == 0)
                                        <span class="label label-danger">Guest</span>
                                    @else
                                       <span class="label label-success">User</span>
                                    @endif
                                </div>
                            </div>
                           <div class="col-md-4">
                                <div class="col-md-5"> Mobile : </div>
                                <div class="col-md-7">
                                  +{{$user->country_code}} {{$user->mobile}}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-5"> Nationality : </div>
                                <div class="col-md-7"> {{$user->nationality}} </div>
                            </div>
                        </div>
                        <br>
                    </div>
				    <hr>
				    <div class="row">
				        <div class="col-md-12">
				            <b>Payment Details:</b>
				        </div>
                        <br><br>
				        <div class="col-md-6">
					        <div class="col-md-3"> Res NUmber : </div>
					        <div class="col-md-9"> {{$reservation->id}} </div>
					       	<br><br>
					        <div class="col-md-3"> Total Amount : </div>
					        <div class="col-md-9"> $ {{$reservation->total_amount}}</div>
					        <br><br>
					        <div class="col-md-3"> Amount Paid : </div>
					        <div class="col-md-9">
					          @if($reservation->total_paid == 1) 
                                <span class="label label-success">Yes</span>
                              @else
                                <span class="label label-danger">No</span>
                              @endif
					        </div>
					        <br>
					    </div>
					    <div class="col-md-6">
					        <div class="col-md-3"> Status : </div>
					        <div class="col-md-9">
					            @if($reservation->status == 1)
                                <span class="label label-primary">pending</span>
                                @elseif($reservation->status == 0)
                                <span class="label label-danger">cancelled</span>
                                @elseif($reservation->status == 2)
                                <span class="label label-success">confirmed</span>
                                @endif
					        </div>
					        <br><br>
					       	<div class="col-md-3"> Deposit : </div>
					        <div class="col-md-9"> $ {{$reservation->deposit_amount}}</div>
					       	<br><br>
                            <div class="col-md-3"> Deposit Paid : </div>
					        <div class="col-md-9"> 
                                  @if($reservation->total_paid == 1) 
                                    <span class="label label-success">Yes</span>
                                  @else
                                    <span class="label label-danger">No</span>
                                  @endif
                            </div>
					       	<br><br>
					    </div>
				    </div>
                    <hr>
				    <div class="row">
				        <div class="col-md-12">
				            <b>Reservation Details:</b>
				        </div>
                        <br><br>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="col-md-4"> Arrival Date : </div>
                                <div class="col-md-8"> {{$reservation->arrivaldate}}  </div>
                            </div>
                        
                            <div class="col-md-6">
                                <div class="col-md-4"> Depature Date : </div>
                                <div class="col-md-8"> {{$reservation->depaturedate }}  </div>
                            </div>
                        </div>
                        <br>
                        @if($reservation->prices_type == 1)
                        <div class="row">  
                            <div class="col-md-6">
                                <div class="col-md-4"> Number of persons : </div>
                                <div class="col-md-8"> {{$reservation->persons}}  person</div>
                            </div>
                        
                            <div class="col-md-6">
                                <div class="col-md-4"> Number of childs : </div>
                                <div class="col-md-8"> {{$reservation->childs1 + $reservation->childs2 }}  child</div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            @if($reservation->single != null)
                            <div class="col-md-6">
                                <div class="col-md-4"> Single Rooms : </div>
                                <div class="col-md-8"> {{$reservation->single}}  Room</div>
                            </div>
                            @endif
                            
                            @if($reservation->double != null)
                            <div class="col-md-6">
                                <div class="col-md-4"> Double Rooms : </div>
                                <div class="col-md-8"> {{$reservation->double }}  Room</div>
                            </div>
                            @endif
                            
                            @if($reservation->triple != null)
                            <div class="col-md-6">
                                <div class="col-md-4"> Triple Rooms : </div>
                                <div class="col-md-8"> {{$reservation->triple }}  Room</div>
                            </div>
                            @endif
                        </div>
                        @elseif($reservation->prices_type == 2)
                            <div class="row">  
                            <div class="col-md-6">
                                <div class="col-md-4"> Number of persons : </div>
                                <div class="col-md-8"> {{$reservation->persons}}  person</div>
                            </div>
                        </div>
                        @endif 
				    </div>
                    <hr>
				    <div class="row">
				        <div class="col-md-12">
				            <b>Notes:</b>
				        </div>
                        <br><br>
				        <div class="col-md-6">
					        <div class="col-md-3"> User Notes : </div>
					        <div class="col-md-9"> {!! $reservation->user_notes !!} </div>
					       	<br><br>
					        
					    </div>
					    <div class="col-md-6">
					        <div class="col-md-3"> Agent Notes : </div>
					        <div class="col-md-9"> {!! $reservation->agent_notes !!} </div>
					       	<br><br>
					    </div>
				    </div>
                </div>
                <br><br>  
				</div>
			</div>
		</div>
	</div>
@stop