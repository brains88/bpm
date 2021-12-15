<div class="fixed-top bg-white border-bottom">
	<div class="topbar bg-main-dark py-2">
		<div class="container">
			<div class="d-flex justify-content-between">
				<div class="d-flex align-items-center">
					<a href="tel:{{ env('BEST_PROPERTY_MARKET_PHONE') }}" class="d-flex align-items-center text-decoration-none mr-3">
						<span class="text-tillgreen mr-2">Call</span>
						<span class="text-white">{{ env('BEST_PROPERTY_MARKET_PHONE') }}</span>
					</a>
				</div>
				<div class="d-flex align-items-center">
					<div class="dropdown cursor-pointer text-tillgreen position-relative">
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
	<div class="bg-white">
		<div class="container">
			<div class="navbar-items py-4 px-0 d-flex align-items-center justify-content-between">
				<a href="{{ route('home') }}" class="logo-wrapper">
					<img src="/images/logos/logo.png" class="img-fluid object-cover" alt="Geohomes Logo">
				</a>
				<ul class="navbar-center d-flex align-items-center">
					<?php $uri = str_replace('/', '', request()->route()->uri); ?>
					<li class="mr-3">
						<a href="{{ route('home') }}" class="{{ $uri === '' ? 'text-tillgreen' : 'text-main-dark' }} text-decoration-none font-weight-bolder">Home</a>
					</li>
					<li class="mr-3">
						<a href="{{ route('about') }}" class="{{ $uri === 'about' ? 'text-tillgreen' : 'text-main-dark' }} text-decoration-none font-weight-bolder">About</a>
					</li>
					<li class="mr-3">
						<a href="{{ route('services') }}" class="{{ $uri === 'services' ? 'text-tillgreen' : 'text-main-dark' }} text-decoration-none font-weight-bolder">Services</a>
					</li>
					<li class="mr-3 position-relative">
						<small class="position-absolute bg-theme-color rounded text-center text-white px-1" style="top: -5px; right: -7.5px; font-size: 8px;">New</small>
						<a href="{{ route('properties') }}" class="{{ $uri === 'properties' ? 'text-tillgreen' : 'text-main-dark' }} text-decoration-none font-weight-bolder">Properties</a>
					</li>
					<li class="mr-3">
						<a href="{{ route('agents') }}" class="{{ $uri === 'agents' ? 'text-tillgreen' : 'text-main-dark' }} text-decoration-none font-weight-bolder">Agents</a>
					</li>
					<li class="mr-3">
						<a href="{{ route('news') }}" class="{{ $uri === 'news' ? 'text-tillgreen' : 'text-main-dark' }} text-decoration-none font-weight-bolder">News</a>
					</li>
					<li class="mr-3">
						<a href="{{ route('artisans') }}" class="{{ $uri === 'artisans' ? 'text-tillgreen' : 'text-main-dark' }} text-decoration-none font-weight-bolder">Artisans</a>
					</li>
					<li class="mr-3">
						<a href="{{ route('contact') }}" class="{{ $uri === 'contact' ? 'text-tillgreen' : 'text-main-dark' }} text-decoration-none font-weight-bolder">Contact</a>
					</li>
				</ul>
				<div class="d-flex align-items-center navbar-right">
					{{-- <div class="d-flex align-items-center nav-auth">
						<a href="{{ route('login') }}" class="mr-3 px-3 text-tillgreen btn border-tillgreen bg-white">Login</a>
						<a href="{{ route('signup') }}" class="px-3 text-white btn bg-tillgreen">Signup</a>
					</div> --}}
					<div class="mr-3">
						<div class="dropdown cursor-pointer bg-main-dark text-tillgreen rounded-icon rounded-circle position-relative">
							<div class="status-notify rounded-circle position-absolute border bg-theme-color" style="width: 10px; height: 10px; top: 4px; right: -4px"></div>
							<div id="website-user-icon" data-toggle="dropdown" aria-expanded="false">
								<i class="icofont-ui-user"></i>
							</div>
							<div class="dropdown-menu border-0 shadow dropdown-menu-right" aria-labelledby="website-user-icon">
							    <a class="dropdown-item" href="{{ route('login') }}">
							    	<span class="text-tillgreen mr-1">
							    		<i class="icofont-login"></i>
							    	</span>
							    	<span class="text-main-dark">Login</span>
							    </a>
							    <div class="dropdown-divider"></div>
							    <a class="dropdown-item" href="{{ route('signup') }}">
							    	<span class="text-tillgreen mr-1">
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
	<div class="menu-content vh-100 px-3 mt-5 pb-5">
		<a href="{{ url('/') }}" class="d-block px-3 bg-main-ash text-main-dark py-3 mb-3">
			<div class="m-0">Home</div>
		</a>
		<a href="{{ url('/about') }}" class="d-block px-3 bg-main-ash text-main-dark py-3 mb-3">
			<div class="m-0">About</div>
		</a>
		<a href="{{ url('/contact') }}" class="d-block px-3 bg-main-ash text-main-dark py-3 mb-3">
			<div class="m-0">Contact</div>
		</a>
		<a href="{{ url('/properties') }}" class="d-block px-3 bg-main-ash text-main-dark py-3 mb-3">
			<p class="m-0">Properties</div>
		</a>
		@if(auth()->check())
			@if(auth()->user()->role === 'admin')
				<a href="{{ route('admin.dashboard') }}" class="d-block px-3 bg-main-ash text-main-dark py-3 mb-3">
					<div class="m-0">Dashboard</div>
				</a>
			@else
				<a href="{{ route('user.dashboard') }}" class="d-block px-3 bg-main-ash text-main-dark py-3 mb-3">
					<div class="m-0">My Account</div>
				</a>
			@endif
		@else
			<a href="{{ url('/login') }}" class="d-block px-3 bg-main-ash text-main-dark py-3 mb-3">
				<div class="m-0">Login</div>
			</a>
			<a href="{{ url('/signup') }}" class="d-block px-3 bg-main-ash text-main-dark py-3 mb-3">
				<div class="m-0">Signup</div>
			</a>
		@endif
	</div>
</div>