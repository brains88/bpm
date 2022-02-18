<div class="modal fade" id="edit-gig-{{ $gig->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0">
            <form method="post" action="javascript:;" class="edit-gig-form" data-action="{{ route('user.gig.edit', ['id' => $gig->id]) }}" autocomplete="off">
                <div class="modal-body p-4">
                    <div class="d-flex justify-content-between pb-3 mb-3 border-bottom">
                        <div class="text-main-dark mb-0">Create Gig</div>
                        <div class="cursor-pointer" data-dismiss="modal" aria-label="Close">
                            <i class="icofont-close text-danger"></i>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="text-main-dark">Minimum Price (NGN)</label>
                            <input type="text" class="form-control price" name="price" placeholder="e.g., 1000" value="{{ $gig->price }}">
                            <small class="invalid-feedback price-error"></small>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="text-main-dark">Service</label>
                            <select class="form-control custom-select service" name="service">
                                <option value="">-- Select Service --</option>
                                <?php $services = \App\Models\Service::all(); ?>
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}" {{ $gig->service_id == $service->id ? 'selected' : '' }}>
                                        {{ ucfirst($service->name) }}
                                    </option>
                                @endforeach
                            </select>
                            <small class="invalid-feedback service-error"></small>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="text-main-dark">Description (400 characters maximum)</label>
                        <textarea class="form-control description" name="description" rows="8">{{ $gig->description }}</textarea>
                        <small class="invalid-feedback description-error"></small>
                    </div>
                    <div class="alert mb-3 edit-gig-message d-none"></div>
                    <div class="d-flex justify-content-right mb-3 mt-1">
                        <button type="submit" class="btn btn-info icon-raduis btn-lg px-4 edit-gig-button px-4">
                            <img src="/images/spinner.svg" class="mr-2 d-none edit-gig-spinner mb-1">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>