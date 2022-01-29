{{-- @include('layouts.header')
    @include('frontend.layouts.navbar')
    <div class="bg-main-ash min-vh-100 position-relative">
    	<section class="artisan-banner" style="padding: 140px 0;">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12 col-md-6 col-lg-8">
						<div class="mb-3">
							<h3 class="text-main-dark">Global Artisans</h3>
							<div class="text-main-dark">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod laboris nisi ut aliquip ex ea commodo  Duis aute irure dolor in</div>
						</div>
					</div>
				</div>
				<div class="row">
					<?php $artisans = ['names' => ['Paul Mainly', 'Reni Black', 'Jim Collins', 'Belim Naha', 'Uche Desmond', 'Hosea Nie', 'Acham Kelly'], 'location' => ['Paris, France', 'Sydney Australia', 'Austin, USA', null, 'Manchester, UK', '', 'Abuja Nigeria']]; ?>
					<?php for ($i = 1; $i < 7; $i++): ?>
						<div class="col-12 col-md-4 col-lg-3">
							@include('frontend.artisans.partials.card')	
						</div>
					<?php endfor; ?>
				</div>
			</div>
		</section>
    </div>
	@include('frontend.layouts.bottom')
@include('layouts.footer') --}}