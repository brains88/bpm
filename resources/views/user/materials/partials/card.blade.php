<?php $categoryname = strtolower($material->category->name ?? 'any'); ?>
<div class="card border-0 position-relative">
	<div class="position-relative" style="height: 160px; line-height: 160px;">
		<a href="{{ route('user.material.edit', ['id' => $material->id]) }}" class="text-decoration-none">
			<img src="{{ empty($material->image) ? '/images/banners/holder.png' : $material->image }}" class="img-fluid border-0 w-100 h-100 object-cover">
		</a>
		<div class="position-absolute w-100 px-3 border-top d-flex align-items-center justify-content-between" style="height: 45px; line-height: 45px; bottom: 0; background-color: rgba(0, 0, 0, 0.8);">
			<small class="text-white">
				<small>{{ \Str::limit(ucwords($material->city, 14)) }}</small>
			</small>
			<small class="cursor-pointer text-underline">
				<small class="text-danger">Promote</small>
			</small>
		</div>
	</div>
	<div class="card-body">
		<div class="d-flex justify-content-between align-items-center">
			<small class="text-dark">
				{{ $material->currency->symbol ?? 'USD' }}{{ number_format($material->price) }}
			</small>
			<a href="{{ route('user.material.edit', ['id' => $material->id]) }}" class="text-underline text-main-dark">
				<small class="">
					{{ \Str::limit($material->name, 14, ' ( . . . )') }}
				</small>
			</a>
		</div>
	</div>
	<div class="card-footer bg-main-dark d-flex justify-content-between">
		<small class="text-white">
			{{ $material->created_at->diffForHumans() }}
		</small>
		<a href="{{ route('user.material.edit', ['id' => $material->id]) }}">
			<small class="text-warning">
				<i class="icofont-edit"></i>
			</small>
		</a>
	</div>
</div>