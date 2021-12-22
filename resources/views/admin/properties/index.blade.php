@include('layouts.header')
<<<<<<< HEAD
<div class="bg-white min-vh-100">
=======
<div class="bg-alabaster min-vh-100">
>>>>>>> b0e72cfb0b42dc80ca26a72be07e041bc89300f5
    @include('admin.layouts.navbar')
    <div class="section-padding">
        <div class="container">
            <div class="row">
<<<<<<< HEAD
                <div class="col-12 col-md-6">
                    <div class="alert alert-info d-flex align-items-center">
                        <small class="mr-2">All properties ({{ \App\Models\Property::count() }})</small>
                        <a href="javascript:;" class="text-underline" data-url="{{ route('admin.property.add') }}" data-target="#add-property" data-toggle="modal">
                            <small class="mr-2">
                                Add
                            </small>
                        </a>
                        @include('admin.properties.forms.add')
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="alert alert-info d-flex align-items-center">
                        <a class="text-underline" href="javascript:;" data-target="#search-properties" data-toggle="modal">
                            <small class="mr-2">
                                Search
                            </small>
                        </a>
                        @include('admin.properties.forms.search')
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
                    {{ $properties->links('vendor.pagination.default') }}
=======
                <div class="col-6 col-md-3 col-lg-2 mb-4">
                    <a class="btn btn-block border-main-dark bg-transparent" href="{{ route('admin.property.add') }}">
                        <small class="text-main-dark">Add Property</small>
                    </a>
                    @include('admin.properties.create')
                </div>
                <div class="col-6 col-md-3 col-lg-2 mb-4">
                    <a class="btn btn-block border-main-dark bg-transparent" href="{{ route('admin.property.add') }}">
                        <small class="text-main-dark">Filter Properties</small>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-2 mb-4">
                    <a class="btn btn-block border-main-dark bg-transparent" href="{{ route('admin.property.add') }}">
                        <small class="text-main-dark">Search Properties</small>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-2 mb-4">
                    <a class="btn btn-block border-main-dark bg-transparent" href="{{ route('admin.property.add') }}">
                        <small class="text-main-dark">Sort Properties</small>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-2 mb-4">
                    <a class="btn btn-block border-main-dark bg-transparent" href="{{ route('admin.properties.categories') }}">
                        <small class="text-main-dark">Property Categories</small>
                    </a>
                </div>
            </div>
            <div class="">
                @if(empty($allProperties->count()))
                    <div class="alert-info alert">No properties yet</div>
                @else
                    <div class="row">
                        @foreach($allProperties as $property)
                            <div class="col-12 col-md-6 col-lg-4 mb-4">
                                @include('admin.properties.card')
                            </div>
                        @endforeach
                    </div>
>>>>>>> b0e72cfb0b42dc80ca26a72be07e041bc89300f5
                @endif
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')    