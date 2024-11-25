@extends('layouts.app')
@section('title') Labdhi Tirth Dham | Log In @endsection
@section('header')
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />
@endsection
@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight">
  	<div class="overlay"></div>
  	<div class="container">
    	<div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
      		<div class="col-md-9 ftco-animate pb-5 text-center">
       			<p class="breadcrumbs"><span class="mr-2"><a href="{{route('index')}}">Home <i class="fa fa-chevron-right"></i></a></span> <span>Login <i class="fa fa-chevron-right"></i></span></p>
      		 	<h1 class="mb-0 bread">Login</h1>
     		</div>
   		</div>
 	</div>
</section>
<section class="ftco-section auth-section ftco-no-pt mt-5">
  	<div class="container">
    	<div class="row block-9">
	      	<div class="col-md-12 order-md-last d-flex">
	        	<form id="login-form" name="login-form" class="bg-light p-5 auth-form" action="{{route('authenticate')}}" method="POST">
	        		@csrf
					@include('shared.alert')
					@if (count($errors) > 0)
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif
					<div class="form-group">
						<input type="email" id="email" name="email" placeholder="Email" class="form-control" value="{{old('email')}}" maxlength="155">
					</div>
					<div class="form-group">
						<input type="password" id="password" name="password" placeholder="Password" class="form-control" maxlength="16">
					</div>
					<div class="form-group">
						<div class="forgot-password-link">
							<label for="remember_me" class="form-check-label">
								<input type="checkbox" id="remember_me" name="remember_me"><span class="mark"></span><span>Remember me</span>
							</label>
							<a href="{{route('forget_password')}}">Lost your password?</a>
						</div>
					</div>
		          	<div class="form-group">
		            	<button type="submit" name="submit" class="btn btn-primary py-3 px-5">Login</button>
		          	</div>
		          	<div class="text-center">New here? <a href="{{route('register')}}">Create an account</a></div>
	        	</form>
	      	</div>
	   	</div>
 	</div>
</section>
@endsection
@section('footer')
<script>
	(function() {
		$('#login-form').validate({
			rules: {
				email: {
					required: true,
					alphanumeric: true,
					maxlength: 155,
				},
				password: {
					required: true,
					minlength:8,
					maxlength: 16,
				},
			},
			messages:{
			 	email:{
			 		required: "Please enter your email.",
			 		email: "Please provide a valid email."
			 	},
			 	password:{
			 		required: "Plese enter your password.",
			 	}
			},
			submitHandler: function (form) {
				$('#ftco-loader').addClass('show');
				form.submit();
			},
		});
	})();
</script>
@endsection