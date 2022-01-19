@include('layouts.header')
<div class="py-4">
	<div class="container">
		@if(empty($memberships->count()))
			<div class="alert alert-danger">No membership plans listed</div>
		@else
			<div class="row">
				@foreach($memberships as $plan)
					<div class="col-12 col-md-4 col-lg-3 mb-2">
						<div class="alert alert-info">
							<h4 class="">
								{{ ucwords($plan->name) }} ({{ ucwords($plan->duration) }})
							</h4>
							<h3>
								${{ number_format($plan->price) }}
							</h3>
							@if(auth()->check())
                            	<a href="{{ route('user') }}" class="btn btn-dark px-4">To dashboard</a>
							@else
								<a href="{{ route('signup') }}" class="btn btn-dark px-4">Get started</a>
							@endif
						</div>
					</div>
				@endforeach
			</div>
		@endif
	</div>
</div>
@include('layouts.footer')