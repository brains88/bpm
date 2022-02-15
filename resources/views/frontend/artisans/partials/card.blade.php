<div class="bg-transparent p-0 card-raduis border-0 m-0 position-relative">
	<div class="position-relative" style="height: 160px;">
		<div class="{{ $artisan->certified ? 'bg-success' : 'bg-secondary' }} text-center rounded-circle position-absolute" style="width: 20px; height: 20px; line-height: 20px; bottom: 20%; right: 10%; z-index: 2;">
			<small class="text-white position-relative" style="top: -1.5px">
				<small>
					<i class="icofont-tick-mark"></i>
				</small>
			</small>
		</div>
		<a href="{{ route('artisan.profile', ['id' => $artisan->id, 'name' => \Str::slug($artisan->user->name)]) }}">
			<img src="{{ empty($artisan->image) ? '/images/banners/avatar.png' : $artisan->image }}" class="img-fluid border object-cover h-100 w-100">
		</a>
	</div>
	<div class="position-relative card-body py-0" style="top: -40px">
		<div class="bg-white p-4 shadow">
			<div class="mb-2">
				<a href="{{ route('artisan.profile', ['id' => $artisan->id, 'name' => \Str::slug($artisan->user->name)]) }}" class="text-main-dark">
					{{ $artisan->user->name }}
				</a>
			</div>
			<div class="d-flex">
				@for ($rate = 1; $rate < 5; $rate++)
					<div class="mr-3 text-warning">
						<i class="icofont-ui-rating"></i>
					</div>
				@endfor
			</div>
			<div class="mb-3">
				<div class="mb-3">
					<a href="{{ route('artisan.profile', ['id' => $artisan->id, 'name' => \Str::slug($artisan->user->name)]) }}">
						<small class="text-main-dark text-underline">
							{{ \Str::limit(ucwords($artisan->description), 26) }}
						</small>
					</a>	
				</div>
				<small class="px-3 py-1 bg-success rounded-pill">
					<small class="text-white position-relative" style="top: -1px;">Painter</small>
				</small>
			</div>
		</div>
	</div>
</div>	