<div class="form-group{{ $errors->has('en[name]') ? ' has-error' : '' }}">
        <div class="col-md-2"> 
            Name EN
        </div>
        <div class="col-md-6">
            {!! Form::text('en[name]', null, ['class' => 'form-control', 'required' => '', 'placeholder' => 'Name EN']) !!}

            @if ($errors->has('en[name]'))
                <span class="help-block">
                      <strong>{{ $errors->first('en[name]') }}</strong>
                  </span>
            @endif

            <br>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="form-group{{ $errors->has('es[name]') ? ' has-error' : '' }}">
        <div class="col-md-2"> 
            Name ES
        </div>
        <div class="col-md-6">
            {!! Form::text('es[name]', null, ['class' => 'form-control', 'required' => '', 'placeholder' => 'Name ES']) !!}

            @if ($errors->has('es[name]'))
                <span class="help-block">
                      <strong>{{ $errors->first('es[name]') }}</strong>
                  </span>
            @endif

            <br>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="form-group{{ $errors->has('pt[name]') ? ' has-error' : '' }}">
        <div class="col-md-2"> 
            Name PT
        </div>
        <div class="col-md-6">
            {!! Form::text('pt[name]', null, ['class' => 'form-control', 'required' => '', 'placeholder' => 'Name PT']) !!}

            @if ($errors->has('pt[name]'))
                <span class="help-block">
                      <strong>{{ $errors->first('pt[name]') }}</strong>
                  </span>
            @endif

            <br>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }}">
        <div class="col-md-2"> 
            Order
        </div>
        <div class="col-md-6">
            {!! Form::text('order', null, ['class' => 'form-control', 'required' => '', 'placeholder' => 'Order']) !!}

            @if ($errors->has('order'))
                <span class="help-block">
                      <strong>{{ $errors->first('order') }}</strong>
                  </span>
            @endif

            <br>
        </div>
    </div>
    <div class="clearfix"></div>
     <div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
         <div class="col-md-2"> 
            Status
        </div>
         <div class="col-md-6">
             {!! Form::select('active', ['1'=>'Active','0'=>'Not active'], null, ['class' => 'form-control']) !!}

             @if ($errors->has('active'))
                 <span class="help-block">
                     <strong>{{ $errors->first('active') }}</strong>
                  </span>
             @endif

             <br>
         </div>
     </div>
     
     <div class="clearfix"></div>
     <div class="form-group{{ $errors->has('at_menu') ? ' has-error' : '' }}">
         <div class="col-md-2"> 
            Show at Menu
        </div>
         <div class="col-md-6">
             {!! Form::select('at_menu', ['1'=>'Yes','0'=>'No'], null, ['class' => 'form-control']) !!}

             @if ($errors->has('at_menu'))
                 <span class="help-block">
                     <strong>{{ $errors->first('at_menu') }}</strong>
                  </span>
             @endif

             <br>
         </div>
     </div>


    <div class="form-group">
        <div class="col-md-6 col-md-offset-2 text-center">
            <button type="submit" class="btn btn-info">
                <i class="fa fa-btn fa-user"></i> Save
            </button>
            <br><br>
        </div>
    </div>

