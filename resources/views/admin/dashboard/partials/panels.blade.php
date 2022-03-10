<div class="col-12 col-md-6 mb-4">
    <div class="card position-relative card-raduis border-0" >
        @set('users', \App\Models\User::where(['role' => 'user'])->get())
        <div class="card-header pt-5 bg-blue" style="padding-bottom: 90px !important;">
            <h4 class="text-white">
                <a href="{{ route('admin.users') }}" class="text-decoration-none text-white">All Users</a>
            </h4>
            <div class="d-flex justify-content-between">
                <h5 class="m-0">
                    {{ number_format($users->count()) }}
                </h5>
                <small class="tiny-font px-3 py-1 bg-pink rounded-pill">
                    <a href="{{ route('admin.users') }}" class="text-white text-decoration-none">+1.5%</a>
                </small>
            </div>
        </div>
        <div class="card-body py-0 position-relative" style="top: -64px;">
            <div class="row">
                <div class="col-12 col-lg-6 mb-4">
                    <div class="alert alert-info icon-raduis m-0 p-4">
                        <div class="alert alert-warning rounded-circle p-0 m-0 mb-3 text-center border-white" style="height: 40px; width: 40px; line-height: 35px;">
                            <small class="">
                                <i class="icofont-users"></i>
                            </small>
                        </div>
                        <a href="{{ route('admin.users.designation', ['designation' => 'corporate']) }}" class="text-decoration-none">Corporate</a>
                        <div class="d-flex align-items-center">
                            <small class="mr-2">
                                {{ number_format(\App\Models\Profile::where(['designation' => 'corporate'])->get()->count()) }}
                            </small>
                            <small class="text-success">
                                (+1.5%)
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="alert alert-warning icon-raduis m-0 p-4">
                        <div class="alert alert-info rounded-circle p-0 m-0 mb-3 text-center border-white" style="height: 40px; width: 40px; line-height: 35px;">
                            <small class="">
                                <i class="icofont-user-alt-3"></i>
                            </small>
                        </div>
                        <a href="{{ route('admin.users.designation', ['designation' => 'individuals']) }}" class="text-decoration-none">Individuals</a>
                        <div class="d-flex align-items-center">
                            <small class="mr-2">
                                {{ number_format(\App\Models\Profile::where(['designation' => 'individual'])->get()->count()) }}
                            </small>
                            <small class="text-danger">
                                (-2.34%)
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-md-6 mb-4">
    <div class="card position-relative card-raduis border-0" >
        <div class="card-header pt-5 bg-pink" style="padding-bottom: 90px !important;">
            <h4 class="text-white">All Payments</h4>
            <div class="d-flex justify-content-between">
                <h5 class="m-0">
                    ${{ number_format(\App\Models\Payment::where(['status' => 'paid'])->get()->sum('amount')) }}
                </h5>
                <small class="tiny-font px-3 py-1 bg-blue rounded-pill">
                    <a href="{{ route('admin.users') }}" class="text-white text-decoration-none">+1.5%</a>
                </small>
            </div>
        </div>
        <div class="card-body py-0 position-relative" style="top: -64px;">
            <div class="row">
                <div class="col-12 col-lg-6 mb-4">
                    <div class="alert alert-success icon-raduis m-0 p-4">
                        <div class="alert alert-primary rounded-circle p-0 m-0 mb-3 text-center border-white" style="height: 40px; width: 40px; line-height: 35px;">
                            <small class="">
                                <i class="icofont-users"></i>
                            </small>
                        </div>
                        <a href="{{ route('admin.users') }}" class="text-decoration-none">Adverts</a>
                        <div class="d-flex align-items-center">
                            <small class="mr-2">
                                ${{ number_format(\App\Models\Payment::where(['status' => 'paid', 'type' => 'advert'])->get()->sum('amount')) }}
                            </small>
                            <small class="text-success">
                                <small>(+1.5%)</small>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="alert alert-primary icon-raduis m-0 p-4">
                        <div class="alert alert-success rounded-circle p-0 m-0 mb-3 text-center border-white" style="height: 40px; width: 40px; line-height: 35px;">
                            <small class="">
                                <i class="icofont-user-alt-3"></i>
                            </small>
                        </div>
                        <a href="{{ route('admin.users') }}" class="text-decoration-none">Subscriptions</a>
                        <div class="d-flex align-items-center">
                            <small class="mr-2">
                                ${{ number_format(\App\Models\Payment::where(['status' => 'paid', 'type' => 'subscription'])->get()->sum('amount')) }}
                            </small>
                            <small class="text-danger">
                                <small>(-0.15%)</small>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-md-6 col-lg-6 mb-4">
    <div class="card card-raduis border-0 shadow-sm" >
        <div class="card-body">
            <div class="d-flex align-items-center mb-3">
                <small class="px-3 mr-2 tiny-font py-1 bg-danger rounded-pill">
                    <small class="text-white">-3.6%</small>
                </small>
                <small>from last month</small>
            </div>
            <div class="">
                <h5 class="text-main-dark">
                    <span>
                        {{ number_format(\App\Models\Property::count()) }}
                    </span>
                    <small class="text-danger">
                        <i class="icofont-long-arrow-down"></i>
                    </small>
                </h5>
                <a href="{{ route('admin.properties') }}" class="text-main-dark text-decoration-none">All Properties
                </a>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-md-6 col-lg-3 mb-4">
    <div class="card card-raduis border-0 shadow-sm" >
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <small class="px-3 tiny-font py-1 bg-success rounded-pill">
                    <small class="text-white">+33%</small>
                </small>
            </div>
            <div class="">
                <h5 class="text-main-dark">
                    <span>{{ number_format(\App\Models\User::count()) }}</span>
                    <small class="text-success">
                        <i class="icofont-long-arrow-up"></i>
                    </small>
                </h5>
                <a href="{{ route('admin.plans') }}" class="d-flex justify-content-between align-items-center text-main-dark text-decoration-none">
                    <small>Plans</small>
                    <span class="">
                        <i class="icofont-long-arrow-right"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-md-6 col-lg-3 mb-4">
    <div class="card card-raduis border-0 shadow-sm" >
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <small class="px-3 tiny-font py-1 bg-success rounded-pill">
                    <small class="text-white">+33%</small>
                </small>
            </div>
            <div class="">
                <h5 class="text-main-dark">
                    <span>{{ number_format(\App\Models\Skill::count()) }}</span>
                    <small class="text-success">
                        <i class="icofont-long-arrow-up"></i>
                    </small>
                </h5>
                <a href="{{ route('admin.skills') }}" class="d-flex justify-content-between align-items-center text-main-dark text-decoration-none">
                    <small>Skills</small>
                    <span class="">
                        <i class="icofont-long-arrow-right"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-md-6 col-lg-3 mb-4">
    <div class="card card-raduis border-0 shadow-sm" >
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <small class="px-3 tiny-font py-1 bg-danger rounded-pill">
                    <small class="text-white">-04%</small>
                </small>
            </div>
            <div class="">
                <h5 class="text-main-dark">
                    {{ number_format(\App\Models\Country::count()) }}
                </h5>
                <a href="{{ route('admin.countries') }}" class="d-flex justify-content-between align-items-center text-main-dark text-decoration-none">All Countries</a>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-md-6 col-lg-3 mb-4">
    <div class="card card-raduis border-0 shadow-sm" >
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <small class="px-3 tiny-font py-1 bg-danger rounded-pill">
                    <small class="text-white">-0.05% views</small> 
                </small>
            </div>
            <div class="">
                <h5 class="text-main-dark">
                    <span>
                        {{ number_format(\App\Models\Blog::count()) }}
                    </span>
                    <small class="text-danger">
                        <i class="icofont-long-arrow-down"></i>
                    </small>
                </h5>
                <a href="{{ route('admin.blogs') }}" class="d-flex justify-content-between align-items-center text-main-dark text-decoration-none">All Blogs</a>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-md-6 col-lg-3 mb-4">
    <div class="card card-raduis border-0 shadow-sm" >
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <small class="px-3 tiny-font py-1 bg-success rounded-pill">
                    <small class="text-white">+10.5% views</small> 
                </small>
            </div>
            <div class="">
                <h5 class="text-main-dark">
                    <span>
                        {{ number_format(\App\Models\News::count()) }}
                    </span>
                    <small class="text-success">
                        <i class="icofont-long-arrow-up"></i>
                    </small>
                </h5>
                <a href="{{ route('admin.blogs') }}" class="d-flex justify-content-between align-items-center text-main-dark text-decoration-none">All News</a>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-md-6 col-lg-3 mb-4">
    <div class="card card-raduis border-0 shadow-sm" >
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <small class="px-3 tiny-font py-1 bg-danger rounded-pill">
                    <small class="text-white">-04%</small>
                </small>
            </div>
            <div class="">
                <h5 class="text-main-dark">
                    {{ number_format(\App\Models\Country::count()) }}
                </h5>
                <a href="{{ route('admin.countries') }}" class="d-flex justify-content-between align-items-center text-main-dark text-decoration-none">Our Memberships</a>
            </div>
        </div>
    </div>
</div>

