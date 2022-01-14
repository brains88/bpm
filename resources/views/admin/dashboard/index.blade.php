@include('layouts.header')
<div class="min-vh-100">
    @include('admin.layouts.navbar')
    <div class="section-padding pb-4">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center flex-wrap mb-3">
                <p class="m-0 font-weight-bolder text-white">Dashboard</p>
                <div class="text-info">
                    {{ date("F j, Y") }}
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row h-100">
                        @include('admin.dashboard.partials.panels')
                    </div>
                </div>
                <div class="col-12 mb-4">
                    <div class="card card-raduis border-dark-500 h-100" style="background-color: rgba(0, 0, 0, 0.8);">
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
            <div class="row">
                <div class="col-12 col-lg-6 mb-4">
                    <div class="card card-raduis border-0 shadow-sm" style="background-color: rgba(31, 22, 131);">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="mr-3">
                                    <div class="panel-icon rounded-circle text-center" style="background-color: rgba(31, 22, 131, 0.2) !important;">
                                        <i class="icofont-building-alt" style="color: #1D493D"></i>
                                    </div>
                                </div>
                                <small class="">
                                    <small class="px-2 py-1 bg-warning rounded-pill">~95%</small>
                                </small>
                            </div>
                            <div class="mb-4">
                                <h4 class="text-white">
                                    ${{ number_format(48578400) }}
                                </h4>
                                <a href="{{ route('admin.subscriptions') }}" class="d-flex justify-content-between align-items-center text-decoration-none rounded px-3 py-2" style="background-color: rgba(31, 22, 102, 0.4);">
                                    <small class="text-white">Subscriptions</small>
                                    <span class="">
                                        <i class="icofont-long-arrow-right"></i>
                                    </span>
                                </a>
                            </div>
                            <div class="" style="height: 140px;">
                                <img src="/images/bar.png" class="img-fluid h-100 w-100">
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="col-12 col-lg-6 mb-4">
                    <div class="card card-raduis border-0 shadow-sm" style="background-color: rgba(244, 91, 15, 1.0);">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="mr-3">
                                    <div class="panel-icon rounded-circle text-center" style="background-color: rgba(244, 91, 15, 0.5);">
                                        <i class="icofont-building-alt" style="color: #1D493D"></i>
                                    </div>
                                </div>
                                <small class="">
                                    <small class="px-2 py-1 bg-warning rounded-pill">~95%</small>
                                </small>
                            </div>
                            <div class="mb-4">
                                <h4 class="text-dark">
                                    ${{ number_format(48578400) }}
                                </h4>
                                <a href="{{ route('admin.adverts') }}" class="d-flex justify-content-between align-items-center text-dark text-decoration-none rounded px-3 py-2" style="background-color: rgba(130, 91, 15, 0.4);">
                                    <small>Adverts</small>
                                    <span>
                                        <i class="icofont-long-arrow-right"></i>
                                    </span>
                                </a>
                            </div>
                            <div class="" style="height: 140px;">
                                <img src="/images/bar.png" class="img-fluid h-100 w-100">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card card-raduis border-0">
                         <div class="card-header bg-main-ash border-0 d-flex justify-content-between align-items-center">
                             <small class="text-dark">Payments</small>
                             <div class="text-dark">
                                 <i class="icofont-caret-down"></i>
                             </div>
                         </div>
                         <div class="card-body"></div>
                         <div class="card-footer"></div>
                     </div>
                </div>   
            </div>
            <div class="card card-raduis border-dark-500 shadow-sm mb-4" style="background-color: rgba(0, 0, 0, 0.7);">
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
    </div>
</div>
@include('layouts.footer')    