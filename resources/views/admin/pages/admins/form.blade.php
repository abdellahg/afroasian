<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <div class="col-md-6 col-md-offset-3">
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}

            @if ($errors->has('name'))
                <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
            @endif

            <br>
        </div>
    </div>
    
     <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
         <div class="col-md-6 col-md-offset-3">
             {!! Form::select('role', ['2'=>'Admin','3'=>'Editor'], null, ['class' => 'form-control', 'placeholder' => 'Select role']) !!}

             @if ($errors->has('role'))
                 <span class="help-block">
                      <strong>{{ $errors->first('role') }}</strong>
                  </span>
             @endif

             <br>
         </div>
     </div>


     <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <div class="col-md-6 col-md-offset-3">
            {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}

            @if ($errors->has('email'))
                <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
            @endif
            <br>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-6 col-md-offset-3">
    		<label class="radio-inline">
    			<input value="1" type="radio" name="gender" class="styled" @if(isset($user)) @if($user->gender == 1) checked="checked" @else '' @endif @endif >
    			Male
    		</label>
    
    		<label class="radio-inline">
    			<input value="0"  type="radio" name="gender" class="styled" @if(isset($user)) @if($user->gender == 0) checked="checked" @else '' @endif @endif >
    			Female
    		</label>
		</div>
		<br>
	</div>
	<div class="clearfix"></div>
	<br>
    @if(!isset($user))
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

            <div class="col-md-6 col-md-offset-3">
                <input id="password" type="password" class="form-control" name="password" placeholder="password">

                @if ($errors->has('password'))
                    <span class="help-block">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                @endif
                <br>
            </div>
        </div>

        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <div class="col-md-6 col-md-offset-3">
                <input id="password-confirm" type="password" class="form-control" 
                       name="password_confirmation" placeholder=" Confirm Password ">

                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                          <strong>{{ $errors->first('password_confirmation') }}</strong>
                      </span>
                @endif
                <br>
            </div>
        </div>
    @endif
    <div class="form-group">
        <div class="col-md-6 col-md-offset-3 text-center">
            <button type="submit" class="btn btn-info">
                <i class="fa fa-btn fa-user"></i> Save
            </button>
            <br><br>
        </div>
    </div>

