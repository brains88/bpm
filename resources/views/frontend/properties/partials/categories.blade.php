<div class="">
	<a href=" {{ route('properties.category', ['category' => strtolower($category)]) }}" class="pb-3 mb-3 d-flex justify-content-between border-bottom align-items-center w-100">
		<div class="w-100 text-main-dark">
			{{ ucwords($category) }}
		</div>
		<small class="text-theme-color">
			<i class="fa-solid fa-angle-right"></i>
		</small>
	</a>
</div>