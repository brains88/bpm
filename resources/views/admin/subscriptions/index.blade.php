@include('layouts.header')
    <div class="min-vh-100">
        @include('admin.layouts.navbar')
        <div class="section-padding">
            <div class="container-fluid">
                <div class="d-flex align-items-center flex-wrap justify-content-between">
                    <div class="d-flex">
                        <div class="py-1 px-4 rounded-pill border-dark-500 mr-3 mb-4 text-muted cursor-pointer" data-toggle="modal" data-modal="#add-plan" style="background-color: rgba(0, 0, 0, 0.5);">
                            <small class="">
                                <i class="icofont-caret-down"></i>
                            </small>
                            <small class="">
                                {{ \App\Models\Subscription::count() }} Subscription(s)
                            </small>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="py-1 px-4 rounded-pill border-dark-500 text-muted mb-4 cursor-pointer" data-toggle="modal" data-modal="#add-plan" style="background-color: rgba(0, 0, 0, 0.5);">
                            <small class="">
                                <i class="icofont-caret-down"></i>
                            </small>
                            <small class="">Filter</small>
                        </div>
                    </div>
                </div>
                <div class="row pb-4">
                    <div class="col-12">
                        @if(empty($subscriptions->count()))
                            <div class="alert-info alert">No subscriptions yet</div>
                        @else
                            <div class="row">
                                @foreach($subscriptions as $subscription)
                                    <div class="col-12 col-md-4 col-lg-3 mb-4">
                                        @include('admin.subscriptions.partials.card')
                                    </div>
                                @endforeach
                            </div>
                            {{ $subscriptions->onEachSide(1)->links('vendor.pagination.default') }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('layouts.footer')    