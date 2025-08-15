@extends('admin.layouts.app')
@section('breadcrumb')
<li><a href="{{url('/admin/dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
<li class="active">Terms and Conditions Settings</li>
@stop
@section('page-content')
	   
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h6 class="panel-title"><i class="icon-cogs"> </i> Terms and Conditions Settings	</h6>
						<hr>
					</div>
					<div class="container-fluit">
					{!! Form::Open(['url' => '/admin/save-terms-settings', 'method' => 'POST']) !!}
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
                                @foreach($pagessettings as $setting)
                                @if($setting->locale_id == 1)
                                <div class="form-group">
                                    <div class="col-md-12"> 
                                        {{$setting->slug}}
                                    </div>
                                    <div class="col-md-12" style="margin-top:20px;">
                                        
                                        {!! Form::textarea($setting->name_setting, $setting->value, ['class' => 'summernote', 'placeholder' => '']) !!}
                                        
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <br><br>
                                @endif
                                @endforeach
                            </div>
                            <div class="tab-pane" id="toolbar-justified-pill2">
                                @foreach($pagessettings as $setting)
                                @if($setting->locale_id == 2)
                                <div class="form-group">
                                    <div class="col-md-12"> 
                                        {{$setting->slug}}
                                    </div>
                                    <div class="col-md-12" style="margin-top:20px;">
                                        
                                        {!! Form::textarea($setting->name_setting, $setting->value, ['class' => 'summernote', 'placeholder' => '']) !!}
                                        
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <br><br>
                                @endif
                                @endforeach
                            </div>
  
                            <div class="tab-pane" id="toolbar-justified-pill3">
                                @foreach($pagessettings as $setting)
                                @if($setting->locale_id == 3)
                                <div class="form-group">
                                    <div class="col-md-12"> 
                                        {{$setting->slug}}
                                    </div>
                                    <div class="col-md-12" style="margin-top:20px;">
                                        
                                        {!! Form::textarea($setting->name_setting, $setting->value, ['class' => 'summernote', 'placeholder' => '']) !!}
                                        
                                    </div>
                                </div>
                                <div class="clearfix"></div>
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