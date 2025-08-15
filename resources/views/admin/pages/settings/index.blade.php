@extends('admin.layouts.app')
@section('breadcrumb')
<li><a href="{{url('/admin/dashboard')}}"><i class="icon-home2 position-left"></i> Dashboard</a></li>
<li class="active">Main Settings</li>
@stop
@section('page-content')
	   
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h6 class="panel-title"><i class="icon-cogs"> </i> Main Settings	</h6>
						<hr>
					</div>
					<div class="container-fluid">
						{!! Form::Open(['url' => '/admin/save-settings', 'method' => 'POST']) !!}
                    @foreach($sitesettings as $setting)
                    <div class="form-group{{ $errors->has($setting->name_setting) ? ' has-error' : '' }}">
                        <div class="col-md-2"> 
                            {{$setting->slug}}
                        </div>
                        <div class="col-md-8">
                            {!! Form::text($setting->name_setting, $setting->value, ['class' => 'form-control', 'placeholder' => '']) !!}
                            @if ($errors->has($setting->name_setting))
                            <span class="help-block">
                                  <strong>{{ $errors->first($setting->name_setting) }}</strong>
                              </span>
                            @endif
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    @endforeach
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