@include('layouts.header')
<div class="min-vh-100 bg-main-ash">
    <div class="user-content user-properties-banner pb-4">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <div class="mb-3">
                    <h4 class="text-white">Listed Properties</h4>
                    <div class="text-muted">Welcome Melim Homes. List your properties and building materials.</div>
                </div>
                <div class="d-flex align-items-center flex-wrap">
                    <div class="d-flex align-items-center">
                        <a href="{{ route('user.property.add') }}" class="user-icon bg-dark text-white mr-3 mb-4 px-3 py-2 icon-raduis text-decoration-none">
                            <small class="mr-1">
                                <i class="icofont-plus"></i>
                            </small>
                            <div class="d-inline">List property</div>
                        </a>
                        <div class="user-icon bg-info text-white mr-3 mb-4 px-3 py-2 icon-raduis">
                            <i class="icofont-ui-user"></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="user-icon bg-dark text-white mb-4 px-3 py-2 icon-raduis">
                            <i class="icofont-navigation-menu"></i>
                        </div>
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
                                @include('user.properties.partials.card')
                            </div>
                        @endforeach
                    </div>
                    {{ $properties->links('vendor.pagination.default') }}
                @endif
            </div>
        </div>
    </div>
</div>
@include('layouts.user.footer')    