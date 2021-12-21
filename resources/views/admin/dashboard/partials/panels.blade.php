<div class="col-12 col-md-6 col-lg-3 mb-4">
    <div class="card border-dark rounded bg-light shadow panel">
        <div class="card-body d-flex align-items-center">
            <div class="mr-3">
                <div class="panel-icon rounded-0 text-center text-white bg-dark-500">
                    <i class="icofont-industries-5"></i>
                </div>
            </div>
            <div class="">
                <a href="{{ route('admin.users') }}" class="d-block text-dark font-weight-bold text-underline mb-1">
                    Users
                </a>
                <h6 class="text-muted m-0">
                    {{ \App\Models\User::count() }}
                </h6>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-md-6 col-lg-3 mb-4">
    <div class="card border-dark rounded bg-light shadow panel">
        <div class="card-body d-flex align-items-center">
            <div class="mr-3">
                <div class="panel-icon rounded-0 text-center text-white bg-dark-500">
                    <i class="icofont-industries-5"></i>
                </div>
            </div>
            <div class="">
                <a href="{{ route('admin.blogs') }}" class="d-block text-dark font-weight-bold text-underline mb-1">
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
    <div class="card border-dark rounded bg-light shadow panel">
        <div class="card-body d-flex align-items-center">
            <div class="mr-3">
                <div class="panel-icon rounded-0 text-center text-white bg-dark-500">
                    <i class="icofont-industries-5"></i>
                </div>
            </div>
            <div class="">
                <a href="{{ route('admin.countries') }}" class="d-block text-dark font-weight-bold text-underline mb-1">
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
    <div class="card border-dark rounded bg-light shadow panel">
        <div class="card-body d-flex align-items-center">
            <div class="mr-3">
                <div class="panel-icon rounded-0 text-center text-white bg-dark-500">
                    <i class="icofont-industries-5"></i>
                </div>
            </div>
            <div class="">
                <a href="{{ route('admin') }}" class="d-block text-dark font-weight-bold text-underline mb-1">
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
    <div class="card border-dark rounded bg-light shadow panel">
        <div class="card-body d-flex align-items-center">
            <div class="mr-3">
                <div class="panel-icon rounded-0 text-center text-white bg-dark-500">
                    <i class="icofont-industries-5"></i>
                </div>
            </div>
            <div class="">
                <a href="{{ route('admin.properties') }}" class="d-block text-dark font-weight-bold text-underline mb-1">
                    Visitors
                </a>
                <h6 class="text-muted m-0">
                    {{ number_format(\App\Models\Property::count()) }}
                </h6>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-md-6 col-lg-3 mb-4">
    <div class="card border-dark rounded bg-light shadow panel">
        <div class="card-body d-flex align-items-center">
            <div class="mr-3">
                <div class="panel-icon rounded-0 text-center text-white bg-dark-500">
                    <i class="icofont-industries-5"></i>
                </div>
            </div>
            <div class="">
                <a href="{{ route('admin.properties') }}" class="d-block text-dark font-weight-bold text-underline mb-1">
                    Properties
                </a>
                <h6 class="text-muted m-0">
                    {{ number_format(\App\Models\Property::count()) }}
                </h6>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-md-6 col-lg-3 mb-4">
    <div class="card border-dark rounded bg-light shadow panel">
        <div class="card-body d-flex align-items-center">
            <div class="mr-3">
                <div class="panel-icon rounded-0 text-center text-white bg-dark-500">
                    <i class="icofont-industries-5"></i>
                </div>
            </div>
            <div class="">
                <a href="{{ route('admin.subscriptions') }}" class="d-block text-dark font-weight-bold text-underline mb-1">
                    Subscriptions
                </a>
                <h6 class="text-muted m-0">
                    {{ number_format(\App\Models\Category::count()) }}
                </h6>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-md-6 col-lg-3 mb-4">
    <div class="card border-dark rounded bg-light shadow panel">
        <div class="card-body d-flex align-items-center">
            <div class="mr-3">
                <div class="panel-icon rounded-0 text-center text-white bg-dark-500">
                    <i class="icofont-industries-5"></i>
                </div>
            </div>
            <div class="">
                <a href="{{ route('admin') }}" class="d-block text-dark font-weight-bold text-underline mb-1">
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
    <div class="card border-dark rounded bg-light shadow panel">
        <div class="card-body d-flex align-items-center">
            <div class="mr-3">
                <div class="panel-icon rounded-0 text-center text-white bg-dark-500">
                    <i class="icofont-industries-5"></i>
                </div>
            </div>
            <div class="">
                <a href="{{ route('admin') }}" class="d-block text-dark font-weight-bold text-underline mb-1">
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
    <div class="card border-dark rounded bg-light shadow panel">
        <div class="card-body d-flex align-items-center">
            <div class="mr-3">
                <div class="panel-icon rounded-0 text-center text-white bg-dark-500">
                    <i class="icofont-industries-5"></i>
                </div>
            </div>
            <div class="">
                <a href="{{ route('admin.skills') }}" class="d-block text-dark font-weight-bold text-underline mb-1">
                    Skills
                </a>
                <h6 class="text-muted m-0">
                    {{ number_format(\App\Models\Skill::count()) }}
                </h6>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-md-6 col-lg-3 mb-4">
    <div class="card border-dark rounded bg-light shadow panel">
        <div class="card-body d-flex align-items-center">
            <div class="mr-3">
                <div class="panel-icon rounded-0 text-center text-white bg-dark-500">
                    <i class="icofont-industries-5"></i>
                </div>
            </div>
            <div class="">
                <a href="{{ route('admin') }}" class="d-block text-dark font-weight-bold text-underline mb-1">
                    Payments
                </a>
                <h6 class="text-muted m-0">
                    {{ number_format(\App\Models\Payment::count()) }}
                </h6>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-md-6 col-lg-3 mb-4">
    <div class="card border-dark rounded bg-light shadow panel">
        <div class="card-body d-flex align-items-center">
            <div class="mr-3">
                <div class="panel-icon rounded-0 text-center text-white bg-dark-500">
                    <i class="icofont-industries-5"></i>
                </div>
            </div>
            <div class="">
                <a href="{{ route('admin') }}" class="d-block text-dark font-weight-bold text-underline mb-1">
                    Adverts
                </a>
                <h6 class="text-muted m-0">
                    0{{-- {{ number_format(\App\Models\Transaction::count()) }} --}}
                </h6>
            </div>
        </div>
    </div>
</div>
