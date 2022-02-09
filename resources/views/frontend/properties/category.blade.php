@include('layouts.header')
    @include('frontend.layouts.navbar')
    <div class="bg-main-ash min-vh-100">
    	<section class="" style="padding: 140px 0;">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12 col-md-7 col-lg-9">
						@empty($properties->count())
							<div class="alert alert-info">No Properties Listed</div>
						@else
							<div class="p-3 mb-4 bg-white shadow-sm rounded">
								<h5 class="m-0">
									{{ $name == 'land' ? 'Landed' : ucfirst($name) }} Properties ({{ $properties->total() }})
								</h5>
							</div>
							<div class="row">
								@foreach($properties as $property)
									<div class="col-12 col-md-6 col-lg-4 mb-4">
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
							<?php $categories = \App\Models\Property::query()->distinct()->pluck('category'); ?>
							@empty($categories->count())
			                    <div class="alert alert-info">No Categories Yet</div>
			                @else
			                	<div class="row">
									@foreach($categories as $category)
										<div class="col-12 mb-4">
											@include('frontend.properties.partials.categories')
										</div>
									@endforeach
								</div>
			                @endempty
						</div>
						<div class="">
							@empty($soldProperties)
								<div class="alert alert-info">No recently sold property</div>
							@else
								<div class="p-3 mb-4 bg-white shadow-sm rounded">
									<h5 class="m-0">Recently Sold</h5>
								</div>
								<div class="row">
									@foreach($soldProperties as $property)
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