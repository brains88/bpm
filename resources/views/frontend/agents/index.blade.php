@include('layouts.header')
    @include('frontend.layouts.navbar')
    <div class="bg-main-ash min-vh-100">
    	<section class="agents-banner" style="padding: 140px 0;">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12 col-md-6 col-lg-8">
						<div class="mb-4">
							<h3 class="text-main-dark">Our Agents</h3>
							<div class="text-main-dark">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua.</div>
						</div>
					</div>
				</div>
				@if(empty($agents->count()))
					<div class="alert alert-info">No agents listed</div>
				@else
					<div class="row">
						@foreach ($agents as $agent)
							<div class="col-12 col-md-4 col-lg-3 mb-4">
								@include('frontend.agents.partials.card')	
							</div>
						@endforeach
					</div>
					{{ $agents->appends(request()->query())->links('vendor.pagination.default') }}
				@endif
			</div>
		</section>
    </div>
	@include('frontend.layouts.bottom')
@include('layouts.footer')