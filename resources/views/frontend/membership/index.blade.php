@include('layouts.header')
    @include('frontend.layouts.navbar')
    <div class="bg-main-ash">
        <div class="membership-banner position-relative">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12 col-md-8 col-lg-6 mb-4">
						<h1 class="text-main-dark mb-4 text-shadow-white">Our Memberships</h1>
						<div class="text-white text-shadow-dark">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua.</div>
					</div>
				</div>
				@if(empty($memberships->count()))
					<div class="alert alert-danger">No membership plans listed</div>
				@else
					<div class="row no-gutters mb-4">
						@foreach($memberships as $plan)
							<div class="col-12 col-md-4 col-lg-3">
								<div class="card border-bottom rounded-0 shadow">
									<div class="card-body">
										<h5 class="mb-3">
											{{ ucwords($plan->name) }} ({{ ucwords($plan->duration) }})
										</h5>
										<h6 class="mb-4">
											NGN{{ number_format($plan->price) }}
										</h6>
										<div class="mb-2">
											@if(auth()->check())
				                            	<a href="{{ route('user.dashboard') }}" class="btn btn-info rounded-0 px-4">To dashboard</a>
											@else
												<a href="{{ route('signup') }}" class="btn btn-info rounded-0 px-4">Get started</a>
											@endif
										</div>
									</div>
								</div>
							</div>
						@endforeach
					</div>
					<h5 class="text-main-dark">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut.</h5>
				@endif
			</div>
		</div>
	</div>
	@include('frontend.layouts.bottom')
@include('layouts.footer')