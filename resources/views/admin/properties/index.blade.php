@include('layouts.header')
<div class="bg-alabaster min-vh-100">
    @include('admin.layouts.navbar')
    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-6 col-md-3 col-lg-2 mb-4">
                    <a class="btn btn-block border-main-dark bg-transparent rounded-0" href="{{ route('admin.property.add') }}">
                        <small class="text-main-dark">Add Property</small>
                    </a>
                    @include('admin.properties.create')
                </div>
                <div class="col-6 col-md-3 col-lg-2 mb-4">
                    <a class="btn btn-block border-main-dark bg-transparent rounded-0" href="{{ route('admin.property.add') }}">
                        <small class="text-main-dark">Filter Properties</small>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-2 mb-4">
                    <a class="btn btn-block border-main-dark bg-transparent rounded-0" href="{{ route('admin.property.add') }}">
                        <small class="text-main-dark">Search Properties</small>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-2 mb-4">
                    <a class="btn btn-block border-main-dark bg-transparent rounded-0" href="{{ route('admin.property.add') }}">
                        <small class="text-main-dark">Sort Properties</small>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-2 mb-4">
                    <a class="btn btn-block border-main-dark bg-transparent rounded-0" href="{{ route('admin.properties.categories') }}">
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
                @endif
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')    