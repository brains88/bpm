@include('layouts.header')
<div class="min-vh-100 bg-main-ash">
    @include('user.layouts.navbar')
    <div class="user-content user-properties-banner pb-4">
        <div class="container">
            @if(empty($property))
                <div class="alert alert-danger">Property not found. May have been deleted.</div>
            @else
                <div class="row">
                    <div class="col-12 col-md-5">
                        <div class="alert alert-info mb-4 d-flex align-items-center">
                            <a href="{{ route('user.properties') }}" class="mr-2">
                                <i class="icofont-long-arrow-left"></i>
                            </a>
                            <small>Manage property images</small>
                        </div>
                        <div class="">
                            <div class="position-relative card mb-4">
                                <div class="card-header bg-white d-flex justify-content-between">
                                    <small class="text-main-dark">Main view</small>
                                    <small class="mt-2 add-main-property-image-{{ $property->id }} cursor-pointer text-main-dark" data-id="{{ $property->id }}">
                                        <i class="icofont-camera"></i>
                                    </small>
                                </div> 
                                <form action="javascript:;">
                                    <input type="file" name="image" accept="image/*" class="main-property-image-input-{{ $property->id }}" data-url="{{ route('api.property.image.upload', ['id' => $property->id, 'role' => 'main' ]) }}" style="display: none;">
                                </form>
                                <div class="main-property-image-loader-{{ $property->id }} upload-image-loader  position-absolute d-none rounded-circle text-center border" data-id="{{ $property->id}}">
                                    <img src="/images/spinner.svg">
                                </div>
                                <?php $imagelink = empty($property->image) ? '/images/banners/holder.png' : $property->image; ?>
                                <div class="bg-dark" style="height: 260px;">
                                    <a href="{{ $imagelink }}" class="text-main-dark">
                                        <img src="{{ $imagelink }}" class="img-fluid main-property-image-preview-{{ $property->id }} h-100 w-100 object-cover">
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                @for($key = 0; $key <= 3; $key++)
                                    <?php $imageid = $property->images[$key]->id ?? 'create-'.$key; ?>
                                    <div class="col-6 mb-4">
                                        <div class="w-100 position-relative card">
                                            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                                                <small class="text-main-dark">
                                                    ({{ $key + 1 }})
                                                </small>
                                                <small class="add-other-property-image-{{ $imageid }} cursor-pointer text-main-dark" data-id="{{ $imageid }}">
                                                    <i class="icofont-camera"></i>
                                                </small>
                                            </div>
                                            <form action="javascript:;">
                                                <input type="file" name="image" accept="image/*" class="other-property-image-input-{{ $imageid }}" data-url="{{ route('api.property.image.upload', ['id' => $property->id, 'role' => $imageid ]) }}" style="display: none;">
                                            </form>
                                            <div class="other-property-image-loader-{{ $imageid }} upload-image-loader  position-absolute d-none rounded-circle text-center border">
                                                <img src="/images/spinner.svg">
                                            </div>
                                            <div class="bg-dark" style="height: 140px;">
                                                <?php $imagelink = isset($property->images[$key]->link) ? $property->images[$key]->link  : '/images/banners/holder.png'; ?>
                                                <a href="{{ $imagelink }}" class="text-main-dark">
                                                    <img src="{{ $imagelink }}" class="img-fluid other-property-image-preview-{{ $imageid }} h-100 w-100 border-bottom object-cover">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-7 mb-4">
                        <div class="alert alert-info mb-4">Edit property details</div>
                        <div class="p-4 bg-white">
                            <form method="post" action="javascript:;" class="edit-property-form" data-action="{{ route('user.property.update', ['id' => $property->id]) }}" autocomplete="off">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="text-muted">Country located</label>
                                        <select class="form-control custom-select country" name="country" id="countries">
                                            <option value="">-- Select country --</option>
                                            @if(empty($countries))
                                                <option value="">No countries listed</option>
                                            @else: ?>
                                                <?php $geoip = geoip()->getLocation(request()->ip());  ?>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}" {{ $property->country_id == $country->id ? 'selected' : '' }}>
                                                        {{ ucwords($country->name ?? '') }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <small class="invalid-feedback country-error"></small>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="text-muted">State, county or division</label>
                                        <input type="text" class="form-control state" name="state" placeholder="e.g., Texas" value="{{ $property->state }}">
                                        <small class="invalid-feedback state-error"></small>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="text-muted">City, area or town</label>
                                        <input type="text" class="form-control city" name="city" placeholder="e.g., Plano" value="{{ $property->city }}">
                                        <small class="invalid-feedback city-error"></small>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="text-muted">Category</label>
                                        <select class="form-control custom-select category" name="category">
                                            <option value="">-- Select category --</option>
                                            <?php $categories = \App\Models\Property::$categories; ?>
                                            @if(empty($categories))
                                                <option>No Categories Listed</option>
                                            @else: ?>
                                                @foreach ($categories as $category => $values)
                                                    <option value="{{ $category }}" {{ $property->category == $category ? 'selected' : '' }}>
                                                        {{ ucwords($values['name'] ?? 'Nill') }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <small class="invalid-feedback category-error"></small>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label class="text-muted">Address</label>
                                        <textarea class="form-control address" name="address" placeholder="e.g., No 405 Trenth Avenue" rows="2">{{ $property->address }}</textarea>
                                        <small class="invalid-feedback address-error"></small>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="text-muted">Currency</label>
                                        <select class="form-control custom-select currency" name="currency">
                                            <option value="">-- Select currency --</option>
                                            <?php $currencies = currency()->getCurrencies(); ?>
                                            @if(empty($currencies))
                                                <option>No currencies listed</option>
                                            @else: ?>
                                                @foreach ($currencies as $currency)
                                                    <?php $code = $currency['code']; ?>
                                                    <option value="{{ $currency['id'] }}" {{ $property->currency_id == $currency['id'] ? 'selected' : '' }}>
                                                        {{ ucwords($currency['name']) }}({{ strtoupper($code) }})
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <small class="invalid-feedback currency-error"></small>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="text-muted">Price</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control price" name="price" placeholder="e.g., 20000000" value="{{ $property->price }}">
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                            <small class="invalid-feedback price-error"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="text-muted">Property action</label>
                                        <select class="form-control custom-select action" name="action">
                                            <option value="">-- Select action --</option>
                                            <?php $actions = \App\Models\Property::$actions; ?>
                                            @if(empty($actions))
                                                <option>No Actions Listed</option>
                                            @else: ?>
                                                @foreach ($actions as $key => $value)
                                                    <option value="{{ $key }}" {{ $property->action == $key ? 'selected' : '' }}>
                                                        {{ ucwords($value ?? 'any') }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <small class="invalid-feedback action-error"></small>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="text-muted">Property measurement</label>
                                        <input type="text" class="form-control measurement" name="measurement" placeholder="e.g., 500Sqft" value="{{ $property->measurement }}">
                                        <small class="invalid-feedback measurement-error"></small>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="text-muted">Additional details</label>
                                    <textarea class="form-control additional" name="additional" placeholder="Enter any further details here" rows="4">{{ $property->additional }}</textarea>
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
                        </div>                   
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@include('layouts.footer')    