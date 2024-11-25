@extends('layouts.app')
@section('title') Pacific - Free Bootstrap 4 Template by Colorlib @endsection
@section('header')
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />
<meta name="description" content="" />
<meta name="keywords" content="" />
@endsection
@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
      <div class="col-md-9 ftco-animate pb-5 text-center">
       <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="fa fa-chevron-right"></i></a></span> <span>Edit Profile <i class="fa fa-chevron-right"></i></span></p>
       <h1 class="mb-0 bread">Edit Profile</h1>
     </div>
   </div>
 </div>
</section>
<section class="ftco-section">
  <div class="container">
    <div class="row">
      <div class="profile-section">
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
        <h3>Edit Personal Details</h3>
        <div class="d-flex flex-wrap">
          <form id="edit-profile-form" class="edit-profile" name="edit-profile-form" action="{{route('user.profile.save')}}" method="POST">
            @csrf
            <div class="form-group">
              <input type="email" id="email" name="email" placeholder="Email" class="form-control" value="{{$user->email}}" disabled>
            </div>
            <div class="form-group">
              <input type="text" id="name" name="name" placeholder="Full name" class="form-control" value="{{$user->name}}">
            </div>
            <div class="form-group">
              <input type="text" id="phone" name="phone" placeholder="Mobile Number" class="form-control" value="{{$user->phone}}">
            </div>
            <div class="form-group mb-0 d-flex">
              <button type="submit" name="submit" class="btn btn-primary">Submit</button>
              <a class="btn btn-primary ml-2" href="{{route('user.profile')}}">Cancel</a>
            </div>
          </form>
        </div>
        <h3 class="mt-5">Change Password</h3>
        <div class="d-flex flex-wrap">
          <form id="change-password-form" class="edit-profile" name="change-password-form" action="{{route('user.password.change')}}" method="POST">
            @csrf
            <div class="form-group">
              <input type="password" id="password" name="password" placeholder="Password" class="form-control" maxlength="16">
            </div>
            <div class="form-group">
              <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" class="form-control" maxlength="16">
            </div>
            <div class="form-group mb-0">
              <button type="submit" name="submit" class="btn btn-primary">Change Password</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@section('footer')
<script>
  (function() {
    $('#edit-profile-form').validate({
      rules: {
        name: {
          required: true
        },
        phone: {
          required: true,
          digits: true,
          minlength: 10
        }
      },
      messages:{
        name:{
          required: "Please enter your name."
        },
        phone:{
          required: "Plese enter your mobile number.",
        }
      }
    });
    $('#change-password-form').validate({
      rules: {
        password: {
          required: true,
          strong_password: true
        },
        confirmPassword: {
          required: true,
          equalTo: "#password"
        }
      },
      messages:{
        password:{
          required: "Plese enter your password.",
        },
        confirmPassword:{
          required: "Plese enter your password.",
        }
      }
    });
  })();
</script>
@endsection