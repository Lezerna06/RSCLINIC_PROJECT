<!DOCTYPE html>
<html lang="en">
	<head>
		<title>R.S Family Optical</title>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta name="csrf-token" content="{{ csrf_token() }}"/>
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('vendor/fontawesome/css/font-awesome.min.css') }}">
		<link rel="stylesheet" href="{{ asset('vendor/themify-icons/themify-icons.min.css') }}">
		<link href="{{ asset('vendor/animate.css/animate.min.css') }}" rel="stylesheet" media="screen">
		<link href="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.min.css') }}" rel="stylesheet" media="screen">
		<link href="{{ asset('vendor/switchery/switchery.min.css') }}" rel="stylesheet" media="screen">
		<link href="{{ asset('vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" media="screen">
		<link href="{{ asset('vendor/select2/select2.min.css') }}" rel="stylesheet" media="screen">
		<link href="{{ asset('vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css') }}" rel="stylesheet" media="screen">
		<link href="{{ asset('vendor/bootstrap-timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}">
		<link rel="stylesheet" href="{{ asset('css/addstyle.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/themes/theme-1.css') }}" id="skin_color" />  
		
	</head>
	<body>
		<div id="app">		
            {{ $sidebar }}
			<div class="app-content">
				{{ $header }}	
                {{ $slot }}
			</div>
		</div>

		<!-- start: MAIN JAVASCRIPTS -->
		<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
		<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('vendor/modernizr/modernizr.js') }}"></script>
		<script src="{{ asset('vendor/jquery-cookie/jquery.cookie.js') }}"></script>
		<script src="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
		<script src="{{ asset('vendor/switchery/switchery.min.js') }}"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="{{ asset('vendor/maskedinput/jquery.maskedinput.min.js') }}"></script>
		<script src="{{ asset('vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
		<script src="{{ asset('vendor/autosize/autosize.min.js') }}"></script>
		<script src="{{ asset('vendor/selectFx/classie.js') }}"></script>
		<script src="{{ asset('vendor/selectFx/selectFx.js') }}"></script>
		<script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
		<script src="{{ asset('vendor/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
		<script src="{{ asset('vendor/bootstrap-timepicker/bootstrap-timepicker.js') }}"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="{{ asset('assets/js/main.js') }}"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="{{ asset('assets/js/form-elements.js') }}"></script>
		<script src="{{ asset('js/alphine.min.js') }}" defer></script>
		
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});

			$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
			});
		</script>
		{{ $script ?? '' }}
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>


