@include('layouts.header')
<div class="min-vh-100 bg-main-ash">
    @include('admin.layouts.navbar')
    <div class="section-padding pb-4">
        <div class="container-fluid">
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
                    @include('admin.dashboard.partials.sidebar')  
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')