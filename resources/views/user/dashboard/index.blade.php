@include('layouts.header')
<div class="min-vh-100 bg-main-ash">
    @include('user.layouts.navbar')
    <div class="user-content user-dashboard-banner pb-4">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="row">
                        @include('user.dashboard.partials.panels')
                    </div>
                    <div class="alert alert-success card-raduis p-3 pb-0 mb-4">
                        <div class="pb-2">
                            <div class="">
                                @if(empty($subscription))
                                    <div class="alert alert-danger m-0">Subscribe to list more properties. <a href="{{ route('pricing') }}">Click here</a> to get started.</div>
                                @else
                                    <?php $end = \Carbon\Carbon::parse($subscription->expiry); $fraction = (($end->diffInDays(\Carbon\Carbon::now()))/$subscription->duration); $percent = $fraction * 100;  ?>
                                    <div class="">
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <small class="">
                                                {{ ucwords($subscription->membership->name) }} ({{ ucwords($subscription->membership->duration) }})
                                            </small>
                                            <small class="">
                                                Progress ({{ ($percent == 0) ? 2 : ($percent > 100 ? 98.5 : $percent) }}%)
                                            </small>
                                        </div>
                                        <div class="mb-2">
                                            <div class="bg-light border-info p-1 rounded-pill w-100">
                                                <div class="{{ $percent >= 70 ? 'bg-danger' : ($percent <= 49.5 ? 'bg-success' : 'bg-warning') }} py-1 rounded-pill" style="width: {{ ($percent == 0) ? 2 : ($percent > 100 ? 98.5 : $percent) }}%"></div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <small class="">
                                                {{ $subscription->updated_at->diffForHumans() }}
                                            </small>
                                            <small class="">
                                                NGN{{ number_format($subscription->amount) }}
                                            </small>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="card card-raduis alert alert-primary py-4 m-0 position-relative shadow-sm border-0" >
                                <div class="card-body pb-0 position-relative">
                                    <div class="mb-3">
                                        <h4 class="">Total Credits</h4>
                                        <h6 class="">
                                            {{ number_format(auth()->user()->credits->sum('units')) }} Units
                                        </h6>
                                    </div>
                                    <div class="d-flex">
                                        <a href="javascript:;" class="bg-info text-white mr-3 mb-4 px-3 py-2 icon-raduis text-decoration-none" data-toggle="modal" data-target="#buy-credit">
                                            <small class="mr-1">
                                                <i class="icofont-plus"></i>
                                            </small>
                                            <div class="d-inline">Buy credits</div>
                                        </a>
                                        @include('user.credits.partials.buy')
                                        <a href="{{ route('user.credits') }}" class="bg-info text-white mr-3 mb-4 px-3 py-2 icon-raduis text-decoration-none">
                                            <div class="d-inline">View all</div>
                                            <span class="mr-1">
                                                <i class="icofont-long-arrow-right"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                    <div class="">
                        <div class="alert alert-info mb-4">Recently listed properties</div>
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
                            @if($properties->total() > $limit)
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