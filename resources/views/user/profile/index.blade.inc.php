@include('layouts.header')
<div class="min-vh-100 bg-main-ash">
    @include('user.layouts.navbar')
    <div class="user-content user-profile-banner pb-4">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-3 col-lg-2">
                    <div class="row d-flex justify-content-between">
                        <div class="col-12 mb-4">
                            <div class="position-relative border-bottom w-100 bg-white rounded-top p-4">
                                <div class="border bg-info p-1 rounded-circle position-relative" style="height: 80px; width: 80px;">
                                    <img src="/images/profiles/girl.jpg" class="img-fluid object-cover rounded-circle h-100 w-100">
                                </div>
                            </div>
                            <div class="bg-white p-3 d-flex justify-content-between rounded-bottom">
                                <small class="text-success mr-2">
                                    <small class="cursor-pointer">Change</small>
                                </small>
                                <small class="text-danger">
                                    <small class="cursor-pointer">Delete</small>
                                </small>
                            </div>
                        </div>
                        <div class="col-12">
                            @if(!empty(auth()->user()->name))
                                <div class="border-bottom pb-4 mb-4">
                                    {{ ucwords(auth()->user()->name) }}
                                </div>
                            @endif
                            @if(!empty(auth()->user()->profile->roles))
                                <div class="border-bottom pb-4 mb-4">
                                    {{ ucwords(auth()->user()->profile->roles) }}
                                </div>
                            @endif
                        </div>   
                    </div> 
                </div>
                <div class="col-12 col-md-9 col-lg-10">
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
                        <div class="col-12 col-lg-4">
                            <div class="mb-4">
                                <h6 class="alert alert-info m-0">Update password</h6>
                                <div class="p-4 card-raduis border bg-white">
                                    <form class="update-password-form" method="post" action="javascript:;" data-action="{{ route('api.password.update') }}">
                                        <div class="form-row">
                                            <div class="form-group col-12">
                                                <label class="text-muted">Current password</label>
                                                <input type="text" class="form-control cpassword" name="cpassword" placeholder="e.g., Plano">
                                                <small class="invalid-feedback cpassword-error"></small>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-12">
                                                <label class="text-muted">New password</label>
                                                <input type="number" class="form-control phone" name="phone" placeholder="e.g., +443240989">
                                                <small class="invalid-feedback phone-error"></small>
                                            </div>
                                            <div class="form-group col-12">
                                                <label class="text-muted">Confirm new password</label>
                                                <input type="number" class="form-control phone" name="phone" placeholder="e.g., +443240989">
                                                <small class="invalid-feedback phone-error"></small>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="">
                                <h6 class="alert alert-info m-0">Update Email</h6>
                                <div class="p-4 card-raduis border bg-white">
                                    <form class="update-password-form" method="post" action="javascript:;" data-action="{{ route('api.password.update') }}">
                                        <div class="form-row">
                                            <div class="form-group col-12">
                                                <label class="text-muted">Current password</label>
                                                <input type="text" class="form-control cpassword" name="cpassword" placeholder="e.g., Plano">
                                                <small class="invalid-feedback cpassword-error"></small>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')    