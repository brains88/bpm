@include('layouts.header')
<div class="min-vh-100 bg-main-ash">
    @include('user.layouts.navbar')
    <div class="user-content pb-4">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="">
                        @if(empty(auth()->user()->profile))
                            <h6 class="alert alert-info mb-4">Setup Profile details</h6>
                            <div class="p-4 card-raduis bg-white border">
                                @include('user.profile.partials.add')
                            </div>
                        @else
                            <h6 class="alert alert-info mb-4">Manage Profile details</h6>
                            <div class="p-4 card-raduis bg-white border">
                                @include('user.profile.partials.edit')
                            </div> 
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')    