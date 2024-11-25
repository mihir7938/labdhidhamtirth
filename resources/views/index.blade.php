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
<div class="hero-wrap js-fullheight banner">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">
			<div class="col-md-7 ftco-animate">
				{{--<span class="subheading">Welcome to Pacific</span>--}}
				<h1 class="mb-4">શ્રી લબ્ધિ વિક્રમ રાજ્યશ સૂરીશ્વરજી જૈન તીર્થ</h1>
				{{--<p class="caps">Travel to the any corner of the world, without going around in circles</p>--}}
			</div>
			{{--<a href="https://vimeo.com/45830194" class="icon-video popup-vimeo d-flex align-items-center justify-content-center mb-4">
				<span class="fa fa-play"></span>
			</a>--}}
		</div>
	</div>
</div>
<section class="ftco-section ftco-no-pb ftco-no-pt">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="ftco-search">
					<div class="row">
						<div class="col-md-12 nav-link-wrap">
							<div class="nav nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
								<a class="nav-link active mr-md-1" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Search Tour</a>
								{{--<a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Hotel</a>--}}
							</div>
						</div>
						<div class="col-md-12 tab-wrap">
							<div class="tab-content" id="v-pills-tabContent">
								<div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-nextgen-tab">
									<form action="{{route('set_session')}}" class="search-property-1" method="get">
										<div class="row no-gutters">
											<div class="col-md d-flex">
												<div class="form-group p-4 border-0">
													<label for="#">Check-in date</label>
									                <div class="form-field">
									                	<div class="icon"><span class="fa fa-calendar"></span></div>
									                    <input type="text" id="checkin_date" name="checkin_date" class="form-control checkin_date" placeholder="Check In Date">
									                </div>
												</div>
											</div>
											<div class="col-md d-flex">
												<div class="form-group p-4">
													<label for="#">Days</label>
													<div class="form-field">
														<div class="select-wrap">
														  <div class="icon"><span class="fa fa-chevron-down"></span></div>
														  <select name="days" id="days" class="form-control">
														    <option value="">Select</option>
														    <option value="1">1 day</option>
														    <option value="2">2 days</option>
														    <option value="3">3 days</option>
														    <option value="4">4 days</option>
														  </select>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md d-flex">
												<div class="form-group p-4">
													<label for="#">Room Types</label>
													<div class="form-field">
									                    <div class="select-wrap">
									                      <div class="icon"><span class="fa fa-chevron-down"></span></div>
									                      <select name="room_types" id="room_types" class="form-control">
									                        <option value="">Select</option>
									                        @foreach($roomTypes as $type)
									                          <option value="{{$type->id}}">{{$type->name}}</option>
									                        @endforeach
									                      </select>
									                    </div>
									                </div>
												</div>
											</div>
											<div class="col-md d-flex">
												<div class="form-group d-flex w-100 border-0">
													<div class="form-field w-100 align-items-center d-flex">
														<input type="submit" value="Search" class="align-self-stretch form-control btn btn-primary" id="search">
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
								{{--<div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-performance-tab">
									<form action="#" class="search-property-1">
										<div class="row no-gutters">
											<div class="col-lg d-flex">
												<div class="form-group p-4 border-0">
													<label for="#">Destination</label>
													<div class="form-field">
														<div class="icon"><span class="fa fa-search"></span></div>
														<input type="text" class="form-control" placeholder="Search place">
													</div>
												</div>
											</div>
											<div class="col-lg d-flex">
												<div class="form-group p-4">
													<label for="#">Check-in date</label>
													<div class="form-field">
														<div class="icon"><span class="fa fa-calendar"></span></div>
														<input type="text" class="form-control checkin_date" placeholder="Check In Date">
													</div>
												</div>
											</div>
											<div class="col-lg d-flex">
												<div class="form-group p-4">
													<label for="#">Check-out date</label>
													<div class="form-field">
														<div class="icon"><span class="fa fa-calendar"></span></div>
														<input type="text" class="form-control checkout_date" placeholder="Check Out Date">
													</div>
												</div>
											</div>
											<div class="col-lg d-flex">
												<div class="form-group p-4">
													<label for="#">Price Limit</label>
													<div class="form-field">
														<div class="select-wrap">
															<div class="icon"><span class="fa fa-chevron-down"></span></div>
															<select name="" id="" class="form-control">
																<option value="">$100</option>
																<option value="">$10,000</option>
																<option value="">$50,000</option>
																<option value="">$100,000</option>
																<option value="">$200,000</option>
																<option value="">$300,000</option>
																<option value="">$400,000</option>
																<option value="">$500,000</option>
																<option value="">$600,000</option>
																<option value="">$700,000</option>
																<option value="">$800,000</option>
																<option value="">$900,000</option>
																<option value="">$1,000,000</option>
																<option value="">$2,000,000</option>
															</select>
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg d-flex">
												<div class="form-group d-flex w-100 border-0">
													<div class="form-field w-100 align-items-center d-flex">
														<input type="submit" value="Search" class="align-self-stretch form-control btn btn-primary p-0">
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>--}}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="ftco-section pb-0">
	<div class="container">
		<div class="row justify-content-center pb-4">
			<div class="col-md-12 heading-section text-center ftco-animate fadeInUp ftco-animated">
				<h2 class="mb-4">Latest News</h2>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-12 heading-section text-center ftco-animate fadeInUp ftco-animated">
				<div class="news_section">
		            <ul>
		            	@foreach($news as $n)
		               		<li>
		                  		<a href="{{route('get.news', ['id' => $n->id])}}">{{$n->title}}</a>
		                  		<div>{{date('F d, Y', strtotime($n->created_at))}}</div>
		               		</li>
		               	@endforeach
		            </ul>
		        </div>
			</div>
		</div>
	</div>
