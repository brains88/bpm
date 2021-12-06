@include('layouts.header')
<div class="bg-alabaster min-vh-100">
    @include('admin.layouts.navbar')
    <div class="section-padding">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center flex-wrap mb-3">
                <p class="m-0 font-weight-bolder text-smoky">Dashboard</p>
                <div class="text-info">
                    {{ date("F j, Y") }}
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        @include('admin.dashboard.partials.panels')
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-9">
                    <div class="card">
                        <div class="card-body"></div>
                        <div class="card-footer"></div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="card">
                        <div class="card-body"></div>
                        <div class="card-footer"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')    