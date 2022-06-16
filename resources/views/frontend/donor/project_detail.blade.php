@extends('frontend.layout.main')
@push('style')
 <style>
     .card-img-top{
         width: 50%;
     }
 </style>
@endpush
@section('content')
<!-- ============================================================= Content Start ============================================================= -->
<style type="text/css">
    .banner-area{background:url("{{ asset('storage/projects/image/'.$project->image) }}") no-repeat;
    background-size: 100vw auto;
background-size: 100%;
background-size: cover;}
</style>
    <section class="banner-area relative">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row align-items-center banner-content">
                <div class="col-lg-8">
                    <!--================ Start Popular Event Area =================-->
                    <h1 class="text-white">{{ $project->Title }}</h1>
                </div>
            </div>
        </div>
    </section>
    <!--================ End top-section Area =================-->

    <!--================ Start Recent Event Area =================-->
    <section class="event_details section-gap-top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <!--================ Start Popular Event Area =================-->
                    <img class="card-img-top img-fluid" src="{{asset('storage/projects/image/'.$project->image) }}" alt="Card image cap">

                </div>
            </div>
            <div class="event_content mb-40">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="right_content">
                            <!--================ Start Popular Event Area =================-->
                            <h2>{{ $project->Title }}</h2>
                            <p>
                                <!--================ Start Popular Event Area =================-->
                                {!! $project->description !!}
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--================ End Recent Event Area =================-->
    <!--================ Start CTA Area =================-->
    <div class="cta-area ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <p class="top_text">Thanks for your heart.</p>
                    <h1>Contribute on my charity work by your donation. Thanks for your heart.</h1>
                    <!--================ Start Popular Event Area =================-->
                    <a href="{!! url('Contact') !!}" class="primary-btn">donation</a>
                </div>
            </div>
        </div>
    </div>
    <!--================ End CTA Area =================-->
<!-- ============================================================= Content end   ============================================================= -->
@endsection
