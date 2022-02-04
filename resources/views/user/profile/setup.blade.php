@include('layouts.header')
<div class="min-vh-100">
    @include('user.layouts.navbar')
    <div class="" style="padding: 100px 0 0;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mb-4">
                        <h4 class="text-main-dark">Enter Profile Details.</h4>
                        <div class="text-main-dark">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                    </div>
                    <div class="p-4 border card-raduis">
                        <form method="post" class="profile-setup-form" action="javascript:;" data-action="">
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label class="text-main-dark">Profile name</label>
                                    <div class="input-group">
                                        <input type="text" name="name" class="form-control name" placeholder="Enter profile name">
                                    </div>
                                    <small class="error name-error text-danger"></small>
                                </div>
                                <div class="form-group col-md-6">
                                    <?php $designations = \App\Models\Profile::$designations; ?>
                                    <label class="text-smoky">Designation</label>
                                    <select class="form-control custom-select designation" name="designation">
                                        <option value="">-- Select designation --</option>
                                        @if(empty($designations))
                                            <option value="">No designation listed</option>
                                        @else
                                            @foreach ($designations as $designation)
                                                <option value="{{ $designation }}">
                                                    {{ ucfirst($designation) }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <small class="invalid-feedback type-error"></small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <?php $designations = \App\Models\Profile::$designations; ?>
                                    <label class="text-smoky">Designation</label>
                                    <select class="form-control custom-select role" name="role">
                                        <option value="">-- Select designation --</option>
                                        @if(empty($designations))
                                            <option value="">No designation listed</option>
                                        @else
                                            @foreach ($designations as $designation)
                                                <option value="{{ $designation }}">
                                                    {{ ucfirst($designation) }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <small class="invalid-feedback role-error"></small>
                                </div>
                                <div class="form-group col-md-6">
                                    <?php $designations = \App\Models\Profile::$designations; ?>
                                    <label class="text-smoky">Designation</label>
                                    <select class="form-control custom-select designation" name="designation">
                                        <option value="">-- Select designation --</option>
                                        @if(empty($designations))
                                            <option value="">No designation listed</option>
                                        @else
                                            @foreach ($designations as $designation)
                                                <option value="{{ $designation }}">
                                                    {{ ucfirst($designation) }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <small class="invalid-feedback type-error"></small>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input rememberme" id="rememberme" name="rememberme" value="on">
                                    <label class="custom-control-label cursor-pointer" for="rememberme">
                                        <small class="text-main-dark">Remember me</small>
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-lg icon-raduis btn-info text-white profile-setup-button mb-4">
                                <img src="/images/spinner.svg" class="mr-2 d-none profile-setup-spinner mb-1">
                                Login
                            </button>
                        </form>
                    </div> 
                </div> 
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')    