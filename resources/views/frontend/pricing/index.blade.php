@include('layouts.header')
<div class="py-4">
	<div class="container">
		@if(empty($plans->count()))
			<div class="alert alert-danger">No Plans Listed</div>
		@else
			<div class="row">
				@foreach($plans as $plan)
					<div class="col-12 col-md-4 col-lg-3 mb-2">
						<div class="alert alert-info">
							<h5 class="mb-3">{{ ucwords($plan->name) }} ({{ ucwords($plan->duration) }})</h5>
							<?php $currency = empty($plan->currency->symbol) ? '$' : $plan->currency->symbol; ?>
							<p>{{ $currency.$plan->price }}</p>
							@if(auth()->check())
								<form class="subscription-payment-initialization-form-{{ $plan->id }}" method="post" action="javascript::" data-action="{{ route('subscription.payment.initialize') }}">
									<input type="hidden" name="amount" value="{{ (int)$plan->price }}">
									<input type="hidden" name="plan" value="{{ (int)$plan->id }}">
									<div class="alert mb-3 subscription-payment-initialization-message-{{ $plan->id }} d-none"></div>
		                            <div class="d-flex justify-content-right mb-3 mt-1">
		                                <button type="submit" class="btn btn-info px-4 btn-lg text-white subscription-payment-initialization-button-{{ $plan->id }}">
		                                    <img src="/images/spinner.svg" class="mr-2 d-none subscription-payment-initialization-spinner-{{ $plan->id }} mb-1">
		                                    Pay ({{ $currency.$plan->price }})
		                                </button>
		                            </div>
								</form>
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