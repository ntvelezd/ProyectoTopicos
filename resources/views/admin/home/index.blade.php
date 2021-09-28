@extends('admin.layouts.app')
@section('content')
<!-- Portfolio Section-->
<section class="page-section portfolio" id="portfolio">
    <div class="container">
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">{{__('admin.menu')}}</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Portfolio Grid Items-->
        <div class="row">
            <!-- Portfolio Item 1-->
            <div class="col-md-6 col-lg-4 mb-5">
                <div class="portfolio-item mx-auto">
                    <a class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100 btn"
                        href="{{ route('admin.user.catalogue') }}">
                    </a>
                    <img class="img-fluid" src="{{ asset('/img/portfolio/user.png') }}" alt="" />
                </div>
            </div>
            <!-- Portfolio Item 2-->
            <div class="col-md-6 col-lg-4 mb-5">
                <div class="portfolio-item mx-auto">
                    <a class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100 btn"
                        href="{{ route('admin.handbag.catalogue') }}">
                    </a>
                    <img class="img-fluid" src="{{ asset('/img/portfolio/handbag.png') }}" alt="" />
                </div>
            </div>
            <!-- Portfolio Item 3-->
            <div class="col-md-6 col-lg-4 mb-5">
                <div class="portfolio-item mx-auto">
                    <a class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100 btn"
                        href="{{ route('admin.accesory.catalogue') }}">
                    </a>
                    <img class="img-fluid" src="{{ asset('/img/portfolio/accesory.png') }}" alt="" />
                </div>
            </div>
        </div>
    </div>
</section>
@endsection