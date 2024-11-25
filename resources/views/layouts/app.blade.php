<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title')</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Arizonia&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{asset('css/animate.css')}}">
	<link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
	<link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}">
	<link rel="stylesheet" href="{{asset('css/jquery.timepicker.css')}}">
	<link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
	<link rel="stylesheet" href="{{asset('css/custom.css')}}">
	@yield('header')
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="{{route('index')}}">
				{{--Labdhi<span>Tirth Dham</span>--}}
				<img src="{{asset('images/logo.png')}}" style="width: 100%;">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item {{ Route::currentRouteName() == 'index' ? 'active' : '' }}"><a href="{{route('index')}}" class="nav-link">Home</a></li>
					<li class="nav-item {{ Route::currentRouteName() == 'about' ? 'active' : '' }}"><a href="{{route('about')}}" class="nav-link">About</a></li>
					<li class="nav-item {{ (Route::currentRouteName() == 'donor') || (Route::currentRouteName() == 'get.donor') ? 'active' : '' }}"><a href="{{route('donor')}}" class="nav-link">Donor</a></li>
					<li class="nav-item {{ Route::currentRouteName() == 'room' ? 'active' : '' }}"><a href="{{route('room')}}" class="nav-link">Room</a></li>
					<li class="nav-item mobile_hide">
			            <div class="dropdown">
			                <div class="dropdown-toggle" id="galleryDropdownLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
			                	Gallery
			                </div>
			                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="galleryDropdownLink">
			                	<a class="dropdown-item {{ (Route::currentRouteName() == 'room.gallery') || (Route::currentRouteName() == 'room.gallery.album') ? 'active' : '' }}" href="{{route('room.gallery')}}">Room Photos</a>
		                    	<a class="dropdown-item {{ (Route::currentRouteName() == 'gallery') || (Route::currentRouteName() == 'gallery.album') ? 'active' : '' }}" href="{{route('gallery')}}">Event Photos</a>
			                </div>
			            </div>
			        </li>
			        <li class="nav-item desktop_hide {{ (Route::currentRouteName() == 'room.gallery') || (Route::currentRouteName() == 'room.gallery.album') ? 'active' : '' }}"><a href="{{route('room.gallery')}}" class="nav-link">Room Photos</a></li>
			        <li class="nav-item desktop_hide {{ (Route::currentRouteName() == 'gallery') || (Route::currentRouteName() == 'gallery.album') ? 'active' : '' }}"><a href="{{route('gallery')}}" class="nav-link">Event Photos</a></li>
					<li class="nav-item {{ Route::currentRouteName() == 'contact' ? 'active' : '' }}"><a href="{{route('contact')}}" class="nav-link">Contact</a></li>
					<li class="nav-item mobile_hide">
			            <div class="dropdown">
			                <div class="dropdown-toggle" id="myAccountDropdownLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
			                	My Account
			                </div>
			                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="myAccountDropdownLink">
			                	@if(Auth::check() && (Auth::user()->isUser()))
			                		<a class="dropdown-item {{ (Route::currentRouteName() == 'user.profile') || (Route::currentRouteName() == 'user.profile.edit') ? 'active' : '' }}" href="{{route('user.profile')}}">My Profile</a>
			                		<a class="dropdown-item {{ Route::currentRouteName() == 'user.bookings' ? 'active' : '' }}" href="{{route('user.bookings')}}">My Bookings</a>
									<a class="dropdown-item" href="{{route('logout')}}">Logout</a>
								@elseif(Auth::check() && Auth::user()->isAdmin())
									<a class="dropdown-item" href="{{route('admin.index')}}">Admin</a>
									<a class="dropdown-item" href="{{route('logout')}}">Logout</a>
								@else
			                    	<a class="dropdown-item {{ Route::currentRouteName() == 'login' ? 'active' : '' }}" href="{{route('login')}}">Login</a>
		                    		<a class="dropdown-item {{ Route::currentRouteName() == 'register' ? 'active' : '' }}" href="{{route('register')}}">Register</a>
			                    @endif
			                </div>
			            </div>
			        </li>
			        <li class="nav-item desktop_hide {{ Route::currentRouteName() == 'login' ? 'active' : '' }}"><a href="{{route('login')}}" class="nav-link">Login</a></li>
			        <li class="nav-item desktop_hide {{ Route::currentRouteName() == 'register' ? 'active' : '' }}"><a href="{{route('register')}}" class="nav-link">Register</a></li>
				</ul>
			</div>
		</div>
	</nav>
	@yield('content')
	<section class="ftco-intro ftco-section ftco-no-pt">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 text-center">
					<div class="img bg-1">
						<div class="overlay"></div>
						<h2>Labdhi Tirth Dham</h2>
						{{--<p>We can manage your dream building A small river named Duden flows by their place</p>--}}
						<p class="mb-0"><a href="{{route('room')}}" class="btn btn-primary px-4 py-3">Booking Room</a></p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<footer class="ftco-footer bg-bottom ftco-no-pt bg-class">
		<div class="container">
			<div class="row mb-5">
				<div class="col-md pt-5">
					<div class="ftco-footer-widget pt-md-5 mb-4">
						<h2 class="ftco-heading-2">About</h2>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
						<ul class="ftco-footer-social list-unstyled float-md-left float-lft">
							<li class="ftco-animate"><a href="#"><span class="fa fa-twitter"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="fa fa-facebook"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="fa fa-instagram"></span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md pt-5 border-left">
					<div class="ftco-footer-widget pt-md-5 mb-4 ml-md-5">
						<h2 class="ftco-heading-2">Infromation</h2>
						<ul class="list-unstyled">
							<li><a href="#" class="py-2 d-block">Online Enquiry</a></li>
							<li><a href="#" class="py-2 d-block">General Enquiries</a></li>
							<li><a href="#" class="py-2 d-block">Booking Conditions</a></li>
							<li><a href="#" class="py-2 d-block">Privacy and Policy</a></li>
							<li><a href="#" class="py-2 d-block">Refund Policy</a></li>
							<li><a href="#" class="py-2 d-block">Call Us</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md pt-5 border-left">
					<div class="ftco-footer-widget pt-md-5 mb-4">
						<h2 class="ftco-heading-2">Experience</h2>
						<ul class="list-unstyled">
							<li><a href="#" class="py-2 d-block">Adventure</a></li>
							<li><a href="#" class="py-2 d-block">Hotel and Restaurant</a></li>
							<li><a href="#" class="py-2 d-block">Beach</a></li>
							<li><a href="#" class="py-2 d-block">Nature</a></li>
							<li><a href="#" class="py-2 d-block">Camping</a></li>
							<li><a href="#" class="py-2 d-block">Party</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md pt-5 border-left">
					<div class="ftco-footer-widget pt-md-5 mb-4">
						<h2 class="ftco-heading-2">Have a Questions?</h2>
						<div class="block-23 mb-3">
							<ul>
								<li><span class="icon fa fa-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
								<li><a href="#"><span class="icon fa fa-phone"></span><span class="text">+2 392 3929 210</span></a></li>
								<li><a href="#"><span class="icon fa fa-paper-plane"></span><span class="text">info@yourdomain.com</span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
					<p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</p>
				</div>
			</div>
		</div>
	</footer>
	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
	<script src="{{asset('js/jquery.min.js')}}"></script>
	<script src="{{asset('js/jquery-migrate-3.0.1.min.js')}}"></script>
	<script src="{{asset('js/popper.min.js')}}"></script>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
	<script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
	<script src="{{asset('js/jquery.stellar.min.js')}}"></script>
	<script src="{{asset('js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{asset('js/jquery.animateNumber.min.js')}}"></script>
	<script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
	<script src="{{asset('js/scrollax.min.js')}}"></script>
	<script src="{{asset('js/main.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/additional-methods.min.js"></script>
	<script src="{{asset('js/validation-additional.js')}}"></script>
	@yield('footer')
</body>
</html>