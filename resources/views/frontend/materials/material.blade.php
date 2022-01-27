@include('layouts.header')
    @include('frontend.layouts.navbar')
    <div class="bg-main-ash min-vh-100">
    	<section class="material-banner" style="padding: 140px 0;">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12 col-md-6 col-lg-6">
						<div class="mb-4">
							@empty($material)
								<div class="alert alert-danger">material No Found</div>
							@else
								<div class="mb-4">
									<h3 class="text-main-dark mb-3">
										{{ ucwords($material->name) }}
									</h3>
									<div class="mb-4 position-relative">
										<div class="position-absolute ml-4 mt-4" style="z-index: 2;">
								            <div class="d-flex align-items-center">
								                @if($material->promoted)
								                    <small class="bg-success px-3 py-1 mr-3">
								                        <small class="text-white">Promoted</small>
								                    </small>
								                @endif
								                <small class="bg-white text-theme-color cursor-pointer px-3 py-1 rounded">
								                    <i class="icofont-share"></i>
								                </small>
								            </div>
								        </div>
								        <a href="{{ $material->image ?: '/images/banners/placeholder.png' }}" style="height: 340px;" class="mb-4 d-block">
											<img src="{{ $material->image ?: '/images/banners/placeholder.png' }}" class="img-fluid w-100 h-100 border object-cover">
								        </a>
									</div>
									@if(empty($material->images->count()))
							        	<div class="alert alert-danger mb-4">Other material images not available</div>
							        @else
								        <div class="">
								        	<div class="row">
								        		@foreach($material->images as $image)
								        			<div class="col-6 col-md-3 mb-4">
								        				<a href="{{ $image->link }}" style="height: 160px;">
								        					<img src="{{ $image->link }}" class="img-fluid w-100 h-100 border">
								        				</a>
								        			</div>
								        		@endforeach
								        	</div>
								        </div>
							        @endif
									<div class="row">
							            <div class="col-12 col-md-6 mb-4">
							                <a href="javascript:;" class="btn btn-block bg-theme-color">
							                    <small class="text-white">
							                        NGN{{ number_format($material->price) }}
							                    </small>
							                </a>
							            </div>
							            <div class="col-12 col-md-6 mb-4">
							                <a href="tel:{{ $material->user->phone ?? 'Nill' }}" class="btn btn-block" style="border: 1px solid var(--theme-color)">
							                    <small class="text-theme-color">{{ $material->user->phone ?? 'Nill' }}</small>
							                </a>
							            </div>
							        </div>
									<div class="">
										<div class="text-main-dark d-block mb-3 pb-3 border-bottom">
											Location: {{ $material->address }}
										</div>
										<p class="text-main-dark font-weight-bold">Description</p>
										<div class="p-3 border rounded">
											<div class="text-main-dark">
												{{ $material->additional }}
											</div>
										</div>
									</div>
								</div>
							@endempty
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6">
						<div class="mb-4">
							<div class="p-3 mb-4 bg-white shadow-sm icon-raduis">
								<h5 class="m-0">Other Materials</h5>
							</div>
							<?php $materials = \App\Models\material::where('id', '!=', empty($id) ? 0 : $id)->paginate(6); ?>
							@empty($materials)
			                    <div class="alert alert-info">No Materials Here</div>
			                @else
			                	<div class="row">
			                        @foreach($materials as $material)
				                        <div class="col-12 col-md-6">
				                        	@include('frontend.materials.partials.card')
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