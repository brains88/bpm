{{-- <?php $action = property()->action($property); ?> --}}
<div class="col-12 col-md-6 col-lg-4 mb-4">
	<div class="card card-{{ $property->id }}">
		<div class="position-relative">
			<div class="position-relative" style="height: 220px; line-height: 220px;">
				@if(!empty($property->image))
					<div class="w-100 bg-dark text-white text-center">
						<i class="icofont-camera"></i>
					</div>
				@else
					<img src="{{ $property->image }}" class="img-fluid card-img-top w-100 h-100 object-cover">
				@endif
			</div>
		</div>
		<div class="card-body">
			<div class="row">
				<?php $total = 3; ?>
				@if($property->images->count() >= 1)
					@for($key = 0; $key <= $total; $key++)
			            <div class="col-6 col-md-3 mb-3">
							<div class="position-relative" style="height: 50px;">
								@if(isset($property->images[$key]->link) && ($property->images[$key]->type_id ?? 0 == $property->id))
									<img src="{{ $property->images[$key]->link }}" class="img-fluid rounded-0 w-100 h-100 object-cover border">
									<div class="position-absolute" style="top: 50%; left: 50%; transform: translate(-50%, -50%);">
										<div class="rounded-circle bg-dark text-center" style="width: 35px; height: 35px; line-height: 32.5px;">
											<small class="text-white">
												<i class="icofont-camera"></i>
											</small>
										</div>	
									</div>
								@else
									<div class="w-100 position-relative h-100 bg-dark cursor-pointer border" style="line-height: 50px;">
										<div class="rounded-circle position-absolute text-center bg-white" style="width: 35px; height: 35px; line-height: 32.5px; top: 50%; left: 50%; transform: translate(-50%, -50%)">
											<small class="text-dark">
												<i class="icofont-camera"></i>
											</small>
										</div>
									</div>
								@endif
							</div>
						</div>
			       	@endfor
		       	@else
		       		@for($key = 0; $key <= $total; $key++)
			            <div class="col-6 col-md-3 mb-3">
							<div class="w-100 bg-dark position-relative text-white cursor-pointer text-center border" style="height: 50px; line-height: 50px;">
								<div class="text-center position-absolute bg-white rounded-circle" style="width: 35px; height: 35px; line-height: 32.5px; top: 50%; left: 50%; transform: translate(-50%, -50%)">
									<small class="text-dark">
										<i class="icofont-camera"></i>
									</small>
								</div>
									
							</div>
						</div>
			       	@endfor
			    @endif
			</div>
			<div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
				<div class="text-main-dark">
					{{ ucfirst($property->category->name) }}
				</div>
				<div class="text-main-dark">
					{{ ucwords($property->action ?? 'Nill') }}({{ ucfirst($property->status ?? 'Nill') }})
				</div>
			</div>
			<div class="d-flex justify-content-between align-items-center">
				<a href="{{ '' }}" class="text-underline text-main-dark">
					{{ \Str::limit($property->address, 28) }}
				</a>
				<div class="text-main-dark">
					<i class="icofont-caret-down"></i>
				</div>
			</div>
		</div>
		<div class="card-footer d-flex justify-content-between bg-main-dark">
			<small class="text-white">
				{{ $property->created_at->diffForHumans() }}
			</small>
			<div class="d-flex">
				<small class="text-danger mr-2">
					<i class="icofont-trash"></i>
				</small>
				<small class="text-warning">
					<i class="icofont-edit"></i>
				</small>
			</div>
		</div>
	</div>
</div>