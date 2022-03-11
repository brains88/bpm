<div class="fixed-top bg-main-dark">
	<div class="container">
        <div class="d-flex py-3 align-items-center justify-content-between">
            <div class="">
                <h5 class="m-0">
                	<a href="{{ route('user.dashboard') }}" class="text-white text-decoration-none">Dashboard</a>
                </h5>
            </div>
        	<div class="d-flex align-items-center">
                <div class="dropdown">
                    <a href="javascript:;" class="text-decoration-none d-block rounded-circle cursor-pointer bg-info text-center" id="user-{{ auth()->id() }}" data-toggle="dropdown" data-offset="35, 15" style="width: 30px; height: 30px; line-height: 25px;">
                        <small class="text-white">
                            <small>
                                <i class="icofont-ui-user"></i>
                            </small>
                        </small>
                    </a>
                    <div class="dropdown-menu border-0 icon-raduis shadow dropdown-menu-right" aria-labelledby="user-{{ auth()->id() }}" style="width: 210px !important;">
                        <a href="{{ route('user.profile') }}" class="dropdown-item">
                            <small class="text-main-dark mr-1">
                                <i class="icofont-ui-user"></i>
                            </small>
                            <small class="text-main-dark">My Profile</small>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}" class="dropdown-item">
                            <small class="text-danger mr-1">
                                <i class="icofont-power"></i>
                            </small>
                            <small class="text-danger">Logout</small>
                        </a>
                    </div>
                </div>
            	<div class="border rounded-circle text-center ml-3" style="width: 30px; height: 30px; line-height: 25px;">
                    <small class="text-white">
                        <small>
                        	<i class="icofont-navigation-menu"></i>
                        </small>
                    </small>
                </div>
        	</div>
        </div>
    </div>
</div>
{{-- <div class="navbar-menu no-gutters bg-white position-fixed vh-100">
    <div class="menu-content vh-100 pb-4">
        @if(auth()->check())
            <div class="bg-main-dark d-flex align-items-center px-3 py-4">
                <div class="bg-theme-color rounded-circle text-center mr-2" style="width: 45px; height: 45px; line-height: 45px;">
                    <small class="text-white">
                        {{ ucfirst(substr(auth()->user()->name, 0, 1)) }}
                    </small>  
                </div>
                <div>
                    <div class="text-white">
                        {{ ucwords(auth()->user()->name) }}
                    </div>
                    <small class="text-muted">
                        {{ auth()->user()->created_at->diffForHumans() }}
                    </small>
                </div>
            </div>
        @endif
        <div class="px-3 py-4">
            <a href="{{ url('/') }}" class="d-block bg-main-ash text-decoration-none text-main-dark px-3 py-3 icon-raduis mb-3">
                <small class="text-main-dark">Home</small>
            </a>
            <a href="{{ url('/about') }}" class="d-block bg-main-ash text-decoration-none text-main-dark px-3 py-3 icon-raduis mb-3">
                <small class="text-main-dark">About</small>
            </a>
            <div class="mb-3">
                <div class="">
                    <a class="d-block bg-main-ash text-decoration-none text-main-dark px-3 py-3 icon-raduis d-flex justify-content-between align-items-center" data-toggle="collapse" href="#property-nav-collapse" aria-expanded="false" aria-controls="property-nav-collapse">
                        <small>Properties</small>
                        <span class="text-theme-color">
                            <i class="icofont-caret-down"></i>
                        </span>
                    </a>
                </div>
                <div class="collapse" id="property-nav-collapse">
                    <div class="card card-body">
                        <a href="{{ route('properties') }}" class="d-flex justify-content-between">
                            <small class="text-main-dark">Properties</small>
                            <small class="bg-danger rounded-pill px-3">
                                <small class="text-white mb-2 tiny-font position-relative" style="top: -1px;">+34</small>
                            </small>
                        </a>
                    </div>
                </div>
            </div>
            <a href="{{ route('blog') }}" class="d-block bg-main-ash text-decoration-none text-main-dark px-3 py-3 icon-raduis mb-3">
                <small class="text-main-dark">Blog</small>
            </a>
            <div class="mb-3">
                <div class="">
                    <a class="d-block bg-main-ash text-decoration-none text-main-dark px-3 py-3 icon-raduis d-flex justify-content-between align-items-center" data-toggle="collapse" href="#services-nav-collapse" aria-expanded="false" aria-controls="services-nav-collapse">
                        <small>Services</small>
                        <span class="text-theme-color">
                            <i class="icofont-caret-down"></i>
                        </span>
                    </a>
                </div>
                <div class="collapse" id="services-nav-collapse">
                    <div class="card card-body">
                        <a href="{{ route('artisans') }}" class="d-flex justify-content-between">
                            <small class="text-main-dark">Artisans</small>
                            <small class="bg-danger rounded-pill px-3">
                                <small class="text-white mb-2 tiny-font position-relative" style="top: -1px;">
                                    +{{ rand(3, 45) }}
                                </small>
                            </small>
                        </a>
                    </div>
                    <div class="card card-body">
                        <a href="{{ route('agents') }}" class="d-flex justify-content-between">
                            <small class="text-main-dark">Agents</small>
                            <small class="bg-danger rounded-pill px-3">
                                <small class="text-white mb-2 tiny-font position-relative" style="top: -1px;">
                                    +{{ rand(9, 28) }}
                                </small>
                            </small>
                        </a>
                    </div>
                </div>
            </div>
            <a href="{{ route('news') }}" class="d-block bg-main-ash text-decoration-none text-main-dark px-3 py-3 icon-raduis mb-3">
                <small class="text-main-dark">News</small>
            </a>
            <a href="{{ route('membership') }}" class="d-block bg-main-ash text-decoration-none text-main-dark px-3 py-3 icon-raduis mb-3">
                <small class="text-main-dark">Membership</small>
            </a>
            <div class="mb-3">
                <div class="">
                    <a class="d-block bg-main-ash text-decoration-none text-main-dark px-3 py-3 icon-raduis d-flex justify-content-between align-items-center" data-toggle="collapse" href="#products-nav-collapse" aria-expanded="false" aria-controls="products-nav-collapse">
                        <small>Products</small>
                        <span class="text-theme-color">
                            <i class="icofont-caret-down"></i>
                        </span>
                    </a>
                </div>
                <div class="collapse" id="products-nav-collapse">
                    <div class="card card-body">
                        <a href="{{ route('materials') }}" class="d-flex justify-content-between">
                            <small class="text-main-dark">Building Materials</small>
                            <small class="bg-danger rounded-pill px-3">
                                <small class="text-white mb-2 tiny-font position-relative" style="top: -1px;">
                                    +{{ rand(16, 68) }}
                                </small>
                            </small>
                        </a>
                    </div>
                </div>
            </div>
            <a href="{{ url('/contact') }}" class="d-block bg-main-ash text-decoration-none text-main-dark px-3 py-3 icon-raduis mb-3">
                <small class="text-main-dark">Contact</small>
            </a>
            @if(!auth()->check())
                <a href="{{ route('login') }}" class="d-block bg-main-ash text-decoration-none text-main-dark px-3 py-3 icon-raduis mb-3">
                    <small class="text-main-dark">Login</small>
                </a>
                <a href="{{ route('signup') }}" class="d-block bg-main-ash text-decoration-none text-main-dark px-3 py-3 icon-raduis mb-3">
                    <small class="text-main-dark">Signup</small>
                </a>
            @endif 
        </div> 
    </div>
</div> --}}

