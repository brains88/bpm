<?php $categoryname = strtolower($material->category->name ?? 'any'); ?>
<div class="card border-0 position-relative">
	<div class="position-relative" style="height: 160px; line-height: 160px;">
		<a href="{{ route('user.material.edit', ['id' => $material->id]) }}" class="text-decoration-none">
			<img src="{{ empty($material->image) ? '/images/banners/holder.png' : $material->image }}" class="img-fluid border-0 w-100 h-100 object-cover">
		</a>
		<div class="position-absolute w-100 px-3 border-top d-flex align-items-center justify-content-between" style="height: 45px; line-height: 45px; bottom: 0; background-color: rgba(0, 0, 0, 0.8);">
			<small class="">
				<small class="text-white">
					{{ \Str::limit(ucwords($material->state.' '.$material->country->name ?? 'Nill'), 16) }}
				</small>
			</small>
			<small class="cursor-pointer text-underline">
				<small class="text-danger">Promote</small>
			</small>
		</div>
	</div>
	<div class="card-body">
		<div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
			<small class="text-dark">
				<small class="">
					{{ $material->currency->symbol ?? 'USD' }}{{ number_format($material->price) }}
				</small>
			</small>
            <small class="cursor-pointer">
				<small class="">
					{{ ucwords($material->quantity ?? 'nill') }}
				</small>
			</small>
		</div>
		<div class="d-flex justify-content-between align-items-center">
			<a href="{{ route('user.material.edit', ['id' => $material->id]) }}" class="text-underline text-main-dark">
				<small class="">
					<small>{{ \Str::limit($material->name, 18) }}</small>
				</small>
			</a>
			<a href="{{ route('user.material.edit', ['id' => $material->id]) }}">
				<small class="text-warning">
					<i class="icofont-edit"></i>
				</small>
			</a>
		</div>
	</div>
</div>