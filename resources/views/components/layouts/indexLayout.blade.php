<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> R.S Family Optical </title>
    <link href="{{ asset('css/addstyle.css') }}" rel="stylesheet" type="text/css"  media="all" />
    <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet" type="text/css"  media="all" />
    <link href='http://fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('css/responsiveslides.css') }}">
    <script src="{{ asset('js/alphine.min.js') }}" defer></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="{{ asset('js/responsiveslides.min.js') }}"></script>
    
       
</head>
<body>
    <!--start-header-->
        <div class="header">
            <div class="wrap">
                <!--start-logo-->
                <div class="logo">
                    <a href="/" style="font-size: 30px;">R.S Family Optical</a>
                </div>
                <!--end-logo-->
                <!--start-top-nav-->
                <div class="top-nav">
                    <ul>
                        <li class="class = {{ Request::is('/') ? 'active' : '' }}"><a href="/">Home</a></li>
                        
                        <li class = "{{ Request::is('contactus') ? 'active' : '' }}"><a href="/contactus">contact</a></li>
                    </ul>					
                </div>
                <div class="clear"> </div>
            </div>
            <!--end-top-nav-->
        </div>
	<!--end-header-->

    {{ $slot }}

	<!--start-footer-->
    <div class="footer">
        <div class="wrap">
            <div class="footer-left">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/contactus">contact</a></li>
                </ul>
            </div>
            <div class="clear"> </div>
        </div>
    </div>

</body>
</html>