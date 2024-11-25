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
       <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="fa fa-chevron-right"></i></a></span> <span>Contact us <i class="fa fa-chevron-right"></i></span></p>
       <h1 class="mb-0 bread">Contact us</h1>
     </div>
   </div>
 </div>
</section>
<section class="ftco-section ftco-no-pb contact-section mb-4">
  <div class="container">
    <div class="row d-flex contact-info">
      <div class="col-md-3 d-flex">
        <div class="align-self-stretch box p-4 text-center">
          <div class="icon d-flex align-items-center justify-content-center">
            <span class="fa fa-map-marker"></span>
          </div>
          <h3 class="mb-2">Address</h3>
          <p>N.H. 8, Baleshwar, Gujarat 394305</p>
        </div>
      </div>
      <div class="col-md-3 d-flex">
        <div class="align-self-stretch box p-4 text-center">
          <div class="icon d-flex align-items-center justify-content-center">
            <span class="fa fa-phone"></span>
          </div>
          <h3 class="mb-2">Contact Number</h3>
          <p><a href="tel://1234567920">90549 72120</a></p>
        </div>
      </div>
      <div class="col-md-3 d-flex">
        <div class="align-self-stretch box p-4 text-center">
          <div class="icon d-flex align-items-center justify-content-center">
            <span class="fa fa-paper-plane"></span>
          </div>
          <h3 class="mb-2">Email Address</h3>
          <p><a href="mailto:info@yoursite.com">info@labdhidhamtirth.in</a></p>
        </div>
      </div>
      <div class="col-md-3 d-flex">
        <div class="align-self-stretch box p-4 text-center">
          <div class="icon d-flex align-items-center justify-content-center">
            <span class="fa fa-globe"></span>
          </div>
          <h3 class="mb-2">Website</h3>
          <p><a href="https://labdhidhamtirth.in/">labdhidhamtirth.in</a></p>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="ftco-section contact-section ftco-no-pt">
  <div class="container">
    <div class="row block-9">
      <div class="col-md-6 order-md-last d-flex">
        <form id="contact-form" name="contact-form" class="bg-light p-5 contact-form" action="{{route('save.contact')}}" method="POST">
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
            <input type="text" id="name" name="name" class="form-control" placeholder="Your Name">
          </div>
          <div class="form-group">
            <input type="text" id="email" name="email" class="form-control" placeholder="Your Email">
          </div>
          <div class="form-group">
            <input type="text" id="subject" name="subject" class="form-control" placeholder="Subject">
          </div>
          <div class="form-group">
            <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
          </div>
          <div class="form-group">
            <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
          </div>
        </form>
      </div>
      <div class="col-md-6 d-flex">
		<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d18221.260096526923!2d72.97150504944982!3d21.132497887940968!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be05b72c35cc349%3A0x8fc77f6310ef5778!2sShri%20Labdhi%20Vikram%20Raj%20Yashsurjiswari%20Jain%20Tirth.!5e0!3m2!1sen!2sin!4v1726831372516!5m2!1sen!2sin" width="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </div>
</section>
@endsection
@section('footer')
<script>
  (function() {
    $('#contact-form').validate({
      rules: {
        name: {
          required: true
        },
        email: {
          required: true,
          alphanumeric: true,
          maxlength: 155,
        },
        subject: {
          required: true
        },
        message: {
          required: true
        }
      },
      messages:{
        name: {
          required: "Please enter your name."
        },
        email:{
          required: "Please enter your email.",
          email: "Please provide a valid email."
        },
        subject:{
          required: "Please enter your subject."
        },
        message:{
          required: "Please enter your message."
        }
      }
    });
  })();
</script>
@endsection