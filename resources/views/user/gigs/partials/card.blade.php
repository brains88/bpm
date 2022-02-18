<div class="card icon-raduis border-0 shadow">
	<div class="card-body">
		<div class="d-flex align-items-center justify-content-between mb-3 pb-3 border-bottom">
			<small class="text-main-dark">
				NGN{{ number_format($gig->price) }}
			</small>
			<small class="text-main-dark">
				{{ ucwords(\Str::limit($gig->service->name, 14)) }}
			</small>
		</div>
		<div class="d-flex justify-content-between align-items-center">
			<a class="text-underline text-main-dark" href="javascript:;" data-toggle="modal" data-target="#edit-gig-{{ $gig->id }}">
				<small class="">
					{{ ucfirst(\Str::limit($gig->description, 28)) }}
				</small>
			</a>
			<small class="text-success">
				{{ $gig->clicks ?? rand(4, 67) }} clicks
			</small>
		</div>
			
	</div>
	<div class="card-footer bg-info d-flex justify-content-between">
		<small class="text-white">
			<small>
				{{ $gig->created_at->diffForHumans() }}
			</small>
		</small>
		<div class="d-flex align-items-center">
			<small class="mr-2 text-warning">
				<small class="cursor-pointer">
					<i class="icofont-edit"></i>
				</small>
			</small>
			<small class="text-danger">
				<small class="cursor-pointer">
					<i class="icofont-trash"></i>
				</small>
			</small>
		</div>
	</div>
</div>