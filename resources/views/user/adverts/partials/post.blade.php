<div class="modal fade" id="post-advert" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0">
            <form method="post" action="javascript:;" class="post-advert-form" data-action="{{ route('user.advert.post') }}" autocomplete="off">
                <div class="modal-body p-4">
                    <div class="d-flex justify-content-between pb-3 mb-3 border-bottom">
                        <div class="text-smoky mb-0 font-weight-bold">Post Advert</div>
                        <div class="cursor-pointer" data-dismiss="modal" aria-label="Close">
                            <i class="icofont-close text-danger"></i>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label class="text-smoky">Your Credits</label>
                            <select class="form-control custom-select rounded-0 credit" name="credit">
                                <option value="">-- Select credit --</option>
                                <?php $credits = \App\Models\Credit::where(['user_id' => auth()->id(), 'inuse' => false])->get(); ?>
                                @if(empty($credits->count()))
                                    <option value="">-- You have no available credits --</option>
                                @else
                                    @foreach ($credits as $credit)
                                        <option value="{{ $credit->id }}">
                                            {{ $credit->units.'units '.$credit->unit->duration.' days' }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                            <small class="invalid-feedback credit-error"></small>
                        </div>
                        <div class="form-group col-6">
                            <label class="text-smoky">Website link</label>
                            <input type="url" name="link" class="form-control link" placeholder="Enter website link">
                            <small class="invalid-feedback link-error"></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-smoky">Advert Details (Optional)</label>
                        <textarea class="form-control description" name="description" rows="6" placeholder="Maximum of 300 characters"></textarea>
                        <small class="invalid-feedback description-error"></small>
                    </div>
                    <div class="alert mb-3 post-advert-message d-none"></div>
                    <div class="d-flex justify-content-right mb-3 mt-1">
                        <button type="submit" class="btn icon-raduis btn-info btn-lg text-white post-advert-button px-4">
                            <img src="/images/spinner.svg" class="mr-2 d-none post-advert-spinner mb-1">
                            Post
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>