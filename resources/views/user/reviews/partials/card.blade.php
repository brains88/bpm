<div class="w-100 p-4 border-bottom border-success bg-white shadow-sm position-relative">
	<div class="mb-3">
		<div class="text-main-dark">
			{{ ucfirst($review->review) }}
		</div>
	</div>
	<div class="d-flex justify-content-between align-items-center">
		<small>
			<small>
				<em>By</em> {{ ucwords($review->user->name ?? 'Nill') }}
			</small>
		</small>
		<small>
			<small>
				{{ $review->created_at->diffForHumans() }}
			</small>
		</small>
	</div>
</div>