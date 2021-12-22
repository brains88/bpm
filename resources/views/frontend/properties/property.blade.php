@include('layouts.header')
    @include('frontend.layouts.navbar')
    <div class="position-relative bg-main-ash border-bottom">
    	<section class="properties-banner">
			<div class="container">
				<div class="row">
					<div class="col-12 col-md-8 col-lg-8">
						<div class="mb-4">
							@empty($property)
								<div class="alert alert-danger">Property No Found</div>
							@else
								<div class="mb-4">
									<h3 class="text-main-dark mb-3">
										{{ retitle($property) }}
									</h3>
									<div class="mb-4 position-relative">
										<small class="position-absolute {{ $property->status == 'for rent' ? 'bg-info' : ($property->status == 'for sale' ? 'bg-main-green' : 'bg-main-red') }} rounded-0 px-4 py-2 text-white" style="top: 20px; left: 0;">
								            {{ ucwords($property->status) }}
								        </small>
										<img src="{{ $property->image }}" class="img-fluid w-100 h-100 border">
									</div>
									<div class="row">
							            <div class="col-12 col-md-6 mb-4">
							                <a href="javascript:;" class="btn btn-block bg-main-green">
							                    <small class="text-white">
							                        NGN{{ number_format($property->price.'00000') }}
							                    </small>
							                </a>
							            </div>
							            <div class="col-12 col-md-6 mb-4">
							                <a href="tel:{{ $property->user->phone }}" class="btn btn-block" style="border: 1px solid var(--main-green)">
							                    <small class="text-main-green">{{ $property->user->phone }}</small>
							                </a>
							            </div>
							        </div>
									<div class="">
										<div class="text-main-dark d-block mb-3 pb-3 border-bottom">
											{{ $property->address }}
										</div>
										<p class="text-main-dark">Description</p>
										<div class="p-3 border rounded">
											<div class="text-main-dark">
												{{ $property->additionals }}
											</div>
										</div>
									</div>
								</div>
							@endempty
						</div>
						<div class="">
							<div class="p-3 mb-4 bg-white shadow-sm rounded">
								<h5 class="m-0">Related Properties</h5>
							</div>
							@empty($relatedProperties->count())
								<div class="alert alert-danger">No Related Properties</div>
							@else
								<div class="row">
									@foreach($relatedProperties as $property)
										<div class="col-12 col-lg-6 mb-4">
											@include('frontend.properties.partials.card')
										</div>
									@endforeach
								</div>
							@endempty
						</div>
					</div>
					<div class="col-12 col-md-4 col-lg-4">
						{{-- <div class="mb-2">
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
						</div> --}}
						<div class="mb-4">
							<div class="p-3 mb-4 bg-white shadow-sm rounded">
								<h5 class="m-0">Property Categories</h5>
							</div>
							@empty($propertyCategories->count())
			                    <div class="alert alert-info">No Categories Yet</div>
			                @else
			                	<div class="row">
			                        @foreach($propertyCategories as $category)
				                        <div class="col-12">
				                        	@include('frontend.properties.partials.categories')
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