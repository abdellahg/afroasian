@extends('admin.layouts.app')
@section('breadcrumb')
<li><a href="{{url('/admin/dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
<li class="active">Home Page Settings</li>
@stop
@section('page-content')
	   
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h6 class="panel-title"><i class="icon-cogs"> </i> Home Page Settings	</h6>
						<hr>
					</div>
					<div class="container-fluid">
						{!! Form::Open(['url' => '/admin/save-home-settings', 'method' => 'POST']) !!}

                    <div class="form-group">
                        <div class="col-md-3"> 
                            {{$homeslider->slug}}
                        </div>
                        <div class="col-md-8">
                    @php 
                     if(isset($homeslider)){
                        $slider = explode(',',$homeslider->value);
                     }
                     @endphp
                     <!-- Default multiselect -->
						<div class="multi-select-full">
							<select class="multiselect" multiple="multiple" name="home_slider[]" id="home-slider-id">
								@foreach ($items as $item)
                                    <option value="{{ $item->id }}" @if(isset($item))
                                    @if( in_array($item->id ,$slider) ) selected @endif @endif >{{ $item->name }}</option>
                                 @endforeach
							</select>
							<span class="home-slider-error"> </span>
						</div>
					<!-- /default multiselect -->
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    
                    <br>
                    <hr>
                    <br>
                    
                    <div class="form-group">
                        <div class="col-md-3"> 
                            {{$populartours->slug}}
                        </div>
                        <div class="col-md-8">
                    @php 
                     if(isset($populartours)){
                        $mostpopulartours = explode(',',$populartours->value);
                     }
                     @endphp
                     <!-- Default multiselect -->
						<div class="multi-select-full">
							<select class="multiselect" multiple="multiple" name="popular_tour[]" id="home-popular-tour-id">
								@foreach ($items as $item)
                                    <option value="{{ $item->id }}" @if(isset($item))
                                    @if( in_array($item->id ,$mostpopulartours) ) selected @endif @endif >{{ $item->name }}</option>
                                 @endforeach
							</select>
							<span class="home-popular-tour-error"> </span>
						</div>
					<!-- /default multiselect -->
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    
                    <br>
                    <hr>
                    <br>
                    
                    <div class="form-group">
                        <div class="col-md-3"> 
                            {{$bestoffers->slug}}
                        </div>
                        <div class="col-md-8">
                    @php 
                     if(isset($bestoffers)){
                        $homebestoffers = explode(',',$bestoffers->value);
                     }
                     @endphp
                     <!-- Default multiselect -->
						<div class="multi-select-full">
							<select class="multiselect" multiple="multiple" name="best_offer[]" id="home-best-offers-id">
								@foreach ($items as $item)
                                    <option value="{{ $item->id }}" @if(isset($item))
                                    @if( in_array($item->id ,$homebestoffers) ) selected @endif @endif >{{ $item->name }}</option>
                                 @endforeach
							</select>
							<span class="home-best-offers-error"> </span>
						</div>
					<!-- /default multiselect -->
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    
                    <br>
                    <hr>
                    <br>
                    
                    <div class="form-group">
                        <div class="col-md-3"> 
                            {{$otherdestinations->slug}}
                        </div>
                        <div class="col-md-8">
                    @php 
                     if(isset($otherdestinations)){
                        $homeotherdestinations = explode(',',$otherdestinations->value);
                     }
                     @endphp
                     <!-- Default multiselect -->
						<div class="multi-select-full">
							<select class="multiselect" multiple="multiple" name="other_destination[]" id="home-other-destination-id">
								@foreach ($destinations as $destination)
                                    <option value="{{ $destination->id }}" @if(isset($destination))
                                    @if( in_array($destination->id ,$homeotherdestinations) ) selected @endif @endif >{{ $destination->name }}</option>
                                 @endforeach
							</select>
							<span class="home-other-destination-error"> </span>
						</div>
					<!-- /default multiselect -->
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    
                    <br>
                    
                    <hr>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-2 text-center">
                            <button type="submit" class="btn btn-info" name="submit">
                                <i class="fa fa-btn fa-save"></i> Save Updates
                            </button>
                        </div>
                    </div>
                    
                    
                    {!! Form::close() !!}
                        <div class="clearfix"></div>
                        <br><br>
					</div>
				</div>
			</div>
		</div>
@stop