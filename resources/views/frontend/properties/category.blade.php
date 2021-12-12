@include('layouts.header')
    @include('frontend.layouts.navbar')
    <div class="position-relative border-bottom">
    	<section class="properties-banner">
			<div class="container">
				<div class="row">
					<div class="col-12 col-md-7 col-lg-9">
						@empty($categoryProperties->count())
							<div class="alert alert-info">No Properties Listed</div>
						@else
							<div class="p-3 mb-4 bg-white shadow-sm rounded">
								<h5 class="m-0">
									{{ $name == 'lands' ? 'Landed' : ucfirst($name) }} Properties ({{ $categoryProperties->total() }})
								</h5>
							</div>
							<?php $image = 1; ?>
							<div class="row">
								@foreach($categoryProperties as $property)
									<?php $image++; ?>
									<div class="col-12 col-lg-6 mb-4">
										@include('frontend.properties.partials.card')
									</div>
								@endforeach
							</div>
						@endempty
					</div>
					<div class="col-12 col-md-5 col-lg-3">
						<div class="mb-4">
							<div class="p-3 mb-4 bg-white shadow-sm rounded">
								<h5 class="m-0">Property Categories</h5>
							</div>
							@empty($propertyCategories->count())
			                    <div class="alert alert-info">No Categories Yet</div>
			                @else
		                        @foreach($propertyCategories as $category)
			                        @include('frontend.properties.partials.categories')
		                        @endforeach
			                @endempty
						</div>
						<div class="">
							@empty($soldProperties)
								<div class="alert alert-info">No recently sold property</div>
							@else
								<div class="p-3 mb-4 bg-white shadow-sm rounded">
									<h5 class="m-0">Recently Sold</h5>
								</div>
								<?php $image = 1; ?>
								<div class="row">
									@foreach($soldProperties as $property)
										<?php $image++; ?>
										<div class="col-12 mb-4">
											@include('frontend.properties.partials.sold')
										</div>
									@endforeach
								</div>
							@endempty
						</div>
					</div>
				</div>
			</div>
		</section>
    </div>
	@include('frontend.layouts.bottom')
@include('layouts.footer')