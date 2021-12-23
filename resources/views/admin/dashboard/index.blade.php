@include('layouts.header')
<div class="bg-main-ash min-vh-100">
    @include('admin.layouts.navbar')
    <div class="section-padding">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center flex-wrap mb-3">
                <p class="m-0 font-weight-bolder text-smoky">Dashboard</p>
                <div class="text-info">
                    {{ date("F j, Y") }}
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-8 col-lg-9">
                    <div class="row">
                        @include('admin.dashboard.partials.panels')
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 mb-4">
                            <div class="card admin-panel-card border-0 shadow-sm" style="background-color: rgba(31, 22, 131);">
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
                                        <h4 class="text-dark">
                                            ${{ number_format(48578400) }}
                                        </h4>
                                        <a href="{{ route('admin.users') }}" class="d-flex justify-content-between align-items-center text-dark text-decoration-none rounded-pill bg-main-ash px-3 py-2">
                                            <small>Subscriptions</small>
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
                        <div class="col-12 col-md-6 mb-4">
                            <div class="card admin-panel-card border-0 shadow-sm" style="background-color: rgba(244, 91, 15, 1.0);">
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
                                        <a href="{{ route('admin.users') }}" class="d-flex justify-content-between align-items-center text-dark text-decoration-none rounded-pill bg-main-ash px-3 py-2">
                                            <small>Subscriptions</small>
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
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>Property statistics</div>
                            <form class="" action="javascript:;">
                                <div class="form-group input-group-sm m-0">
                                    <select class="custom-select form-control">
                                        <option value="{{ 2021 }}">2021</option>
                                    </select>
                                </div>
                            </form>bar
                        </div>
                        <div class="card-body">
                            <img src="/images/nain.png" class="img-fluid h-100 w-100">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="">
                        <div class="p-3 mb-4 rounded bg-info d-flex justify-content-between">
                            <div class="text-white">New Users</div>
                            <a href="{{ route('admin.users') }}" class="text-decoration-none">
                                <small class="text-white">
                                    <i class="icofont-long-arrow-right"></i>
                                </small>
                            </a> 
                        </div>
                        <div class="rounded p-3 mb-4 bg-white d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <div class="mr-3" style="height: 40px; width: 40px;">
                                    <img src="/images/artisans/1.jpg" class="img-fluid object-cover rounded-circle w-100 h-100">
                                </div>
                                <div class="">
                                    <small class="d-block text-dark">Johnshons Nwachukwu</small>
                                    <small class="d-block text-dark">3hours ago</small>
                                </div>
                            </div>
                            <small class="">
                                <small class="text-white px-2 py-1 rounded-pill bg-danger">Pending</small>
                            </small>
                        </div>
                        <a href="{{ route('admin.users') }}" class="btn-block btn text-white bg-main-dark">View all</a>
                    </div>  
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-6 mb-4">
                    <div class="card" style="height: 308px;">
                        <div class="card-body">
                            <img src="/images/line.png" class="img-fluid w-100 h-100">
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 mb-4">
                    <div class="card" style="height: 308px;">
                        <div class="card-body">
                            <img src="/images/his.png" class="img-fluid w-100 h-100">
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')    