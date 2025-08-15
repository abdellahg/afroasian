<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> {{getSetting()}} Admin</title>
	
	<!-- SEO Meta -->
    <link href="" rel="canonical"/>
    <meta name="author" content="Abdellah Gaballah">
    <!--- https://abdellahgaballah.com --->
    <!-- end SEO Meta -->

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/admin/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/admin/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/admin/css/core.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/admin/css/components.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/admin/css/colors.css') }}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->
	<link href="{{ asset('assets/admin/custom/sweetalert.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/admin/custom/css/style.css') }}" rel="stylesheet" type="text/css">
    @yield('page-style')

	<!-- Core JS files -->
	<script type="text/javascript" src="{{ asset('assets/admin/js/plugins/loaders/pace.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/admin/js/core/libraries/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/admin/js/core/libraries/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/admin/js/plugins/loaders/blockui.min.js') }}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="{{ asset('assets/admin/js/plugins/forms/wizards/stepy.min.js') }}"></script>
	
	<script type="text/javascript" src="{{ asset('assets/admin/js/plugins/forms/styling/switchery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/admin/js/plugins/forms/styling/uniform.min.js') }}"></script>
	
	<!-- multiselect -->
	<script type="text/javascript" src="{{ asset('assets/admin/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
	
	<!-- editor -->
	<script type="text/javascript" src="{{ asset('assets/admin/js/plugins/editors/summernote/summernote.min.js') }}"></script>
	
	<!-- datatable -->
	<script type="text/javascript" src="{{ asset('assets/admin/js/plugins/tables/datatables/datatables.min.js') }}"></script>
	
	<script type="text/javascript" src="{{ asset('assets/admin/js/plugins/forms/selects/select2.min.js') }}"></script>
	
	<script type="text/javascript" src="{{ asset('assets/admin/js/core/libraries/jasny_bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/admin/js/plugins/forms/validation/validate.min.js') }}"></script>
	

	
	<script type="text/javascript" src="{{ asset('assets/admin/js/core/app.js') }}"></script>
	
	<script type="text/javascript" src="{{ asset('assets/admin/js/pages/wizard_stepy.js') }}"></script>
	
	<script type="text/javascript" src="{{ asset('assets/admin/js/pages/form_multiselect.js') }}"></script>
	
	<script type="text/javascript" src="{{ asset('assets/admin/js/pages/datatables_basic.js') }}"></script>
	
	<!-- Checkbox -->
	<script type="text/javascript" src="{{ asset('assets/admin/js/plugins/forms/styling/switchery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/admin/js/plugins/forms/styling/switch.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/admin/js/plugins/forms/inputs/touchspin.min.js') }}"></script>
	
	<script type="text/javascript" src="{{ asset('assets/admin/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/admin/js/plugins/ui/moment/moment.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/admin/js/plugins/pickers/daterangepicker.js') }}"></script>
	
	<script type="text/javascript" src="{{ asset('assets/admin/js/plugins/notifications/jgrowl.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/admin/js/pages/form_inputs.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/admin/js/pages/form_input_groups.js') }}"></script>

	<script type="text/javascript" src="{{ asset('assets/admin/js/pages/editor_summernote.js') }}"></script>
	
	<!-- Dashboard JS files -->
	<script type="text/javascript" src="{{ asset('assets/admin/js/pages/dashboard.js') }}"></script>
	
	<!-- Sweetalert JS files -->
	<script type="text/javascript" src="{{ asset('assets/admin/custom/sweetalert.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/admin/custom/sweetalert.min.js') }}"></script>
    
    <script type="text/javascript" src="{{ asset('assets/admin/js/process.js') }}"></script>
	
	 	    @yield('page-script')
	 	
</head>

<body>