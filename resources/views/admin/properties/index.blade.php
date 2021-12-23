@include('layouts.header')
<div class="min-vh-100">
    @include('admin.layouts.navbar')
    <div class="section-padding min-vh-100">
        <div class="container-fluid">
            <div class="row">
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
                            <div class="col-12 col-md-4 col-lg-2 mb-4">
                                @include('admin.properties.partials.card')
                            </div>
                        @endforeach
                    </div>
                    {{ $properties->links('vendor.pagination.default') }}
                @endif
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')    