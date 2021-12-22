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
                <div class="col-12 col-md-6">
                    <div class="row">
                        @include('admin.dashboard.partials.panels')
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card mb-4">
                        <div class="card-header d-flex">
                            <small>Property statistics</small>
                        </div>
                        <div class="card-body">
                            <img src="/images/nain.png" class="img-fluid h-100 w-100">
                        </div>
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