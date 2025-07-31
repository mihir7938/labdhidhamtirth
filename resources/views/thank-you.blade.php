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
       <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="fa fa-chevron-right"></i></a></span> <span>Transaction Summary <i class="fa fa-chevron-right"></i></span></p>
       <h1 class="mb-0 bread">Transaction Summary</h1>
     </div>
   </div>
 </div>
</section>
<section class="ftco-section">
  <div class="container">
    <div class="profile-section summary-section">
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
      <h3>Transaction Summary</h3>
      <div class="border-1 p-15">
        <div class="row">
          <div class="col-md-4">
            <span><strong>Transaction Description :</strong></span>
          </div>
          <div class="col-md-8">
            <span>{{ $result->respDescription }}</span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <span><strong>Transaction ID:</strong></span>
          </div>
          <div class="col-md-8">
            <span>{{ $result->txnID }}</span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <span><strong>Payment ID :</strong></span>
          </div>
          <div class="col-md-8">
            <span>{{ $result->paymentID }}</span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <span><strong>Amount :</strong></span>
          </div>
          <div class="col-md-8">
            <span>{{ $result->amount }}</span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <span><strong>Payment Mode :</strong></span>
          </div>
          <div class="col-md-8">
            <span>{{ $result->paymentMode }}</span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <span><strong>Payment Date :</strong></span>
          </div>
          <div class="col-md-8">
            <span>{{ $result->paymentDateTime }}</span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <span><strong>Mobile No :</strong></span>
          </div>
          <div class="col-md-8">
            <span>{{ $result->customerMobileNo }}</span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <span><strong>Email ID :</strong></span>
          </div>
          <div class="col-md-8">
            <span>{{ $result->customerEmailID }}</span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <span><strong>Parameter 1 :</strong></span>
          </div>
          <div class="col-md-8">
            <span>{{ $result->addlParam1 }}</span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <span><strong>Parameter 2 :</strong></span>
          </div>
          <div class="col-md-8">
            <span>{{ $result->addlParam2 }}</span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <span><strong>Merchant ID :</strong></span>
          </div>
          <div class="col-md-8">
            <span>{{ $result->merchantId }}</span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <span><strong>Merchant Transaction No :</strong></span>
          </div>
          <div class="col-md-8">
            <span>{{ $result->merchantTxnNo }}</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@section('footer')
@endsection