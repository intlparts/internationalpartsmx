<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->
	{!! SEO::generate() !!}
		
	<!-- <title>International Parts</title> -->
    <link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">
	
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
	<link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/boostrap3.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
	
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	<!-- js -->
	<script src="{{ asset('js/jquery-1.11.1.min.js')}}"></script>
</head>
<body>
	<div class="agileits_header">
		<div class="w3l_offers">
			<a href="{{ route('contacto') }}">¡¡ Lo antederemos !!</a>
		</div>
		<div class="w3l_search">
			<form action="{{ route('index') }}" method="get">
				<input type="text" name="pieza" value="" placeholder="Número de parte" required>
				<input type="submit" value="Buscar">
			</form>
		</div>
		<div class="w3l_header_right1">
			<h2><a href="{{ route('contacto') }}">Contáctanos</a></h2>
		</div>
		<div class="clearfix"> </div>
	</div>
    <div class="logo_products">
		<div class="container">
			<div class="w3ls_logo_products_left">
				<h1><a href="{{ route('index') }}"><span>International</span> Parts</a></h1>
			</div>
			<div class="w3ls_logo_products_left1">
				<ul class="special_items">          
					<li><a href="{{ route('index') }}">Inicio</a><i>/</i></li>
					<li><a href="{{ route('fabricantes') }}">Fabricantes</a><i>/</i></li>
                    <li><a href="{{ route('quienes-somos') }}">Quienes Somos</a><i>/</i></li>
                    <li><a href="{{ route('contacto') }}">Contacto</a></li>
				</ul>
			</div>
			<div class="w3ls_logo_products_left1">
				
				<ul class="phone_email">
					<li><i class="fa fa-phone" aria-hidden="true"></i><a href="https://api.whatsapp.com/send?phone=+523323068550" target="_blank">+52 (33) 2306 85 50</a></li>
					<li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:{{env('MAIL_FROM_RECIVED')}}">{{env('MAIL_FROM_RECIVED')}}</a></li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
    </div>
    <div class="products-breadcrumb">
		<div class="container">
		</div>
    </div>
    <div class="banner">
		<div class="w3l_banner_nav_left">
			<nav class="navbar nav_bottom">
			 <!-- Brand and toggle get grouped for better mobile display -->
			  <div class="navbar-header nav_2">
				  <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
			   </div> 
			   <!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav nav_1">
                        @foreach ($top10Fabricantes as $fabricante)
                            <li><a href="{{ route('fabricante', ['name'=> $fabricante->name]) }}">{{$fabricante->name}}</a></li>
                        @endforeach
                        <li><a href="{{ route('fabricantes') }}">Ver todos</a></li>
					</ul>
				 </div><!-- /.navbar-collapse -->
			</nav>
		</div>
		<div class="w3l_banner_nav_right">
			@yield('section__banner_right')
<!---728x90--->
		</div>
		<div class="clearfix"></div>
	</div>
    @yield('content')
	<script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <div class="footer">
		<div class="container">
			<div class="col-md-3 w3_footer_grid">
				<h3>Menu</h3>
				<ul class="w3_footer_grid_list">
					<li><a href="{{ route('index') }}">Inicio</a><i>/</i></li>
					<li><a href="{{ route('fabricantes') }}">Fabricantes</a><i>/</i></li>
                    <li><a href="{{ route('quienes-somos') }}">Quienes Somos</a></li>
                    <li><a href="{{ route('contacto') }}">Contacto</a></li>
				</ul>
			</div>
            <div class="col-md-3 w3_footer_grid agile_footer_grids_w3_footer">
                <div class="w3_footer_grid_bottom">
                    <h5>connect with us</h5>
                    <ul class="agileits_social_icons">
                        <li><a href="https://www.facebook.com/International-Parts-893892907355420" target="_blank" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="https://twitter.com/interparts5" target="_blank" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="https://plus.google.com/109664838656190104383" class="google"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        <!-- <li><a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li> -->
                    </ul>
                </div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--Start of Tawk.to Script-->
<script type="text/javascript">
	var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
	(function(){
	var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
	s1.async=true;
	s1.src='https://embed.tawk.to/56b4d3b65d8a6c387d75fe58/page';
	s1.charset='UTF-8';
	s1.setAttribute('crossorigin','*');
	s0.parentNode.insertBefore(s1,s0);
	})();
	</script>
	<!--End of Tawk.to Script-->
</body>
</html>
