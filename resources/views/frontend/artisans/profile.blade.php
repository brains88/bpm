@include('layouts.header')
    @include('frontend.layouts.navbar')
    <div class="bg-main-ash min-vh-100">
    	<section class="agent-profile-banner position-relative" style="padding: 140px 0;">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12 col-md-4 col-lg-3">
						<div class="mb-4 icon-raduis bg-white shadow-sm text-center">
							<div class="w-auto position-relative">
								<div class="p-5 rounded" style="height: 240px;">
									<img src="/images/profiles/girl.jpg" class="img-fluid w-100 h-100 rounded object-cover">
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
										Allen Holker
									</h5>
								</div>
							</div>
							<div class="d-flex flex-wrap">
								<small class="px-3 py-1 bg-success rounded-pill mb-3 mr-2">
									<small class="text-white">Computer Engineer</small>
								</small>
								<small class="px-3 py-1 bg-success rounded-pill mb-3 mr-2">
									<small class="text-white">Design and print works</small>
								</small>
								<small class="px-3 py-1 bg-success rounded-pill mb-3">
									<small class="text-white">Electricians and Electronic Repairer</small>
								</small>
							</div>
							<div class="text-main-dark mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
							<div class="">
								<div class="row">
									<div class="col-4 mb-3">
										<a href="tel:08158212666" class="btn btn-info btn-block icon-raduis">
											<small class="">
												<i class="icofont-phone"></i>
											</small>
										</a>
									</div>
									<div class="col-4 mb-3">
										<a href="mailto:08158212666" class="btn btn-info btn-block icon-raduis">
											<span class="">
												<i class="icofont-send-mail"></i>
											</span>
										</a>
									</div>
									<div class="col-4 mb-3">
										<a href="" class="btn btn-info btn-block icon-raduis">
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
									 Paris, France
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
					<div class="col-12 col-md-8 col-lg-9">
						<div class="">
							<div class="bg-white p-4 mb-4 icon-raduis shadow-sm d-flex justify-content-between">
								<div class="">Recent Reviews (45)</div>
								<a href="javascript:;" class="text-main-dark text-underline">
									<small class="">
										Add Review
									</small>
								</a>
							</div>
							<div class="">
								<div class="w-100 p-4 mb-3 border-bottom border-success bg-white shadow-sm position-relative">
									<div class="d-flex mb-2">
										@for ($rate = 1; $rate < 5; $rate++)
											<div class="mr-3 text-warning">
												<i class="icofont-ui-rating"></i>
											</div>
										@endfor
									</div>
									<div class="mb-3">
										<small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
										tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
										quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
										consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
										cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
										proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</small>
									</div>
									<div class="rounded-circle">
										<div><em>By</em> Jones Nanah</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
    </div>
	@include('frontend.layouts.bottom')
@include('layouts.footer')