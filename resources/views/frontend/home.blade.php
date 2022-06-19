@extends('frontend.layout.main')

@section('content')
<section class="home-banner-area relative" id="home" data-parallax="scroll" data-image-src="{{ asset('frontend/family-bg.jpg') }}">
		<div class="overlay-bg overlay"></div>
		<div class="container">
			<div class="row fullscreen justify-content-lg-begin">
				<div class="banner-content col-lg-7">
					@if ($message = Session::get('success'))
					<div class="alert alert-success" role="alert">
			          {!! $message !!}
			        </div>
                    <?php Session::forget('success');?>
                    @endif
                    @if ($message = Session::get('error'))
                    <div class="alert alert-success" role="alert">
			          {!! $message !!}
			        </div>
                    <?php Session::forget('error');?>
                    @endif
					<h1>
						children
					</h1>
					<a href="{{ url('Contact')}}" class="primary-btn">
						Join us
						<i class="ti-angle-right ml-1"></i>
					</a>
				</div>
			</div>
		</div>
	</section>
	<section class="about_area lite_bg">
		<style type="text/css">
			.about_area .about_bg{
				background:linear-gradient(0deg, rgba(0,0,0,0.5), rgba(0,0,0,0.5)),
				url('{{ asset(Setting()->AboutPicture) }}');background-repeat:no-repeat;background-size:cover;
				background-size:cover;
				position:absolute;right:0;top:0;height:100%;width:50%;z-index:-1}
		</style>
		<div class="container">
			<div class="row align-items-end">
				<div class="col-lg-5">
					<div class="about_details lite_bg">
						<h2>{!! Setting()->title_about_en !!}</h2>
						<p class="mb-0">
							{!! Setting()->content_about_en !!}
						</p>
						<a href="{{ url('about') }}" class="primary-btn mt-5">
							Read more
							<i class="ti-angle-right ml-1"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-4 offset-lg-3 col-md-6 offset-md-1 d-lg-block d-none">
					<div class="about_right">
						<div class="video-inner justify-content-center align-items-center d-flex">
							<a id="play-home-video" class="video-play-button"
							   href="{!! Setting()->video !!}">
								<span></span>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="about_bg d-lg-block d-none"></div>
		</div>
	</section>
	<section class="features-area section-gap-top">
		<div class="container">
			<div class="row feature_inner">
				<div class="col-lg-4 col-md-6">
					<div class="feature-item">
						<i class="fi flaticon-compass"></i>
						<h4>Give Donation</h4>
						<p>{!! Setting()->content_feature_en !!}</p>
						<a href="{{ url('Contact') }}" class="primary-btn2">Learn more</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="feature-item">
						<i class="fi flaticon-desk"></i>
						<h4>Give Inspiration</h4>
						<p>{!! Setting()->content_feature_two_en !!}</p>
						<a href="{{ url('Contact') }}" class="primary-btn2">Learn more</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="feature-item">
						<i class="fi flaticon-bathroom"></i>
						<h4>Become Staff</h4>
						<p>{!! Setting()->content_feature_three_en !!}</p>
						<a href="{{ url('Contact') }}" class="primary-btn2">Learn more</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="popular-cause-area section-gap-top">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6">
					<div class="section-title">
						<span> Dignity, Opportunity, Hope </span>
						<h2><span>Our Projects</span></h2>
					</div>
				</div>
			</div>
			<div class="row">
                @foreach($projects as $project)
                <div class="col-lg-4 col-md-6">
                    <div class="card single-popular-cause">
                        <div class="card-body">
                            <figure>
                                <img class="card-img-top img-fluid" src="{{asset('storage/projects/image/'.$project->image) }}" alt="Card image cap">
                            </figure>
                            <div class="card_inner_body">
                                 <div class="tag">{{ $project->title }}</div>
                                <h4 class="card-title">{{ $project->title }}</h4>
                                <div class="d-flex justify-content-between raised_goal">
                                    <p>Raised: 100</p>
                                    <p><span>Goal: 100</span></p>
                                </div>
                                <div class="d-flex justify-content-between donation align-items-center">
                                    <a href="" class="primary-btn">Donate</a>
                                    <p><span class="ti-heart mr-1"></span>  Donors</p>
                                </div>
                                <a href="{{route('project-detail',$project->id)}}" class="primary-btn2">See More</a>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
			</div>
		</div>
	</section>
	<section class="callto-area section-gap relative">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<p class="top_text">Need your help?</p>
					<div class="call-wrap mx-auto">
						<h1>Staff Needed At Your Area</h1>
						<p>In that Our I own life unto lights them two appear days rule thing fly main for main cause fowl itself dry
							from made main cause fowl itself dry.</p>
						<a href="{{ route('staff.login_form') }}Give Donation" class="primary-btn mt-5">
							Login
							<i class="ti-angle-right ml-1"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="upcoming_event_area section-gap-top">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6">
					<div class="section-title">
						<h2><span>Upcoming</span> Event</h2>
					</div>
				</div>
			</div>
			<div class="row">
                @foreach($Events as $Event)
				<div class="col-lg-6">
					<div class="single_upcoming_event">
						<div class="row align-items-center">
							<div class="col-lg-6 col-md-6">
								<figure>
									<img class="img-fluid w-100" src="{!! asset($Event->image) !!}" alt="">
									<div class="date">
										{{ date('M j', strtotime($Event->created_at)) }}
									</div>
								</figure>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="content_wrapper">
									<h3 class="title">
										<a href="{!! url('Events') !!}/{!! $Event->slug !!}">{!! substr($Event->Title_en, 0, 190) !!}</a>
									</h3>
									<p>
										{!! substr($Event->Content_en, 0, 60) !!}
									</p>
									<div class="d-flex count_time justify-content-lg-start justify-content-center" id="clockdiv1">
										<div class="single_time">
											<h4 class="days">{!! $Event->Days !!}</h4>
											<p>Days</p>
										</div>
										<div class="single_time">
											<h4 class="hours">{!! $Event->Hours !!}</h4>
											<p>Hours</p>
										</div>
										<div class="single_time">
											<h4 class="minutes">{!! $Event->Minutes !!}</h4>
											<p>Minutes</p>
										</div>
									</div>
									<a href="{!! url('Events') !!}/{!! $Event->slug !!}" class="primary-btn2">Learn More</a>
								</div>
							</div>
						</div>
					</div>
				</div>
                @endforeach
			</div>
		</div>
	</section>
	<section class="blog-area section-gap-top">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-12">
					<div class="home-blog-left">
						<h2>Latest From
							Our Blog </h2>
						<p>
							{!! Setting()->content_blog_en !!}
						</p>
						<a href="{{ url('Posts') }}" class="primary-btn2">Show more</a>
					</div>
				</div>
                @foreach($Posts as $Post)
				<div class="col-lg-4 col-md-6 single-blog">
					<div class="thumb">
						<img class="img-fluid" src="{!! asset($Post->image) !!}" alt="{!! substr($Post->Title_en, 0, 190) !!}">
					</div>
					<div class="single-blog-info">
						<p class="tag">
							  @if(isset($Post->Category->title))
                              <span>{{ $Post->Category->title }}</span>
                              @else
                              <span>No Category</span>
                              @endif
							<span>{{ date('M j, Y', strtotime($Post->created_at)) }}</span>
						</p>
						<a href="{!! url('Posts') !!}/{!! $Post->slug !!}">
							<h4>{!! substr($Post->Title_en, 0, 190) !!}</h4>
						</a>
						<div class="meta-bottom d-flex">
					     @if(isset($Post->Comments))
			             <a class="mr-3"><span class="ti-comments mr-2"></span>{{ count($Post->Comments) }} Comments</a>
			             @else
			             <a class="mr-3"><span class="ti-comments mr-2"></span> 0 Comments</a>
			             @endif
						 <a href="{!! url('Posts') !!}/{!! $Post->slug !!}"> <span class="ti-eye mr-2"></span> Show more</a>
						</div>
					</div>
				</div>
                @endforeach
			</div>
		</div>
	</section>
	<section class="instagram-area section-gap-top">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6">
					<div class="section-title">
						<h2><span>Our Gallery</span></h2>
					</div>
				</div>
			</div>
		</div>
		<div class="instagram-slider owl-carousel">
			 @foreach($Gallers as $Gallery)
			<a href="{!! asset($Gallery->image) !!}" class="single-instagram d-block img-pop-up">
				<div class="instagram-img">
					<img src="{!! asset($Gallery->image) !!}">
					<div class="instagram-text">
						<i class=" icon-material-outline-add"></i>
					</div>
				</div>
			</a>
			@endforeach
		</div>
	</section>
@endsection
