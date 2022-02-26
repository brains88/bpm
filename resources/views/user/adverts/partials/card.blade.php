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
		<?php $duration = $advert->credit->duration ?? 1; ?>
		<div class="col-12 col-md-7 p-4">
			@if($advert->status == 'initialized' || empty($advert->expiry) || empty($advert->started))
				<div class="row">
					<div class="col-6 mb-4">
            			<div class="dropdown">
				            <a href="javascript:;" class="btn btn-block btn-sm btn-outline-info" id="toggle-advert-status-{{ $advert->id }}" data-toggle="dropdown">
				                <small class="mr-1">
		                			<i class="icofont-play-alt-2"></i>
		                		</small>
		                		<small>Activate</small>
				            </a>
				            <div class="dropdown-menu border-0 shadow dropdown-menu-right" aria-labelledby="toggle-advert-status-{{ $advert->id }}" style="width: 260px !important;">
				            	<form method="post" class="activate-advert-form p-4" action="javascript:;" data-action="{{ route('user.advert.activate', ['id' => $advert->id]) }}">
				            		<div class="alert alert-warning mb-4">This advert will start immediately after activation.</div>
				            		<input type="hidden" name="status" value="active">
				            		<div class="alert mb-3 activate-advert-message d-none"></div>
				            		<button type="submit" class="btn btn-warning btn-block activate-advert-button">
				            			<img src="/images/spinner.svg" class="mr-2 d-none activate-advert-spinner mb-1">Activate
				            		</button>
				            	</form>
				            </div>
				        </div>
            		</div>
					<div class="col-6 mb-4">
						<div class="dropdown">
				            <a href="javascript:;" class="btn btn-block btn-sm btn-outline-danger" id="toggle-advert-status-{{ $advert->id }}" data-toggle="dropdown">
				                <small class="mr-1">
		                			<i class="icofont-rewind"></i>
		                		</small>
		                		<small>Remove</small>
				            </a>
				            <div class="dropdown-menu border-0 shadow dropdown-menu-right" aria-labelledby="toggle-advert-status-{{ $advert->id }}" style="width: 260px !important;">
				            	<div class="p-4">
				            		<div class="alert alert-danger mb-4">This action is destructive and cannot be reversed.</div>
				            		<a href="javascript:;" class="btn btn-danger btn-block remove-advert-button-{{ $advert->id }}" data-url="{{ route('user.advert.remove', ['id' => $advert->id]) }}"><img src="/images/spinner.svg" class="mr-2 d-none remove-advert-spinner-{{ $advert->id }} mb-1">Remove</a>
				            	</div>
				            </div>
				        </div>
					</div>
				</div>
				<div class="">
					<div class="progress progress-bar-height bg-light border mb-3">
	                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="1" aria-valuemax="100"></div>
	                </div>
	                <div class="d-flex justify-content-between align-items-center mb-3">
						<a href="javascript:;" class="d-flex justify-content-between text-main-dark text-underline text-main-dark" data-toggle="modal" data-target="#edit-advert-{{ $advert->id }}">0%</a>
						<a href="javascript:;" class="text-underline text-main-dark" data-toggle="modal" data-target="#edit-advert-{{ $advert->id }}">
							Total({{$duration }}days)
						</a>
					</div>
				</div>
            @elseif($advert->status == 'paused')
            	<div class="row">
            		<div class="col-6 mb-4">
						<div class="dropdown">
				            <a href="javascript:;" class="btn btn-block btn-sm btn-warning" id="pause-advert-{{ $advert->id }}" data-toggle="dropdown">
				                <small class="mr-1">
		                			<i class="icofont-pause"></i>
		                		</small>
		                		<small>Pause</small>
				            </a>
				            <div class="dropdown-menu border-0 shadow dropdown-menu-right" style="width: 260px !important;">
				            	<form method="post" class="pause-advert-form p-4" action="javascript:;" data-action="{{ route('user.advert.pause', ['id' => $advert->id]) }}">
				            		<div class="alert alert-warning mb-4">This advert will be invisible till you resume it.</div>
				            		<input type="hidden" name="status" value="paused">
				            		<div class="alert mb-3 pause-advert-message d-none"></div>
				            		<button type="submit" class="btn btn-warning btn-block pause-advert-button">
				            			<img src="/images/spinner.svg" class="mr-2 d-none pause-advert-spinner mb-1">Pause
				            		</button>
				            	</form>
				            </div>
				        </div>
					</div>
            		<div class="col-6 mb-4">
            			<div class="dropdown">
				            <a href="javascript:;" class="btn btn-block btn-sm btn-outline-danger" id="toggle-advert-status-{{ $advert->id }}" data-toggle="dropdown">
				                <small class="mr-1">
		                			<i class="icofont-rewind"></i>
		                		</small>
		                		<small>Remove</small>
				            </a>
				            <div class="dropdown-menu border-0 shadow dropdown-menu-right" aria-labelledby="toggle-advert-status-{{ $advert->id }}" style="width: 260px !important;">
				            	<div class="p-4">
				            		<div class="alert alert-danger mb-4">This action is destructive and cannot be reversed.</div>
				            		<a href="javascript:;" class="btn btn-danger btn-block remove-advert-button-{{ $advert->id }}" data-url="{{ route('user.advert.remove', ['id' => $advert->id]) }}"><img src="/images/spinner.svg" class="mr-2 d-none remove-advert-spinner-{{ $advert->id }} mb-1">Remove</a>
				            	</div>
				            </div>
				        </div>
					</div>
            	</div>
            	<div class="">
            		<?php $daysdone = (\Carbon\Carbon::parse($advert->paused_at))->diffInDays($advert->started); $fraction = $duration >= $daysdone ? ($daysdone/$duration) : 0; ?>
	            	<div class="progress progress-bar-height mb-3">
	                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-dark" role="progressbar" aria-valuenow="{{ round($fraction * 100) <= 0 ? 1 : round($fraction * 100) }}" aria-valuemin="1" aria-valuemax="100" style="width: {{ round($fraction * 100) <= 0 ? 1 : round($fraction * 100) }}%"></div>
	                </div>
	                <div class="d-flex justify-content-between align-items-center mb-3">
						<a href="javascript:;" class="d-flex justify-content-between text-main-dark text-underline text-main-dark" data-toggle="modal" data-target="#edit-advert-{{ $advert->id }}">
							{{ $timing->progress() }}%
						</a>
						<div class="dropdown">
				            <a href="javascript:;" class="text-underline text-main-dark" id="advert-credit-{{ $advert->id }}" data-toggle="dropdown">
				            	({{ $timing->daysleft() }})days left
				            </a>
				            <div class="dropdown-menu border-0 shadow dropdown-menu-right" aria-labelledby="advert-credit-{{ $advert->id }}" style="width: 240px !important;">
				            	<div class="px-4 py-3">
				            		Total {{ $duration }}days ({{ $advert->credit->units }}units)
				            	</div>
				            </div>
				        </div>
					</div>
            	</div>
	        @else
	        	<div class="row">
					<div class="col-6 mb-4">
            			<div class="dropdown">
				            <a href="javascript:;" class="btn btn-block btn-sm btn-warning" id="toggle-advert-status-{{ $advert->id }}" data-toggle="dropdown">
				                <small class="mr-1">
		                			<i class="icofont-pause"></i>
		                		</small>
		                		<small>Pause</small>
				            </a>
				            <div class="dropdown-menu border-0 shadow dropdown-menu-right" aria-labelledby="toggle-advert-status-{{ $advert->id }}" style="width: 260px !important;">
				            	<form method="post" class="pause-advert-form p-4" action="javascript:;" data-action="{{ route('user.advert.pause', ['id' => $advert->id]) }}">
				            		<div class="alert alert-warning mb-4">This advert will be invisible till you resume it.</div>
				            		<input type="hidden" name="status" value="active">
				            		<div class="alert mb-3 pause-advert-message d-none"></div>
				            		<button type="submit" class="btn btn-warning btn-block pause-advert-button">
				            			<img src="/images/spinner.svg" class="mr-2 d-none pause-advert-spinner mb-1">Pause
				            		</button>
				            	</form>
				            </div>
				        </div>
            		</div>
					<div class="col-6 mb-4">
						<div class="dropdown">
				            <a href="javascript:;" class="btn btn-block btn-sm btn-outline-danger" id="toggle-advert-status-{{ $advert->id }}" data-toggle="dropdown">
				                <small class="mr-1">
		                			<i class="icofont-rewind"></i>
		                		</small>
		                		<small>Remove</small>
				            </a>
				            <div class="dropdown-menu border-0 shadow dropdown-menu-right" aria-labelledby="toggle-advert-status-{{ $advert->id }}" style="width: 260px !important;">
				            	<div class="p-4">
				            		<div class="alert alert-danger mb-4">This action is destructive and cannot be reversed.</div>
				            		<a href="javascript:;" class="btn btn-danger btn-block remove-advert-button-{{ $advert->id }}" data-url="{{ route('user.advert.remove', ['id' => $advert->id]) }}"><img src="/images/spinner.svg" class="mr-2 d-none remove-advert-spinner-{{ $advert->id }} mb-1">Remove</a>
				            	</div>
				            </div>
				        </div>
					</div>
				</div>
				<div class="">
	            	<?php $timing = \App\Helpers\Timing::calculate($duration, $advert->expiry, \Carbon\Carbon::now()); ?>
	            	<div class="progress progress-bar-height mb-3">
	                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="{{ $timing->progress() <= 0 ? 1 : $timing->progress() }}" aria-valuemin="1" aria-valuemax="100" style="width: {{ $timing->progress() <= 0 ? 1 : $timing->progress() }}%"></div>
	                </div>
	                <div class="d-flex justify-content-between align-items-center mb-3">
						<a href="javascript:;" class="d-flex justify-content-between text-main-dark text-underline text-main-dark" data-toggle="modal" data-target="#edit-advert-{{ $advert->id }}">
							{{ $timing->progress() }}%
						</a>
						<div class="dropdown">
				            <a href="javascript:;" class="text-underline text-main-dark" id="advert-credit-{{ $advert->id }}" data-toggle="dropdown">
				            	({{ $timing->daysleft() }})days left
				            </a>
				            <div class="dropdown-menu border-0 shadow dropdown-menu-right" aria-labelledby="advert-credit-{{ $advert->id }}" style="width: 240px !important;">
				            	<div class="px-4 py-3">
				            		Total {{ $duration }}days ({{ $advert->credit->units }}units)
				            	</div>
				            </div>
				        </div>
					</div>
				</div>    
            @endif  	
		</div>
	</div>
</div>