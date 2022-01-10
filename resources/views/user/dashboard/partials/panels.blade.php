<div class="col-12 col-md-6 mb-4">
    <div class="card card-raduis shadow-sm border-0" >
        <div class="card-body d-flex align-items-center">
            <div class="user-panel-icon mr-3 icon-raduis text-center">
                <div class="">
                    <i class="icofont-settings"></i>
                </div>
            </div>
            <div class="">
                <div class="text-dark">
                    <span>
                        {{ number_format(\App\Models\Property::count()) }}
                    </span>
                </div>
                <a href="{{ route('user.properties') }}" class="text-dark text-decoration-none">
                    <small>All Properties</small>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-md-6 mb-4">
    <div class="card card-raduis shadow-sm border-0" >
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
                <a href="{{ route('user.properties') }}" class="text-dark text-decoration-none">
                    <small>Building Materials</small>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="col-12 mb-4">
    <div class="card card-raduis shadow-sm border-0" >
        <div class="card-body">
            <div class="user-panel-icon icon-raduis text-center mb-3">
                <div class="">
                    <i class="icofont-settings"></i>
                </div>
            </div>
            <div class="">
                <h5 class="text-dark">
                    <span>
                        ${{ number_format(45600) }}
                    </span>
                    <small class="text-danger">
                        <i class="icofont-long-arrow-down"></i>
                    </small>
                </h5>
                <a href="{{ route('user.properties') }}" class="d-flex justify-content-between align-items-center text-dark text-decoration-none rounded bg-main-ash px-3 py-2">
                    <small>All Payments</small>
                    <span>
                        <i class="icofont-long-arrow-right"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>
