@include('layouts.header')
    @include('layouts.navbar')
    <div class="position-relative">
    	<section class="services-banner">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-12 col-lg-10">
						<h1 class="text-main-green font-weight-bolder">Our <span class="text-white">Services</span></h1>
					</div>
				</div>
			</div>
		</section>
		<section class="position-relative" style="top: -80px">
			<div class="container">
				<div class="row">
					<div class="col-12 col-md-4 mb-4">
						<div class="card border-0">
							<img src="/images/assets/build.jpg" class="card-img-top img-fluid">
							<div class="card-body bg-main-ash">
								<p>Construction</p>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-4 mb-4">
						<div class="card border-0">
							<img src="/images/assets/real.jpg" class="card-img-top img-fluid">
							<div class="card-body bg-main-ash">
								<p>Real Estate</p>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-4">
						<div class="card border-0">
							<img src="/images/assets/consult.jpg" class="card-img-top img-fluid">
							<div class="card-body bg-main-ash">
								<p>Consultancy</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
    </div>
	@include('layouts.bottom')
@include('layouts.footer')