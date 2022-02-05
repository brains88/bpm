@include('layouts.header')
<div class="min-vh-100 bg-main-ash">
    @include('user.layouts.navbar')
    <div class="user-content user-profile-banner pb-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bg-white p-4 border card-raduis">
                        <div class="mb-4">
                            <h4 class="text-main-dark">Enter Profile Details.</h4>
                            <div class="text-main-dark">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</div>
                        </div>
                        <div class="">
                            @include('user.profile.partials.setup')
                        </div>
                    </div>  
                </div> 
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')    