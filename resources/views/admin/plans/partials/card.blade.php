<div class="card border-0 position-relative mb-4">
	<div class="card-body pt-0">
		<div class="bg-info rounded position-relative d-flex justify-content-between align-items-center p-3" style="top: -20px">
			<small class="text-white">
				{{ ucfirst($plan->duration) }}
			</small>
			<div class="d-flex">
				<small class="text-warning cursor-pointer mr-2" data-toggle="modal" data-target="#edit-plan-{{ $plan->id }}">
					<i class="icofont-edit"></i>
				</small>
				<small class="text-danger cursor-pointer">
					<i class="icofont-trash"></i>
				</small>
			</div>
		</div>
		<div class="d-flex justify-content-between mb-3">
			<small class="text-dark">
				{{ ucwords($plan->name ?? 'nill') }}
			</small>
			<small class="text-dark">
				${{ number_format($plan->price ?? 0) }}
			</small>
		</div>
		<div class="bg-main-ash rounded p-3 d-flex justify-content-between">
			<small class="text-dark">
				{{ $plan->subscriptions ?? 0 }}
			</small>
			<?php $details = $plan->details ?? 'nill'; ?>
			<div class="dropdown">
                <div class="text-dark">
                	<div class="cursor-pointer" data-toggle="dropdown" id="plan-details-{{ $plan->id }}">
                		<small class="text-dark">
                			{{ ucfirst(\Str::limit($details, 10)) }}
                		</small>
	                    <i class="icofont icofont-caret-down"></i>
                	</div>
	                <div class="dropdown-menu border-0 shadow dropdown-menu-right" aria-labelledby="plan-details-{{ $plan->id }}" style="width: 280px; max-height: 320px; overflow-y: scroll;">
	                	<div class="p-3">
	                		<small class="text-dark">
	                			{{ ucfirst($details) }}
	                		</small>
	                	</div>
	                </div>
	            </div>
            </div>
		</div>
	</div>
</div>