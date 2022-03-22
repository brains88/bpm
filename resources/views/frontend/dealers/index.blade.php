@include('layouts.header')
    @include('frontend.layouts.navbar')
    <div class="bg-main-ash min-vh-100 position-relative">
    	<section class="dealer-banner" style="padding: 140px 0;">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12 col-md-6 col-lg-8">
						<div class="mb-3">
							<h3 class="text-main-dark">Dealers</h3>
							<div class="text-main-dark">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod laboris nisi ut aliquip ex ea commodo  Duis aute irure dolor in</div>
						</div>
					</div>
				</div>
				@if(empty($dealers->count()))
					<div class="alert alert-info">No dealers listed</div>
				@else
					<div class="row">
						@foreach ($dealers as $dealer)
							<div class="col-12 col-md-4 col-lg-3">
								@include('frontend.dealers.partials.card')	
							</div>
						@endforeach
					</div>
					{{ $dealers->appends(request()->query())->links('vendor.pagination.default') }}
				@endif
			</div>
		</section>
    </div>
	@include('frontend.layouts.bottom')
@include('layouts.footer')