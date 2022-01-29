<div class="card p-0 border-0 shadow position-relative">
	<div class="card-header py-0 agent-header position-relative border" style="border-radius: 20px 20px 0 0;">
		<div class="rounded-circle position-relative" style="height: 80px; width: 80px; bottom: -40px;">
			<img src="https://picsum.photos/200/260?random={{ microtime() }}" class="img-fluid border object-cover h-100 rounded-circle w-100">
		</div>
		<div class="position-absolute" style="left: 110px; bottom: -14px">
			<div class="d-flex align-content-center border rounded-pill bg-white">
				<div class="border-right text-center" style="height: 28px; width: 28px; line-height: 23px">
					<small class="">
						<small class="text-theme-color">
							<i class="icofont-email"></i>
						</small>
					</small>
				</div>
				<div class="border-right text-center" style="height: 28px; width: 28px; line-height: 23px">
					<small class="">
						<small class="text-theme-color">
							<i class="icofont-phone"></i>
						</small>
					</small>
				</div>
				<div class="text-center" style="height: 28px; width: 28px; line-height: 23px">
					<small class="">
						<small class="text-theme-color">
							<i class="icofont-web"></i>
						</small>
					</small>
				</div>
			</div>
		</div>
	</div>
	<div class="card-body bg-transparent pt-5">
		<div class="d-flex align-items-center">
			<div class="{{ $i >= 2 && $i <= 5 ? 'bg-success' : 'bg-warning' }} text-center rounded-circle mr-2" style="width: 15px; height: 15px; line-height: 10px; z-index: 2;">
				<small class="text-white position-relative" style="font-size: 8px;">
					<i class="icofont-tick-mark"></i>
				</small>
			</div>
			<div class="">
				<a href="{{ route('agent.profile', ['id' => 45, 'name' => \Str::slug($agents['names'][$i] ?: 'Nonso Okolo')]) }}" class="text-main-dark">
					{{ $agents['names'][$i] ?: 'Nonso Okolo' }}
				</a>
			</div>
		</div>
		<div class="">
			<div class="mb-3">
				<a href="{{ route('agent.profile', ['id' => 45, 'name' => \Str::slug($agents['names'][$i] ?: 'Nonso Okolo')]) }}">
					<small class="text-main-dark text-underline">Lorem ipsum dolor sit amet, ipsum dolor sit amet</small>
				</a>	
			</div>
		</div>
		<div class="d-flex align-items-center">
			<a href="javascript:;" class="text-center bg-theme-color rounded-circle border text-decoration-none mr-2" style="height: 35px; width: 35px; line-height: 30px;">
				<small class="text-white">
					<i class="icofont-facebook"></i>
				</small>
			</a>

			<a href="javascript:;" class="text-center bg-theme-color rounded-circle border text-decoration-none mr-2" style="height: 35px; width: 35px; line-height: 30px;">
				<small class="text-white">
					<i class="icofont-linkedin"></i>
				</small>
			</a>
			<a href="javascript:;" class="text-center bg-theme-color rounded-circle border text-decoration-none mr-2" style="height: 35px; width: 35px; line-height: 30px;">
				<small class="text-white">
					<i class="icofont-twitter"></i>
				</small>
			</a>
			<a href="javascript:;" class="text-center bg-theme-color rounded-circle border text-decoration-none mr-2" style="height: 35px; width: 35px; line-height: 30px;">
				<small class="text-white">
					<i class="icofont-whatsapp"></i>
				</small>
			</a>
			<a href="javascript:;" class="text-center bg-theme-color rounded-circle border text-decoration-none mr-2" style="height: 35px; width: 35px; line-height: 30px;">
				<small class="text-white">
					<i class="icofont-instagram"></i>
				</small>
			</a>
		</div>
	</div>
	<div class="card-footer">
		<div class="">
			<small class="text-theme-color">
				<i class="icofont-location-pin"></i>
			</small>
			<small class="mb-3 text-main-dark">
				{{ $agents['location'][$i] ?: 'Lagos, Nigeria' }}
			</small>
		</div>
	</div>
</div>	