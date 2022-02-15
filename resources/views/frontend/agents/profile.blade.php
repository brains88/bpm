@include('layouts.header')
    @include('frontend.layouts.navbar')
    <div class="bg-main-ash min-vh-100">
    	<section class="position-relative" style="padding: 140px 0;">
			<div class="container-fluid">
				@if(empty($profile))
					<div class="alert alert-info">Agent profile not found</div>
				@else
					<div class="row">
						<div class="col-12 col-md-5 col-lg-3">
							<div class="mb-4 p-3 icon-raduis bg-white shadow-sm text-center">
								<div class="w-auto rounded-pill border">
									<div class="rounded-circle" style="width: 80px; height: 80px;">
										<img src="{{ empty($profile->image) ? '/images/profiles/girl.jpg' : $profile->image }}" class="img-fluid w-100 h-100 rounded-circle object-cover">
									</div>
								</div>
							</div>
							<div class="mb-4">
								<div class="d-flex align-items-center mb-3">
									<div class="bg-success text-center rounded-circle mr-2" style="width: 15px; height: 15px; line-height: 10px; z-index: 2;">
										<small class="text-white position-relative" style="font-size: 8px;">
											<i class="icofont-tick-mark"></i>
										</small>
									</div>
									<div class="">
										<h5 class="text-main-dark m-0">
											{{ ucwords($profile->user->name) }}
										</h5>
									</div>
								</div>
								<div class="text-main-dark mb-4">
									{{ ucfirst($profile->description) }}
								</div>
								<div class="">
									<div class="row">
										<div class="col-4 mb-3">
											<a href="{{ empty($profile->phone) ? 'javascript:;' : 'tel:'.$profile->phone }}" class="btn btn-info btn-block icon-raduis">
												<small class="">
													<i class="icofont-phone"></i>
												</small>
											</a>
										</div>
										<div class="col-4 mb-3">
											<a href="{{ empty($profile->email) ? 'javascript:;' : 'mailto:'.$profile->email }}" class="btn btn-info btn-block icon-raduis">
												<span class="">
													<i class="icofont-send-mail"></i>
												</span>
											</a>
										</div>
										<div class="col-4 mb-3">
											<a href="{{ empty($profile->website) ? 'javascript:;' : $profile->website }}" class="btn btn-info btn-block icon-raduis" target="_blank">
												<small class="">
													<i class="icofont-web"></i>
												</small>
											</a>
										</div>
									</div>
									<p class="">
										<small class="text-theme-color">
											<i class="icofont-location-pin"></i>
										</small>
										<small class="text-main-dark">
											{{ ucwords($profile->city).', '.ucwords($profile->state) }}
										</small>
									</p>
									<div class="d-flex align-items-center justify-content-between icon-raduis bg-white shadow-sm w-100 p-3">
										<a href="javascript:;" class="text-center bg-theme-color rounded-circle border text-decoration-none" style="height: 35px; width: 35px; line-height: 30px;">
											<small class="text-white">
												<i class="icofont-facebook"></i>
											</small>
										</a>
										<a href="javascript:;" class="text-center bg-theme-color rounded-circle border text-decoration-none" style="height: 35px; width: 35px; line-height: 30px;">
											<small class="text-white">
												<i class="icofont-linkedin"></i>
											</small>
										</a>
										<a href="javascript:;" class="text-center bg-theme-color rounded-circle border text-decoration-none" style="height: 35px; width: 35px; line-height: 30px;">
											<small class="text-white">
												<i class="icofont-twitter"></i>
											</small>
										</a>
										<a href="javascript:;" class="text-center bg-theme-color rounded-circle border text-decoration-none" style="height: 35px; width: 35px; line-height: 30px;">
											<small class="text-white">
												<i class="icofont-whatsapp"></i>
											</small>
										</a>
										<a href="javascript:;" class="text-center bg-theme-color rounded-circle border text-decoration-none" style="height: 35px; width: 35px; line-height: 30px;">
											<small class="text-white">
												<i class="icofont-instagram"></i>
											</small>
										</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-7 col-lg-9">
							<div class="">
								<div class="bg-white p-4 mb-4 icon-raduis shadow-sm d-flex justify-content-between">
									<div class="">Recent Reviews ({{ $profile->reviews()->count() }})</div>
									<a class="text-decoration-none" href="javascript:;" data-toggle="modal" aria-haspopup="true" aria-expanded="false" data-target="#add-review">
			                           <small class="">
			                                <span class="text-main-dark">Add Review</span>
			                            </small>
			                        </a>
			                        @include('frontend.reviews.partials.add')
								</div>
								<div class="">
									@if(empty($profile->reviews()->count()))
										<div class="alert alert-danger">No reviews yet</div>
									@else
										<?php $reviews = $profile->reviews->paginate(5); $count = 0; ?>
										@foreach($reviews as $review)
											<?php $count++; ?>
											<div class="w-100 p-4 mb-3 border-bottom border-success bg-white shadow-sm position-relative">
												<div class="d-flex justify-content-between">
													<div class="d-flex mb-2">
														@for ($rate = 1; $rate < 5; $rate++)
															<div class="mr-3 text-warning">
																<i class="icofont-ui-rating"></i>
															</div>
														@endfor
													</div>
													<small class="text-success">
														<small>{{ $count }}</small>
													</small>
												</div>
												<div class="mb-3">
													<div class="text-muted">
														{{ ucfirst($review->review) }}
													</div>
												</div>
												<div class="d-flex justify-content-between">
													<small class=" text-main-dark">
														<small>
															<em>By</em> {{ ucwords($review->user->name ?? 'Nill') }}
														</small>
													</small>
													<small class="text-main-dark">
														<small>{{ $review->created_at->diffForHumans() }}</small>
													</small>
												</div>
													
											</div>
										@endforeach
										{{ $reviews->appends(request()->query())->onEachSide(1)->links('vendor.pagination.default') }}
									@endif
								</div>
							</div>
						</div>
					</div>
				@endif
			</div>
		</section>
    </div>
	@include('frontend.layouts.bottom')
@include('layouts.footer')