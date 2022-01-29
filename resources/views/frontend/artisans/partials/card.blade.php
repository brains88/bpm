<div class="bg-transparent p-0 card-raduis border-0 m-0 position-relative">
	<div class="position-relative" style="height: 160px;">
		<div class="{{ $i >= 2 && $i <= 5 ? 'bg-success' : 'bg-warning' }} text-center rounded-circle position-absolute" style="width: 20px; height: 20px; line-height: 20px; bottom: 20%; right: 10%; z-index: 2;">
			<small class="text-white position-relative" style="top: -1.5px">
				<small>
					<i class="icofont-tick-mark"></i>
				</small>
			</small>
		</div>
		<a href="{{ route('artisan.profile', ['id' => 45, 'name' => \Str::slug($artisans['names'][$i] ?: 'Nonso Okolo')]) }}">
			<img src="https://picsum.photos/200/260?random={{ microtime() }}" class="img-fluid border object-cover h-100 w-100">
		</a>
	</div>
	<div class="position-relative card-body py-0" style="top: -40px">
		<div class="bg-white p-4 shadow">
			<div class="mb-2">
				<a href="{{ route('artisan.profile', ['id' => 45, 'name' => \Str::slug($artisans['names'][$i] ?: 'Nonso Okolo')]) }}" class="text-main-dark">
					{{ $artisans['names'][$i] ?: 'Nonso Okolo' }}
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
					<a href="{{ route('artisan.profile', ['id' => 45, 'name' => \Str::slug($artisans['names'][$i] ?: 'Nonso Okolo')]) }}">
						<small class="text-main-dark text-underline">Lorem ipsum dolor sit amet, ipsum dolor sit amet</small>
					</a>	
				</div>
				<small class="px-3 py-1 bg-success rounded-pill">
					<small class="text-white position-relative" style="top: -1px;">Painter</small>
				</small>
			</div>
			{{-- <div class="">
				<div class="mb-3 text-main-dark">
					{{ $artisans['location'][$i] ?: 'Lagos, Nigeria' }}
				</div>
				<a href="tel:08158212666" class="btn mb-3 icon-raduis btn-sm bg-theme-color text-white px-4"><span class="mr-2"><i class="icofont-phone"></i></span>08158212666</a>
			</div>
			<div class="d-flex align-items-center">
				<div class="rounded-circle text-center border-theme-color mr-2" style="width: 30px; height: 30px; line-height: 25px;">
					<small class="text-theme-color">
						<i class="icofont-facebook"></i>
					</small>
				</div>
				<div class="rounded-circle text-center border-theme-color mr-2" style="width: 30px; height: 30px; line-height: 25px;">
					<small class="text-theme-color">
						<i class="icofont-linkedin"></i>
					</small>
				</div>
				<div class="rounded-circle text-center border-theme-color mr-2" style="width: 30px; height: 30px; line-height: 25px;">
					<small class="text-theme-color">
						<i class="icofont-whatsapp"></i>
					</small>
				</div>
				<div class="rounded-circle text-center border-theme-color" style="width: 30px; height: 30px; line-height: 25px;">
					<small class="text-theme-color">
						<i class="icofont-twitter"></i>
					</small>
				</div>
			</div> --}}
		</div>
			
	</div>
</div>	