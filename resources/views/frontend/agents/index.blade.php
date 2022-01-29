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
				<div class="row">
					<?php $agents = ['names' => ['Paul Mainly', 'Reni Black', 'Jim Collins', 'Belim Naha', 'Uche Desmond', 'Hosea Nie', 'Acham Kelly'], 'location' => ['Paris, France', 'Sydney, Australia', 'Austin, USA', null, 'Manchester, UK', '', 'Abuja, Nigeria']]; ?>
					<?php for ($i = 1; $i < 7; $i++): ?>
						<div class="col-12 col-md-4 col-lg-3 mb-4">
							@include('frontend.agents.partials.card')	
						</div>
					<?php endfor; ?>
				</div>
			</div>
		</section>
    </div>
	@include('frontend.layouts.bottom')
@include('layouts.footer')