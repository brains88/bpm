@include('layouts.header')
<div class="min-vh-100 bg-main-ash">
    @include('admin.layouts.navbar')
    <div class="section-padding pb-4">
        <div class="container-fluid admin-container">
            <div class="d-flex justify-content-between align-items-center flex-wrap mb-3">
                <p class="m-0 text-main-dark">Welcome {{ ucwords(auth()->user()->name) }}</p>
                <div class="text-info">
                    {{ date("F j, Y") }}
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-8 col-lg-9">
                    <div class="row">
                        <div class="col-12">
                            <div class="row h-100">
                                @include('admin.dashboard.partials.panels')
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6 mb-4">
                            <div class="card card-raduis border-0 bg-orange shadow-sm">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <small class="">
                                            <small class="px-2 py-1 bg-warning rounded-pill">~95%</small>
                                        </small>
                                    </div>
                                    <div class="mb-4">
                                        <h4 class="text-main-dark">
                                            {{ number_format(\App\Models\Subscription::count()) }}
                                        </h4>
                                        <a href="{{ route('admin.subscriptions') }}" class="text-white">Subscriptions</a>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 mb-4">
                                            <div class="alert m-0 d-flex justify-content-between align-items-center alert-success icon-raduis">
                                                <div class="">
                                                    <div class="">
                                                        {{ 56 }}
                                                    </div>
                                                    <div>
                                                        {{ 'Active' }}
                                                    </div>
                                                </div>
                                                <div class="border border-success rounded-circle text-center" style="height: 40px; width: 40px; line-height: 35px;">
                                                    <small class="tiny-font">
                                                        {{ '25%' }}
                                                    </small>
                                                </div>  
                                            </div>
                                        </div>
                                        <div class="col-6 mb-4">
                                            <div class="alert m-0 d-flex justify-content-between align-items-center alert-warning icon-raduis">
                                                <div class="">
                                                    <div class="">
                                                        {{ 56 }}
                                                    </div>
                                                    <div>
                                                        {{ 'Cancelled' }}
                                                    </div>
                                                </div>
                                                <div class="border border-warning rounded-circle text-center" style="height: 40px; width: 40px; line-height: 35px;">
                                                    <small class="tiny-font">
                                                        {{ '25%' }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-4">
                                            <div class="alert m-0 d-flex justify-content-between align-items-center alert-danger icon-raduis">
                                                <div class="">
                                                    <div class="">
                                                        {{ 56 }}
                                                    </div>
                                                    <div>
                                                        {{ 'Expired' }}
                                                    </div>
                                                </div>
                                                <div class="border border-danger rounded-circle text-center" style="height: 40px; width: 40px; line-height: 35px;">
                                                    <small class="tiny-font">
                                                        {{ '25%' }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-4">
                                            <div class="alert m-0 d-flex justify-content-between align-items-center alert-info icon-raduis">
                                                <div class="">
                                                    <div class="">
                                                        {{ 56 }}
                                                    </div>
                                                    <div>
                                                        {{ 'Renewed' }}
                                                    </div>
                                                </div>
                                                <div class="border border-info rounded-circle text-center" style="height: 40px; width: 40px; line-height: 35px;">
                                                    <small class="tiny-font">
                                                        {{ '25%' }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 mb-4">
                            <div class="card card-raduis border-0 shadow-sm bg-orange">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <small class="">
                                            <small class="px-2 py-1 bg-warning rounded-pill">~95%</small>
                                        </small>
                                    </div>
                                    <div class="mb-4">
                                        <h4 class="text-main-dark">
                                            {{ number_format(\App\Models\Advert::count()) }}
                                        </h4>
                                        <a href="{{ route('admin.adverts') }}" class="text-white">Adverts</a>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 mb-4">
                                            <div class="alert m-0 d-flex justify-content-between align-items-center alert-success icon-raduis">
                                                <div class="">
                                                    <div class="">
                                                        {{ 56 }}
                                                    </div>
                                                    <div>
                                                        {{ 'Active' }}
                                                    </div>
                                                </div>
                                                <div class="border border-success rounded-circle text-center" style="height: 40px; width: 40px; line-height: 35px;">
                                                    <small class="tiny-font">
                                                        {{ '25%' }}
                                                    </small>
                                                </div>  
                                            </div>
                                        </div>
                                        <div class="col-6 mb-4">
                                            <div class="alert m-0 d-flex justify-content-between align-items-center alert-warning icon-raduis">
                                                <div class="">
                                                    <div class="">
                                                        {{ 56 }}
                                                    </div>
                                                    <div>
                                                        {{ 'Cancelled' }}
                                                    </div>
                                                </div>
                                                <div class="border border-warning rounded-circle text-center" style="height: 40px; width: 40px; line-height: 35px;">
                                                    <small class="tiny-font">
                                                        {{ '25%' }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-4">
                                            <div class="alert m-0 d-flex justify-content-between align-items-center alert-danger icon-raduis">
                                                <div class="">
                                                    <div class="">
                                                        {{ 56 }}
                                                    </div>
                                                    <div>
                                                        {{ 'Expired' }}
                                                    </div>
                                                </div>
                                                <div class="border border-danger rounded-circle text-center" style="height: 40px; width: 40px; line-height: 35px;">
                                                    <small class="tiny-font">
                                                        {{ '25%' }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-4">
                                            <div class="alert m-0 d-flex justify-content-between align-items-center alert-info icon-raduis">
                                                <div class="">
                                                    <div class="">
                                                        {{ 56 }}
                                                    </div>
                                                    <div>
                                                        {{ 'Paused' }}
                                                    </div>
                                                </div>
                                                <div class="border border-info rounded-circle text-center" style="height: 40px; width: 40px; line-height: 35px;">
                                                    <small class="tiny-font">
                                                        {{ '25%' }}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-warning">
                                 <div class="card-body">
                                     <div class="border-0 d-flex justify-content-between align-items-center">
                                        <div class="mb-3">
                                            <h6 class="text-white m-0">Visitors Timezones</h6>
                                        </div>
                                     </div>
                                     <div class="position-relative border-dark-500 visitors-chart-wrapper" style="width: 100%;">
                                        <div class="position-absolute text-center bg-dark w-100 h-100 center-absolute visitors-chart-spinner">
                                            <img src="/images/spinner.svg" class="pt-5">
                                        </div>
                                        <canvas class="h-100 w-100 text-white visitors-chart" id="visitors-chart" data-url="{{ route('admin.visitors.chart.timezones') }}"></canvas>
                                    </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-raduis shadow-sm mb-4" style="background-color: rgba(0, 0, 0, 0.7);">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <small class="text-white">Property Listings</small>
                                <div class="dropdown">
                                    <div class="text-white d-flex align-items-center" type="button" id="properties-chart-filter" data-toggle="dropdown" aria-expanded="false">
                                        <small class="position-relative" style="bottom: -2px;">
                                            <i class="icofont-caret-down"></i>
                                        </small>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="properties-chart-filter">
                                        <form class="p-3" action="javascript:;">
                                            <div class="form-group mb-0">
                                                <select class="form-control custom-select" name="filter" id="properties-chart-year">
                                                    @if(empty($years))
                                                        <option value="{{ date('Y') }}" data-url="{{ route('admin.properties.chart', ['year' => date('Y')]) }}">
                                                            {{ date('Y') }}
                                                        </option>
                                                    @else
                                                        @foreach($years as $year)
                                                            <option value="{{ $year }}" data-url="{{ route('admin.properties.chart', ['year' => $year]) }}" {{ $year == date('Y') ? 'selected' : date('Y') }}>
                                                                -- {{ $year }} --
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="position-relative border-dark-500 property-chart-wrapper" style="width: 100%;">
                                <div class="position-absolute text-center bg-dark w-100 h-100 center-absolute property-chart-spinner">
                                    <img src="/images/spinner.svg" class="pt-5">
                                </div>
                                <canvas class="h-100 w-100 text-white property-chart" id="property-chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="card card-raduis border-0 bg-dark mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <div class="text-muted">Email Statistics</div>
                            <div class="dropdown">
                                <a class="text-muted" href="javascript:;" data-toggle="dropdown" id="email-statistics">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right p-3 border-0 shadow" aria-labelledby="email-statistics">
                                    <form></form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="text-muted d-flex justify-content-between mb-3">
                                    <div>(10%)</div>
                                    <div>650 Emails</div>
                                </div>
                                <div class="progress progress-bar-height mb-3">
                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="text-muted">Monthly maximum of 10,000 emails as stated by <a href="postmarkapp.com" target="_blank">postmark</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-raduis border-0 bg-info mb-4">
                        <div class="card-body">
                            <div class="mb-2 d-flex justify-content-between">
                                <div class="">Sms Balance</div>
                                <div class="dropdown">
                                    <a class="text-white" href="javascript:;" data-toggle="dropdown" id="email-statistics">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right p-3 border-0 shadow" aria-labelledby="email-statistics">
                                        <form></form>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <h5 class="">
                                    $120
                                </h5>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class=""></div>
                            <small class="">Since 26th May 2022</small>
                        </div>
                    </div>
                    <div class="p-3 border icon-raduis">
                        <div class="alert alert-info d-flex mb-4 align-items-center justify-content-between">
                            <div>New Users</div>
                            <small class="px-3 tiny-font py-1 bg-success rounded-pill">
                                <small class="text-white">+10</small> 
                            </small>
                        </div>
                        @set('users', \App\Models\User::latest()->take(4)->get())
                        @if(empty($users))
                            <div class="alert alert-danger">No recent users</div>
                        @else
                            @foreach($users as $user)
                                <div class="p-3 bg-white mb-4 icon-raduis shadow-sm d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="mr-2">
                                            @if(empty($user->profile->image))
                                                <div class="text-center text-main-dark border rounded-circle" style="height: 35px; width: 35px; line-height: 35px; background-color: {{ randomrgba() }};">
                                                    {{ substr($user->name, 0, 1) }}
                                                </div>
                                            @else
                                                <div class="border rounded-circle" style="height: 35px; width: 35px;">
                                                    <img src="{{ $user->profile->image }}" class="img-fluid rounded-circle w-100 h-100">
                                                </div>  
                                            @endif
                                        </div> 
                                        <div class="">
                                            <div class="text-main-dark">
                                                {{ \Str::limit($user->name, 9) }}
                                            </div>
                                            <small class="text-muted">
                                                {{ ucwords($user->created_at->diffForHumans()) }}
                                            </small>
                                        </div>
                                    </div> 
                                    <div class="rounded-circle bg-{{ strtolower($user->status) === 'active' ? 'success' : 'danger' }} text-center" style="height: 20px; width: 20px; line-height: 15px;">
                                        <small class="text-white tiny-font">
                                            <i class="icofont-tick-mark"></i>
                                        </small>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                        
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')