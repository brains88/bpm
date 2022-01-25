@include('layouts.header')
    @include('frontend.layouts.navbar')
    <div class="bg-main-ash min-vh-100">
        <div class="home-banner position-relative">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-9 col-lg-6">
                        <div class="mb-4">
                            <p class="text-white">Global Properties Listing</p>
                            <h1 class="text-white font-weight-bolder shadow-sm">Buy<span class="text-theme-color">,</span> Rent <span class="font-weight-bolder text-theme-color">or</span> Sell Real Estate Properties<span class="text-theme-color font-weight-bolder">.</span></h1>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6 mb-4">
                                <a href="{{ route('properties') }}" class="btn text-white btn-block bg-theme-color icon-raduis btn-lg">Find Properties</a>
                            </div>
                            <div class="col-12 col-md-6 mb-4">
                                <a href="{{ route('signup') }}" class="btn text-white btn-block bg-main-dark icon-raduis btn-lg">List Properties</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="home-properties">
            <div class="container-fluid">
                <div class="">
                    <h4 class="text-main-dark mb-4">Promoted Properties</h4>
                    <?php $actions = \App\Models\Property::$actions; ?>
                    @if(empty($actions))
                        <div class="alert-danger alert">No Properties Yet</div>
                    @else
                        <div class="">
                            <ul class="nav nav-pills " id="" role="tablist">
                                @foreach($actions as $action => $value)
                                    @if($action !== 'sold')
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link border-theme-color mr-3 mb-4 py-1 text-main-dark icon-raduis px-4 {{ $action == 'rent' ? 'active' : '' }}" id="pills-{{ $action }}-tab" data-toggle="pill" href="#pills-{{ $action }}" role="tab" aria-controls="pills-{{ $action }}" aria-selected="true">
                                                <small class="position-relative" style="top: -2.5px;">
                                                    <small>{{ ucwords($value) }}</small>
                                                </small>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                            <div class="tab-content" id="">
                                @if(empty($properties->count()))
                                    <div class="alert-info alert">No Properties Yet</div>
                                @else
                                    @foreach($actions as $action => $value)
                                        @if($action !== 'sold')
                                            <div class="tab-pane fade show {{ $action == 'rent' ? 'active' : '' }}" id="pills-{{ $action }}" role="tabpanel" aria-labelledby="pills-{{ $action }}-tab">
                                                <div class="row">
                                                    @foreach($properties as $property)
                                                        @if($property->action == $action)
                                                            <div class="col-12 col-md-6 col-lg-3 mb-4">
                                                                @include('frontend.properties.partials.card')
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>  
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="home-top-countries">
            <div class="container-fluid">
                <div class="row align-items-baseline">
                    <div class="col-12 col-md-6">
                        <h4 class="text-main-dark mb-4">Explore Top Countries</h4>
                        <div class="mb-4">Take a tour with us as we show your new, big and best cities of the world. Just incase you want to invest on a property, you can take a peak over this section to see very beautiful cities you can own a home.</div>
                        <a href="{{ route('signup') }}" class="btn text-white px-4 bg-theme-color icon-raduis btn-lg">Explore Countries</a>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="">
                                    <div class="bg-theme-color rounded-circle text-center mb-4" style="width: 50px; height: 50px; line-height: 50px;">
                                        <small class="text-white">{{ '567' }}</small>
                                    </div>
                                    <h5 class="">Rome</h5>
                                    <div class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('layouts.footer')