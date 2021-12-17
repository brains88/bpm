@include('layouts.header')
<div class="bg-white min-vh-100">
    @include('admin.layouts.navbar')
    <div class="section-padding">
        <div class="container">
            @if(empty($properties->count()))
                <div class="alert-warning alert">No properties found</div>
            @else
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="alert alert-info d-flex align-items-center">
                            <small class="mr-2">Properties by {{ ucwords($properties[0]->user->name ?? '') }}</small>
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
                                    Date filter
                                </small>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="row">
                        @foreach($properties as $property)
                            <div class="col-12 col-md-4 col-lg-3 mb-4">
                                @include('admin.properties.partials.card')
                            </div>
                        @endforeach
                    </div>
                    <div class="mb-4 alert-info alert">
                        {{ $properties->links('vendor.pagination.links') }}
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@include('layouts.footer')    