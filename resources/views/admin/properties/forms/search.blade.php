<div class="modal fade" id="search-properties" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content border-0">
            <form method="get" action="javascript:;" class="search-properties-form" data-action="{{ route('admin.properties.search') }}" autocomplete="off">
                <div class="modal-body p-4">
                    <div class="d-flex justify-content-between pb-3 mb-3 border-bottom">
                        <div class="text-smoky mb-0 font-weight-bold">Search properties</div>
                        <div class="cursor-pointer" data-dismiss="modal" aria-label="Close">
                            <i class="icofont-close text-danger"></i>
                        </div>
                    </div>
                    <div class="alert alert-info">Search by price, address, status, action, city etc</div>
                    <div class="form-group input-group-lg mb-3">
                        <input type="search" class="form-control keyword rounded-0" name="keyword" placeholder="e.g., Las vegas">
                        <small class="invalid-feedback keyword-error"></small>
                    </div>
                    <div class="alert mb-3 search-properties-message d-none"></div>
                    <button type="submit" class="btn bg-main-dark btn-lg btn-block text-white search-properties-button px-4 font-weight-bold">
                        <img src="/images/spinner.svg" class="mr-2 d-none search-properties-spinner mb-1">
                        Search property
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>