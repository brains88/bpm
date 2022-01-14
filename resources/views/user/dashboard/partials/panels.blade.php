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
                    <span class="">
                        {{ number_format(auth()->user()->properties->count()) }}
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
                        {{ number_format(auth()->user()->materials->count()) }}
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
