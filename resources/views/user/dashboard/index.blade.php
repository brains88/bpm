@include('layouts.header')
<div class="min-vh-100 bg-main-ash">
    @include('user.layouts.navbar')
    <div class="user-content user-dashboard-banner pb-4">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="row">
                        @include('user.dashboard.partials.panels')
                    </div>
                    <div class="alert alert-success card-radus p-3 mb-4">
                        <div class="pb-3">
                            <div class="">
                                @if(empty($subscription))
                                    <div class="alert alert-danger mb-3">Subscribe to list more properties and build materials.</div>
                                    <a href="{{ route('pricing') }}" class="btn btn-dark px-4">Get Started</a>
                                @else
                                <div class="">
                                    <div class="d-flex align-items-center justify-content-between"></div>
                                    <div class="">
                                        <?php $end = \Carbon\Carbon::parse($subscription->expiry); $fraction = (($end->diffInDays(\Carbon\Carbon::now()))/$subscription->duration); $percent = $fraction * 100;  ?>
                                        <div class="">Progress ( {{ ($percent == 0) ? 2 : $percent }}% )</div>
                                        <div class="bg-main-ash border w-100">
                                            <div class="bg-success py-1 rounded-pill bg-main-ash" style="width: {{ ($percent == 0) ? 2 : $percent }}%"></div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="card card-raduis alert alert-primary py-4 m-0 position-relative shadow-sm border-0" >
                                <div class="card-body pb-0 position-relative">
                                    <div class="mb-3">
                                        <h4 class="">Available Credits</h4>
                                        <h2 class="">907units</h2>
                                    </div>
                                    <div class="">
                                        {{-- <div class="col-12 col-md-6 mb-3"> --}}
                                        <button class="btn-dark btn">Buy credits</button>
                                        {{-- </div> --}}
                                        {{-- <div class="col-12 col-md-6 mb-3"> --}}
                                            {{-- <button class="btn-dark btn btn-block">Buy credits</button> --}}
                                        {{-- </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="card bg-info card-raduis shadow-sm">
                                <div class="card-body">
                                    <div class="">
                                        <h5 class="text-white mb-3">List Building Materials</h5>
                                        <div class="mb-3">With over 5,000 weekly visitos, you stand a change to leverage our platform.</div>
                                        <a href="{{ route('user.properties') }}" class="btn btn-dark px-4">Get Started</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="card bg-info card-raduis shadow-sm">
                                <div class="card-body">
                                    <div class="">
                                        <h5 class="text-white mb-3">List Properties</h5>
                                        <div class="mb-3">With over 5,000 weekly visitos, you stand a change to leverage our platform.</div>
                                        <a href="{{ route('user.properties') }}" class="btn btn-dark px-4">Get Started</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="alert alert-info mb-4">Recently listed properties</div>
                        @if(empty($properties->count()))
                            <div class="alert alert-warning mb-4">No properties listed yet</div>
                        @else
                            <div class="row">
                                @foreach($properties as $property)
                                    <div class="col-12 col-md-4 col-lg-6 mb-4">
                                        @include('user.properties.partials.card')
                                    </div>
                                @endforeach
                            </div>
                            @if($properties->total() > $limit)
                                <a href="{{ route('user.properties') }}" class="alert alert-info mb-4 d-block">See all listed properties</a>
                            @endif
                        @endif
                    </div>    
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')    