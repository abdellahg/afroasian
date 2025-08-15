@extends('site.layouts.app')
@section('title')
- Login
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
            <div class="row" data-gutter="60">
                
                <div class="col-md-6 col-md-offset-3">
                    <h3>{{ trans('site.tours.login') }}</h3>
                    <form role="form" method="POST" action="#">
                          <meta name="csrf-token" content="{{ csrf_token() }}">
                        <div class="form-group form-group-icon-left"><i class="fa fa-user input-icon input-icon-show"></i>
                            <label>{{ trans('site.tours.email') }}</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="e.g. johndoe@gmail.com"  required autofocus />
                        </div>
                        <div class="form-group form-group-icon-left"><i class="fa fa-lock input-icon input-icon-show"></i>
                            <label>{{ trans('site.tours.password') }}</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="{{ trans('site.tours.password') }}" required/>
                        </div>
                        <button class="btn btn-primary" id="submit-signin"  type="submit">{{ trans('site.tours.sign-in') }}</button> 
                        <span class="pull-right">{{ trans('site.tours.do-you-have-an-account') }}<a href="{{url('/register')}}">{{ trans('site.tours.sign-up') }}</a></span>
                    </form>
                    <br>
                    <div style="display:none;" id="alert" class="alert alert-danger text-center"></div>
                </div>
                
            </div>
        </div>
       <div class="gap"></div>
@endsection
@section('script')
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
                      window.location= "{{url('/')}}"
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