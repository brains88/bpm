<form method="post" action="javascript:;" class="edit-property-form" data-action="{{ route('api.property.update', ['id' => $property->id, 'category' => $category]) }}" autocomplete="off">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label class="text-main-dark">Country located</label>
            <select class="form-control custom-select country" name="country">
                <option value="">-- Select country --</option>
                @set('countries', \App\Models\Country::all())
                @if(empty($countries->count()))
                    <option>No Countries Listed</option>
                @else: ?>
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}" {{ $country->id == $property->country_id ? 'selected' : '' }}>
                            {{ ucwords($country->name ?? '') }}
                        </option>
                    @endforeach
                @endif
            </select>
            <small class="invalid-feedback country-error"></small>
        </div>
        <div class="form-group col-md-6">
            <label class="text-main-dark">State, county or divison</label>
            <input type="text" class="form-control state" name="state" placeholder="e.g., Hampshire" value="{{ $property->state_id ?? '' }}">
            <small class="invalid-feedback state-error"></small>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label class="text-main-dark">Full address</label>
            <input type="text" class="form-control address" name="address" placeholder="e.g., No 405 Trenth Avenue LA" value="{{ $property->address ?? '' }}">
            <small class="invalid-feedback address-error"></small>
        </div>
        <div class="form-group col-md-6">
            <label class="text-main-dark">Price</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text text-white">$</span>
                </div>
                <input type="number" class="form-control price" name="price" placeholder="e.g., 20000000" value="{{ $property->price ?? 0 }}">
                <div class="input-group-append">
                    <span class="input-group-text text-white">.00</span>
                </div>
            <small class="invalid-feedback price-error"></small>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label class="text-main-dark">City</label>
            <input type="text" class="form-control city" name="city" placeholder="e.g., Plano" value="{{ $property->city ?? '' }}">
            <small class="invalid-feedback city-error"></small>
        </div>
        <div class="form-group col-md-6">
            <label class="text-main-dark">Category</label>
            <select class="form-control custom-select category" name="category">
                <option value="">-- Select category --</option>
                @set('categories', \App\Models\Property::$categories)
                @if(empty($categories))
                    <option value="">No Categories Listed</option>
                @else: ?>
                    @foreach ($categories as $category => $description)
                        <option value="{{ $category }}" {{ $category == $property->category ? 'selected' : '' }}>
                            {{ ucwords($description['name']) }}
                        </option>
                    @endforeach
                @endif
            </select>
            <small class="invalid-feedback category-error"></small>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label class="text-main-dark">Property action</label>
            <select class="form-control custom-select action" name="action">
                <option value="">-- Select action --</option>
                <?php $actions = \App\Models\Property::$actions; ?>
                @if(empty($actions))
                    <option>No Actions Listed</option>
                @else: ?>
                    @foreach ($actions as $key => $value)
                        <option value="{{ $key }}" {{ stripos($property->action, $key) !== false ? 'selected' : '' }}>
                            {{ ucwords($value ?? 'any') }}
                        </option>
                    @endforeach
                @endif
            </select>
            <small class="invalid-feedback action-error"></small>
        </div>
        <div class="form-group col-md-6">
            <label class="text-main-dark">Property measurement</label>
            <input type="text" class="form-control measurement" name="measurement" placeholder="e.g., 500Sqft" value="{{ $property->measurement ?? '' }}">
            <small class="invalid-feedback measurement-error"></small>
        </div>
    </div>
    <div class="mb-4">
        <label class="text-main-dark">Additional details</label>
        <textarea class="form-control additional" name="additional" placeholder="Enter any further details here" rows="8">{{ $property->additional ?? '' }}</textarea>
        <small class="invalid-feedback additional-error"></small>
    </div>
    <div class="alert mb-3 edit-property-message d-none"></div>
    <div class="d-flex justify-content-right mb-3 mt-1">
        <button type="submit" class="btn btn-info px-4 btn-lg text-white edit-property-button">
            <img src="/images/spinner.svg" class="mr-2 d-none edit-property-spinner mb-1">
            Save
        </button>
    </div>
</form>