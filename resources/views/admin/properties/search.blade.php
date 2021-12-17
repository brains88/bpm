@include('layouts.header')
<div class="bg-white min-vh-100">
    @include('admin.layouts.navbar')
    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="alert alert-info d-flex align-items-center">
                        <small class="mr-2">All properties ({{ \App\Models\Property::count() }})</small>
                        <a href="javascript:;" class="text-underline" data-url="{{ route('admin.property.add') }}" data-target="#add-property" data-toggle="modal">
                            <small class="mr-2">
                                Add property
                            </small>
                        </a>
                        @include('admin.properties.forms.add')
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
                @if(empty($properties->count()))
                    <div class="alert-info alert">No properties yet</div>
                @else
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
                @endif
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')    