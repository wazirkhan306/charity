@extends('frontend.layout.main')
@push('style')
 <style>
     .card-img-top{
         width: 100%;
         height: 300px;
     }
 </style>
@endpush
@section('content')
    <style type="text/css">
        .banner-area{background:url('{{ asset(Setting()->HomePicture) }}') no-repeat;background-size:cover}
    </style>
    <section class="banner-area relative">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row  align-items-center banner-content">
                <div class="col-lg-5">
                    <h1 class="text-white">Our Causes</h1>
                    <p>To implement sustainable programs that improve access worldwide to investment, opportunity.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="popular-cause-area section-gap-top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title">
                        <h2><span>Popular</span> Projects</h2>
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
                {!! $projects->links() !!}
            </div>
        </div>
    </section>
    <div class="cta-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <p class="top_text">Thanks for your heart.</p>
                    <h1>Contribute on my charity work by your donation. Thanks for your heart.</h1>
                     <a href="{!! url('Contact') !!}" class="primary-btn">donation</a>
                </div>
            </div>
        </div>
    </div>
@endsection
