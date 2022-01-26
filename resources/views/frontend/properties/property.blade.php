@include('layouts.header')
    @include('frontend.layouts.navbar')
    <div class="bg-main-ash min-vh-100">
    	<section class="property-banner">
			<div class="container-fluid">
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
										<div class="position-absolute ml-4 mt-4" style="z-index: 2;">
								            <div class="d-flex align-items-center">
								                @if($property->promoted)
								                    <small class="bg-success px-3 py-1 mr-3">
								                        <small class="text-white">Promoted</small>
								                    </small>
								                @else
								                    <small class="bg-info px-3 py-1 mr-3">
								                        <small class="text-white">Active</small>
								                    </small>
								                @endif
								                <?php $action = strtolower($property->action); ?>
								                @if(isset($actions[$action]))
								                    <small class="bg-theme-color px-3 py-1 mr-3">
								                        <small class="text-white">
								                            {{ ucwords($actions[$action]) }}
								                        </small>
								                    </small>
								                @endif
								                <small class="bg-white text-theme-color cursor-pointer px-3 py-1 rounded">
								                    <i class="icofont-share"></i>
								                </small>
								            </div>
								        </div>
								        <div style="height: 340px;" class="mb-4">
											<img src="{{ $property->image ?? '/images/banners/holder.png' }}" class="img-fluid w-100 h-100 border object-cover">
								        </div>
									</div>
									@if(!$property->images->count())
							        	<div class="alert alert-danger mb-4">Other property images not available</div>
							        @else
								        <div class="">
								        	<div class="row">
								        		@foreach($property->images as $image)
								        			<div class="col-6 col-md-3">
								        				<div style="height: 160px;">
								        					<img src="{{ $image->link }}" class="img-fluid w-100 h-100">
								        				</div>
								        			</div>
								        		@endforeach
								        	</div>
								        </div>
							        @endif
									<div class="row">
							            <div class="col-12 col-md-6 mb-4">
							                <a href="javascript:;" class="btn btn-block bg-theme-color">
							                    <small class="text-white">
							                        NGN{{ number_format($property->price.'00000') }}
							                    </small>
							                </a>
							            </div>
							            <div class="col-12 col-md-6 mb-4">
							                <a href="tel:{{ $property->user->phone ?? 'Nill' }}" class="btn btn-block" style="border: 1px solid var(--theme-color)">
							                    <small class="text-theme-color">{{ $property->user->phone ?? 'Nill' }}</small>
							                </a>
							            </div>
							        </div>
									<div class="">
										<div class="text-main-dark d-block mb-3 pb-3 border-bottom">
											Location: {{ $property->address }}
										</div>
										<p class="text-main-dark font-weight-bold">Description</p>
										<div class="p-3 border rounded">
											<div class="text-main-dark">
												{{ $property->additional }}
											</div>
										</div>
									</div>
								</div>
							@endempty
						</div>
						<div class="">
							<div class="p-3 mb-4 bg-white shadow-sm icon-raduis">
								<h5 class="m-0">Related Properties</h5>
							</div>
							@empty($relatedProperties->count())
								<div class="alert alert-danger">No Related Properties</div>
							@else
								<div class="row">
									@foreach($relatedProperties as $property)
										<div class="col-12 col-md-6 col-lg-4 mb-4">
											@include('frontend.properties.partials.card')
										</div>
									@endforeach
								</div>
							@endempty
						</div>
					</div>
					<div class="col-12 col-md-4 col-lg-4">
						<div class="mb-4">
							<div class="p-3 mb-4 bg-white shadow-sm icon-raduis">
								<h5 class="m-0">Property Categories</h5>
							</div>
							@empty($categories->count())
			                    <div class="alert alert-info">No Categories Yet</div>
			                @else
			                	<div class="row">
			                        @foreach($categories as $category)
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