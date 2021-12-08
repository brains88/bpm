@include('layouts.header')
    @include('layouts.navbar')
    <div class="position-relative border-bottom">
    	<section class="properties-banner">
			<div class="container">
				<div class="row">
					<div class="col-12 mb-4">
						<div class="accordion cursor-pointer" id="properties-search">
						  	<div class="card border p-0">
							    <div class="card-header d-flex justify-content-between border-0 rounded shadow-sm bg-main-ash" id="search-accordion" data-toggle="collapse" data-target="#form-search" aria-expanded="false" aria-controls="form-search">
							      	<p class="text-main-green font-weight-bolder m-0">Find <span class="text-main-dark">Properties</span>
							      	</p>
							      	<span class="text-main-green">
							      		<i class="icofont-caret-down"></i>
							      	</span>
							    </div>
							    <div id="form-search" class="collapse" aria-labelledby="search-accordion" data-parent="#properties-search">
							      	<div class="card-body">
							        	@include('properties.partials.search')
							      	</div>
							    </div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12 col-md-7 col-lg-9">
						@empty($allProperties->count())
							<div class="alert alert-info">No Properties Listed</div>
						@else
							<div class="row">
								@foreach($allProperties as $property)
									<div class="col-12 col-lg-6 mb-4">
										@include('properties.partials.card')
									</div>
								@endforeach
							</div>
						@endempty
					</div>
					<div class="col-12 col-md-5 col-lg-3">
						<div class="mb-4">
							<div class="p-3 mb-4 bg-main-ash shadow-sm rounded">
								<h5 class="m-0">Property Categories</h5>
							</div>
							@empty($propertyCategories->count())
			                    <div class="alert alert-info">No Categories Yet</div>
			                @else
		                        @foreach($propertyCategories as $category)
			                        @include('properties.partials.categories')
		                        @endforeach
			                @endempty
						</div>
						<div class="mb-4">
							<div class="p-3 mb-4 bg-main-ash shadow-sm rounded">
								<h5 class="m-0">Mortgage Calculator</h5>
							</div>
							@include('mortgage.index')
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
											@include('properties.partials.sold')
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
	@include('layouts.bottom')
@include('layouts.footer')