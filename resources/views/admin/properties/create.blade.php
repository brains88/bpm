<div class="modal fade" id="add-property" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content border-0">
            <form method="post" action="javascript:;" class="add-property-form" data-action="{{ route('admin.property.add') }}" autocomplete="off">
                <div class="modal-body p-4">
                    <div class="d-flex justify-content-between pb-3 mb-3 border-bottom">
                        <div class="text-muted mb-0 font-weight-bold">Add Property</div>
                        <div class="cursor-pointer" data-dismiss="modal" aria-label="Close">
                            <i class="icofont-close text-danger"></i>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="text-muted">Country location</label>
                            <select class="form-control custom-select rounded-0 country" name="country">
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
                            <input type="text" class="form-control state rounded-0" name="state" placeholder="e.g., Hampshire">
                            <small class="invalid-feedback state-error"></small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="text-muted">City</label>
                            <input type="text" class="form-control city rounded-0" name="city" placeholder="e.g., Plano">
                            <small class="invalid-feedback city-error"></small>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="text-muted">Full Address</label>
                            <input type="text" class="form-control address rounded-0" name="address" placeholder="e.g., No 405 Trenth Avenue LA">
                            <small class="invalid-feedback address-error"></small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="text-muted">Category</label>
                            <select class="form-control custom-select rounded-0 category" name="category">
                                <option value="">-- Select Category --</option>
                                @if(empty($propertyCategories))
                                    <option>No Categories Listed</option>
                                @else: ?>
                                    @foreach ($propertyCategories as $category)
                                        <option value="{{ $category->id }}">
                                            {{ ucwords($category->name ?? 0) }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="text-muted">Property Action</label>
                            <select class="form-control custom-select rounded-0 action" name="action">
                                <option value="">-- Select Country --</option>
                                <?php $actions = \App\Models\Property::$actions; ?>
                                @if(empty($actions))
                                    <option>No Actions Listed</option>
                                @else: ?>
                                    @foreach ($actions as $action)
                                        <option value="{{ $action }}">
                                            {{ ucwords($action ?? 0) }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="text-muted">Additional Details</label>
                        <textarea class="form-control additional rounded-0" name="additional" placeholder="Enter any further details here" rows="6"></textarea>
                        <small class="invalid-feedback additional-error"></small>
                    </div>
                    <div class="alert mb-3 add-property-message d-none"></div>
                    <div class="d-flex justify-content-right mb-3 mt-1">
                        <button type="submit" class="btn rounded-0 bg-main-dark btn-block text-white add-property-button font-weight-bold">
                            <img src="/images/spinner.svg" class="mr-2 d-none add-property-spinner mb-1">
                            Add Property
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>