</section>
<section class="ftco-section services-section">
	<div class="container">
		<div class="row d-flex">
			<div class="col-md-6 order-md-last heading-section pl-md-5 ftco-animate d-flex align-items-center">
				<div class="w-100">
					{{--<span class="subheading">Welcome to Pacific</span>--}}
					<h2 class="mb-4">Facilities Content</h2>
					<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.
					A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
					{{--<p><a href="#" class="btn btn-primary py-3 px-4">Search Destination</a></p>--}}
				</div>
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-12 d-flex align-self-stretch ftco-animate">
						<div class="services">
							<img src="{{asset('images/services.jpg')}}" style="width: 100%;">
						</div>      
					</div>
					{{--<div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
						<div class="services services-1 color-2 d-block img" style="background-image: url(images/services-2.jpg);">
							<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div>
							<div class="media-body">
								<h3 class="heading mb-3">Travel Arrangements</h3>
								<p>A small river named Duden flows by their place and supplies it with the necessary</p>
							</div>
						</div>    
					</div>
					<div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
						<div class="services services-1 color-3 d-block img" style="background-image: url(images/services-3.jpg);">
							<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-tour-guide"></span></div>
							<div class="media-body">
								<h3 class="heading mb-3">Private Guide</h3>
								<p>A small river named Duden flows by their place and supplies it with the necessary</p>
							</div>
						</div>      
					</div>
					<div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
						<div class="services services-1 color-4 d-block img" style="background-image: url(images/services-4.jpg);">
							<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-map"></span></div>
							<div class="media-body">
								<h3 class="heading mb-3">Location Manager</h3>
								<p>A small river named Duden flows by their place and supplies it with the necessary</p>
							</div>
						</div>      
					</div>--}}
				</div>
			</div>
		</div>
	</div>
