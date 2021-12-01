@include('layouts.header')
<div class="bg-alabaster min-vh-100">
    @include('admin.partials.navbar')
    <div class="section-padding">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center flex-wrap mb-1">
                <a class="btn btn-sm bg-main-dark text-white mb-3" href="javascript:;">Add property</a>
            </div>
            <div class="">
                @if(empty($allProperties->count()))
                    <div class="alert-info alert">No properties yet</div>
                @else
                    <div class="row">
                        @foreach($allProperties as $property)
                            @include('admin.properties.card')
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="row">
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')    