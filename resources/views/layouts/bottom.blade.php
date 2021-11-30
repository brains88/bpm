<footer class="position-relative">
	<section class="bottom-section border-top-dark-500 position-relative">
		<div class="container">
			<div class="row border-bottom-dark-500 pb-5 mb-5">
				<div class="col-12 col-md-4 col-lg-3 mb-4">
					<h4 class="text-theme-color mb-4">Global Properties</h4>
					<?php $countries = App\Models\Country::skip(55)->take(700)->get()->random(5); ?>
					@empty($countries->count())
						<div class="alert alert-info">No Countries Listed.</div>
					@else
						@foreach($countries as $country)
							<a href="{{ route('properties.country', ['country' => strtolower(str_replace(' ', '', $country->code_alpha3)) ]) }}" class="text-white p-3 text-decoration-none mb-3 border-dark-500 rounded bg-main-dark d-block">
								{{ ucwords($country->name) }}
							</a>
						@endforeach
					@endempty
				</div>
				<div class="col-12 col-md-4 col-lg-3 mb-4">
					<h4 class="text-theme-color mb-4">About Us</h4>
					<a href="{{ route('about') }}" class="text-white p-3 text-decoration-none mb-3 border-dark-500 rounded bg-main-dark d-block">Our Company</a>

					<a href="{{ route('news') }}" class="text-white p-3 text-decoration-none mb-3 border-dark-500 rounded bg-main-dark d-block">News</a>

					<a href="javascript:;" class="text-white p-3 text-decoration-none mb-3 border-dark-500 rounded bg-main-dark d-block">Terms Of Use</a>
					<a href="javascript:;" class="text-white p-3 text-decoration-none mb-3 border-dark-500 rounded bg-main-dark d-block">Privacy Policy</a>
					<a href="javascript:;" class="text-white p-3 text-decoration-none mb-3 border-dark-500 rounded bg-main-dark d-block">Blog</a>
				</div>
				<div class="col-12 col-md-4 col-lg-3 mb-4">
					<h4 class="text-theme-color mb-4">Our Services</h4>
					<a href="{{ route('properties') }}" class="text-white p-3 text-decoration-none mb-3 border-dark-500 rounded bg-main-dark d-block">Real Estate</a>
					<a href="javascript:;" class="text-white p-3 text-decoration-none mb-3 border-dark-500 rounded bg-main-dark d-block">Construction</a>
					<a href="{{ route('home') }}" class="text-white p-3 text-decoration-none mb-3 border-dark-500 rounded bg-main-dark d-block">Consultancy</a>
					<a href="javascript:;" class="text-white p-3 text-decoration-none mb-3 border-dark-500 rounded bg-main-dark d-block">Bulding Materials</a>
					<a href="{{ route('home') }}" class="text-white p-3 text-decoration-none mb-3 border-dark-500 rounded bg-main-dark d-block">Surveying</a>
				</div>
				<div class="col-12 col-md-4 col-lg-3">
					<h4 class="text-theme-color mb-4">Our Community</h4>
					<a href="{{ route('agents') }}" class="text-white p-3 text-decoration-none mb-3 border-dark-500 rounded bg-main-dark d-block">Agents</a>
					<a href="javascript:;" class="text-white p-3 text-decoration-none mb-3 border-dark-500 rounded bg-main-dark d-block">Partners</a>
					<a href="{{ route('artisans') }}" class="text-white p-3 text-decoration-none mb-3 border-dark-500 rounded bg-main-dark d-block">Artisans</a>
					<a href="javascript:;" class="text-white p-3 text-decoration-none mb-3 border-dark-500 rounded bg-main-dark d-block">Customers</a>
					<a href="javascript:;" class="text-white p-3 text-decoration-none mb-3 border-dark-500 rounded bg-main-dark d-block">Realtors</a>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-md-5 col-lg-4 mb-4">
					<div class="">
						<h4 class="text-theme-color mb-4">Our Newsletter</h4>
						<div class="mb-4 text-white p-3 border-dark-500 rounded bg-main-dark">Subscribe to our newsletter to get latest updates from our global properties hub</div>
						<form class="p-4 border-dark-500 rounded mb-4">
							<div class="form-group input-group-lg">
								<label class="text-white">Email</label>
								<input type="email" name="newsletter" class="form-control" placeholder="Enter your email">
							</div>
							<button type="submit" class="btn btn-lg bg-theme-color btn-block text-white login-button mb-4">
						        <img src="/images/spinner.svg" class="mr-2 d-none login-spinner mb-1">
						        Subscribe
						    </button>
						</form>
					</div>
					<div class="row mb-4">
						<div class="col-6">
							<a href="javascript:;">
								<img src="/images/assets/gplay.png" class="img-fluid">
							</a>
						</div>
						<div class="col-6">
							<a href="javascript:;">
								<img src="/images/assets/istore.png" class="img-fluid">
							</a>
						</div>
					</div>
					<div class="p-3 border-dark-500">
						<h4 class="text-white mb-3 rounded">To send a message, <a href="{{ route('contact') }}" class="text-decoration-underline">Click Here</a>. To call us now, click the number below.</h4>
						<a href="tel:{{ env('BEST_PROPERTY_MARKET_PHONE') }}" class="btn btn-lg bg-theme-color d-block text-white mb-2">
							{{ env('BEST_PROPERTY_MARKET_PHONE') }}
						</a>
					</div>
				</div>
				<div class="col-12 col-md-7 col-lg-8 mb-4">
					<div class="w-100 h-100" id="contactmap">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.6468249831787!2d7.492911815325601!3d6.439381725920649!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1044a3d8f51f6071%3A0x6b07f5ee68d7e660!2s26%20Moorehouse%20St%2C%20Ogui%20400001%2C%20Enugu!5e0!3m2!1sen!2sng!4v1637755718285!5m2!1sen!2sng" allowfullscreen="" loading="lazy" class="w-100 h-100 rounded"></iframe>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="py-4 bg-main-dark border-top-dark-500">
		<div class="container">
			<div class="text-white m-0">&copy Copyright Geohomes Services Limited {{ date('Y') === '2021' ? date('Y') : '2021 - '. date('Y') }}</div>
		</div>
	</section>
</footer>
