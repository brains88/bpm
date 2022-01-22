@include('layouts.header')
    @include('frontend.layouts.navbar')
    <div class="bg-main-ash min-vh-100">
        <div class="properties-banner position-relative">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-9 col-lg-6">
                        <div class="mb-4">
                            <h2 class="text-white">Listed Properties</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="home-properties">
            <div class="container-fluid">
                <div class="">
                    <h4 class="text-main-dark mb-4">Global Properties</h4>
                    <div class="">
                        @if(empty($properties->count()))
                            <div class="alert-info alert">No Properties Yet</div>
                        @else
                            <div class="row">
                                @foreach($properties as $property)
                                    <div class="col-12 col-md-6 col-lg-3 mb-4">
                                        @include('frontend.properties.partials.card')
                                    </div>
                                @endforeach
                            </div> 
                        @endif
                    </div>
                </div>
                <div class="row"></div>
            </div>
        </div>
    </div>
@include('layouts.footer')