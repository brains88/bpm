@include('layouts.header')
    @include('frontend.layouts.navbar')
    <div class="position-relative border-bottom">
    	<section class="agents-banner bg-main-ash">
			<div class="container">
				<div class="row">
					<div class="col-12 col-md-8 col-lg-10">
						<div class="d-flex align-items-center">
							<div class="d-block bg-white mr-3" style="width: 40px; height: 1px;"></div>
							<div class="text-main-green font-weight-bolder mr-3">Our Agents</div>
							<div class="">
								<small class="text-white font-weight-lighter">
									<i class="icofont-ui-search"></i>
								</small>
							</div>
						</div>
						<h1 class="text-main-dark mb-4">Our <span class="text-main-green">Agents</span> would help you find the property of your dream.</h1>
					</div>
				</div>
				<div class="row">
					<?php for ($i = 1; $i < 7; $i++): ?>
						<div class="col-12 mb-4">
							<div class="card bg-transparent border-0 p-0">
								<div class="row">
									<div class="col-12 col-md-5 col-lg-4">
										<div style="height: 380px;">
											<img src="/images/artisans/{{ $i }}.jpg" class="img-fluid border object-cover h-100 card-img-top w-100">
										</div>
									</div>
									<div class="col-12 col-md-7 col-lg-8">
										<div class="card-body bg-transparent px-0">
											<p class="text-main-dark">Histro Mansah</p>
											<div class="text-muted mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodtempor incididunt ut labore et dolore magna aliqua.</div>
											<div class="d-flex align-items-center">
												<a href="tel:08158212666" class="btn mr-3 btn-sm bg-main-green text-white px-3">08158212666</a>
												<a href="tel:08158212666" class="btn btn-sm btn-outline-dark text-main-dark px-3">More Details</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endfor; ?>
				</div>
			</div>
		</section>
    </div>
	@include('frontend.layouts.bottom')
@include('layouts.footer')