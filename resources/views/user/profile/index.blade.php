@include('layouts.header')
<div class="min-vh-100 bg-main-ash">
    @include('user.layouts.navbar')
    <div class="user-content user-profile-banner pb-4">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-3">
                    <div class="">
                        <div class="border alert alert-info mb-4">
                            <div class="position-relative w-100 p-4 border-dark-500">
                                <div class="border rounded position-relative" style="height: 120px;">
                                    <div class="rounded-circle bg-success" style="height: 10px; width: 10px; top: 40px"></div>
                                    <img src="/images/profiles/girl.jpg" class="img-fluid object-cover h-100 w-100">
                                </div>
                            </div>
                        </div>
                        <div class="alert alert-warning">
                            {{ ucwords(auth()->user()->name) }}
                        </div>
                    </div> 
                </div>
                <div class="col-12 col-md-9">
                    <div class="card position-relative">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-8">
                                    <h4 class="alert alert-info m-0">Profile details</h4>
                                    <div class="p-4 border">
                                        @include('user.profile.partials.edit')
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="mb-4">
                                        <h4 class="alert alert-info m-0">Update password</h4>
                                        <div class="p-4 border">
                                            <form class="update-password-form" method="post" action="javascript:;" data-action="{{ route('api.password.update') }}">
                                                <div class="form-row">
                                                    <div class="form-group col-12">
                                                        <label class="text-muted">Current password</label>
                                                        <input type="text" class="form-control cpassword" name="cpassword" placeholder="e.g., Plano">
                                                        <small class="invalid-feedback cpassword-error"></small>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label class="text-muted">New password</label>
                                                        <input type="number" class="form-control phone" name="phone" placeholder="e.g., +443240989">
                                                        <small class="invalid-feedback phone-error"></small>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="text-muted">Confirm new password</label>
                                                        <input type="number" class="form-control phone" name="phone" placeholder="e.g., +443240989">
                                                        <small class="invalid-feedback phone-error"></small>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="">
                                        <h4 class="alert alert-info m-0">Update Email</h4>
                                        <div class="p-4 border">
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
                    {{-- @include('user.dashboard.partials.panels') --}}
                </div> 
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')    