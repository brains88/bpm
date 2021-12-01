<div class="col-12 col-md-4 mb-4">
	<div class="card">
		<div class="" style="height: 220px;">
			<img src="{{ $property->image }}" class="img-fluid card-img-top h-100 object-cover">
		</div>
		<div class="row">
			@foreach($property->images as $image)
				<div class="col-6 col-md-3">
					{{ $image->first_name }}
				</div>
	       	@endforeach
			
		</div>
		<div class="card-body"></div>
	</div>
</div>