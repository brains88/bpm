@include('layouts.header')
<div class="min-vh-100 bg-main-ash">
    @include('user.layouts.navbar')
    <div class="user-content user-dashboard-banner pb-4">
        <div class="container">
            @if(!empty($reference))
                @if(isset($verify['status']))
                    <div class="alert mb-4 {{ $verify['status'] === 0 ? 'alert-danger' : 'alert-success' }}">
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
                    {{-- Subscription section starts --}}
                    <div class="alert alert-success shadow-sm p-3 mb-4 icon-raduis">
                        <div class="pb-3">
                            @if(empty($subscription))
                                <div class="alert alert-danger m-0">Subscribe to list more properties. <a href="javascript:;" data-target="#membership-subscription" data-toggle="modal">Click here</a> to get started.</div>
                                @include('user.subscriptions.partials.subscribe')
                            @else
                                <?php 
                                    $status = strtolower($subscription->status ?? ''); 
                                    $expiry = empty($subscription->expiry) ? null : $subscription->expiry;

                                    $remainingdays = (\Carbon\Carbon::parse($expiry))->diffInDays(\Carbon\Carbon::today());
                                    $duration = empty($subscription->membership->duration) ? 1 : (int)$subscription->duration;

                                    $fraction = $duration > $remainingdays ? ($remainingdays/$duration) : 0;
                                    $progress = (100 - round($fraction * 100));  
                                ?>

                                <div class="d-flex position-relative" style="top: -25px;">
                                    <small class="text-white bg-{{ $status == 'expired' ? 'danger' : ($status === 'cancelled' ? 'secondary' : 'success') }} px-2 rounded mr-3">
                                        {{ ucfirst($status) }}
                                    </small>
                                    <small class="text-white bg-{{ $progress <= 90 ? 'success' : 'danger' }} px-2 rounded mr-3">
                                        {{ $progress <= 0 ? 1 : $progress }}%
                                    </small>
                                </div>
                                <div class="">
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <small class="">
                                            {{ ucwords($subscription->membership->name ?? 'Nill') }} Plan ({{ ucwords($duration) }}days)
                                        </small>
                                        <small class="">
                                            {{ $remainingdays }} Day(s) remaining
                                        </small>
                                    </div>
                                    <div class="mb-4">
                                        <div class="progress" style="height: 7.5px;">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-{{ $progress <= 90 ? 'success' : 'danger' }}" role="progressbar" aria-valuenow="{{ $progress <= 0 ? 1 : $progress }}" aria-valuemin="1" aria-valuemax="100" style="width: {{ $progress <= 0 ? 1 : $progress }}%"></div>
                                        </div>
                                    </div>
                                    <div class="">
                                        @if($status === 'active' || $progress <= 50)
                                            <div class="d-flex">
                                                <a href="javascript:;" class="btn btn-info icon-raduis px-4 mr-3" data-toggle="modal" data-target="#renew-subscription">
                                                    Renew
                                                </a>
                                                <a href="javascript:;" class="btn btn-dark icon-raduis px-4 user-cancel-subscription" data-url="{{ route('user.subscription.cancel', ['id' => $subscription->id]) }}">
                                                    <img src="/images/spinner.svg" class="mr-2 d-none cancel-subscription-spinner mb-1">
                                                    Cancel
                                                </a>
                                            </div>
                                            @include('user.subscriptions.partials.renew')
                                        @elseif($status === 'cancelled')
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:;" class="btn btn-info icon-raduis btn-block px-4 user-activate-subscription" data-url="{{ route('user.subscription.activate', ['id' => $subscription->id]) }}">
                                                    <img src="/images/spinner.svg" class="mr-2 d-none activate-subscription-spinner mb-1">
                                                    Activate
                                                </a>
                                            </div>
                                        @else
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:;" class="btn btn-info icon-raduis btn-block px-4 user-cancel-subscription" data-url="{{ route('user.subscription.cancel', ['id' => $subscription->id]) }}">
                                                    <img src="/images/spinner.svg" class="mr-2 d-none cancel-subscription-spinner mb-1">
                                                    Cancel
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    {{-- Advert section starts --}}
                    <div class="">
                        <div class="d-flex justify-content-between alert alert-info mb-4 icon-raduis">
                            <span class="">Adverts</span>
                            <a href="javascript:;" class="" data-toggle="modal" data-target="#post-advert">Post advert</a>
                            @include('user.adverts.partials.post')
                        </div>
                        <?php $adverts = \App\Models\Advert::latest()->where(['user_id' => auth()->id()])->get(); ?>
                        @if(empty($adverts->count()))
                            <div class="alert alert-danger">You have no adverts. <a href="javascript:;" class="text-underline" data-toggle="modal" data-target="#post-advert">Post advert</a>.</div>
                        @else
                             <div class="row">
                                @foreach($adverts as $advert)
                                    <div class="col-12 mb-4">
                                        @include('user.adverts.partials.card')
                                    </div>
                                    @include('user.adverts.partials.edit')
                                @endforeach
                            </div>
                        @endif
                    </div>   
                </div>
                <div class="col-12 col-lg-6">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="card position-relative shadow-sm border-0" >
                                <div class="card-header icon-raduis py-5" style="background-color: #f1416c">
                                    <h4 class="text-white">Total Payments</h4>
                                    <h4 class="m-0">
                                        ${{ number_format(\App\Models\Payment::where(['user_id' => auth()->user()->id])->sum('amount')) }}
                                    </h4>
                                </div>
                                <div class="card-body py-0 position-relative" style="top: -16px;">
                                    <div class="row">
                                        <div class="col-12 col-md-6 mb-3">
                                            <div class="alert alert-warning m-0 rounded p-4">
                                                <h5>Adverts</h5>
                                                <div>
                                                    ${{ number_format(\App\Models\Payment::where(['user_id' => auth()->user()->id, 'type' => 'advert'])->sum('amount')) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 mb-3">
                                            <div class="alert alert-warning m-0 rounded p-4">
                                                <h5>Subscriptions</h5>
                                                <div>
                                                    ${{ number_format(\App\Models\Payment::where(['user_id' => auth()->user()->id, 'type' => 'subscription'])->sum('amount')) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(auth()->user()->profile)
                            @if(auth()->user()->profile->role !== 'dealer')
                                <div class="col-12 mb-4">
                                    <div class="card bg-info card-raduis shadow-sm">
                                        <div class="card-body">
                                            <div class="">
                                                <h5 class="text-white mb-3">List Building Materials</h5>
                                                <div class="mb-3">With over 5,000 weekly visitors, you stand a change to leverage our platform.</div>
                                                <a href="{{ route('logout', ['redirect' => 'signup']) }}" class="btn bg-main-dark text-white icon-raduis px-4">Get Started</a>
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
                                                <a href="{{ route('logout', ['redirect' => 'signup']) }}" class="btn bg-main-dark text-white icon-raduis px-4">Get Started</a>
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
                                                <a href="{{ route('logout', ['redirect' => 'signup']) }}" class="btn bg-main-dark text-white icon-raduis px-4">Get Started</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>
                    @if(auth()->user()->profile)
                        @if(auth()->user()->profile->role == 'agent')
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
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')    