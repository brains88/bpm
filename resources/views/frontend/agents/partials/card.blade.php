<div class="card p-0 border-0 shadow position-relative">
	<div class="card-header py-0 agent-header position-relative border" style="border-radius: 20px 20px 0 0;">
		<div class="rounded-circle position-relative" style="height: 80px; width: 80px; bottom: -40px;">
			<img src="{{ $agent->image }}" class="img-fluid border object-cover h-100 rounded-circle w-100">
		</div>
		<div class="position-absolute" style="left: 120px; bottom: -14px">
			<div class="d-flex align-content-center justify-content-around border rounded-pill bg-white">
				<a href="{{ empty($agent->email) ? 'javascript:;' : 'mailto:'.$agent->email }}" class="border-right text-center px-2 pb-1 text-decoration-none">
					<small class="">
						<small class="text-theme-color">
							<i class="icofont-email"></i>
						</small>
					</small>
				</a>
				<a href="{{ empty($agent->phone) ? 'javascript:;' : 'tel:'.$agent->phone }}" class="border-right text-center px-2 pb-1 text-decoration-none">
					<small class="">
						<small class="text-theme-color">
							<i class="icofont-phone"></i>
						</small>
					</small>
				</a>
				<a href="{{ empty($agent->website) ? 'javascript:;' : $agent->website }}" class="text-center px-2 pb-1 text-decoration-none">
					<small class="">
						<small class="text-theme-color">
							<i class="icofont-web"></i>
						</small>
					</small>
				</a>
			</div>
		</div>
	</div>
	<div class="card-body bg-transparent pt-5">
		<div class="d-flex align-items-center">
			<div class="text-center rounded-circle {{ $agent->certified ? 'bg-success' : 'bg-secondary' }} mr-2" style="width: 15px; height: 15px; line-height: 10px; z-index: 2;">
				<small class="text-white position-relative" style="font-size: 8px;">
					<i class="icofont-tick-mark"></i>
				</small>
			</div>
			<div class="">
				<a href="{{ route('agent.profile', ['id' => $agent->id, 'name' => \Str::slug($agent->user->name)]) }}" class="text-main-dark">
					{{ ucwords($agent->user->name) }}
				</a>
			</div>
		</div>
		<div class="">
			<div class="mb-3">
				<a href="{{ route('agent.profile', ['id' => $agent->id, 'name' => \Str::slug($agent->user->name)]) }}">
					<small class="text-main-dark text-underline">
						{{ \Str::limit(ucfirst($agent->description), 34) }}
					</small>
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
				{{ ucwords($agent->city).', '.ucwords($agent->state) }}
			</small>
		</div>
	</div>
</div>	