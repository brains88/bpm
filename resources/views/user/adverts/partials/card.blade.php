<div class="m-0 p-0 bg-transparent border icon-raduis position-relative">
	<div class="row no-gutters">
		<div class="col-12 col-md-6">
			<a href="{{ empty($advert->banner) ? 'javascript:;' : $advert->banner }}" class="position-relative" style="height: 200px;">
				<img src="{{ empty($advert->banner) ? 'https://via.placeholder.com/380x250?text=Upload+advert+image+here' : $advert->banner }}" class="img-fluid border h-100 w-100">
			</a>
		</div>
		<div class="col-12 col-md-6 p-4">
			<div class="d-flex mb-3">
				<a href="" class="btn btn-info px-4 icon-raduis">Activate</a>
			</div>
			@if(!empty($advert->description))
				<div class="text-main-dark text-underline">
					{{ \Str::limit($advert->description, 20, '(...)') }}
				</div>
			@endif
		</div>
	</div>
</div>