</section>
<section class="ftco-section img ftco-select-destination bg-class">
	<div class="container">
		<div class="row justify-content-center pb-4">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<h2 class="mb-4">Anusthan Packages</h2>
				<span class="subheading">Pacific Provide Places</span>
			</div>
		</div>
	</div>
	<div class="container container-2">
		<div class="row">
			<div class="col-md-12">
				<div class="carousel-destination owl-carousel ftco-animate">
					@if(count($packages) > 0)
						@foreach($packages as $package)
							<div class="item">
								<div class="project-destination">
									<a href="#" class="img" style="background-image: url({{asset('assets/'.$package->image)}});">
										<div class="text">
											<h3>{{$package->title}}</h3>
											{{--<span>8 Tours</span>--}}
										</div>
									</a>
								</div>
							</div>
						@endforeach
					@else 
						<p>No Match Found!</p>
					@endif
				</div>
			</div>
		</div>
	</div>
</section>
<section class="ftco-section testimony-section">
	<div class="container">
		<div class="row justify-content-center pb-4">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<span class="subheading">Destination</span>
				<h2 class="mb-4">Event Photograph</h2>
			</div>
		</div>
		<div class="row">
			<div class="carousel-event owl-carousel">
				@if(count($events) > 0)
					@foreach($events as $event)
						<div class="item">
							<div class="text">
								<img src="{{asset('assets/'.$event->image)}}"/>
							</div>
						</div>
					@endforeach
				@else 
					<p>No Match Found!</p>
				@endif
			</div>
			{{--<div class="col-md-4 ftco-animate">
				<div class="project-wrap">
					<a href="#" class="img" style="background-image: url(images/destination-1.jpg);">
						<span class="price">$550/person</span>
					</a>
					<div class="text p-4">
						<span class="days">8 Days Tour</span>
						<h3><a href="#">Banaue Rice Terraces</a></h3>
						<p class="location"><span class="fa fa-map-marker"></span> Banaue, Ifugao, Philippines</p>
						<ul>
							<li><span class="flaticon-shower"></span>2</li>
							<li><span class="flaticon-king-size"></span>3</li>
							<li><span class="flaticon-mountains"></span>Near Mountain</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-4 ftco-animate">
				<div class="project-wrap">
					<a href="#" class="img" style="background-image: url(images/destination-2.jpg);">
						<span class="price">$550/person</span>
					</a>
					<div class="text p-4">
						<span class="days">10 Days Tour</span>
						<h3><a href="#">Banaue Rice Terraces</a></h3>
						<p class="location"><span class="fa fa-map-marker"></span> Banaue, Ifugao, Philippines</p>
						<ul>
							<li><span class="flaticon-shower"></span>2</li>
							<li><span class="flaticon-king-size"></span>3</li>
							<li><span class="flaticon-sun-umbrella"></span>Near Beach</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-4 ftco-animate">
				<div class="project-wrap">
					<a href="#" class="img" style="background-image: url(images/destination-3.jpg);">
						<span class="price">$550/person</span>
					</a>
					<div class="text p-4">
						<span class="days">7 Days Tour</span>
						<h3><a href="#">Banaue Rice Terraces</a></h3>
						<p class="location"><span class="fa fa-map-marker"></span> Banaue, Ifugao, Philippines</p>
						<ul>
							<li><span class="flaticon-shower"></span>2</li>
							<li><span class="flaticon-king-size"></span>3</li>
							<li><span class="flaticon-sun-umbrella"></span>Near Beach</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-4 ftco-animate">
				<div class="project-wrap">
					<a href="#" class="img" style="background-image: url(images/destination-4.jpg);">
						<span class="price">$550/person</span>
					</a>
					<div class="text p-4">
						<span class="days">8 Days Tour</span>
						<h3><a href="#">Banaue Rice Terraces</a></h3>
						<p class="location"><span class="fa fa-map-marker"></span> Banaue, Ifugao, Philippines</p>
						<ul>
							<li><span class="flaticon-shower"></span>2</li>
							<li><span class="flaticon-king-size"></span>3</li>
							<li><span class="flaticon-sun-umbrella"></span>Near Beach</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-4 ftco-animate">
				<div class="project-wrap">
					<a href="#" class="img" style="background-image: url(images/destination-5.jpg);">
						<span class="price">$550/person</span>
					</a>
					<div class="text p-4">
						<span class="days">10 Days Tour</span>
						<h3><a href="#">Banaue Rice Terraces</a></h3>
						<p class="location"><span class="fa fa-map-marker"></span> Banaue, Ifugao, Philippines</p>
						<ul>
							<li><span class="flaticon-shower"></span>2</li>
							<li><span class="flaticon-king-size"></span>3</li>
							<li><span class="flaticon-sun-umbrella"></span>Near Beach</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-4 ftco-animate">
				<div class="project-wrap">
					<a href="#" class="img" style="background-image: url(images/destination-6.jpg);">
						<span class="price">$550/person</span>
					</a>
					<div class="text p-4">
						<span class="days">7 Days Tour</span>
						<h3><a href="#">Banaue Rice Terraces</a></h3>
						<p class="location"><span class="fa fa-map-marker"></span> Banaue, Ifugao, Philippines</p>
						<ul>
							<li><span class="flaticon-shower"></span>2</li>
							<li><span class="flaticon-king-size"></span>3</li>
							<li><span class="flaticon-sun-umbrella"></span>Near Beach</li>
						</ul>
					</div>
				</div>
			</div>--}}
		</div>
	</div>
