@include('layouts.header')
<div class="min-vh-100 bg-main-ash">
    @include('admin.layouts.navbar')
    <div class="section-padding pb-4">
        <div class="container-fluid">
            @if(empty($user) || empty($user->profile))
                <div class="alert alert-danger">Profile not found</div>
            @else
                <div class="row">
                    @set('role', strtolower($user->profile->role ?? ''))
                    @set('status', strtolower($user->status ?? ''))
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="mb-4 icon-raduis bg-white shadow-sm text-center">
                            <div class="w-auto position-relative">
                                <div class="p-5 rounded" style="height: 240px;">
                                    @if(empty($user->profile->image))
                                        <div class="w-100 h-100 text-center" style="background-color: {{ randomrgba() }}; line-height: 160px;">
                                            <small class="text-main-dark">
                                                {{ substr(strtoupper($user->name), 0, 1) }}
                                            </small>
                                        </div>
                                    @else
                                        <img src="{{ $user->profile->image }}" class="img-fluid object-cover w-100 h-100">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-success text-center rounded-circle sm-circle mr-2">
                                    <small class="text-white tiny-font">
                                        <i class="icofont-tick-mark"></i>
                                    </small>
                                </div>
                                <div class="">
                                    <h5 class="text-main-dark m-0">
                                        {{ ucwords($user->name) }}
                                    </h5>
                                </div>s
                            </div>
                            @if($role == 'artisan')
                                <div class="d-flex flex-wrap">
                                    @if(empty($user->gigs))
                                        <div class="alert alert-danger">No services listed</div>
                                    @else
                                        @foreach($user->gigs as $gig)
                                            <small class="px-3 py-1 bg-success rounded-pill mb-3 mr-2">
                                                <small class="text-white">
                                                    {{ ucwords($gig->service->name ?? '') }}
                                                </small>
                                            </small>
                                        @endforeach
                                    @endif
                                </div>
                            @endif
                            <div class="text-main-dark mb-4">
                                {{ ucfirst($user->profile->description) }}
                            </div>
                            <div class="">
                                <div class="row">
                                    <div class="col-4 mb-3">
                                        <a href="tel:{{ $user->phone }}" class="btn btn-info btn-block icon-raduis">
                                            <small class="">
                                                <i class="icofont-phone"></i>
                                            </small>
                                        </a>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <a href="mailto:{{ $user->email }}" class="btn btn-info btn-block icon-raduis">
                                            <span class="">
                                                <i class="icofont-send-mail"></i>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <a href="" class="btn btn-info btn-block icon-raduis">
                                            <small class="">
                                                <i class="icofont-web"></i>
                                            </small>
                                        </a>
                                    </div>
                                </div>
                                <div class="mb-4 d-flex align-items-center">
                                    <div class="text-theme-color mr-2">
                                        <i class="icofont-location-pin"></i>
                                    </div>
                                    <div class="text-main-dark">
                                        {{ ucwords($user->profile->city).', '.ucwords($user->profile->state) }}
                                    </div>
                                </div>
                                @if(empty($user->social))
                                    <div class="alert alert-danger">No social links</div>
                                @else
                                    @set('social', $user->social)
                                    @set('socials', ['facebook' => $social->facebook, 'twitter' => $social->twitter, 'linkedin' => $social->linkedin, 'whatsapp' => $social->whatsapp, 'instagram' => $social->instagram, 'youtube' => $social->youtube ?? ''])
                                    <div class="d-flex align-items-center justify-content-between icon-raduis bg-white shadow-sm w-100 p-3">
                                        @foreach($socials as $name => $link)
                                            @if(empty($link))
                                                <div class="text-center bg-main-ash border rounded-circle border text-decoration-none md-circle">
                                                    <small class="text-main-dark">
                                                        <i class="icofont-{{ $name }}"></i>
                                                    </small>
                                                </div>
                                            @else
                                                <a href="{{ $name == 'whatsapp' ? "tel:{$link}" : $link }}" class="text-center bg-theme-color rounded-circle border text-decoration-none md-circle">
                                                    <small class="text-white">
                                                        <i class="icofont-{{ $name }}"></i>
                                                    </small>
                                                </a>
                                            @endif
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-5 col-lg-6">
                        <div class="row">
                            <div class="col-6 mb-4">
                                <div class="icon-raduis py-4 alert d-flex align-items-center justify-content-between bg-pink position-relative m-0">
                                    <div class="">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="text-main-dark text-shadow-white m-0">
                                                {{ number_format($user->reviews->count()) }}
                                            </h5>
                                        </div>
                                        <a href="{{ route('user.reviews') }}" class="text-white">Reviews</a>
                                    </div>
                                    <div class="lg-circle text-center progress-chart rounded-circle border border-light position-relative">
                                        <small class="text-white h-100 position-relative" style="top: 5px; width: {{ '55' }}%;">
                                            {{ '17' }}%
                                        </small>
                                    </div>
                                    <style type="text/css">
                                        .progress-chart:before { position: absolute; content: ""; width: {{ '55' }}%; background-color: var(--bg-blue); z-index: 2; padding: 10px; }
                                    </style>
                                </div>
                            </div>
                            @if($role === 'agent')
                                <div class="col-6 mb-4">
                                    <div class="icon-raduis alert bg-info m-0">
                                        <div class="position-absolute" style="top: -14px; right: 16px;">
                                            <small class="tiny-font bg-danger px-2">
                                                <small class="text-white position-relative" style="top: -1px;">
                                                    +{{ '4' }} views
                                                </small>
                                            </small>
                                        </div>
                                        <div class="py-2">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h5 class="text-main-dark text-shadow-white m-0">
                                                    {{ number_format($user->properties->count()) }}
                                                </h5>
                                            </div>
                                            <a href="{{ route('user.properties') }}" class="text-white">Properties</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if($role === 'dealer')
                                <div class="col-6 mb-4">
                                    <div class="icon-raduis position-relative alert bg-info m-0">
                                        <div class="position-absolute" style="top: -14px; right: 16px;">
                                            <small class="tiny-font bg-success px-2">
                                                <small class="text-white position-relative" style="top: -1px;">+3 views</small>
                                            </small>
                                        </div>
                                        <div class="py-2">
                                            <div class="d-flex justify-content-between align-items-center align-items-center">
                                                <h5 class="text-main-dark text-shadow-white m-0">
                                                    {{ number_format($user->materials->count()) }}
                                                </h5>
                                            </div>
                                            <a href="{{ route('user.materials') }}" class="text-white">Materials</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if($role === 'artisan')
                                <div class="col-6 mb-4">
                                    <div class="icon-raduis position-relative alert bg-info m-0">
                                        <div class="position-absolute" style="top: -14px; right: 16px;">
                                            <small class="tiny-font bg-success px-2">
                                                <small class="text-white position-relative" style="top: -1px;">+3 views</small>
                                            </small>
                                        </div>
                                        <div class="py-2">
                                            <div class="d-flex justify-content-between align-items-center align-items-center">
                                                <h5 class="text-main-dark text-shadow-white m-0">
                                                    {{ number_format($user->gigs->count()) }}
                                                </h5>
                                            </div>
                                            <a href="{{ route('user.gigs') }}" class="text-white">Gigs</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 col-md-3 col-lg-3"></div>
                </div>
            @endif
        </div>
    </div>
</div>
@include('layouts.footer')    