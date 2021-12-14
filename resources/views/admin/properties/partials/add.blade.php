<div class="modal fade" id="add-property" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content border-0">
            <form method="post" action="javascript:;" class="add-property-form" data-action="{{ route('admin.property.store') }}" autocomplete="off">
                <div class="modal-body p-4">
                    <div class="d-flex justify-content-between pb-3 mb-3 border-bottom">
                        <div class="text-smoky mb-0 font-weight-bold">Add property</div>
                        <div class="cursor-pointer" data-dismiss="modal" aria-label="Close">
                            <i class="icofont-close text-danger"></i>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="text-muted">Country located</label>
                            <select class="form-control custom-select country" name="country">
                                <option value="">-- Select country --</option>
                                <?php $countries = \App\Models\Country::all(); ?>
                                @if(empty($countries->count()))
                                    <option>No Countries Listed</option>
                                @else: ?>
                                    @foreach ($countries as $country)
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
                        <div class="form-group col-md-6">
                            <label class="text-muted">Full address</label>
                            <input type="text" class="form-control address" name="address" placeholder="e.g., No 405 Trenth Avenue LA">
                            <small class="invalid-feedback address-error"></small>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="text-muted">Price</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="number" class="form-control price" name="price" placeholder="e.g., 20000000">
                                <div class="input-group-append">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                            <small class="invalid-feedback price-error"></small>
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
                                <?php $categories = \App\Models\Category::where(['type' => 'property']); ?>
                                @if(empty($categories->count()))
                                    <option>No Categories Listed</option>
                                @else: ?>
                                    @foreach ($categories as $category)
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
                                <?php $actions = \App\Models\Property::$actions; ?>
                                @if(empty($actions))
                                    <option>No Actions Listed</option>
                                @else: ?>
                                    @foreach ($actions as $action)
                                        @if(stripos($action, 'Sold') === false)
                                            <option value="{{ $action }}">
                                                {{ ucwords($action ?? 0) }}
                                            </option>
                                        @endif
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
                        <textarea class="form-control additional" name="additional" placeholder="Enter any further details here" rows="4"></textarea>
                        <small class="invalid-feedback additional-error"></small>
                    </div>
                    <div class="alert mb-3 add-property-message d-none"></div>
                    <div class="d-flex justify-content-right mb-3 mt-1">
                        <button type="submit" class="btn bg-main-dark btn-block btn-lg text-white add-property-button">
                            <img src="/images/spinner.svg" class="mr-2 d-none add-property-spinner mb-1">
                            Add property
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>