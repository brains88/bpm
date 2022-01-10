<?php $categoryname = strtolower($property->category->name ?? 'any'); ?>
<div class="card border-0 position-relative">
	<div class="position-relative" style="height: 160px; line-height: 160px;">
		<a href="{{ route('admin.property.edit', ['id' => $property->id, 'category' => $categoryname]) }}" class="text-decoration-none">
			<img src="{{ empty($property->image) ? '/images/banners/holder.png' : $property->image }}" class="img-fluid border-0 w-100 h-100 object-cover">
		</a>
		<div class="position-absolute w-100 px-3 border-top d-flex align-items-center justify-content-between" style="height: 45px; line-height: 45px; bottom: 0; background-color: rgba(0, 0, 0, 0.8);">
			<small class="">
				<small class="text-white">
					{{ \Str::limit(ucwords($property->state.' '.$property->country->name ?? 'Nill'), 16) }}
				</small>
			</small>
			<small class="">
				<small class="text-danger">Promote</small>
			</small>
		</div>
	</div>
	<div class="card-body">
		<div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
			<small class="text-dark">
				<small class="">
					{{ $property->currency->symbol ?? 'USD' }}{{ number_format($property->price) }}
				</small>
			</small>
			<?php $action = strtolower($property->action ?? 'nill'); $actions = \App\Models\Property::$actions; ?>
			<div class="dropdown">
                <small id="change-action-{{ $property->id }}" data-toggle="dropdown" class="{{ $action === 'sold' ? 'bg-danger' : 'bg-info' }} cursor-pointer px-2 rounded-pill">
					<small class="text-white">
						{{ ucwords($actions[$action] ?? 'nill') }} <i class="icofont icofont-caret-down"></i>
					</small>
				</small>
                <div class="dropdown-menu border-0 shadow dropdown-menu-right" aria-labelledby="change-action-{{ $property->id }}">
                	<form method="post" class="p-4 w-100 change-property-action-form" action="javascript:;" style="width: 210px !important;" data-action={{ route('api.property.action.change', ['id' => $property->id]) }}>
					    <div class="form-group">
					      	<label class="text-muted">Change status</label>
					      	<select class="custom-select action" name="action">
					      		@if(empty($actions))
					      			<option>No status listed</option>
					      		@else
					      			<?php unset($actions[$action]); ?>
					      			<option>Select status</option>
					      			@foreach($actions as $key => $value)
					      				<option value="{{ $key }}">
					      					{{ ucwords($value) }}
					      				</option>
					      			@endforeach
					      		@endif
					      	</select>
					      	<span class="invalid-feedback action-error"></span>
					    </div>
					    <div class="alert mb-3 tiny-font change-property-action-message d-none"></div>
	                    <div class="d-flex justify-content-right mb-3 mt-1">
	                        <button type="submit" class="btn btn-info btn-lg btn-block change-property-action-button">
	                            <img src="/images/spinner.svg" class="mr-2 d-none change-property-action-spinner mb-1">
	                            Save
	                        </button>
	                    </div>
					</form>
                </div>
            </div>
		</div>
		<div class="d-flex justify-content-between align-items-center">
			<a href="{{ route('user.property.edit', ['id' => $property->id, 'category' => $categoryname]) }}" class="text-underline text-main-dark">
				<small class="">
					{{ \Str::limit($property->address, 16) }}
				</small>
			</a>
			{{-- <div class="dropdown">
                <a href="javascript:;" class="text-main-dark align-items-center df
                " id="status-{{ $property->id }}" data-toggle="dropdown">
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
            </div> --}}
		</div>
	</div>
	<div class="card-footer d-flex justify-content-between align-items-center bg-main-dark">
		<small class="text-white">
			<small>
				{{ $property->created_at->diffForHumans() }}
			</small>
		</small>
		<a href="{{ route('user.property.edit', ['id' => $property->id, 'category' => $categoryname]) }}">
			<small class="text-warning">
				<i class="icofont-edit"></i>
			</small>
		</a>
	</div>
</div>