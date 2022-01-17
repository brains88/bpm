@include('layouts.header')
<div class="min-vh-100 bg-main-ash">
    @include('user.layouts.navbar')
    <div class="user-content user-dashboard-banner pb-4">
        <div class="container">
            @if(!empty($reference))
                @if(isset($verify['status']))
                    <div class="alert {{ $verify['status'] === 0 ? 'alert-danger' : 'alert-success' }}">
                        {{ $verify['info'] }}
                    </div>
                @endif
            @endif
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="row">
                        @include('user.dashboard.partials.panels')
                    </div>
                    <div class="alert alert-success p-3 pb-0 mb-4">
                        <div class="pb-2">
                            <div class="">
                                @if(empty($subscription))
                                    <div class="alert alert-danger m-0">Subscribe to list more properties. <a href="{{ route('memberships') }}">Click here</a> to get started.</div>
                                @else
                                    <?php 

                                        $expiry = \Carbon\Carbon::parse($subscription->expiry);

                                        $remainingdays = (int)$expiry->diffInDays(\Carbon\Carbon::now());

                                        $duration = empty($subscription->duration) ? 1 : (int)$subscription->duration;

                                        $fraction = $duration > $remainingdays ? ($remainingdays/$duration) : 0;

                                        $progress = (100 - (int)($fraction * 100));  
                                    ?>
                                    {{-- {{ dd($remainingdays, $duration) }} --}}
                                    <div class="">
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <small class="">
                                                {{ ucwords($subscription->membership->name) }} Plan ({{ ucwords($duration) }}days)
                                            </small>
                                            <small class="">
                                                Progress ({{ $progress }}%)
                                            </small>
                                        </div>
                                        <div class="mb-2">
                                            <div class="progress" style="height: 10px;">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="{{ $progress }}" aria-valuemin="1" aria-valuemax="100" style="width: {{ $progress }}%"></div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <small class="">
                                                {{ $subscription->updated_at->diffForHumans() }}
                                            </small>
                                            <small class="">
                                                ${{ number_format($subscription->amount) }}
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
                            <div class="card-raduis alert alert-primary p-4 m-0 position-relative shadow-sm border-0" >
                                <div class="pb-0 position-relative">
                                    <div class="mb-3">
                                        <h4 class="">Total Credits</h4>
                                        <h6 class="">
                                            {{ number_format(auth()->user()->credits->sum('units')) }} Units
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
                        <div class="col-12 mb-4">
                            <div class="card bg-info card-raduis shadow-sm">
                                <div class="card-body">
                                    <div class="">
                                        <h5 class="text-white mb-3">List Building Materials</h5>
                                        <div class="mb-3">With over 5,000 weekly visitors, you stand a change to leverage our platform.</div>
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
                                        <div class="mb-3">With over 5,000 weekly visitors, you stand a change to leverage our platform.</div>
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