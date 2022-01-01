@include('layouts.header')
<div class="min-vh-100">
    @include('admin.layouts.navbar')
    <div class="section-padding pb-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="alert alert-info d-flex align-items-center">
                        <small class="mr-2">All countries ({{ \App\Models\Country::count() }})</small>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="alert alert-info d-flex align-items-center">
                        <a class="" href="javascript:;">
                            <small class="mr-2 font-weight-bold">
                                <i class="icofont-search"></i>
                            </small>
                        </a>
                        <a class="text-underline" href="javascript:;">
                            <small class="">
                                Filter countries
                            </small>
                        </a>
                    </div>
                </div>
            </div>
            <div class="">
                @if(empty($countries->count()))
                    <div class="alert-info alert">No countries yet</div>
                @else
                    <div class="row">
                        @foreach($countries as $country)
                            <div class="col-12 col-md-3 col-lg-2 mb-4">
                                @include('admin.countries.partials.card')
                            </div>
                        @endforeach
                    </div>
                    {{ $countries->onEachSide(1)->links('vendor.pagination.default') }}
                @endif
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')    