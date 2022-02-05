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