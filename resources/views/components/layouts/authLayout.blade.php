
<!DOCTYPE html>
<html lang="en">

	<head>
		<title>{{ $title }}</title>		
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('vendor/fontawesome/css/font-awesome.min.css') }}">
		<link rel="stylesheet" href="{{ asset('vendor/themify-icons/themify-icons.min.css') }}">
		<link href="{{ asset('vendor/animate.css/animate.min.css') }}" rel="stylesheet" media="screen">
		<link href="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.min.css') }}" rel="stylesheet" media="screen">
		<link href="{{ asset('vendor/switchery/switchery.min.css') }}" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/themes/theme-1.css') }}" id="skin_color" />
		<meta name="csrf-token" content="{{ csrf_token() }}"/>
		<script src="{{ asset('js/alphine.min.js') }}" defer></script>
		<link rel="stylesheet" href="{{ asset('css/addstyle.css') }}">

	</head>

	<body class="login">
		
		{{ $slot }}

		<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
		<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('vendor/modernizr/modernizr.js') }}"></script>
		<script src="{{ asset('vendor/jquery-cookie/jquery.cookie.js') }}"></script>
		<script src="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
		<script src="{{ asset('vendor/switchery/switchery.min.js') }}"></script>
		<script src="{{ asset('vendor/jquery-validation/jquery.validate.min.js') }}"></script>
		<script src="{{ asset('assets/js/main.js') }}"></script>
		<script src="{{ asset('assets/js/login.js') }}"></script>

		
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
			});

			$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
			});
		</script>
		
			{{ $script ?? '' }} 
		
			
	</body>
	<!-- end: BODY -->
</html>