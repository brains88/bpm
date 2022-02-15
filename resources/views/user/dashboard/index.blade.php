@include('layouts.header')
<div class="min-vh-100 bg-main-ash">
    @include('user.layouts.navbar')
    <div class="user-content user-dashboard-banner pb-4">
        <div class="container">
            @if(!empty($reference))
                @if(isset($verify['status']))
                    <div class="alert mt-4 {{ $verify['status'] === 0 ? 'alert-danger' : 'alert-success' }}">
                        {{ $verify['info'] }}
                    </div>
                @endif
            @endif
            @if(!empty(auth()->user()->name))
                <div class="alert-info alert mb-4 d-flex justify-content-between al;align-items-center">
                    <div class="">
                        <span class="mr-2">Welcome</span>
                        <a href="{{ route('user.profile') }}">{{ ucwords(auth()->user()->name) }}</a>
                    </div>
                    <div>
                        <small class="text-main-dark">
                            <i class="icofont-settings"></i>
                        </small>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="row">
                        @include('user.dashboard.partials.panels')
                    </div>
                    <div class="alert alert-success shadow-sm p-3 mb-4 icon-raduis">
                        @include('user.subscriptions.partials.panel')
                    </div>
                    <div class="alert alert-info shadow-sm p-3 mb-4 icon-raduis">
                        @include('user.adverts.partials.panel')
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="card-raduis alert alert-primary p-4 m-0 position-relative shadow-sm border-0" >
                                <div class="pb-0 position-relative">
                                    <div class="mb-3">
                                        <h4 class="">Total Credits</h4>
                                        <h6 class="">
                                            {{ number_format(auth()->user()->credits()->where('status', '!=', 'expired')->sum('units')) }} Units
                                        </h6>
                                    </div>
                                    <div class="d-flex">
                                        <a href="javascript:;" class="btn btn-info icon-raduis px-3 mr-3" data-toggle="modal" data-target="#buy-credit">Buy credits</a>
                                        @include('user.credits.partials.buy')
                                        <a href="{{ route('user.credits') }}" class="btn btn-info icon-raduis px-3">View all</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(auth()->user()->profile->role !== 'dealer')
                            <div class="col-12 mb-4">
                                <div class="card bg-info card-raduis shadow-sm">
                                    <div class="card-body">
                                        <div class="">
                                            <h5 class="text-white mb-3">List Building Materials</h5>
                                            <div class="mb-3">With over 5,000 weekly visitors, you stand a change to leverage our platform.</div>
                                            <a href="{{ route('signup', ['action' => 'logout']) }}" class="btn bg-main-dark text-white icon-raduis px-4">Get Started</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(auth()->user()->profile->role !== 'agent')
                            <div class="col-12 mb-4">
                                <div class="card bg-info card-raduis shadow-sm">
                                    <div class="card-body">
                                        <div class="">
                                            <h5 class="text-white mb-3">List Your Properties</h5>
                                            <div class="mb-3">With over 5,000 weekly visitors, you stand a change to leverage our platform.</div>
                                            <a href="{{ route('signup', ['action' => 'logout']) }}" class="btn bg-main-dark text-white icon-raduis px-4">Get Started</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(auth()->user()->profile->role !== 'artisan')
                            <div class="col-12 mb-4">
                                <div class="card bg-info card-raduis shadow-sm">
                                    <div class="card-body">
                                        <div class="">
                                            <h5 class="text-white mb-3">List Your Services</h5>
                                            <div class="mb-3">Become an artisan, With over 5,000 weekly visitors, you stand a change to leverage our platform.</div>
                                            <a href="{{ route('signup', ['action' => 'logout']) }}" class="btn bg-main-dark text-white icon-raduis px-4">Get Started</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="">
                        <div class="alert alert-info mb-4 d-flex justify-content-between align-items-center">
                            <small>Recent properties</small>
                            <small>
                                <a href="{{ route('user.property.add') }}" class="text-primary">List property</a>
                            </small>
                        </div>
                        @if(empty($properties->count()))
                            <div class="alert alert-warning mb-4">No properties listed yet</div>
                        @else
                            <div class="row">
                                @foreach($properties as $property)
                                    <div class="col-12 col-md-4 col-lg-6 mb-4">
                                        @include('user.properties.partials.card')
                                    </div>
                                @endforeach
                            </div>
                            @if($properties->total() > 4)
                                <a href="{{ route('user.properties') }}" class="alert alert-info mb-4 d-block">See all listed properties</a>
                            @endif
                        @endif
                    </div>    
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')    