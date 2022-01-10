@include('layouts.header')
<div class="min-vh-100 bg-main-ash">
    <div class="user-content user-dashboard-banner pb-4">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-12 col-md-6 mb-3">
                    <h4 class="text-white">Dashboard</h4>
                    <div class="text-muted">Welcome Melim Homes. List your properties and building materials.</div>
                </div>
                <div class="col-12 col-md-6 mb-1">
                    <div class="d-flex justify-content-end flex-wrap-reverse">
                        <div class="user-icon bg-dark text-white mr-3 mb-3 px-3 py-2 icon-raduis">
                            <i class="icofont-notification"></i>
                        </div>
                        <div class="user-icon bg-dark text-white mr-3 mb-3 px-3 py-2 icon-raduis">
                            <i class="icofont-settings"></i>
                        </div>
                        <div class="user-icon bg-info text-white mr-3 mb-3 px-3 py-2 icon-raduis">
                            <i class="icofont-ui-user"></i>
                        </div>
                        <div class="">
                            <div class="user-icon bg-dark text-white mb-3 px-3 py-2 icon-raduis">
                                <i class="icofont-navigation-menu"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-7">
                    <div class="row">
                        @include('user.dashboard.partials.panels')
                    </div>
                    <div class="">
                        <div class="alert alert-info">Recently listed properties</div>
                        @if(empty($properties->count()))
                            <div class="alert alert-warning">No properties listed yet</div>
                        @else
                        <div class="row">
                            @foreach($properties as $property)
                                <div class="col-12 col-md-4 col-lg-3">
                                    @include('user.properties.partials.card')
                                </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="card bg-info card-raduis shadow-sm">
                                <div class="card-body">
                                    <div class="">
                                        <h5 class="text-white mb-3">List Building Materials</h5>
                                        <div class="mb-3">With over 5,000 weekly visitos, you stand a change to leverage our platform.</div>
                                        <a href="{{ route('user.properties') }}" class="btn btn-dark px-4">Get Started</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="card bg-info card-raduis shadow-sm">
                                <div class="card-body">
                                    <div class="">
                                        <h5 class="text-white mb-3">List Properties</h5>
                                        <div class="mb-3">With over 5,000 weekly visitos, you stand a change to leverage our platform.</div>
                                        <a href="{{ route('user.properties') }}" class="btn btn-dark px-4">Get Started</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>      
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')    