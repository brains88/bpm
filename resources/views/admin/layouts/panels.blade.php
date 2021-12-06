<div class="col-12 col-md-6 col-lg-3 mb-4">
    <div class="card border-0 rounded bg-main-dark panel">
        <div class="card-body d-flex align-items-center">
            <div class="mr-3">
                <div class="panel-icon rounded-0 text-center text-white bg-dark-500">
                    <i class="icofont-industries-5"></i>
                </div>
            </div>
            <div class="">
                <a href="{{ route('admin') }}" class="d-block text-smoky font-weight-bolder mb-1">
                    Users
                </a>
                <h6 class="text-muted m-0">
                    0{{-- {{ \App\Models\User::count() }} --}}
                </h6>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-md-6 col-lg-3 mb-4">
    <div class="card border-0 rounded bg-main-dark panel">
        <div class="card-body d-flex align-items-center">
            <div class="mr-3">
                <div class="panel-icon rounded-0 text-center text-white bg-dark-500">
                    <i class="icofont-industries-5"></i>
                </div>
            </div>
            <div class="">
                <a href="{{ route('admin') }}" class="d-block text-smoky font-weight-bolder mb-1">
                    Expenses
                </a>
                <h6 class="text-muted m-0">
                    0{{-- {{ \App\Models\User::count() }} --}}
                </h6>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-md-6 col-lg-3 mb-4">
    <div class="card border-0 rounded bg-main-dark panel">
        <div class="card-body d-flex align-items-center">
            <div class="mr-3">
                <div class="panel-icon rounded-0 text-center text-white bg-dark-500">
                    <i class="icofont-industries-5"></i>
                </div>
            </div>
            <div class="">
                <a href="{{ route('admin') }}" class="d-block text-smoky font-weight-bold mb-1">
                    Blogs
                </a>
                <h6 class="text-muted m-0">
                    0{{-- {{ \App\Models\Pricing::count() }} --}}
                </h6>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-md-6 col-lg-3 mb-4">
    <div class="card border-0 rounded bg-main-dark panel">
        <div class="card-body d-flex align-items-center">
            <div class="mr-3">
                <div class="panel-icon rounded-0 text-center text-white bg-dark-500">
                    <i class="icofont-industries-5"></i>
                </div>
            </div>
            <div class="">
                <a href="{{ route('admin') }}" class="d-block text-smoky font-weight-bolder mb-1">
                    Categories
                </a>
                <h6 class="text-muted m-0">
                    0{{-- {{ number_format(\App\Models\Company::count()) }} --}}
                </h6>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-md-6 col-lg-3 mb-4">
    <div class="card border-0 rounded bg-main-dark panel">
        <div class="card-body d-flex align-items-center">
            <div class="mr-3">
                <div class="panel-icon rounded-0 text-center text-white bg-dark-500">
                    <i class="icofont-industries-5"></i>
                </div>
            </div>
            <div class="">
                <a href="{{ route('admin') }}" class="d-block text-smoky font-weight-bolder mb-1">
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
    <div class="card border-0 rounded bg-main-dark panel">
        <div class="card-body d-flex align-items-center">
            <div class="mr-3">
                <div class="panel-icon rounded-0 text-center text-white bg-dark-500">
                    <i class="icofont-industries-5"></i>
                </div>
            </div>
            <div class="">
                <a href="{{ route('admin.properties') }}" class="d-block text-smoky font-weight-bolder mb-1">
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
    <div class="card border-0 rounded bg-main-dark panel">
        <div class="card-body d-flex align-items-center">
            <div class="mr-3">
                <div class="panel-icon rounded-0 text-center text-white bg-dark-500">
                    <i class="icofont-industries-5"></i>
                </div>
            </div>
            <div class="">
                <a href="{{ route('admin') }}" class="d-block text-smoky font-weight-bolder mb-1">
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
    <div class="card border-0 rounded bg-main-dark panel">
        <div class="card-body d-flex align-items-center">
            <div class="mr-3">
                <div class="panel-icon rounded-0 text-center text-white bg-dark-500">
                    <i class="icofont-industries-5"></i>
                </div>
            </div>
            <div class="">
                <a href="{{ route('admin') }}" class="d-block text-smoky font-weight-bolder mb-1">
                    Houses
                </a>
                <h6 class="text-muted m-0">
                    {{ number_format(\App\Models\House::count()) }}
                </h6>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-md-6 col-lg-3 mb-4">
    <div class="card border-0 rounded bg-main-dark panel">
        <div class="card-body d-flex align-items-center">
            <div class="mr-3">
                <div class="panel-icon rounded-0 text-center text-white bg-dark-500">
                    <i class="icofont-industries-5"></i>
                </div>
            </div>
            <div class="">
                <a href="{{ route('admin') }}" class="d-block text-smoky font-weight-bolder mb-1">
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
    <div class="card border-0 rounded bg-main-dark panel">
        <div class="card-body d-flex align-items-center">
            <div class="mr-3">
                <div class="panel-icon rounded-0 text-center text-white bg-dark-500">
                    <i class="icofont-industries-5"></i>
                </div>
            </div>
            <div class="">
                <a href="{{ route('admin') }}" class="d-block text-smoky font-weight-bolder mb-1">
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
    <div class="card border-0 rounded bg-main-dark panel">
        <div class="card-body d-flex align-items-center">
            <div class="mr-3">
                <div class="panel-icon rounded-0 text-center text-white bg-dark-500">
                    <i class="icofont-industries-5"></i>
                </div>
            </div>
            <div class="">
                <a href="{{ route('admin') }}" class="d-block text-smoky font-weight-bolder mb-1">
                    Visitors
                </a>
                <h6 class="text-muted m-0">
                    0{{-- {{ number_format(\App\Models\Transaction::count()) }} --}}
                </h6>
            </div>
        </div>
    </div>
</div>
<div class="col-12 col-md-6 col-lg-3 mb-4">
    <div class="card border-0 rounded bg-main-dark panel">
        <div class="card-body d-flex align-items-center">
            <div class="mr-3">
                <div class="panel-icon rounded-0 text-center text-white bg-dark-500">
                    <i class="icofont-industries-5"></i>
                </div>
            </div>
            <div class="">
                <a href="{{ route('admin') }}" class="d-block text-smoky font-weight-bolder mb-1">
                    Adverts
                </a>
                <h6 class="text-muted m-0">
                    0{{-- {{ number_format(\App\Models\Transaction::count()) }} --}}
                </h6>
            </div>
        </div>
    </div>
</div>
