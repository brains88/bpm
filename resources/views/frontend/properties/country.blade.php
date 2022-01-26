@include('layouts.header')
    @include('frontend.layouts.navbar')
    <div class="bg-main-ash min-vh-100">
    	<section class="country-banner" style="padding: 140px 0 120px">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12 col-md-7 col-lg-9">
						@empty($countryProperties->count())
							<div class="alert alert-info">No Properties Listed</div>
						@else
							<div class="p-3 mb-4 bg-white shadow-sm icon-raduis">
								<h5 class="m-0">
									{{ ucfirst($country->name) }} Properties ({{ $countryProperties->total() }})
								</h5>
							</div>
							<?php $image = 1; ?>
							<div class="row">
								@foreach($countryProperties as $property)
									<?php $image++; ?>
									<div class="col-12 col-md-6 col-lg-4 mb-4">
										@include('frontend.properties.partials.card')
									</div>
								@endforeach
							</div>
						@endempty
					</div>
					<div class="col-12 col-md-5 col-lg-3">
						<div class="mb-4">
							<div class="p-3 mb-4 bg-white shadow-sm icon-raduis">
								<h5 class="m-0">Property Categories</h5>
							</div>
							@empty($propertyCategories->count())
			                    <div class="alert alert-info">No Categories Yet</div>
			                @else
		                        @foreach($propertyCategories as $category)
			                        <div class="d-block">
										<a href=" {{ route('properties.category', ['category' => strtolower($category->name)]) }}" class="pb-3 mb-3 d-flex justify-content-between border-bottom align-items-center w-100">
											<div class="w-100 text-main-dark">
												{{ ucwords($category->name) }}
											</div>
											<small class="text-main-green">
												<i class="fa-solid fa-angle-right"></i>
											</small>
										</a>
									</div>
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