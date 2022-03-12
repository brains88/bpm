<?php $categoryname = strtolower($property->category); ?>
<div class="card border-0 position-relative">
	<div class="position-relative" style="height: 160px; line-height: 160px;">
		<a href="{{ route('admin.property.edit', ['id' => $property->id, 'category' => $categoryname]) }}" class="text-decoration-none">
			<img src="{{ empty($property->image) ? '/images/banners/holder.png' : $property->image }}" class="img-fluid border-0 w-100 h-100 object-cover">
		</a>
		<div class="position-absolute w-100 px-3 border-top d-flex align-items-center justify-content-between" style="height: 45px; line-height: 45px; bottom: 0; background-color: rgba(0, 0, 0, 0.75);">
			<a href="{{ route('admin.user.profile', ['id' => $property->user->id ?? 0]) }}" class="text-underline text-white">
				<small class="">
					By {{ \Str::limit($property->user->name ?? '', 6) }}
				</small>
			</a>
			<a href="{{ route('admin.properties.country', ['countryid' => $property->country->id ?? 0]) }}" class="text-underline text-white">
				{{-- <?php $countryname = empty($property->country->name) ? 'Nill' : ucwords($property->country->name); ?> --}}
				<small class="text-white">
					{{ \Str::limit($property->country->name ?? '', 6) }}
				</small>
			</a>
		</div>
	</div>
	<div class="card-body">
		<div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
			<a href="{{ route('admin.properties.category', ['categoryname' => $categoryname]) }}" class="text-underline text-dark">
				<small class="">
					{{ ucfirst($categoryname) }}
				</small>
			</a>
			<?php $action = strtolower($property->action ?? 'nill'); ?>
			<small class="">
				<a href="{{ route('admin.properties.action', ['action' => $action]) }}" class="text-underline text-{{ $action === 'sold' ? 'danger' : 'info' }}">
					{{ ucwords($action) }}
				</a>
			</small>
		</div>
		<div class="d-flex justify-content-between align-items-center">
			<a href="{{ route('admin.property.edit', ['category' => $categoryname, 'id' => $property->id]) }}" class="text-underline text-main-dark">
				<small class="">
					{{ \Str::limit($property->address, 14) }}
				</small>
			</a>
			<div class="dropdown">
                <a href="javascript:;" class="text-main-dark text-underline" id="status-{{ $property->id }}" data-toggle="dropdown">
                    <small class="">
                    	<i class="icofont icofont-caret-down"></i>
                    </small>
                </a>
                <div class="dropdown-menu border-0 shadow dropdown-menu-right" aria-labelledby="status-{{ $property->id }}">
                	<form class="p-4 w-100" action="javascript:;" data-action="{{ '' }}" style="width: 210px !important;">
					    <div class="form-group">
					      	<label for="status">Change status</label>
					      	@set('status', \App\Models\Property::$status)
					      	<select class="custom-select change-status">
					      		<option value="">Change status</option>
					      		@if(empty($status))
					      			<option value="">No status listed</option>
					      		@else
					      			@foreach($status as $stat)
					      				@if($stat !== $property->status)
						      				<option value="{{ $stat }}">
						      					{{ ucfirst($stat) }}
						      				</option>
					      				@endif
					      			@endforeach
					      		@endif
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
			{{ $property->created_at->diffForHumans() }}
		</small>
		<a href="{{ route('admin.property.edit', ['id' => $property->id, 'category' => $categoryname]) }}">
			<small class="text-warning">
				<i class="icofont-edit"></i>
			</small>
		</a>
	</div>
</div>