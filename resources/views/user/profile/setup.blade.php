@include('layouts.header')
<div class="min-vh-100 bg-main-ash">
    @include('user.layouts.navbar')
    <div class="user-content user-profile-banner pb-4">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8 mb-4">
                    <div class="p-4 card-raduis bg-white border">
                        @if(empty(auth()->user()->profile))
                            <h6 class="alert alert-info">Setup Profile details</h6>
                            @include('user.profile.partials.setup')
                        @else
                            <h6 class="alert alert-info">Manage Profile details</h6>
                            @include('user.profile.partials.edit')
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')    