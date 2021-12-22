<div class="modal fade" id="edit-subcategory-{{ $sub->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0">
            <form method="post" action="javascript:;" class="edit-subcategory-form" data-action="{{ route('admin.subcategory.edit', ['id' => $sub->id]) }}" autocomplete="off">
                <div class="modal-body p-4">
                    <div class="d-flex justify-content-between pb-3 mb-3 border-bottom">
                        <div class="text-smoky mb-0 font-weight-bold">Edit Subcategory</div>
                        <div class="cursor-pointer" data-dismiss="modal" aria-label="Close">
                            <i class="icofont-close text-danger"></i>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="text-smoky">Subcategory Name</label>
                            <input type="text" class="form-control name rounded-0" name="name" placeholder="e.g., enugu_electric_prepaid" value="{{ $sub->name }}">
                            <small class="invalid-feedback name-error"></small>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="text-smoky">Category</label>
                            <select class="form-control custom-select rounded-0 category" name="category">
                                <option value="">-- Select Category --</option>
                                @if(empty($propertiesCategories))
                                    <option value="">No Subcategories listed</option>
                                @else
                                    @foreach ($propertiesCategories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $sub->category_id ? 'selected' : '' }}>
                                            {{ ucfirst($category->name) }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                            <small class="invalid-feedback category-error"></small>
                        </div>
                    </div>
                    <div class="alert mb-3 edit-subcategory-message d-none"></div>
                    <div class="d-flex justify-content-right mb-3 mt-1">
                        <button type="submit" class="btn rounded-0 bg-main-dark btn-block btn-lg text-white edit-subcategory-button px-4 font-weight-bold">
                            <img src="/images/spinner.svg" class="mr-2 d-none edit-subcategory-spinner mb-1">
                            Save Subcategory
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>