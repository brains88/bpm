<form method="post" class="add-social-form bg-white p-4" action="javascript:;" data-action="{{ route('user.social.add') }}" autocomplete="off">
    <div class="form-row">
        <div class="form-group col-lg-6">
            <label class="text-muted">Linkedin</label>
            <div class="input-group">
                <input type="url" name="linkedin" class="form-control linkedin" placeholder="Enter linkedin link">
            </div>
            <small class="error linkedin-error text-danger"></small>
        </div>
        <div class="form-group col-lg-6">
            <label class="text-muted">Facebook</label>
            <div class="input-group">
                <input type="url" name="facebook" class="form-control facebook" placeholder="Enter facebook link">
            </div>
            <small class="error facebook-error text-danger"></small>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-lg-6">
            <label class="text-muted">Twitter</label>
            <div class="input-group">
                <input type="url" name="twitter" class="form-control twitter" placeholder="Enter twitter link">
            </div>
            <small class="error twitter-error text-danger"></small>
        </div>
        <div class="form-group col-lg-6">
            <label class="text-muted">Instagram</label>
            <div class="input-group">
                <input type="url" name="instagram" class="form-control instagram" placeholder="Enter instagram link">
            </div>
            <small class="error instagram-error text-danger"></small>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-lg-6">
            <label class="text-muted">Whatsapp</label>
            <div class="input-group">
                <input type="url" name="whatsapp" class="form-control whatsapp" placeholder="Enter whatsapp number">
            </div>
            <small class="error whatsapp-error text-danger"></small>
        </div>
        <div class="form-group col-lg-6">
            <label class="text-muted">Youtube</label>
            <div class="input-group">
                <input type="url" name="youtube" class="form-control youtube" placeholder="Enter youtube link">
            </div>
            <small class="error youtube-error text-danger"></small>
        </div>
    </div>
    <div class="alert mb-3 add-social-message d-none"></div>
    <button type="submit" class="btn btn-lg px-4 mt-2 icon-raduis btn-info text-white add-social-button mb-4">
        <img src="/images/spinner.svg" class="mr-2 d-none add-social-spinner mb-1">
        Add
    </button>
</form> 