</section>
{{--<section class="ftco-section ftco-about img"style="background-image: url(images/bg_4.jpg);">
	<div class="overlay"></div>
	<div class="container py-md-5">
		<div class="row py-md-5">
			<div class="col-md d-flex align-items-center justify-content-center">
				<a href="https://vimeo.com/45830194" class="icon-video popup-vimeo d-flex align-items-center justify-content-center mb-4">
					<span class="fa fa-play"></span>
				</a>
			</div>
		</div>
	</div>
</section>--}}
{{--<section class="ftco-section ftco-about ftco-no-pt img">
	<div class="container">
		<div class="row d-flex">
			<div class="col-md-12 about-intro">
				<div class="row">
					<div class="col-md-6 d-flex align-items-stretch">
						<div class="img d-flex w-100 align-items-center justify-content-center" style="background-image:url(images/about-1.jpg);">
						</div>
					</div>
					<div class="col-md-6 pl-md-5 py-5">
						<div class="row justify-content-start pb-3">
							<div class="col-md-12 heading-section ftco-animate">
								<span class="subheading">About Us</span>
								<h2 class="mb-4">Make Your Tour Memorable and Safe With Us</h2>
								<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
								<p><a href="#" class="btn btn-primary">Book Your Destination</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>--}}
{{--<section class="ftco-section testimony-section bg-bottom" style="background-image: url(images/bg_1.jpg);">
	<div class="overlay"></div>
	<div class="container">
		<div class="row justify-content-center pb-4">
			<div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
				<span class="subheading">Testimonial</span>
				<h2 class="mb-4">Tourist Feedback</h2>
			</div>
		</div>
		<div class="row ftco-animate">
			<div class="col-md-12">
				<div class="carousel-testimony owl-carousel">
					<div class="item">
						<div class="testimony-wrap py-4">
							<div class="text">
								<p class="star">
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
								</p>
								<p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
								<div class="d-flex align-items-center">
									<div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
									<div class="pl-3">
										<p class="name">Roger Scott</p>
										<span class="position">Marketing Manager</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="testimony-wrap py-4">
							<div class="text">
								<p class="star">
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
								</p>
								<p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
								<div class="d-flex align-items-center">
									<div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
									<div class="pl-3">
										<p class="name">Roger Scott</p>
										<span class="position">Marketing Manager</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="testimony-wrap py-4">
							<div class="text">
								<p class="star">
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
								</p>
								<p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
								<div class="d-flex align-items-center">
									<div class="user-img" style="background-image: url(images/person_3.jpg)"></div>
									<div class="pl-3">
										<p class="name">Roger Scott</p>
										<span class="position">Marketing Manager</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="testimony-wrap py-4">
							<div class="text">
								<p class="star">
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
								</p>
								<p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
								<div class="d-flex align-items-center">
									<div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
									<div class="pl-3">
										<p class="name">Roger Scott</p>
										<span class="position">Marketing Manager</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="testimony-wrap py-4">
							<div class="text">
								<p class="star">
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
								</p>
								<p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
								<div class="d-flex align-items-center">
									<div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
									<div class="pl-3">
										<p class="name">Roger Scott</p>
										<span class="position">Marketing Manager</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>--}}
{{--<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center pb-4">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<span class="subheading">Our Blog</span>
				<h2 class="mb-4">Recent Post</h2>
			</div>
		</div>
		<div class="row d-flex">
			<div class="col-md-4 d-flex ftco-animate">
				<div class="blog-entry justify-content-end">
					<a href="blog-single.html" class="block-20" style="background-image: url('images/image_1.jpg');">
					</a>
					<div class="text">
						<div class="d-flex align-items-center mb-4 topp">
							<div class="one">
								<span class="day">11</span>
							</div>
							<div class="two">
								<span class="yr">2020</span>
								<span class="mos">September</span>
							</div>
						</div>
						<h3 class="heading"><a href="#">Most Popular Place In This World</a></h3>
						<!-- <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p> -->
						<p><a href="#" class="btn btn-primary">Read more</a></p>
					</div>
				</div>
			</div>
			<div class="col-md-4 d-flex ftco-animate">
				<div class="blog-entry justify-content-end">
					<a href="blog-single.html" class="block-20" style="background-image: url('images/image_2.jpg');">
					</a>
					<div class="text">
						<div class="d-flex align-items-center mb-4 topp">
							<div class="one">
								<span class="day">11</span>
							</div>
							<div class="two">
								<span class="yr">2020</span>
								<span class="mos">September</span>
							</div>
						</div>
						<h3 class="heading"><a href="#">Most Popular Place In This World</a></h3>
						<!-- <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p> -->
						<p><a href="#" class="btn btn-primary">Read more</a></p>
					</div>
				</div>
			</div>
			<div class="col-md-4 d-flex ftco-animate">
				<div class="blog-entry">
					<a href="blog-single.html" class="block-20" style="background-image: url('images/image_3.jpg');">
					</a>
					<div class="text">
						<div class="d-flex align-items-center mb-4 topp">
							<div class="one">
								<span class="day">11</span>
							</div>
							<div class="two">
								<span class="yr">2020</span>
								<span class="mos">September</span>
							</div>
						</div>
						<h3 class="heading"><a href="#">Most Popular Place In This World</a></h3>
						<!-- <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p> -->
						<p><a href="#" class="btn btn-primary">Read more</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>--}}
@endsection
@section('footer')
<script src="{{asset('js/jquery.easy-ticker.min.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(document).on("click", "#search", function(e) {
	      $('.search-property-1').validate({
	        rules: {
	          checkin_date: {
	            required: true
	          },
	          days: {
	            required: true
	          },
	          room_types: {
	            required: true
	          }
	        },
	        messages:{
	          checkin_date: {
	            required: "Please enter check in date."
	          },
	          days:{
	            required: "Please enter days."
	          },
	          room_types:{
	            required: "Please enter room types."
	          }
	        },
	        errorPlacement: function(error, element) {
	          $(element).parent().after(error);
	        }
	      });
	    });
		$('.news_section').easyTicker({
	        direction: 'up',
	        easing: 'swing',
	        speed: 'slow',
	        interval: 2000,
	        height: 'auto',
	        visible: 2,
	        mousePause: true,
	        autoplay: true
	    });
	});
</script>
@endsection