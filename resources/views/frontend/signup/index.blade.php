@include('layouts.header')
	<div class="position-relative">
		<div class="signup-banner min-vh-100">
			<div class="container">
				<div class="row justify-content-center align-items-center">
					<div class="col-12 col-md-8 col-lg-7 mb-4">
						<section class="pt-5">
							<div class="w-100" style="max-width: 350px;">
								<a href="{{ route('home') }}" class="">
									<img src="/images/logos/logo.png" class="img-fluid w-100">
								</a>
								<h1 class="text-white font-weight-bolder">Services Limited</h1>
							</div>
							<div class="text-white mb-3">We're a Leading Real Estate Company In Nigeria That Has Been Building Prosperity For Our Clients By Executing Innovative Real Estate Solutions.</div>
						</section>
						<section class="">
							<div class="">
								<h1 class="font-weight-bolder mb-3">
									<span class="text-white">Signup</span> 
									<span class="text-main-green">Here</span>
								</h1>
								<p class="text-white">Please fill in all fields.</p>
							</div>
							<div class="signup-tabs">
								<ul class="form-row nav nav-pills mb-4" id="pills-tab" role="tablist">
									<li class="col-6 nav-item pl-0" role="presentation">
									    <a class="nav-link active" id="individual-tab" data-toggle="pill" href="#individual" role="tab" aria-controls="individual" aria-selected="true">
										    <small class="mr-1">
										    	<i class="icofont-ui-user"></i>
										    </small>
										    <span>Individual</span>
										</a>
									</li>
									<li class="col-6 nav-item pr-0" role="presentation">
									    <a class="nav-link" id="corporate-tab" data-toggle="pill" href="#corporate" role="tab" aria-controls="corporate" aria-selected="false">
									    	<span class="mr-1">
										    	<i class="icofont-ui-user-group"></i>
										    </span>
										    <span>Corporate</span>
										</a>
									</li>
								</ul>
								<div class="tab-content" id="pills-tab-content">
									<div class="tab-pane fade show active" id="individual" role="tabpanel" aria-labelledby="individual-tab">
										<div class="mb-4 alert alert-info">
											<small>
												<i class="icofont-info-circle"></i>
											</small>
											Create your personal account. It's free.
										</div>
										@include('signup.partials.individual')
									</div>
									<div class="tab-pane fade" id="corporate" role="tabpanel" aria-labelledby="corporate-tab">
										<div class="mb-4 alert alert-info">
											<small>
												<i class="icofont-info-circle"></i>
											</small>
											Create a corporate account. It's free.
										</div>
										@include('signup.partials.corporate')
									</div>
								</div>
							</div>
						</section>
					</div>
				</div>
			</div>	
		</div>
	</div>
@include('layouts.footer')