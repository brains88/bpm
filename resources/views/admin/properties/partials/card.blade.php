<div class="card card-{{ $property->id }} border-top-0">
	<div class="position-relative">
		<div class="position-relative" style="height: 160px; line-height: 160px;">
			<img src="/images/banners/holder.png" class="img-fluid card-img-top w-100 h-100 object-cover">
		</div>
	</div>
	{{-- <div class="px-3 pt-3 bg-info" style="bottom: 0; right: 0; left: 0;">
		<div class="row">
			<?php $total = 3; ?>
			@if($property->images->count() >= 1)
				@for($key = 0; $key <= $total; $key++)
		            <div class="col-6 mb-3">
						<div class="position-relative" style="height: 50px;">
							@if(!isset($property->images[$key]->link) && ($property->images[$key]->type_id ?? 0 == $property->id))
								<img src="{{ $property->images[$key]->link }}" class="img-fluid rounded-0 w-100 h-100 object-cover border">
								<div class="position-absolute" style="top: 50%; left: 50%; transform: translate(-50%, -50%);">
									<div class="rounded-circle bg-dark text-center" style="width: 32.5px; height: 32.5px; line-height: 30px;">
										<small class="text-white">
											<i class="icofont-camera"></i>
										</small>
									</div>	
								</div>
							@else
								<div class="w-100 position-relative h-100 bg-dark cursor-pointer border" style="line-height: 50px;">
									<div class="rounded-circle position-absolute text-center bg-white" style="width: 32.5px; height: 32.5px; line-height: 30px; top: 50%; left: 50%; transform: translate(-50%, -50%)">
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
		            <div class="col-6 mb-3">
						<div class="w-100 bg-dark position-relative text-white cursor-pointer text-center border" style="height: 50px; line-height: 50px;">
							<div class="text-center position-absolute bg-white rounded-circle" style="width: 32.5px; height: 32.5px; line-height: 30px; top: 50%; left: 50%; transform: translate(-50%, -50%)">
								<small class="text-dark">
									<i class="icofont-camera"></i>
								</small>
							</div>
						</div>
					</div>
		       	@endfor
		    @endif
		</div>
	</div> --}}
	<div class="card-body">
		<div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
			<small class="text-main-dark">
				{{ ucfirst($property->category->name) }}
			</small>
			<small class="text-main-dark">
				{{ ucwords($property->action ?? 'Nill') }}
			</small>
		</div>
		<div class="d-flex justify-content-between align-items-center">
			<a href="{{ '' }}" class="text-underline">
				<small class="text-main-dark">
					{{ \Str::limit($property->address, 18) }}
				</small>
			</a>
			<div class="dropdown">
                <a href="javascript:;" class="text-main-dark align-items-center df
                " id="status-{{ $property->id }}" data-toggle="dropdown">
                    <small>({{ ucwords($property->status ?? '') }})</small>
                    <small>
                    	<i class="icofont icofont-caret-down"></i>
                    </small>
                </a>
                <div class="dropdown-menu border-0 shadow dropdown-menu-right" aria-labelledby="status-{{ $property->id }}">
                	<form class="p-4 w-100" action="javascript:;" style="width: 210px !important;">
					    <div class="form-group">
					      	<label for="exampleDropdownFormEmail1">Change status</label>
					      	<select class="custom-select change-status">
					      		<option value="">Change status</option>
					      	</select>
					    </div>
					    <button type="submit" class="btn btn-lg text-white btn-block bg-main-dark">Change status</button>
					</form>
                </div>
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