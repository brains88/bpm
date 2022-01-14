@include('layouts.header')
<div class="bg-alabaster min-vh-100">
    @include('admin.layouts.navbar')
    <div class="section-padding">
        <div class="container-fluid">
            <div class="alert alert-info mb-4">Add Property Below. Please in all applicable fields.</div>
            @if(empty($propertiesCategories))
                <div class="alert alert-danger">No Property Categoies. Please <a href="{{ route('admin.properties.categories') }}">Click Here</a> to Add a Category</div>
            @else
                <div class="row">
                    <div class="col-12 mb-4">
                        <form method="post" action="javascript:;" class="add-property-form p-4 border" data-action="{{ route('admin.property.add') }}" autocomplete="off">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="text-muted">Country location</label>
                                    <select class="form-control custom-select country" name="country">
                                        <option value="">-- Select Country --</option>
                                        @if(empty($allCountries))
                                            <option>No Countries Listed</option>
                                        @else: ?>
                                            @foreach ($allCountries as $country)
                                                <option value="{{ $country->id }}">
                                                    {{ ucwords($country->name ?? 0) }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="text-muted">State, County or Divison</label>
                                    <input type="text" class="form-control state" name="state" placeholder="e.g., Hampshire">
                                    <small class="invalid-feedback state-error"></small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="text-muted">City</label>
                                    <input type="text" class="form-control city" name="city" placeholder="e.g., Plano">
                                    <small class="invalid-feedback city-error"></small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="text-muted">Full Address</label>
                                    <input type="text" class="form-control address" name="address" placeholder="e.g., No 405 Trenth Avenue LA">
                                    <small class="invalid-feedback address-error"></small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="text-muted">Category</label>
                                    <select class="form-control custom-select category" name="category">
                                        <option value="">-- Select Category --</option>
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
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="text-muted">Subcategory</label>
                                    <select class="form-control custom-select subcategory" name="subcategory">
                                        <option value="">-- Select Subcategory --</option>
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
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="text-muted">Property Dimension</label>
                                    <input type="text" class="form-control dimension" name="dimension" placeholder="e.g., 500Sqft">
                                    <small class="invalid-feedback dimension-error"></small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="text-muted">Property Action</label>
                                    <select class="form-control custom-select action" name="action">
                                        <option value="">-- Select Action --</option>
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
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="text-muted">Property Dimension</label>
                                    <input type="text" class="form-control dimension" name="dimension" placeholder="e.g., 500Sqft">
                                    <small class="invalid-feedback dimension-error"></small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="text-muted">Property Condition</label>
                                    <select class="form-control custom-select condition" name="condition">
                                        <option value="">-- Select Condition --</option>
                                        <?php $propertyConditions = \App\Models\Property::$conditions; ?>
                                        @if(empty($propertyConditions))
                                            <option>No Actions Listed</option>
                                        @else: ?>
                                            @foreach ($propertyConditions as $condition)
                                                <option value="{{ $condition }}">
                                                    {{ ucwords($condition ?? 'Nill') }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="text-muted">Additional Details</label>
                                <textarea class="form-control additional" name="additional" placeholder="Enter any further details here" rows="8"></textarea>
                                <small class="invalid-feedback additional-error"></small>
                            </div>
                            <div class="alert mb-3 add-property-message d-none"></div>
                            <div class="d-flex justify-content-right mb-3 mt-1">
                                <button type="submit" class="btn bg-main-dark btn-block btn-lg text-white add-property-button font-weight-bold">
                                    <img src="/images/spinner.svg" class="mr-2 d-none add-property-spinner mb-1">
                                    Add Property
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