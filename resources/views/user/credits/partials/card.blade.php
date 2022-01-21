<div class="card rounded shadow-sm border-0 position-relative">
	<?php $status = strtolower($credit->status ?? ''); ?>
	<div class="position-relative px-3" style="top: -10px;">
		@if($credit->promotion !== null)
			@if($status === 'expired')
	    		<small class="bg-danger px-2 py-1 rounded">
	    			<small class="text-white">Used</small>
	    		</small>
			@else
				<small class="bg-success px-2 py-1 rounded">
					<small class="text-white">Running</small>
				</small>
	    	@endif
		@else
			<small class="{{ $status === 'expired' ? 'bg-danger' : 'bg-info' }} px-2 py-1 rounded">
				<small class="text-white">{{ ucwords($credit->status ?? 'nill') }}</small>
			</small>
		@endif
	</div>
	<div class="card-body pt-1">
		<div class="d-flex justify-content-between align-items-center">
			<small class="text-dark">
				<small class="">
					{{ $credit->units ?? 'USD' }}units
				</small>
			</small>
            <small class="cursor-pointer">
            	{{ $credit->duration ?? 1 }}day(s)
			</small>
		</div>
		{{-- <div class="d-flex justify-content-between align-items-center">
			<small class="text-dark">
				<small>{{ $credit->created_at->diffForHumans() }}</small>
			</small>
			<small class="">
				<small class="text-success">
					{{ $credit->duration ?? 1 }}day(s)
				</small>
			</small>
		</div> --}}
	</div>
</div>