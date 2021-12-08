<form action="javascript:;" method="post" class="property-search-form" data-action="{{ route('signup.corporate') }}" autocomplete="off">
    <div class="form-row">
        <div class="form-group col-12">
            <label class="text-theme-color">Search Keyword</label>
	        <input type="text" name="keyword" class="form-control keyword" placeholder="e.g., 3 rooms bungalow detached">
            <small class="error keyword-error text-danger"></small>
        </div>
     </div>
     <div class="form-row">
     	<div class="form-group col-md-6">
            <label class="text-theme-color">Property Category</label>
            <select class="form-control custom-select">
                <option value="">Select Property</option>
                <option value="">Commercial</option>
                <option value="">Lands</option>
                <option value="">Residential</option>
                <option value="">Industrial</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label class="text-theme-color">Property Location</label>
            <select class="form-control custom-select">
                <option value="">Select Location</option>
                <option value="">Enugu</option>
                <option value="">Lagos</option>
                <option value="">Abuja</option>
                <option value="">Kaduna</option>
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-12 col-md-6">
            <label class="text-theme-color">Minimum Price</label>
            <input type="number" name="minprice" class="form-control minprice" placeholder="e.g., 300000">
            <small class="error minprice-error text-danger"></small>
        </div>
        <div class="form-group col-12 col-md-6">
            <label class="text-theme-color">Miximum Price</label>
            <input type="number" name="maxprice" class="form-control maxprice" placeholder="e.g., 11600000">
            <small class="error maxprice-error text-danger"></small>
        </div>
    </div>
    <div class="mb-4">
        <label class="text-theme-color">Additional Information</label>
        <textarea class="form-control additional" rows="4" placeholder="Enter any other information"></textarea>
    </div>
    <button type="submit" class="btn btn-lg bg-theme-color mt-2 btn-block text-white property-search-button mb-4">
        <img src="/images/spinner.svg" class="mr-2 d-none property-search-spinner mb-1">
        Search
    </button>
    <div class="alert px-3 property-search-message d-none mb-3"></div>
</form>