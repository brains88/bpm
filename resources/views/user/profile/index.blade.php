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
                                    <img src="/images/profiles/gitl.jpg" class="img-fluid object-cover h-100 w-100">
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
                        <div class="card-header d-flex align-items-center">
                            {{-- <div class="mr-3 position-relative" style="height: 40px; width: 40px;">
                                <div class="position-absolute rounded-circle bg-danger" style="width: 10px; height: 10px; top: 10px; right: 0;"></div>
                                <img src="/images/profiles/avatar.jpg" class="img-fluid object-cover h-100 w-100">
                            </div>
                            <div class="">
                                <div class="text-main-dark">Marily Murphy</div>
                                <small>3 years ago</small>
                            </div> --}}
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <h4 class="alert alert-info m-0">Profile details</h4>
                                    <div class="p-4 border">
                                        <form method="post" action="javascript:;" class="add-property-form" data-action="{{ route('api.property.add') }}" autocomplete="off">
                                            <div class="form-row">
                                                <div class="form-group col-12">
                                                    <label class="text-muted">Fullname</label>
                                                    <input type="text" class="form-control fullname" name="fullname" placeholder="e.g., Cares Numlim">
                                                    <small class="invalid-feedback fullname-error"></small>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label class="text-muted">Country located</label>
                                                    <select class="form-control custom-select country" name="country" id="countries">
                                                        <?php $countries = \App\Models\Country::all(); ?>
                                                        <option value="">-- Select country --</option>
                                                        @if(empty($countries))
                                                            <option value="">No countries listed</option>
                                                        @else: ?>
                                                            <?php $geoip = geoip()->getLocation(request()->ip());  ?>
                                                            @foreach ($countries as $country)
                                                                <option value="{{ $country->id }}" {{ strtolower($geoip->iso_code) == strtolower($country->iso2) ? 'selected' : '' }} id="{{ $country->state_id }}">
                                                                    {{ ucwords($country->name ?? '') }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    <small class="invalid-feedback country-error"></small>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="text-muted">State, county or division</label>
                                                    <input type="text" class="form-control state" name="state" placeholder="e.g., Texas">
                                                    <small class="invalid-feedback state-error"></small>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label class="text-muted">City, area or town</label>
                                                    <input type="text" class="form-control city" name="city" placeholder="e.g., Plano">
                                                    <small class="invalid-feedback city-error"></small>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="text-muted">Additional phone number</label>
                                                    <input type="number" class="form-control phone" name="phone" placeholder="e.g., +443240989">
                                                    <small class="invalid-feedback phone-error"></small>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-12">
                                                    <label class="text-muted">Address</label>
                                                    <textarea class="form-control address" name="address" placeholder="e.g., No 405 Trenth Avenue" rows="2"></textarea>
                                                    <small class="invalid-feedback address-error"></small>
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <label class="text-muted">Description</label>
                                                <textarea class="form-control description" name="description" placeholder="Enter any further details here" rows="4"></textarea>
                                                <small class="invalid-feedback description-error"></small>
                                            </div>
                                            <div class="alert mb-3 add-property-message d-none"></div>
                                            <div class="d-flex justify-content-right mb-3 mt-1">
                                                <button type="submit" class="btn btn-info px-4 btn-lg text-white add-property-button">
                                                    <img src="/images/spinner.svg" class="mr-2 d-none add-property-spinner mb-1">
                                                    Save
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
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