<div class="card card-raduis shadow-sm border-0 position-relative">
	<div class="card-body">
		<div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
			<small class="text-dark">
				<small class="">
					{{ $credit->units ?? 'USD' }}units (${{ number_format($credit->price) }})
				</small>
			</small>
            <small class="cursor-pointer">
				<small class="">
					{{ ucwords($credit->status ?? 'nill') }}
				</small>
			</small>
		</div>
		<div class="d-flex justify-content-between align-items-center">
			<small class="text-dark">
				<small>{{ $credit->created_at->diffForHumans() }}</small>
			</small>
			<small class="">
				<small class="text-success">
					{{ $credit->duration ?? 1 }}day(s)
				</small>
			</small>
		</div>
	</div>
</div>