<div class="modal fade" id="edit-social" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content border-0">
            <form method="post" class="edit-social-form" action="javascript:;" data-action="{{ route('user.social.edit', ['id' => $social->id]) }}" autocomplete="off">
                <div class="modal-body p-4">
                    <div class="d-flex justify-content-between pb-3 mb-3 border-bottom">
                        <div class="text-smoky mb-0 font-weight-bold">Edit Socials</div>
                        <div class="cursor-pointer" data-dismiss="modal" aria-label="Close">
                            <i class="icofont-close text-danger"></i>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <label class="text-muted">Linkedin</label>
                            <div class="input-group">
                                <input type="url" name="linkedin" class="form-control linkedin" placeholder="Enter linkedin link" value="{{ $social->linkedin }}">
                            </div>
                            <small class="error linkedin-error text-danger"></small>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="text-muted">Facebook</label>
                            <div class="input-group">
                                <input type="url" name="facebook" class="form-control facebook" placeholder="Enter facebook link" value="{{ $social->facebook }}">
                            </div>
                            <small class="error facebook-error text-danger"></small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <label class="text-muted">Twitter</label>
                            <div class="input-group">
                                <input type="url" name="twitter" class="form-control twitter" placeholder="Enter twitter link" value="{{ $social->twitter }}">
                            </div>
                            <small class="error twitter-error text-danger"></small>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="text-muted">Instagram</label>
                            <div class="input-group">
                                <input type="url" name="instagram" class="form-control instagram" placeholder="Enter instagram link" value="{{ $social->instagram }}">
                            </div>
                            <small class="error instagram-error text-danger"></small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <label class="text-muted">Whatsapp</label>
                            <div class="input-group">
                                <input type="text" name="whatsapp" class="form-control whatsapp" placeholder="Enter whatsapp number" value="{{ $social->whatsapp }}">
                            </div>
                            <small class="error whatsapp-error text-danger"></small>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="text-muted">Youtube</label>
                            <div class="input-group">
                                <input type="url" name="youtube" class="form-control youtube" placeholder="Enter youtube link" value="{{ $social->youtube }}">
                            </div>
                            <small class="error youtube-error text-danger"></small>
                        </div>
                    </div>
                    <div class="alert mb-3 edit-social-message d-none"></div>
                    <button type="submit" class="btn btn-lg px-4 mt-2 icon-raduis btn-info text-white edit-social-button mb-4">
                        <img src="/images/spinner.svg" class="mr-2 d-none edit-social-spinner mb-1">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>