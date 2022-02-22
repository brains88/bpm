<div class="card rounded-0 shadow-sm border-0 position-relative">
	<?php $status = strtolower($credit->status ?? ''); ?>
	<div class="card-body p-0">
		<div class="mb-1 px-3 py-4">
			<?php $progress = rand(1, 99); ?>
            <div class="progress" style="height: 7.5px;">
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="{{ $progress <= 0 ? 1 : $progress }}" aria-valuemin="1" aria-valuemax="100" style="width: {{ $progress <= 0 ? 1 : $progress }}%;"></div>
            </div>
        </div>
		<div class="row no-gutters text-center">
			<div class="col-4 border py-2">
				<small class="">
					{{ $credit->units }}units
				</small> 
			</div>
			<div class="col-4 border py-2">
				<small class="text-info">
					{{ $progress }}%
				</small>
			</div>
			<div class="col-4 border py-2">
				<div class="dropdown">
					<div class="cursor-pointer" id="credit-days-{{ $credit->id }}" data-toggle="dropdown" aria-expanded="false">
						<small class="text-underline text-main-dark">
							{{ $credit->duration ?? 1 }}days
						</small>
					</div>
					<div class="dropdown-menu border-0 dropdown-menu-right shadow" aria-labelledby="credit-days-{{ $credit->id }}">
						<div class="dropdown-item">
							<small>
								{{ $credit->duration - 23 }} days remaining
							</small>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	<div class="card-footer bg-info d-flex align-items-center justify-content-between">
		<small class="text-white">
			<small>
				{{ $credit->created_at->diffForHumans() }}
			</small>
		</small>
		<small>
			@if($credit->promotion !== null)
				@if($status === 'expired')
		    		<small class="text-danger">Used</small>
				@else
					<small class="text-success">Running</small>
		    	@endif
			@else
				<small class="{{ $status === 'expired' ? 'text-danger' : 'text-white' }}">
					{{ ucwords($credit->status ?? 'nill') }}
				</small>
			@endif
		</small>
	</div>
</div>