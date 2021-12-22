@include('layouts.header')
    @include('frontend.layouts.navbar')
    <section class="position-relative">
        <div class="home-banner">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-7 mb-4">
                        <div class="mb-4">
                            <h1 class="text-white font-weight-bolder shadow-sm">Buy, Rent <span class="text-tillgreen">or</span> Sell <span class="text-tillgreen">Real Estate</span> Properties<span class="text-tillgreen font-weight-bolder">.</span></h1>
                            <div class="text-white m-0">We're a leading real estate company in Nigeria that has been building prosperity for our clients by executing innovative real estate solutions.</div>
                        </div>
                        <div class="row flex-wrap">
                            <div class="col-12 col-md-8 col-lg-9">
                                <div class="row">
                                    <div class="col-6">
                                        <a href="{{ route('signup') }}" class="btn border btn-lg bg-transparent text-tillgreen mb-3 W-100 d-block">
                                            <small class="text-tillgreen">Get Started</small>
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
                                    <p class="text-tillgreen font-weight-bolder m-0">Find Properties</p>
                                    <span class="text-tillgreen">
                                        <i class="icofont-caret-down"></i>
                                    </span>
                                </div>
                                <div id="properties-form-home-search" class="collapse" aria-labelledby="search-accordion" data-parent="#properties-search">
                                    <div class="card-body">
                                        @include('frontend.properties.partials.search')
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="properties-home-search-form border-dark-500 position-relative p-4 rounded" style="background-color: rgba(0, 0, 0, 0.2);">
                            <h2 class="text-white mb-3">Find Properties </h2>
                            <div class="mb-4">
                                @include('frontend.properties.partials.search')
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
                    <h1 class="text-tillgreen mb-4">Popular Properties</h1>
                </div>
                @empty($allProperties->count())
                    <div class="alert alert-info">No Properties Listed</div>
                @else
                    <div class="row">
                        @foreach($allProperties as $property)
                            <div class="col-12 col-md-6 col-lg-4 mb-4">
                                @include('frontend.properties.partials.card')
                            </div>
                        @endforeach
                    </div>
                @endempty
                <div class="">
                    <h1 class="text-main-dark">More Properties? <a href="{{ route('properties') }}" class="text-tillgreen">Click Here</a></h1>
                </div>
            </div>
        </div>
    </section>
    <section class="agent-realtor position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-7 mb-4">
                    <div class="d-flex flex-wrap">
                        <div class="bg-dark-500 rounded-pill text-white py-1 px-3 mb-3 mr-2">Realtors</div>
                        <div class="bg-dark-500 rounded-pill text-white py-1 px-3 mb-3 mr-2">Artisans</div>
                        <div class="bg-dark-500 rounded-pill text-white py-1 px-3 mb-3 mr-2">Agents</div>
                        <div class="bg-dark-500 rounded-pill text-white py-1 px-3 mb-3">Dealers</div>
                    </div>
                    <h1 class="font-weight-bolder mb-4 text-white">Are you an Agent, Realtor, or a business person? <span class="text-tillgreen">List</span> your properties for sale.</h1>
                    <div class="">
                        <a href="{{ route('signup') }}" class="btn btn-lg bg-theme-color text-white px-4">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="position-relative">
        <div class="home-property-categories">
            <div class="container">
                <h1 class="text-tillgreen mb-3">Explore Property Categories</h1>
                @empty($propertyCategories->count()):
                    <div class="alert alert-info">No Categories Yet</div>
                @else
                    <div class="row">
                        @foreach($propertyCategories as $category)
                            <div class="col-12 col-md-4 col-lg-3 mb-4">
                                <a href="{{ route('properties.category', ['category' => strtolower($category->name)]) }}" class="bg-main-ash p-4 d-flex justify-content-between text-decoration-none" style="border-left: 5px solid var(--theme-color);">
                                    <div class="text-main-dark">
                                        {{ ucfirst($category->name) }}
                                    </div>
                                    <div class="text-tillgreen">
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
                <h1 class="text-tillgreen mb-4">Our Global Partners</h1>
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
    <section class="position-relative bg-main-ash">
        <div class="testimonial-section"> 
            <div class="container">
                <h1 class="text-tillgreen mb-4">Our Latest Articles</h1>
                <div class="row align-items-center">
                    <?php for($i = 1; $i < 7; $i++): ?>
                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                            <div class="card border-0 bg-transparent">
                                <div style="height: 220px">
                                    <a></a>
                                    <img src="/images/testimonials/{{ $i }}.jpg" class="img-fluid object-cover w-100 h-100">
                                </div>
                                <div class="card-body px-0">
                                    <div class="text-main-dark mb-3">Love the design and customization of InstaShow. We have used various Instagram apps for Shopify in the past but they would always mess up our theme. I love how we can completely customize InstaShow to how we want the feed to come out.</div>
                                    <p class="font-weight-bolder mb-2">Maria Carey</p>
                                    <div class="text-muted">Business Analyst</div>
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </section>
    @include('frontend.layouts.bottom')
@include('layouts.footer')