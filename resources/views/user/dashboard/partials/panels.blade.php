<div class="col-12 col-md-6 col-lg-3 mb-4">
    <div class="card card-raduis shadow-sm" >
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <small class="">
                    <small class="px-2 py-1 bg-danger rounded-pill">-3.6%</small>
                </small>
            </div>
            <div class="">
                <h5 class="text-dark">
                    <span>
                        {{ number_format(\App\Models\Property::count()) }}
                    </span>
                    <small class="text-danger">
                        <i class="icofont-long-arrow-down"></i>
                    </small>
                </h5>
                <a href="{{ route('user.properties') }}" class="d-flex justify-content-between align-items-center text-dark text-decoration-none rounded border px-3 py-2">
                    <small>Listed Properties</small>
                    <span>
                        <i class="icofont-long-arrow-right"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-md-6 col-lg-3 mb-4">
    <div class="card card-raduis shadow-sm" >
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <small class="">
                    <small class="px-2 py-1 bg-danger rounded-pill">-3.6%</small>
                </small>
            </div>
            <div class="">
                <h5 class="text-dark">
                    <span>
                        {{ number_format(\App\Models\Property::count()) }}
                    </span>
                    <small class="text-danger">
                        <i class="icofont-long-arrow-down"></i>
                    </small>
                </h5>
                <a href="{{ route('user.properties') }}" class="d-flex justify-content-between align-items-center text-dark text-decoration-none rounded border px-3 py-2">
                    <small>Building Materials</small>
                    <span>
                        <i class="icofont-long-arrow-right"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-lg-6 mb-4">
    <div class="card bg-info h-100 card-raduis shadow-sm" >
        <div class="card-body">
            <div class="">
                <h5 class="text-white mb-3">List Building Materials</h5>
                <a href="{{ route('user.properties') }}" class="btn btn-dark px-4">Get Started</a>
            </div>
        </div>
    </div>
</div>