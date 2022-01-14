@include('layouts.header')
<div class="">
	<div class="container">
		@if(empty($plans->count()))
			<div class="alert alert-danger">No Plans Listed</div>
		@else
			<div class="row">
				@foreach($plans as $plan)
					<div class="col-12 col-md-4 col-lg-3 mb-2">
						<div class="alert alert-info">
							<h5 class="mb-3">{{ ucwords($plan->name) }} ({{ ucwords($plan->duration) }})</h5>
							<p>{{ empty($plan->currency) ? '$' : $plan->currency }}{{ $plan->price }}</p>
							@if(auth()->check())
								<a href="{{ route('pay') }}" class="btn btn-dark px-4">Subscribe</a>
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