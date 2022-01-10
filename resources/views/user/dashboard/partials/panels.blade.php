<div class="col-12 col-md-6 mb-4">
    <div class="card icon-raduis shadow-sm border-0" >
        <div class="card-body d-flex align-items-center">
            <div class="user-panel-icon mr-3 icon-raduis text-center">
                <div class="">
                    <i class="icofont-settings"></i>
                </div>
            </div>
            <div class="">
                <div class="text-dark">
                    <span>
                        {{ number_format($properties->count()) }}
                    </span>
                </div>
                <a href="{{ route('user.properties') }}" class="text-main-dark">
                    <small>All Properties</small>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-md-6 mb-4">
    <div class="card icon-raduis shadow-sm border-0" >
        <div class="card-body d-flex align-items-center">
            <div class="user-panel-icon mr-3 icon-raduis text-center">
                <div class="">
                    <i class="icofont-settings"></i>
                </div>
            </div>
            <div class="">
                <div class="text-dark">
                    <span>
                        {{ number_format(\App\Models\Material::count()) }}
                    </span>
                </div>
                <a href="{{ route('user.materials') }}" class="text-main-dark">
                    <small>Building Materials</small>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="col-12 mb-4">
    <div class="card position-relative shadow-sm border-0" >
        <div class="card-header icon-raduis py-5" style="background-color: #f1416c">
            <h4 class="text-white">Total Payments</h4>
            <h2 class="m-0">$24500</h2>
        </div>
        <div class="card-body py-0 position-relative" style="top: -16px;">
            <div class="row">
                <div class="col-12 col-md-6 mb-3">
                    <div class="alert alert-warning rounded p-4">
                        <h5>Adverts</h5>
                        <h2>$905</h2>
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <div class="alert alert-warning rounded p-4">
                        <h5>Subscriptions</h5>
                        <h2>$125</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
