@include('layouts.header')
<div class="min-vh-100 bg-main-ash">
    @include('user.layouts.navbar')
    <div class="user-content user-properties-banner pb-4">
        <div class="container">
            @if(empty($material))
                <div class="alert alert-danger">Material not found. May have been deleted.</div>
            @else
                <div class="row">
                    <div class="col-12 col-md-5">
                        <div class="alert alert-info mb-4 d-flex align-items-center">
                            <a href="{{ route('user.materials') }}" class="mr-2">
                                <i class="icofont-long-arrow-left"></i>
                            </a>
                            <small>Manage material images</small>
                        </div>
                        <div class="">
                            <div class="position-relative card mb-4">
                                <small class="card-header bg-light">Main material view</small>
                                <form action="javascript:;">
                                    <input type="file" name="image" accept="image/*" class="main-material-image-input-{{ $material->id }}" data-url="{{ route('api.material.image.upload', ['id' => $material->id, 'role' => 'main' ]) }}" style="display: none;">
                                </form>
                                <div class="main-material-image-loader-{{ $material->id }} upload-image-loader  position-absolute d-none rounded-circle text-center border" data-id="{{ $material->id}}">
                                    <img src="/images/spinner.svg">
                                </div>
                                <?php $imagelink = empty($material->image) ? '/images/banners/holder.png' : $material->image; ?>
                                <div class="bg-dark" style="height: 260px;">
                                    <a href="{{ $imagelink }}" class="text-main-dark">
                                        <img src="{{ $imagelink }}" class="img-fluid main-material-image-preview-{{ $material->id }} h-100 w-100 object-cover">
                                    </a>
                                </div>
                                <div class=" card-footer d-flex align-items-center justify-content-between">
                                    <small class="mt-2 add-main-material-image-{{ $material->id }} cursor-pointer text-main-dark" data-id="{{ $material->id }}">
                                        <small>Upload</small>
                                    </small>
                                    <a class="text-decoration-none" href="{{ $imagelink }}">
                                        <i class="icofont-long-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                @for($key = 1; $key <= 2; $key++)
                                    <?php $imageid = $material->images[$key]->id ?? 'create-'.$key; ?>
                                    <div class="col-6 mb-4">
                                        <div class="w-100 position-relative card">
                                            <small class="card-header bg-light">View ({{ $key }})</small>
                                            <form action="javascript:;">
                                                <input type="file" name="image" accept="image/*" class="other-material-image-input-{{ $imageid }}" data-url="{{ route('api.material.image.upload', ['id' => $material->id, 'role' => $imageid ]) }}" style="display: none;">
                                            </form>
                                            <div class="other-material-image-loader-{{ $imageid }} upload-image-loader  position-absolute d-none rounded-circle text-center border">
                                                <img src="/images/spinner.svg">
                                            </div>
                                            <div class="bg-dark" style="height: 140px;">
                                                <?php $imagelink = !empty($material->images[$key]->link) ? $material->images[$key]->link  : '/images/banners/holder.png'; ?>
                                                <a href="{{ $imagelink }}" class="text-main-dark">
                                                    <img src="{{ $imagelink }}" class="img-fluid other-material-image-preview-{{ $imageid }} h-100 w-100 object-cover">
                                                </a>
                                            </div>
                                            <div class=" card-footer d-flex justify-content-between align-items-center">
                                                <small class="add-other-material-image-{{ $imageid }} cursor-pointer text-main-dark" data-id="{{ $imageid }}">
                                                    <small>Upload</small>
                                                </small>
                                                <a class="text-decoration-none" href="{{ $imagelink }}">
                                                    <i class="icofont-long-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-7 mb-4">
                        <div class="alert alert-info mb-4">Edit material details</div>
                        <div class="p-4 bg-white">
                            <form method="post" action="javascript:;" class="edit-material-form" data-action="{{ route('api.material.update', ['id' => $material->id]) }}" autocomplete="off">
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label class="text-muted">Building material name or title</label>
                                        <textarea class="form-control name" name="name" placeholder="e.g., Dangote cement" rows="2">{{ $material->name }}</textarea>
                                        <small class="invalid-feedback name-error"></small>
                                    </div>
                                </div>
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
                                                    <option value="{{ $country->id }}" {{ $material->country_id == $country->id ? 'selected' : '' }}>
                                                        {{ ucwords($country->name ?? '') }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <small class="invalid-feedback country-error"></small>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="text-muted">State, county or division</label>
                                        <input type="text" class="form-control state" name="state" placeholder="e.g., Texas" value="{{ $material->state }}">
                                        <small class="invalid-feedback state-error"></small>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="text-muted">City, area or town</label>
                                        <input type="text" class="form-control city" name="city" placeholder="e.g., Plano" value="{{ $material->city }}">
                                        <small class="invalid-feedback city-error"></small>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="text-muted">Available quantity or amount</label>
                                        <input type="text" class="form-control quantity" name="quantity" placeholder="e.g., 10bags" value="{{ $material->quantity }}"> 
                                        <small class="invalid-feedback quantity-error"></small>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label class="text-muted">Address</label>
                                        <textarea class="form-control address" name="address" placeholder="e.g., No 405 Trenth Avenue" rows="2">{{ $material->address }}</textarea>
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
                                                    <option value="{{ $currency['id'] }}" {{ $material->currency_id == $currency['id'] ? 'selected' : '' }}>
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
                                            <input type="number" class="form-control price" name="price" placeholder="e.g., 20000000" value="{{ $material->price }}">
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                            <small class="invalid-feedback price-error"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="text-muted">Additional details</label>
                                    <textarea class="form-control additional" name="additional" placeholder="Enter any further details here" rows="4">{{ $material->additional }}</textarea>
                                    <small class="invalid-feedback additional-error"></small>
                                </div>
                                <div class="alert mb-3 edit-material-message d-none"></div>
                                <div class="d-flex justify-content-right mb-3 mt-1">
                                    <button type="submit" class="btn icon-raduis btn-info px-4 btn-lg text-white edit-material-button">
                                        <img src="/images/spinner.svg" class="mr-2 d-none edit-material-spinner mb-1">
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