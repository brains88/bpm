<div class="card card-{{ $property->id }} border-top-0">
	<?php $categoryname = strtolower($property->category->name ?? 'any'); ?>
	<div class="card-img-top position-relative" style="height: 160px; line-height: 160px;">
		<a href="{{ route('admin.property.edit', ['id' => $property->id, 'category' => $categoryname]) }}">
			<img src="{{ empty($property->image) ? '/images/banners/holder.png' : $property->image }}" class="img-fluid card-img-top w-100 h-100 object-cover">
		</a>
		<div class="position-absolute w-100 px-3 border-top d-flex align-items-center" style="height: 40px; bottom: 0; background-color: rgba(0, 0, 0, 0.5);">
			<small class="text-white">
				{{ ucwords($property->country->name ?? 'Nill') }}
			</small>
		</div>
	</div>
	<div class="card-body">
		<div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
			<small class="text-main-dark">
				{{ ucfirst($categoryname) }}
			</small>
			<small class="text-main-dark">
				{{ ucwords($property->action ?? 'Nill') }}
			</small>
		</div>
		<div class="d-flex justify-content-between align-items-center">
			<a href="{{ route('admin.property.edit', ['id' => $property->id, 'category' => $categoryname]) }}" class="text-underline">
				<small class="text-main-dark">
					{{ \Str::limit($property->address, 16) }}
				</small>
			</a>
			<div class="dropdown">
                <a href="javascript:;" class="text-main-dark align-items-center df
                " id="status-{{ $property->id }}" data-toggle="dropdown">
                    {{-- <small>({{ ucwords($property->status ?? '') }})</small> --}}
                    <small>
                    	(<i class="icofont icofont-caret-down"></i>)
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
	<div class="card-footer d-flex justify-content-between align-items-center bg-main-dark">
		<small class="text-white">
			Posted {{ $property->created_at->diffForHumans() }}
		</small>
		<a href="{{ route('admin.property.edit', ['id' => $property->id, 'category' => $categoryname]) }}">
			<small class="text-warning">
				<i class="icofont-edit"></i>
			</small>
		</a>
	</div>
</div>