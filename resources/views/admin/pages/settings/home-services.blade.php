@extends('admin.layouts.app')
@section('breadcrumb')
<li><a href="{{url('/admin/dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
<li class="active">Home Services Settings</li>
@stop
@section('page-content')
	   
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h6 class="panel-title"><i class="icon-cogs"> </i> Home Services Settings	</h6>
						<hr>
					</div>
					<div class="container-fluit">
					{!! Form::Open(['url' => '/admin/save-home-services', 'method' => 'POST']) !!}
					<div class="row">
                        <div class="tabbable">
                            <div style="padding:0px 30px;">	
						    <ul class="nav nav-pills nav-pills-toolbar nav-justified">
                                <li class="active"><a href="#toolbar-justified-pill1" data-toggle="tab">English</a></li>
                                <li><a href="#toolbar-justified-pill2" data-toggle="tab">español</a></li>
                                <li><a href="#toolbar-justified-pill3" data-toggle="tab">português</a></li>
                            </ul>
                            
                            <div class="tab-content">
                            
                            <div class="tab-pane active" id="toolbar-justified-pill1">
                                @foreach($homesettings as $setting)
                                @if($setting->locale_id == 1)
                                
                                 @if($setting->type == 'service_title')
                                 <div class="form-group">
                                    <div class="col-md-2"> 
                                        {{$setting->slug}}
                                    </div>
                                    <div class="col-md-8">
                                        {!! Form::text($setting->name_setting, $setting->value, ['class' => 'form-control']) !!}
                                        
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                @else
                                <div class="form-group">
                                    <div class="col-md-2"> 
                                        {{$setting->slug}}
                                    </div>
                                    <div class="col-md-8">
                                        {!! Form::textarea($setting->name_setting, $setting->value, ['class' => 'form-control', 'placeholder' => 'Max 200 character', 'rows' => '2']) !!}
                                        
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                @endif
                                <br><br>
                                @endif
                                @endforeach
                            </div>
                            <div class="tab-pane" id="toolbar-justified-pill2">
                                @foreach($homesettings as $setting)
                                @if($setting->locale_id == 2)
                                
                                @if($setting->type == 'service_title')
                                 <div class="form-group">
                                    <div class="col-md-2"> 
                                        {{$setting->slug}}
                                    </div>
                                    <div class="col-md-8">
                                        {!! Form::text($setting->name_setting, $setting->value, ['class' => 'form-control']) !!}
                                        
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                @else
                                <div class="form-group">
                                    <div class="col-md-2"> 
                                        {{$setting->slug}}
                                    </div>
                                    <div class="col-md-8">
                                        
                                        {!! Form::textarea($setting->name_setting, $setting->value, ['class' => 'form-control', 'placeholder' => 'Max 200 character', 'rows' => '2']) !!}
                                        
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                @endif
                                <br><br>
                                @endif
                                @endforeach
                            </div>
  
                            <div class="tab-pane" id="toolbar-justified-pill3">
                                @foreach($homesettings as $setting)
                                @if($setting->locale_id == 3)
                                
                                @if($setting->type == 'service_title')
                                 <div class="form-group">
                                    <div class="col-md-2"> 
                                        {{$setting->slug}}
                                    </div>
                                    <div class="col-md-8">
                                        {!! Form::text($setting->name_setting, $setting->value, ['class' => 'form-control']) !!}
                                        
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                @else
                                <div class="form-group">
                                    <div class="col-md-2"> 
                                        {{$setting->slug}}
                                    </div>
                                    <div class="col-md-8">
                                        
                                        {!! Form::textarea($setting->name_setting, $setting->value, ['class' => 'form-control', 'placeholder' => 'Max 200 character', 'rows' => '2']) !!}
                                        
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                @endif
                                <br><br>
                                @endif
                                @endforeach
                            </div>
                            
                            </div>
                            
                            <hr>
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-2 text-center">
                                    <button type="submit" class="btn btn-info" name="submit">
                                        <i class="fa fa-btn fa-save"></i> Save Updates
                                    </button>
                                </div>
                            </div>
                            </div>
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