<div class="m-0 p-0 bg-white border position-relative">
	<div class="row no-gutters">
		<div class="col-12 col-md-5">
			<div class="position-relative">
				<form action="javascript:;">
		            <input type="file" name="image" accept="image/*" class="advert-image-input-{{ $advert->id }} d-none" data-url="{{ route('advert.banner.upload', ['id' => $advert->id ]) }}">
		        </form>
		        <div class="add-advert-image-loader-{{ $advert->id }} upload-image-loader d-none position-absolute rounded-circle text-center border" data-id="{{ $advert->id }}">
		            <img src="/images/spinner.svg">
		        </div>
				<div class="position-absolute bg-theme-color rounded-circle text-center" style="width: 28px; height: 28px; top: 40%; left: -15px; z-index: 2;">
					<small class="text-muted">
						<i class="icofont-camera cursor-pointer text-white add-advert-image-{{ $advert->id }}" data-id="{{ $advert->id }}"></i>
					</small>
				</div>
				<a href="{{ empty($advert->banner) ? 'javascript:;' : $advert->banner }}" class="position-relative d-block" style="height: 180px !important;">
					<img src="{{ empty($advert->banner) ? '/images/banners/holder.png' : $advert->banner }}" class="img-fluid h-100 object-cover w-100 advert-image-preview-{{ $advert->id }}">
				</a>
			</div>
		</div>
		<div class="col-12 col-md-7 p-4">
			<div class="mb-4">
				@if($advert->status == 'active')
					<div class="row">
						<div class="col-6">
							<a href="javascript:;" class="btn btn-block rounded-0 btn-outline-success">
		                		<small class="mr-1">
		                			<i class="icofont-pause"></i>
		                		</small>
		                		<small>Pause</small>
		                	</a>
						</div>
						<div class="col-6">
							<div class="dropdown">
					            <a href="javascript:;" class="btn btn-block rounded-0 btn-outline-danger" id="toggle-advert-status-{{ $advert->id }}" data-toggle="dropdown">
					                <small class="mr-1">
			                			<i class="icofont-rewind"></i>
			                		</small>
			                		<small>Remove</small>
					            </a>
					            <div class="dropdown-menu border-0 shadow dropdown-menu-right" aria-labelledby="toggle-advert-status-{{ $advert->id }}" style="width: 260px !important;">
					            	<div class="p-4">
					            		<div class="alert alert-danger mb-4">This action is destructive and cannot be reversed.</div>
					            		<a href="javascript:;" class="btn btn-danger btn-block rounded-0 remove-advert-button-{{ $advert->id }}" data-url="{{ route('user.advert.remove', ['id' => $advert->id]) }}"><img src="/images/spinner.svg" class="mr-2 d-none remove-advert-spinner-{{ $advert->id }} mb-1">Remove</a>
					            	</div>
					            </div>
					        </div>
						</div>
					</div>
	            @else
	            	<div class="row">
	            		<div class="col-6">
	            			<div class="dropdown">
					            <a href="javascript:;" class="btn btn-block rounded-0 btn-outline-info" id="toggle-advert-status-{{ $advert->id }}" data-toggle="dropdown">
					                <small class="mr-1">
			                			<i class="icofont-play-alt-2"></i>
			                		</small>
			                		<small>Activate</small>
					            </a>
					            <div class="dropdown-menu border-0 shadow dropdown-menu-right" aria-labelledby="toggle-advert-status-{{ $advert->id }}" style="width: 260px !important;">
					            	<div class="p-4">
					            		<div class="alert alert-info mb-4">Your advert will start immediately after activation</div>
					            		<a href="javascript:;" class="btn btn-info btn-block rounded-0 activate-advert-button-{{ $advert->id }}" data-url="{{ route('user.advert.activate', ['id' => $advert->id]) }}"><img src="/images/spinner.svg" class="mr-2 d-none activate-advert-spinner-{{ $advert->id }} mb-1">Activate</a>
					            	</div>
					            </div>
					        </div>
	            		</div>
	            		<div class="col-6">
	            			<div class="dropdown">
					            <a href="javascript:;" class="btn btn-block rounded-0 btn-outline-danger" id="toggle-advert-status-{{ $advert->id }}" data-toggle="dropdown">
					                <small class="mr-1">
			                			<i class="icofont-rewind"></i>
			                		</small>
			                		<small>Remove</small>
					            </a>
					            <div class="dropdown-menu border-0 shadow dropdown-menu-right" aria-labelledby="toggle-advert-status-{{ $advert->id }}" style="width: 260px !important;">
					            	<div class="p-4">
					            		<div class="alert alert-danger mb-4">This action is destructive and cannot be reversed.</div>
					            		<a href="javascript:;" class="btn btn-danger btn-block rounded-0 remove-advert-button-{{ $advert->id }}" data-url="{{ route('user.advert.remove', ['id' => $advert->id]) }}"><img src="/images/spinner.svg" class="mr-2 d-none remove-advert-spinner-{{ $advert->id }} mb-1">Remove</a>
					            	</div>
					            </div>
					        </div>
						</div>
	            	</div>      
	            @endif  
			</div>
			<div class="mb-4">
				<?php $ads = \App\Helpers\Timing::calculate($advert->expiry, $advert->credit->unit->duration); //dd($ads); ?>
				@if(empty($advert->expiry))
					<div class="progress progress-bar-height bg-light border">
	                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="55" aria-valuemin="1" aria-valuemax="100"></div>
	                </div>
	            @else
	            	<div class="progress progress-bar-height">
	                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-{{ $ads->progress() <= 90 ? 'success' : 'danger' }}" role="progressbar" aria-valuenow="{{ $ads->progress() <= 0 ? 1 : $ads->progress() }}" aria-valuemin="1" aria-valuemax="100" style="width: {{ $ads->progress() <= 0 ? 1 : $ads->progress() }}%"></div>
	                </div>
	            @endif
			</div>
			<div class="d-flex justify-content-between align-items-center mb-3">
				<a href="javascript:;" class="d-flex justify-content-between text-main-dark text-underline text-main-dark" data-toggle="modal" data-target="#edit-advert-{{ $advert->id }}">
					{{ empty($advert->description) ? 'Nill' : \Str::limit($advert->description, 10, ' ( . . . )') }}
				</a>
				<a href="javascript:;" class="text-underline text-muted">
					<i class="icofont-caret-down"></i>
				</a>
			</div>
				
		</div>
	</div>
</div>