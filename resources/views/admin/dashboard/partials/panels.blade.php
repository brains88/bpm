<div class="col-12 col-md-8 col-lg-6 mb-4">
    <div class="card admin-card border-dark-500 shadow-sm" style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <small class="">
                    <a href="{{ route('admin.users') }}" class="text-white">Individuals</a>
                </small>
                <small class="">
                    <a href="{{ route('admin.users') }}" class="text-white">Companies</a>
                </small>
            </div>
            <div class="">
                <div class="d-flex justify-content-between">
                    <h5 class="text-white">
                        <span>{{ number_format(\App\Models\User::where(['type' => 'individual'])->get()->count()) }}</span>
                        <small class="text-success">
                            <i class="icofont-long-arrow-up"></i>
                        </small>
                    </h5>
                    <h5 class="text-white">
                        <span>{{ number_format(\App\Models\User::where(['type' => 'company'])->get()->count()) }}</span>
                        <small class="text-danger">
                            <i class="icofont-long-arrow-down"></i>
                        </small>
                    </h5>
                </div>
                <a href="{{ route('admin.users') }}" class="d-flex justify-content-between align-items-center text-dark text-decoration-none rounded px-3 py-2" style="background-color: rgba(0, 0, 0, 0.2);">
                    <span class="text-success">+33%</span>
                    <span class="text-danger">-0.5%</span>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-md-4 col-lg-3 mb-4">
    <div class="card admin-card panel-card shadow-sm" >
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
                <a href="{{ route('admin.properties') }}" class="d-flex justify-content-between align-items-center text-dark text-decoration-none rounded border px-3 py-2">
                    <small>Properties</small>
                    <span>
                        <i class="icofont-long-arrow-right"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-md-4 col-lg-3 mb-4">
    <div class="card admin-card panel-card shadow-sm" >
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <small class="">
                    <small class="px-2 py-1 bg-success rounded-pill">+33%</small>
                </small>
            </div>
            <div class="">
                <h5 class="text-dark">
                    <span>{{ number_format(\App\Models\User::count()) }}</span>
                    <small class="text-success">
                        <i class="icofont-long-arrow-up"></i>
                    </small>
                </h5>
                <a href="{{ route('admin.plans') }}" class="d-flex justify-content-between align-items-center text-dark text-decoration-none rounded border px-3 py-2">
                    <small>Plans</small>
                    <span class="">
                        <i class="icofont-long-arrow-right"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-md-4 col-lg-3 mb-4">
    <div class="card admin-card panel-card shadow-sm" >
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <small class="">
                    <small class="px-2 py-1 bg-success rounded-pill">+33%</small>
                </small>
            </div>
            <div class="">
                <h5 class="text-dark">
                    <span>{{ number_format(\App\Models\Skill::count()) }}</span>
                    <small class="text-success">
                        <i class="icofont-long-arrow-up"></i>
                    </small>
                </h5>
                <a href="{{ route('admin.skills') }}" class="d-flex justify-content-between align-items-center text-dark text-decoration-none rounded border px-3 py-2">
                    <small>Skills</small>
                    <span class="">
                        <i class="icofont-long-arrow-right"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-md-4 col-lg-3 mb-4">
    <div class="card admin-card panel-card shadow-sm" >
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <small class="">
                    <small class="px-2 py-1 bg-danger rounded-pill">-04%</small>
                </small>
            </div>
            <div class="">
                <h5 class="text-dark">
                    {{ number_format(\App\Models\Country::count()) }}
                </h5>
                <a href="{{ route('admin.countries') }}" class="d-flex justify-content-between align-items-center text-dark text-decoration-none rounded border px-3 py-2">
                    <small>Countries</small>
                    <span>
                        <i class="icofont-long-arrow-right"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-md-4 col-lg-3 mb-4">
    <div class="card admin-card panel-card shadow-sm" >
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <small class="">
                    <small class="px-2 py-1 bg-danger rounded-pill">-0.05% views</small> 
                </small>
            </div>
            <div class="">
                <h5 class="text-dark">
                    <span>
                        {{ number_format(\App\Models\Blog::count()) }}
                    </span>
                    <small class="text-danger">
                        <i class="icofont-long-arrow-down"></i>
                    </small>
                </h5>
                <a href="{{ route('admin.blogs') }}" class="d-flex justify-content-between align-items-center text-dark text-decoration-none rounded border px-3 py-2">
                    <small>Blogs</small>
                    <span>
                        <i class="icofont-long-arrow-right"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-md-4 col-lg-3 mb-4">
    <div class="card admin-card panel-card shadow-sm" >
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <small class="">
                    <small class="px-2 py-1 bg-success rounded-pill">+10.5% views</small> 
                </small>
            </div>
            <div class="">
                <h5 class="text-dark">
                    <span>
                        {{ number_format(\App\Models\News::count()) }}
                    </span>
                    <small class="text-success">
                        <i class="icofont-long-arrow-up"></i>
                    </small>
                </h5>
                <a href="{{ route('admin.blogs') }}" class="d-flex justify-content-between align-items-center text-dark text-decoration-none rounded border px-3 py-2">
                    <small>News</small>
                    <span>
                        <i class="icofont-long-arrow-right"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>

