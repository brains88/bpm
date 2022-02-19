<div class="w-100 p-4 border-bottom border-success bg-white shadow-sm position-relative">
	<div class="mb-3 dropdown">
		<a href="javascript:;" class="text-main-dark text-underline d-flex justify-content-between align-items-center" id="drop-review" data-toggle="dropdown" aria-expanded="false">
			<div class="">
				{{ ucfirst(\Str::limit($review->review, 20)) }}
			</div>
			<div class="text-success">
				<i class="icofont-caret-down"></i>
			</div>
		</a>
		<div class="dropdown-menu w-100 shadow icon-raduis" aria-labelledby="drop-review">
			<div class="p-4" style="height: 180px; overflow-y: scroll;">
				{{ ucfirst($review->review) }}
			</div>
		</div>
	</div>
	<div class="d-flex justify-content-between align-items-center">
		<small>
			<small>
				<em>By</em> {{ firstname(ucwords($review->user->name ?? 'Nill')) }}
			</small>
		</small>
		<small>
			<small>
				{{ $review->created_at->diffForHumans() }}
			</small>
		</small>
	</div>
</div>