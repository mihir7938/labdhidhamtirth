@extends('layouts.app')
@section('title') Labdhi Tirth Dham | Reset Password @endsection
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
       			<p class="breadcrumbs"><span class="mr-2"><a href="{{route('index')}}">Home <i class="fa fa-chevron-right"></i></a></span> <span>Password Reset <i class="fa fa-chevron-right"></i></span></p>
      		 	<h1 class="mb-0 bread">Password Reset</h1>
     		</div>
   		</div>
 	</div>
</section>
<section class="ftco-section auth-section ftco-no-pt mt-5">
  	<div class="container">
    	<div class="row block-9">
	      	<div class="col-md-12 order-md-last d-flex">
	        	<form id="new-password-form" name="new-password-form" class="bg-light p-5 auth-form" action="{{route('change_password',['token' => $user->remember_token])}}" method="POST">
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
						<input type="password" id="password" name="password" placeholder="New Password" class="form-control" maxlength="16">
					</div>
					<div class="form-group">
						<input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm New Password" class="form-control" maxlength="16">
					</div>
		          	<div class="form-group">
		            	<button type="submit" name="submit" class="btn btn-primary py-3 px-5">Save new password</button>
		          	</div>
	        	</form>
	      	</div>
	   	</div>
 	</div>
</section>
@endsection
@section('footer')
<script>
	(function() {
		$('#new-password-form').validate({
			rules: {
				password: {
					required: true,
					strong_password: true
				},
				confirmPassword: {
					required: true,
					equalTo: "#password"
				},
			},
			messages:{
			 	password:{
			 		required: "Plese enter your password.",
			 	},
			 	confirmPassword:{
			 		required: "Plese enter your password.",
			 	},
			},
			submitHandler: function (form) {
				$('#ftco-loader').addClass('show');
				form.submit();
			},
		});
	})();
</script>
@endsection