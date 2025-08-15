<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Travel Admin Login</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/admin/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/admin/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/admin/css/core.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/admin/css/components.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/admin/css/colors.css') }}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="{{ asset('assets/admin/js/plugins/loaders/pace.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/admin/js/core/libraries/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/admin/js/core/libraries/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/admin/js/plugins/loaders/blockui.min.js') }}"></script>
	<!-- /core JS files -->


	<!-- Theme JS files -->
	<script type="text/javascript" src="{{ asset('assets/admin/js/core/app.js') }}"></script>
	<!-- /theme JS files -->

</head>

<body class="login-container bg-slate-800">
	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Simple login form -->
					<form class="form-horizontal" role="form" method="POST" action="#">
                        <meta name="csrf-token" content="{{ csrf_token() }}">
						<div class="panel panel-body login-form">
							<div class="text-center">
								<div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
								<h5 class="content-group">{{getSetting()}} Admin <small class="display-block">Enter your Email and Password below</small></h5>
								<div style="display:none;" id="alert" class="alert alert-danger text-center">
								    
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input id="password" type="password" class="form-control" name="password" required>
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>
							
							<div class="form-group">
								<button type="submit" id="submit-signin" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 position-right"></i></button>
							</div>

							<!--<div class="text-center">-->
							<!--	<a class="btn btn-link" href="{{ url('/password/reset') }}">-->
       <!--                             Forgot Your Password?-->
       <!--                         </a>-->
							<!--</div>-->
						</div>
					</form>
					<!-- /simple login form -->


					<!-- Footer -->
					<div class="footer text-muted text-center">
						&copy; {{date('Y')}}. <a href="#"> {{getSetting()}} Admin </a> Powered by <a href="https://cayan.tech/" target="_blank">cayan.tech</a>
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

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
                      window.location= "{{url('/admin/dashboard')}}"
                  }
                  if(result['status'] == 0){
                      jQuery("#alert").css("display","block");
                      jQuery("#alert").html(result['msg']);
                  }
                 
              }});
           });
        });
  </script>

</body>
</html>