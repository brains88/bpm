<div class="col-12 col-md-6 col-lg-3 mb-4">
    <div class="card admin-panel-card border-0 shadow-sm" >
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="mr-3">
                    <div class="panel-icon rounded-circle text-center" style="background-color: rgba(40, 95,211, 0.5);">
                        <i class="icofont-users-alt-3" style="color: #285fd3;"></i>
                    </div>
                </div>
                <small class="">
                    <small class="px-2 py-1 bg-success rounded-pill">+33%</small>
                </small>
            </div>
            <div class="">
                <h4 class="text-dark">
                    <span>{{ number_format(\App\Models\User::count()) }}</span>
                    <small class="text-success">
                        <i class="icofont-long-arrow-up"></i>
                    </small>
                </h4>
                <a href="{{ route('admin.users') }}" class="d-flex justify-content-between align-items-center text-dark text-decoration-none rounded-pill bg-main-ash px-3 py-2">
                    <small>Users</small>
                    <span class="">
                        <i class="icofont-long-arrow-right"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-md-6 col-lg-3 mb-4">
    <div class="card admin-panel-card border-0 shadow-sm" >
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="mr-3">
                    <div class="panel-icon rounded-circle text-center" style="background-color: rgba(32,222,255, 0.25);">
                        <i class="icofont-building-alt" style="color: #20DEFF"></i>
                    </div>
                </div>
                <small class="">
                    <small class="px-2 py-1 bg-success rounded-pill">-24%</small>
                </small>
            </div>
            <div class="">
                <h4 class="text-dark">
                    {{ number_format(\App\Models\Property::count()) }}
                </h4>
                <a href="{{ route('admin.properties') }}" class="d-flex justify-content-between align-items-center text-dark text-decoration-none rounded-pill bg-main-ash px-3 py-2">
                    <small>Properties</small>
                    <span>
                        <i class="icofont-long-arrow-right"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-md-6 col-lg-3 mb-4">
    <div class="card admin-panel-card border-0 shadow-sm" >
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="mr-3">
                    <div class="panel-icon rounded-circle text-center" style="background-color: rgba(244,91,15, 0.5);">
                        <i class="icofont-invisible" style="color: #F45B0F;"></i>
                    </div>
                </div>
                <small class="">
                    <small class="px-2 py-1 bg-danger rounded-pill">-3%</small>
                </small>
            </div>
            <div class="">
                <h4 class="text-dark">
                    {{ number_format(10890) }}
                </h4>
                <a href="{{ route('admin.users') }}" class="d-flex justify-content-between align-items-center text-dark text-decoration-none rounded-pill bg-main-ash px-3 py-2">
                    <small>Visitors</small>
                    <span>
                        <i class="icofont-long-arrow-right"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-md-6 col-lg-3 mb-4">
    <div class="card admin-panel-card border-0 shadow-sm" >
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="mr-3">
                    <div class="panel-icon rounded-circle text-center" style="background-color: rgba(29,73,61, 0.5);">
                        <i class="icofont-building-alt" style="color: #1D493D"></i>
                    </div>
                </div>
                <small class="">
                    <small class="px-2 py-1 bg-warning rounded-pill">~95%</small>
                </small>
            </div>
            <div class="">
                <h4 class="text-dark">
                    ${{ number_format(48578400) }}
                </h4>
                <a href="{{ route('admin.users') }}" class="d-flex justify-content-between align-items-center text-dark text-decoration-none rounded-pill bg-main-ash px-3 py-2">
                    <small>Payments</small>
                    <span>
                        <i class="icofont-long-arrow-right"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-md-6 col-lg-3 mb-4">
    <div class="card admin-panel-card border-0 shadow-sm">
        <div class="card-body d-flex align-items-center">
            <div class="mr-3">
                <div class="panel-icon rounded-circle text-white bg-dark-500">
                    <i class="icofont-industries-5"></i>
                </div>
            </div>
            <div class="">
                <a href="{{ route('admin.blogs') }}" class="d-block text-dark text-underline mb-1">
                    Blogs
                </a>
                <h6 class="text-muted m-0">
                    {{ \App\Models\Blog::count() }}
                </h6>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-md-6 col-lg-3 mb-4">
    <div class="card admin-panel-card border-0 shadow-sm">
        <div class="card-body d-flex align-items-center">
            <div class="mr-3">
                <div class="panel-icon rounded-circle text-white bg-dark-500">
                    <i class="icofont-industries-5"></i>
                </div>
            </div>
            <div class="">
                <a href="{{ route('admin.countries') }}" class="d-block text-dark text-underline mb-1">
                    Countries
                </a>
                <h6 class="text-muted m-0">
                    {{ \App\Models\Country::count() }}
                </h6>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-md-6 col-lg-3 mb-4">
    <div class="card admin-panel-card border-0 shadow-sm">
        <div class="card-body d-flex align-items-center">
            <div class="mr-3">
                <div class="panel-icon rounded-circle text-white bg-dark-500">
                    <i class="icofont-industries-5"></i>
                </div>
            </div>
            <div class="">
                <a href="{{ route('admin.plans') }}" class="d-block text-dark text-underline mb-1">
                    Plans
                </a>
                <h6 class="text-muted m-0">
                    0{{-- {{ number_format(\App\Models\Product::count()) }} --}}
                </h6>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-md-6 col-lg-3 mb-4">
    <div class="card admin-panel-card border-0 shadow-sm">
        <div class="card-body d-flex align-items-center">
            <div class="mr-3">
                <div class="panel-icon rounded-circle text-white bg-dark-500">
                    <i class="icofont-industries-5"></i>
                </div>
            </div>
            <div class="">
                <a href="{{ route('admin') }}" class="d-block text-dark text-underline mb-1">
                    News
                </a>
                <h6 class="text-muted m-0">
                    {{ number_format(\App\Models\News::count()) }}
                </h6>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-md-6 col-lg-3 mb-4">
    <div class="card admin-panel-card border-0 shadow-sm">
        <div class="card-body d-flex align-items-center">
            <div class="mr-3">
                <div class="panel-icon rounded-circle text-white bg-dark-500">
                    <i class="icofont-industries-5"></i>
                </div>
            </div>
            <div class="">
                <a href="{{ route('admin') }}" class="d-block text-dark text-underline mb-1">
                    Companies
                </a>
                <h6 class="text-muted m-0">
                    {{ number_format(\App\Models\News::count()) }}
                </h6>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-md-6 col-lg-3 mb-4">
    <div class="card admin-panel-card border-0 shadow-sm">
        <div class="card-body d-flex align-items-center">
            <div class="mr-3">
                <div class="panel-icon rounded-circle text-white bg-dark-500">
                    <i class="icofont-industries-5"></i>
                </div>
            </div>
            <div class="">
                <a href="{{ route('admin.skills') }}" class="d-block text-dark text-underline mb-1">
                    Skills
                </a>
                <h6 class="text-muted m-0">
                    {{ number_format(\App\Models\Skill::count()) }}
                </h6>
            </div>
        </div>
    </div>
</div>
