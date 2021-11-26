@include('layouts.header')
    @include('layouts.navbar')
    <section class="position-relative">
        <div class="home-banner">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-7 mb-4">
                        <div class="mb-4">
                            <h1 class="text-white font-weight-bolder shadow-sm">Buy, Rent <span class="text-theme-color">or</span> Sell <span class="text-theme-color">Real Estate</span> Properties<span class="text-theme-color font-weight-bolder">.</span></h1>
                            <div class="text-white m-0">We're a leading real estate company in Nigeria that has been building prosperity for our clients by executing innovative real estate solutions.</div>
                        </div>
                        <div class="row flex-wrap">
                            <div class="col-12 col-md-8 col-lg-9">
                                <div class="row">
                                    <div class="col-6">
                                        <a href="{{ route('signup') }}" class="btn border btn-lg bg-transparent text-theme-color mb-3 W-100 d-block">
                                            <small class="text-theme-color">Get Started</small>
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a href="{{ route('about') }}" class="btn btn-lg bg-theme-color mb-3 W-100 d-block">
                                            <small class="text-white">Learn More</small>
                                        </a>
                                    </div>
                                </div>
                            </div>             
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">

                        <div class="accordion cursor-pointer" id="properties-search">
                            <div class="card border-dark-500 p-0" style="background-color: rgba(0, 0, 0, 0.2);">
                                <div class="card-header d-flex justify-content-between align-items-center rounded-0 shadow-sm border-bottom-dark-500" id="search-accordion" data-toggle="collapse" data-target="#properties-form-home-search" aria-expanded="false" aria-controls="properties-form-home-search">
                                    <p class="text-theme-color font-weight-bolder m-0">Find Properties</p>
                                    <span class="text-theme-color">
                                        <i class="icofont-caret-down"></i>
                                    </span>
                                </div>
                                <div id="properties-form-home-search" class="collapse" aria-labelledby="search-accordion" data-parent="#properties-search">
                                    <div class="card-body">
                                        @include('properties.partials.search')
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="properties-home-search-form border-dark-500 position-relative p-4 rounded" style="background-color: rgba(0, 0, 0, 0.2);">
                            <h2 class="text-white mb-3">Find Properties </h2>
                            <div class="mb-4">
                                @include('properties.partials.search')
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="position-relative">
        <div class="home-properties">
            <div class="container">
                <div class="">
                    <h1 class="text-theme-color mb-4">Popular Properties</h1>
                </div>
                @empty($allProperties->count())
                    <div class="alert alert-info">No Properties Listed</div>
                @else
                    <?php $image = 1; ?>
                    <div class="row">
                        @foreach($allProperties as $property)
                            <?php $image++; ?>
                            <div class="col-12 col-md-6 col-lg-4 mb-4">
                                @include('properties.partials.card')
                            </div>
                        @endforeach
                    </div>
                @endempty
                <div class="">
                    <h1 class="text-main-dark">More Properties? <a href="{{ route('properties') }}" class="text-theme-color">Click Here</a></h1>
                </div>
            </div>
        </div>
    </section>
    <section class="agent-realtor position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-7 mb-4">
                    <h1 class="font-weight-bolder text-white">Our <span class="text-main-green">Vision</span></h1>
                    <div class="text-white">Our vision is to be the number one modern real estate provider in Nigeria and the final stop for all real estate needs of our clients from purchase to development.</div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-7 mb-4">
                    <h1 class="font-weight-bolder text-white">Our <span class="text-main-green">Mission</span></h1>
                    <div class="text-white">Our mission is to serve the real estate needs of our clients in a trustworthy environment where they will be served with the highest amount of professionalism, ease of business, innovation, and quality that will ensure maximum client satisfaction.</div>
                </div>
            </div>
        </div>
    </section>
    <section class="position-relative">
        <div class="home-services">
            <div class="container">
                <h1 class="text-theme-color mb-3">Explore Property Categories</h1>
                @empty($propertyCategories->count()):
                    <div class="alert alert-info">No Categories Yet</div>
                @else
                    <div class="row">
                        @foreach($propertyCategories as $category)
                            <div class="col-12 col-md-4 col-lg-3 mb-4">
                                <a href="{{ route('properties.category', ['category' => strtolower($category->name)]) }}" class="bg-main-ash p-4 d-flex justify-content-between text-decoration-none" style="border-left: 5px solid var(--main-green);">
                                    <div class="text-main-dark">
                                        {{ ucfirst($category->name) }}
                                    </div>
                                    <div class="text-theme-color">
                                        <i class="icofont-long-arrow-right"></i>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endempty
            </div>
        </div> 
    </section>
    <section class="position-relative">
        <div class="partners-section"> 
            <div class="container">
                <h1 class="text-theme-color mb-4">Our Global Partners</h1>
                <div class="row align-items-center">
                    <div class="col-6 col-md-3 col-lg-2 mb-4">
                        <div class="partners-image bg-main-ash shadow-sm object-cover border-main-dark">
                            <img src="/images/partners/gtb.png" class="img-fluid w-100 h-100">
                        </div>
                    </div>
                    <div class="col-6 col-md-3 col-lg-2 mb-4">
                        <div class="partners-image bg-main-ash shadow-sm object-cover border-main-dark">
                            <img src="/images/partners/paystack.png" class="img-fluid w-100 h-100">
                        </div>
                    </div>
                    <div class="col-6 col-md-3 col-lg-2 mb-4">
                        <div class="partners-image bg-main-ash shadow-sm object-cover border-main-dark">
                            <img src="/images/partners/redan.jpg" class="img-fluid w-100 h-100">
                        </div>
                    </div>
                    <div class="col-6 col-md-3 col-lg-2 mb-4">
                        <div class="partners-image bg-main-ash shadow-sm object-cover border-main-dark">
                            <img src="/images/partners/isp.jpg" class="img-fluid w-100 h-100">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('layouts.bottom')
@include('layouts.footer')