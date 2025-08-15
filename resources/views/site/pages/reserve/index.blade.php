@extends('site.layouts.app')
@section('title')
- Reservation
@endsection
@section('seo')
    @if(getLang() == 1)
<meta name="description" content=" {{getSetting('site_description_en')}}">
        <meta name="keywords" content=" {{getSetting('site_keyword_en')}}">
    @elseif(getLang() == 2)
<meta name="description" content=" {{getSetting('site_description_es')}}">
        <meta name="keywords" content=" {{getSetting('site_keyword_es')}}">
    @elseif(getLang() == 3)
<meta name="description" content=" {{getSetting('site_description_pt')}}">
        <meta name="keywords" content=" {{getSetting('site_keyword_pt')}}">
    @endif
@endsection
@section('content')
   <div class="gap"></div>
    <div class="container">
        <form action="{{url('/new-reservation')}}" method="POST">
        {{ csrf_field() }}
            <div class="row row-wrap">
                
                <div class="col-md-4">
                    @if(!Auth::user())
                    <div class="form-group form-group-icon-left"><i class="fa fa-user input-icon input-icon-show"></i>
                        <label>{{ trans('site.tours.full-name') }}</label>
                        <input type="text" name="fullname" class="form-control" placeholder="e.g. John Doe"  />
                    </div>
                    <div class="form-group form-group-icon-left"><i class="fa fa-envelope input-icon input-icon-show"></i>
                        <label>{{ trans('site.tours.email') }}</label>
                        <input type="email" name="email" class="form-control" placeholder="e.g. johndoe@gmail.com"  />
                    </div>
                    
                    <div class="radio-inline radio-small">
                        <label>
                            <input value="1" class="i-radio" type="radio" name="gender" />{{ trans('site.tours.male') }}</label>
                    </div>
                    <div class="radio-inline radio-small">
                        <label>
                            <input value="0" class="i-radio" type="radio" name="gender" />{{ trans('site.tours.female') }}</label>
                    </div>
                    <div class="gap gap-mini"></div>

                    <div class="checkbox create-account">
                        <label>
                            <input type="checkbox" id="accountcheckbox" name="createuser" /><p>{{ trans('site.tours.create-account') }}</p>
                        </label>
                    </div>
                    
                    <div class="reserve-password" style="display:none;">
                        <div class="form-group form-group-icon-left"><i class="fa fa-lock input-icon input-icon-show"></i>
                            <label>{{ trans('site.tours.password') }}</label>
                            <input type="password"  name="password" class="form-control" placeholder="{{ trans('site.tours.password') }}" />
                        </div>
                        <div class="form-group form-group-icon-left"><i class="fa fa-lock input-icon input-icon-show"></i>
                            <label>{{ trans('site.tours.confirm-password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ trans('site.tours.confirm-password') }}">
                        </div>
                    </div>
                    <div class="gap gap-mini"></div>
                    
                    <span class="pull-left">{{ trans('site.tours.do-you-have-an-account') }}<a href="#" data-toggle="modal" data-target="#login-modal">{{ trans('site.global.header.login') }}</a></span>
                    @else
                    <div class="gap gap-mini"></div>
                    <p>Welcome : {{ Auth::user()->name }}</p>
                    <p>You will reserve this tour with your</p> 
                    <p> registered email : <span class="text-color">{{ Auth::user()->email }}</span></p>
                    @endif
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label>{{ trans('site.tours.nationality') }}</label>
                        <select id="nationality" class="form-control" name="nationality" required="" aria-required="true">
                        @include('site.pages.reserve.nationalitys')
                </select>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label>{{ trans('site.tours.country-code') }}</label>
                        <select name="country_code"  class="form-control"  id="country_code"  aria-required="true">
							@include('site.pages.reserve.country-code')
						</select>
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-icon-left"><i class="fa fa-mobile input-icon input-icon-show"></i>
                        <label>{{ trans('site.tours.mobile') }}</label>
                        <input type="text" name="mobile" class="form-control" placeholder="" required />
                    </div>
                    </div>
                    
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>{{ trans('site.tours.special-request') }}</label>
                             <textarea class="form-control" name="user_notes" rows="6" ></textarea>
                        </div>
                    </div>
                </div>
                @if($item->prices_type == 1)
                    @include('site.pages.reserve.summary-per-room')
                @elseif($item->prices_type == 2)
                    @include('site.pages.reserve.summary-per-pax')
                @elseif($item->prices_type == 3)
                    @include('site.pages.reserve.summary-per-room')
                @endif
                
            </div>
            <div class="row row-wrap text-center">
                <input class="btn btn-primary" type="submit" value="{{ trans('site.tours.confirm') }}" />
            </div>
        </form>
        <div class="gap"></div>
    </div>
    <div  class="modal fade" role="dialog" id="login-modal">
        <div class="modal-dialog">
			<!-- Modal content-->
            <div class="modal-content">
				<form class="form-horizontal" role="form" method="POST" action="#">
                        <meta name="csrf-token" content="{{ csrf_token() }}">
						<div class="panel panel-body login-form">
							
                            <div class="row text-center">
                                <div class="col-md-8 col-md-offset-2">
                                    <h3>{{ trans('site.tours.login-to-your-account') }}</h3>
                                    
                                    <div class="form-group form-group-icon-left"><i class="fa fa-user input-icon input-icon-show"></i>
                                        <br>
                                        <input type="email" name="email" id="email" class="form-control" placeholder="e.g. johndoe@gmail.com"  required autofocus />
                                    </div>
                                    <div class="form-group form-group-icon-left"><i class="fa fa-lock input-icon input-icon-show"></i>
                                        <br>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="{{ trans('site.tours.password') }}" required/>
                                    </div>
        							
        							<div class="form-group">
        								<button type="submit" id="submit-signin" class="btn btn-primary btn-block">{{ trans('site.tours.sign-in') }}
        								</button>
        							</div>
        							<div style="display:none;" id="alert" class="alert alert-danger text-center">
    								    
    								</div>
                                </div>
                            </div>
						</div>
					</form>
			</div>
		</div>
	  </div>
@endsection
@section('script')
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('#accountcheckbox').change(function(e) {
            e.preventDefault();
            if(this.checked) {
                 jQuery('.reserve-password').css("display","block");
                 jQuery('.create-account').css("display","none");
            }      
        });
    });

</script>
<script type="text/javascript">
     jQuery(document).ready(function(){
        var token = jQuery('meta[name="csrf-token"]').attr('content');
        jQuery('#submit-signin').click(function(e){
            jQuery("#alert").css("display","none");
           e.preventDefault();
           jQuery.ajax({
              url: "{{ url('/sessionstore') }}",
              headers: {'X-CSRF-TOKEN': token},
              method: 'post',
              data: {
                 email: jQuery('#email').val(),
                 password: jQuery('#password').val(),
              },
              success: function(result){
                  if(result['status'] == 1){
                      location.reload();
                  }
                  if(result['status'] == 0){
                      jQuery("#alert").css("display","block");
                      jQuery("#alert").html(result['msg']);
                  }
                 
              }});
       });
    });
</script>

@endsection
