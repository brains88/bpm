@include('layouts.header')
<div class="bg-alabaster min-vh-100">
    @include('admin.layouts.navbar')
    <div class="section-padding">
        <div class="container">
            @if(empty($propertiesCategories))
                <div class="alert alert-danger">No property Categories. Please <a href="{{ route('admin.properties.categories') }}">Click here</a> to add a category</div>
            @else
                <div class="row">
                    <div class="col-12 col-md-7 col-lg-8 mb-4">
                        <div class="alert alert-info mb-4 d-flex justify-content-between align-items-center">
                            <small>Please in all fields.</small>
                            <a href="{{ route('admin.properties') }}" class="text-underline">
                                <small>All properties</small>
                            </a>
                        </div>
                        <form method="post" action="javascript:;" class="add-property-form p-4 border" data-action="{{ route('admin.property.store') }}" autocomplete="off">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="text-muted">Country located</label>
                                    <select class="form-control custom-select country" name="country">
                                        <option value="">-- Select country --</option>
                                        @if(empty($allCountries))
                                            <option>No Countries Listed</option>
                                        @else: ?>
                                            @foreach ($allCountries as $country)
                                                <option value="{{ $country->id }}">
                                                    {{ ucwords($country->name ?? '') }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <small class="invalid-feedback country-error"></small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="text-muted">State, county or divison</label>
                                    <input type="text" class="form-control state" name="state" placeholder="e.g., Hampshire">
                                    <small class="invalid-feedback state-error"></small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label class="text-muted">Full address</label>
                                    <input type="text" class="form-control address" name="address" placeholder="e.g., No 405 Trenth Avenue LA">
                                    <small class="invalid-feedback address-error"></small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="text-muted">City</label>
                                    <input type="text" class="form-control city" name="city" placeholder="e.g., Plano">
                                    <small class="invalid-feedback city-error"></small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="text-muted">Category</label>
                                    <select class="form-control custom-select category" name="category">
                                        <option value="">-- Select category --</option>
                                        @if(empty($propertiesCategories))
                                            <option>No Categories Listed</option>
                                        @else: ?>
                                            @foreach ($propertiesCategories as $category)
                                                <option value="{{ $category->id }}">
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
                                        <?php $propertyActions = \App\Models\Property::$actions; ?>
                                        @if(empty($propertyActions))
                                            <option>No Actions Listed</option>
                                        @else: ?>
                                            @foreach ($propertyActions as $action)
                                                <option value="{{ $action }}">
                                                    {{ ucwords($action ?? 0) }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <small class="invalid-feedback action-error"></small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="text-muted">Property dimension</label>
                                    <input type="text" class="form-control dimension" name="dimension" placeholder="e.g., 500Sqft">
                                    <small class="invalid-feedback dimension-error"></small>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="text-muted">Additional details</label>
                                <textarea class="form-control additional" name="additional" placeholder="Enter any further details here" rows="8"></textarea>
                                <small class="invalid-feedback additional-error"></small>
                            </div>
                            <div class="alert mb-3 add-property-message d-none"></div>
                            <div class="d-flex justify-content-right mb-3 mt-1">
                                <button type="submit" class="btn bg-main-dark btn-block btn-lg text-white add-property-button">
                                    <img src="/images/spinner.svg" class="mr-2 d-none add-property-spinner mb-1">
                                    Add property
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-12 col-md-5 col-lg-4">
                        <div class="alert alert-info mb-4">
                            <small>Add property images</small>
                        </div>
                        <div class="border mb-4 p-4">
                            <div class="">
                                <form action="javascript:;" method="post">
                                    <input type="file" name="mainimage" accept="image/*" class="property-image-input-{{ '1' }} d-none" data-url="{{ route('blog.image.upload', ['id' => '' ]) }}">
                                </form>
                                <div class="add-property-image-loader-{{ '4' }} upload-image-loader d-none position-absolute rounded-circle text-center border" data-id="{{ '3'}}">
                                    <img src="/images/spinner.svg">
                                </div>
                                <div class="position-relative bg-dark w-100 mb-4" style="height: 160px;">
                                    <div class="rounded-circle position-absolute bg-main-dark text-dark text-center" style="width: 32.5px; height: 32.5px; top: 50%; left: 50%; transform: translate(-50%, -50%); line-height: 30px;">
                                        <small class="mt-2">
                                            <i class="icofont-camera"></i>
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <?php $total = 3; ?> {{--  Equivalent to 4 --}}
                            @if(!empty($total))
                                <div class="row">
                                    @for($key = 0; $key <= $total; $key++)
                                        <div class="col-6 mb-4">
                                            <div class="w-100 bg-dark position-relative cursor-pointer text-center" style="height: 90px; line-height: 90px;">
                                                <div class="text-center position-absolute bg-main-dark rounded-circle" style="width: 32.5px; height: 32.5px; line-height: 30px; top: 50%; left: 50%; transform: translate(-50%, -50%)">
                                                    <small class="text-dark">
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
                </div>
            @endif
        </div>
    </div>
</div>
@include('layouts.footer')    