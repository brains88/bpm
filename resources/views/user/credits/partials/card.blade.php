<div class="card rounded-0 shadow-sm border-0 position-relative">
	<?php $status = strtolower($credit->status ?? ''); ?>
	<div class="card-body">
		<div class="d-flex justify-content-between align-items-center">
			<small class="text-dark">
				{{ $credit->units ?? 'USD' }}units 
			</small>
			<small>
				{{ $credit->duration ?? 1 }}days
			</small>
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