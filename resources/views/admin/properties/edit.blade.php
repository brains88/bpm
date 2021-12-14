@include('layouts.header')
<div class="bg-alabaster min-vh-100">
    @include('admin.layouts.navbar')
    <div class="section-padding">
        <div class="container">
            @if(empty($property))
                <div class="alert alert-danger">Property not found. May have been deleted.</div>
            @else
                <div class="row">
                    <div class="col-12 col-md-5">
                        <div class="alert alert-info mb-4 d-flex align-items-center">
                            <a href="{{ route('admin.properties') }}" class="mr-2">
                                <i class="icofont-long-arrow-left"></i>
                            </a>
                            <small>Manage property images</small>
                        </div>
                        <div class="">
                            <div class="position-relative mb-4">
                                <form action="javascript:;">
                                    <input type="file" name="image" accept="image/*" class="main-property-image-input-{{ $property->id }}" data-url="{{ route('admin.property.image.upload', ['id' => $property->id, 'role' => 'main' ]) }}" style="display: none;">
                                </form>
                                <div class="main-property-image-loader-{{ $property->id }} upload-image-loader  position-absolute d-none rounded-circle text-center border" data-id="{{ $property->id}}">
                                    <img src="/images/spinner.svg">
                                </div>
                                <div class="position-relative bg-dark" style="height: 200px;">
                                    <img src="{{ empty($property->image) ? '/images/banners/holder.png' : $property->image }}" class="img-fluid main-property-image-preview-{{ $property->id }} h-100 w-100 object-cover">
                                </div>
                                <div class="rounded-circle position-absolute cursor-pointer bg-main-dark text-white text-center border add-main-property-image-{{ $property->id }}" style="width: 32.5px; height: 32.5px; top: 50%; left: 50%; transform: translate(-50%, -50%); line-height: 30px;" data-id="{{ $property->id }}">
                                    <small class="mt-2">
                                        <i class="icofont-camera"></i>
                                    </small>
                                </div>
                            </div>
                            <?php $total = 3; ?> {{--  Equivalent to 4 --}}
                            @if(!empty($total))
                                <div class="row">
                                    @for($key = 0; $key <= $total; $key++)
                                        <?php $imageid = $property->images[$key]->id ?? $key; ?>
                                        <div class="col-6 mb-4">
                                            <div class="w-100 bg-dark position-relative cursor-pointer text-center" style="height: 100px;">
                                                <form action="javascript:;">
                                                    <input type="file" name="image" accept="image/*" class="other-property-image-input-{{ $imageid }}" data-url="{{ route('admin.property.image.upload', ['id' => $property->id, 'role' => $imageid ]) }}" style="display: none;">
                                                </form>
                                                <div class="other-property-image-loader-{{ $imageid }} upload-image-loader  position-absolute d-none rounded-circle text-center border">
                                                    <img src="/images/spinner.svg">
                                                </div>
                                                <img src="{{ isset($property->images[$key]->link) ? $property->images[$key]->link  : '/images/banners/holder.png' }}" class="img-fluid other-property-image-preview-{{ $imageid }} h-100 w-100 object-cover">

                                                <div class="text-center position-absolute bg-main-dark rounded-circle border add-other-property-image-{{ $imageid }}" style="width: 32.5px; height: 32.5px; line-height: 30px; top: 50%; left: 50%; transform: translate(-50%, -50%)" data-id="{{ $imageid }}">
                                                    <small class="text-white">
                                                        <i class="icofont-camera"></i>
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 col-md-7 mb-4">
                        <div class="alert alert-info mb-4 d-flex justify-content-between align-items-center">
                            <small>Edit property details</small>
                            <a href="{{ route('admin.properties') }}" class="text-underline">
                                <small>All properties</small>
                            </a>
                        </div>
                        <form method="post" action="javascript:;" class="edit-property-form p-4 border" data-action="{{ route('admin.property.update', ['id' => $property->id, 'reference' => $property->reference]) }}" autocomplete="off">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="text-muted">Country located</label>
                                    <select class="form-control custom-select country" name="country">
                                        <option value="">-- Select country --</option>
                                        @if(empty($allCountries->count()))
                                            <option>No Countries Listed</option>
                                        @else: ?>
                                            @foreach ($allCountries as $country)
                                                <option value="{{ $country->id }}" {{ $country->id == $property->country_id ? 'selected' : '' }}>
                                                    {{ ucwords($country->name ?? '') }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <small class="invalid-feedback country-error"></small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="text-muted">State, county or divison</label>
                                    <input type="text" class="form-control state" name="state" placeholder="e.g., Hampshire" value="{{ $property->state_id ?? '' }}">
                                    <small class="invalid-feedback state-error"></small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="text-muted">Full address</label>
                                    <input type="text" class="form-control address" name="address" placeholder="e.g., No 405 Trenth Avenue LA" value="{{ $property->address ?? '' }}">
                                    <small class="invalid-feedback address-error"></small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="text-muted">Price</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="number" class="form-control price" name="price" placeholder="e.g., 20000000" value="{{ $property->price ?? '' }}">
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    <small class="invalid-feedback price-error"></small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="text-muted">City</label>
                                    <input type="text" class="form-control city" name="city" placeholder="e.g., Plano" value="{{ $property->city ?? '' }}">
                                    <small class="invalid-feedback city-error"></small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="text-muted">Category</label>
                                    <select class="form-control custom-select category" name="category">
                                        <option value="">-- Select category --</option>
                                        @if(empty($propertiesCategories->count()))
                                            <option>No Categories Listed</option>
                                        @else: ?>
                                            @foreach ($propertiesCategories as $category)
                                                <option value="{{ $category->id }}" {{ $category->id == $property->category_id ? 'selected' : '' }}>
                                                    {{ ucwords($category->name ?? 0) }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <small class="invalid-feedback category-error"></small>
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
                                            @foreach ($actions as $action)
                                                @if(stripos($action, 'Sold') === false)
                                                    <option value="{{ $action }}" {{ $action == $property->action ? 'selected' : '' }}>
                                                        {{ ucwords($action ?? 0) }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                    <small class="invalid-feedback action-error"></small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="text-muted">Property measurement</label>
                                    <input type="text" class="form-control measurement" name="measurement" placeholder="e.g., 500Sqft" value="{{ $property->measurement ?? '' }}">
                                    <small class="invalid-feedback measurement-error"></small>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="text-muted">Additional details</label>
                                <textarea class="form-control additional" name="additional" placeholder="Enter any further details here" rows="4">{{ $property->additional ?? '' }}</textarea>
                                <small class="invalid-feedback additional-error"></small>
                            </div>
                            <div class="alert mb-3 edit-property-message d-none"></div>
                            <div class="d-flex justify-content-right mb-3 mt-1">
                                <button type="submit" class="btn bg-main-dark btn-block btn-lg text-white edit-property-button">
                                    <img src="/images/spinner.svg" class="mr-2 d-none edit-property-spinner mb-1">
                                    Edit property
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@include('layouts.footer')    