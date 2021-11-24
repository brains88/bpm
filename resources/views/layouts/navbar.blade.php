<div class="fixed-top bg-white border-bottom">
	<div class="topbar bg-main-dark py-2">
		<div class="container">
			<div class="d-flex justify-content-between">
				<div class="d-flex align-items-center">
					<a href="tel:{{ env('GEOHOMES_OFFICIAL_PHONE') }}" class="d-flex align-items-center text-decoration-none mr-3">
						<small class="text-main-green mr-2">
							<i class="fa-solid fa-phone"></i>
						</small>
						<span class="text-white">{{ env('GEOHOMES_OFFICIAL_PHONE') }}</span>
					</a>
				</div>
				<div class="d-flex align-items-center">
					<div class="dropdown cursor-pointer text-main-green position-relative">
						<div id="website-user-icon" data-toggle="dropdown" aria-expanded="false">
							En <i class="icofont-caret-down"></i>
						</div>
						<div class="dropdown-menu border-0 shadow dropdown-menu-right" aria-labelledby="website-user-icon">
						    <a class="dropdown-item" href="javascript:;">
						    	<small class="text-main-dark">English</small>
						    </a>
						    <div class="dropdown-divider"></div>
						    <a class="dropdown-item" href="javascript:;">
						    	<small class="text-main-dark">French</small>
						    </a>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
	<div class="">
		<div class="container">
			<div class="navbar-items py-4 px-0 d-flex align-items-center justify-content-between">
				<a href="{{ route('home') }}" class="logo-wrapper">
					<img src="/images/logos/logo.png" class="img-fluid object-cover" alt="Geohomes Logo">
				</a>
				<ul class="navbar-center d-flex align-items-center">
					<?php $uri = str_replace('/', '', request()->route()->uri); ?>
					<li class="mr-3">
						<a href="{{ route('home') }}" class="{{ $uri === '' ? 'text-main-green' : 'text-main-dark' }} text-decoration-none">Home</a>
					</li>
					<li class="mr-3">
						<a href="{{ route('about') }}" class="{{ $uri === 'about' ? 'text-main-green' : 'text-main-dark' }} text-decoration-none">About</a>
					</li>
					<li class="mr-3">
						<a href="{{ route('services') }}" class="{{ $uri === 'services' ? 'text-main-green' : 'text-main-dark' }} text-decoration-none">Services</a>
					</li>
					<li class="mr-3 position-relative">
						<small class="position-absolute bg-main-red rounded text-center text-white px-1" style="top: -5px; right: -7.5px; font-size: 8px;">New</small>
						<a href="{{ route('properties') }}" class="{{ $uri === 'properties' ? 'text-main-green' : 'text-main-dark' }} text-decoration-none">Properties</a>
					</li>
					<li class="mr-3">
						<a href="{{ route('agents') }}" class="{{ $uri === 'agents' ? 'text-main-green' : 'text-main-dark' }} text-decoration-none">Agents</a>
					</li>
					<li class="mr-3">
						<a href="{{ route('news') }}" class="{{ $uri === 'news' ? 'text-main-green' : 'text-main-dark' }} text-decoration-none">News</a>
					</li>
					<li class="mr-3">
						<a href="{{ route('artisans') }}" class="{{ $uri === 'artisans' ? 'text-main-green' : 'text-main-dark' }} text-decoration-none">Artisans</a>
					</li>
					<li class="mr-3">
						<a href="{{ route('contact') }}" class="{{ $uri === 'contact' ? 'text-main-green' : 'text-main-dark' }} text-decoration-none">Contact</a>
					</li>
				</ul>
				<div class="d-flex align-items-center navbar-right">
					<div class="mr-3">
						<div class="dropdown cursor-pointer bg-main-dark text-main-green rounded-icon rounded-circle position-relative">
							<div class="status-notify rounded-circle position-absolute border bg-main-red" style="width: 10px; height: 10px; top: 4px; right: -4px"></div>
							<div id="website-user-icon" data-toggle="dropdown" aria-expanded="false">
								<i class="icofont-ui-user"></i>
							</div>
							<div class="dropdown-menu border-0 shadow dropdown-menu-right" aria-labelledby="website-user-icon">
							    <a class="dropdown-item" href="{{ route('login') }}">
							    	<span class="text-main-green mr-1">
							    		<i class="icofont-login"></i>
							    	</span>
							    	<span class="text-main-dark">Login</span>
							    </a>
							    <div class="dropdown-divider"></div>
							    <a class="dropdown-item" href="{{ route('signup') }}">
							    	<span class="text-main-green mr-1">
							    		<i class="icofont-ui-play"></i>
							    	</span>
							    	<span class="text-main-dark">Signup</span>
							    </a>
							</div>
						</div>
					</div>
					<div class="">
						<div class="hanburger-icon position-relative d-flex justify-content-center m-0 p-0 align-items-center cursor-pointer">
							<div class="icon-lines"></div>
						</div>
				    </div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="navbar-menu shadow no-gutters bg-white position-fixed vh-100">
	<div class="menu-content vh-100 px-3 mt-4 pb-5">
		<a href="{{ url('/') }}" class="d-block px-3 bg-alabaster text-violet py-3 mb-3">
			<p class="m-0">Home</p>
		</a>
		<a href="{{ url('/about') }}" class="d-block px-3 bg-alabaster text-violet py-3 mb-3">
			<p class="m-0">About</p>
		</a>
		<a href="{{ url('/contact') }}" class="d-block px-3 bg-alabaster text-violet py-3 mb-3">
			<p class="m-0">Contact</p>
		</a>
		<a href="{{ url('/pricing') }}" class="d-block px-3 bg-alabaster text-violet py-3 mb-3">
			<p class="m-0">Pricing</p>
		</a>
		@if(auth()->check())
			@if(auth()->user()->role === 'admin')
				<a href="{{ route('admin.dashboard') }}" class="d-block px-3 bg-alabaster text-violet py-3 mb-3">
					<p class="m-0">Dashboard</p>
				</a>
			@else
				<a href="{{ route('user.dashboard') }}" class="d-block px-3 bg-alabaster text-violet py-3 mb-3">
					<p class="m-0">My Account</p>
				</a>
			@endif
		@else
			<a href="{{ url('/login') }}" class="d-block px-3 bg-alabaster text-violet py-3 mb-3">
				<p class="m-0">Login</p>
			</a>
			<a href="{{ url('/signup') }}" class="d-block px-3 bg-alabaster text-violet py-3 mb-3">
				<p class="m-0">Signup</p>
			</a>
		@endif
	</div>
</div>