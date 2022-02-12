<div class="col-6 col-md-4 mb-4">
    <div class="icon-raduis alert bg-info m-0">
        <div class="position-absolute" style="top: -14px; right: 16px;">
            <small class="rounded tiny-font bg-danger px-2">
                <small class="text-white position-relative" style="top: -1px;">
                    +{{ '4' }} views
                </small>
            </small>
        </div>
        <div class="py-2">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="text-main-dark text-shadow-white m-0">
                    {{ number_format(auth()->user()->properties->count()) }}
                </h5>
            </div>
            <a href="{{ route('user.properties') }}" class="text-white">
                <small>
                    Properties
                </small>
            </a>
        </div>
    </div>
</div>
<div class="col-6 col-md-4 mb-4">
    <div class="icon-raduis position-relative alert bg-info m-0">
        <div class="position-absolute" style="top: -14px; right: 16px;">
            <small class="rounded tiny-font bg-success px-2">
                <small class="text-white position-relative" style="top: -1px;">+3 views</small>
            </small>
        </div>
        <div class="py-2">
            <div class="d-flex justify-content-between align-items-center align-items-center">
                <h5 class="text-main-dark text-shadow-white m-0">
                    {{ number_format(auth()->user()->materials->count()) }}
                </h5>
            </div>
            <a href="{{ route('user.materials') }}" class="text-white">
                <small>
                    Products
                </small>
            </a>
        </div>
    </div>
</div>
<div class="col-12 col-md-4 mb-4">
    <div class="icon-raduis alert bg-pinky position-relative m-0">
        <div class="position-absolute" style="top: -14px; right: 16px;">
            <small class="rounded tiny-font bg-success px-2">
                <small class="text-white position-relative" style="top: -1px;">
                    +{{ '17' }} reviews
                </small>
            </small>
        </div>
        <div class="py-2">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="text-main-dark text-shadow-white m-0">
                    {{ number_format(auth()->user()->materials->count() * 5) }}
                </h5>
            </div>
            <a href="{{ 'javascript:;' }}" class="text-white">
                <small>
                    <small>Reviews</small>
                </small>
            </a>
        </div>
    </div>
</div>
<div class="col-12 mb-4">
    <div class="card position-relative shadow-sm border-0" >
        <div class="card-header icon-raduis py-5" style="background-color: #f1416c">
            <h4 class="text-white">Total Payments</h4>
            <h4 class="m-0">
                ${{ number_format(\App\Models\Payment::where(['user_id' => auth()->user()->id])->sum('amount')) }}
            </h4>
        </div>
        <div class="card-body py-0 position-relative" style="top: -16px;">
            <div class="row">
                <div class="col-12 col-md-6 mb-3">
                    <div class="alert alert-warning m-0 rounded p-4">
                        <h5>Adverts</h5>
                        <div>
                            ${{ number_format(\App\Models\Payment::where(['user_id' => auth()->user()->id, 'type' => 'advert'])->sum('amount')) }}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <div class="alert alert-warning m-0 rounded p-4">
                        <h5>Subscriptions</h5>
                        <div>
                            ${{ number_format(\App\Models\Payment::where(['user_id' => auth()->user()->id, 'type' => 'subscription'])->sum('amount')) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
