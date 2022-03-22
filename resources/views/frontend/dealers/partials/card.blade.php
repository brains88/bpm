<div class="dealer-container">
<div class="p-0 card-raduis border-0 m-0">
	<div class="card">
			<a href="{{ route('dealer.profile', ['id' => $dealer->id, 'name' => \Str::slug($dealer->user->name)]) }}">
			<img src="{{ empty($dealer->image) ? '/images/banners/avatar.png' : $dealer->image }}" class="img-round h-100 w-100">
		</a>
	</div>
	<div class="position-relative card-body">
		<div class="bg-white">
			<div class="mb-2">
				<a href="{{ route('dealer.profile', ['id' => $dealer->id, 'name' => \Str::slug($dealer->user->name)]) }}" class="text-main-dark" style="color:#a00f0f;">
					{{ $dealer->user->name }}
				</a>
			</div>
			<div class="mb-3">
				<div class="mb-3">
					<a href="{{ route('dealer.profile', ['id' => $dealer->id, 'name' => \Str::slug($dealer->user->name)]) }}">
						<small class="text-main-dark text-underline">
							{{ \Str::limit(ucwords($dealer->description), 26) }}
						</small>
					</a>	
				</div>
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
</div>	
</div>