@include('layouts.header')
    @include('layouts.navbar')
    <div class="position-relative border-bottom">
    	<section class="artisan-banner">
			<div class="container">
				<div class="row">
					<div class="col-12 col-md-8 col-lg-10">
						<div class="d-flex align-items-center">
							<div class="d-block bg-white mr-3" style="width: 40px; height: 1px;"></div>
							<div class="text-main-green font-weight-bolder mr-3">Global Professional</div>
							<div class="">
								<small class="text-white font-weight-lighter">
									<i class="icofont-ui-search"></i>
								</small>
							</div>
						</div>
						<h1 class="text-white mb-4">Find <span class="text-main-green">Artisans</span> that meet your professional goals in any industry.</h1>
						{{-- <div class="">
							<form class="search-artisan-form" action="javascript:;">
								<div class="form-row">
									<div class="form-group col-12 col-md-10 mb-4">
										<div class="input-group-lg">
											<input type="text" class="form-control artisan" name="artisan" placeholder="Search name, skill, area">
										</div>
										<span class="invalid-feedback text-main-red d-none"></span>
									</div>
									<div class="col-12 col-md-2 mb-4">
										<button type="submit" class="btn btn-lg bg-main-green btn-block text-white artisan-search-button mb-4">
									        <img src="/images/spinner.svg" class="mr-2 d-none artisan-search-spinner mb-1">
									        Search
									    </button>
									</div>
								</div>
							</form>
						</div> --}}
					</div>
				</div>
				<div class="row">
					<?php for ($i = 1; $i < 7; $i++): ?>
						<div class="col-12 col-md-4 col-lg-3 mb-4">
							<div class="card bg-transparent border-0 p-0">
								<div class="" style="height: 380px;">
									<img src="/images/artisans/{{ $i }}.jpg" class="img-fluid border object-cover h-100 card-img-top w-100">
								</div>
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
					<?php endfor; ?>
				</div>
			</div>
		</section>
    </div>
	@include('layouts.bottom')
@include('layouts.footer')