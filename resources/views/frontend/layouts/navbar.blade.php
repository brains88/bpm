<div class="fixed-top bg-white border-bottom">
    <div class="">
        <div class="container-fluid">
            <div class="navbar-items py-4 px-0 d-flex align-items-center justify-content-between">
                <a href="{{ route('home') }}" class="logo-wrapper">
                  <img src="/images/logos/logo.png" class="img-fluid object-cover" alt="Geohomes Logo">
                </a>
                <ul class="navbar-center d-flex align-items-center">
                  <?php $uri = str_replace('/', '', request()->route()->uri); ?>
                    <li class="mr-3">
                        <a href="{{ route('home') }}" class="text-decoration-none">
                            <small class="text-main-dark">Home</small>
                        </a>
                    </li>
                    <li class="mr-3">
                        <a href="{{ route('about') }}" class="text-decoration-none">
                            <small class="text-main-dark">About</small>
                        </a>
                    </li>
                    <li class="dropdown mr-3">
                        <a class="text-decoration-none" href="javascript:;" id="nav-services" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <small class="">
                                <span class="text-main-dark">Services</span>
                                <span class="text-theme-color position-relative" style="top: 1px;">
                                    <i class="icofont-caret-down"></i>
                                </span>
                            </small>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right icon-raduis border-0 shadow" aria-labelledby="nav-services">
                            <a class="dropdown-item" href="javascript:;">
                                <small class="text-dark">Artisans</small>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:;">
                                <small class="text-dark">Agents</small>
                            </a>
                        </div>
                    </li>
                    <li class="dropdown mr-3">
                        <a class="text-decoration-none" href="javascript:;" id="nav-products" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <small class="">
                                <span class="text-main-dark">Properties</span>
                                <span class="text-theme-color position-relative" style="top: 1px;">
                                    <i class="icofont-caret-down"></i>
                                </span>
                            </small>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right icon-raduis border-0 shadow" aria-labelledby="nav-products">
                            <a class="dropdown-item" href="{{ route('properties') }}">
                                <small class="text-dark">Properties</small>
                            </a>
                        </div>
                    </li>
                    <li class="dropdown mr-3">
                        <a class="text-decoration-none" href="javascript:;" id="nav-products" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <small class="">
                                <span class="text-main-dark">Products</span>
                                <span class="text-theme-color position-relative" style="top: 1px;">
                                    <i class="icofont-caret-down"></i>
                                </span>
                            </small>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right icon-raduis border-0 shadow" aria-labelledby="nav-products">
                            <a class="dropdown-item" href="javascript:;">
                                <small class="text-dark">Building Materials</small>
                            </a>
                        </div>
                    </li>
                    <li class="mr-3">
                        <a href="{{ route('news') }}" class="{{ $uri === 'news' ? 'text-theme-color' : 'text-main-dark' }} text-decoration-none">
                            <small>News</small>
                        </a>
                    </li>
                    <li class="mr-3">
                        <a href="{{ route('contact') }}" class="{{ $uri === 'contact' ? 'text-theme-color' : 'text-main-dark' }} text-decoration-none">
                            <small>Contact</small>
                        </a>
                    </li>
                </ul>
                <div class="d-flex align-items-center navbar-right">
                    <div class="dropdown text-main-ash cursor-pointer mr-3">
                        <div class="" id="global-languages" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icofont-globe"></i>
                        </div>
                        <div class="dropdown-menu card-raduis border-0 shadow dropdown-menu-right" aria-labelledby="global-languages">
                            <a class="dropdown-item" href="javascript:;">
                                <small class="text-main-dark">French</small>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:;">
                                <small class="text-main-dark">Russian</small>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:;">
                                <small class="text-main-dark">German</small>
                            </a>
                        </div>
                    </div>
                    <a class="d-flex mr-3" href="{{ route('login') }}">
                        <small class="text-main-dark">Login</small>
                    </a>
                    <div class="">
                        <a href="{{ route('signup') }}" class="btn icon-raduis px-4 text-white bg-theme-color">Signup for free</a>
                    </div>
                    @if(auth()->check())
                        <div class="dropdown cursor-pointer rounded-circle bg-theme-color ml-3" style="width: 30px; height: 30px;">
                            <small class="text-center d-block mt-1" id="website-user-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <small class="text-white">
                                    <i class="icofont-ui-user"></i>
                                </small>
                            </small>
                            <div class="dropdown-menu card-raduis border-0 shadow dropdown-menu-right" aria-labelledby="website-user-icon">
                                <a class="dropdown-item" href="{{ route('user.profile') }}">
                                <span class="text-theme-color mr-1">
                                  <i class="icofont-login"></i>
                                </span>
                                <span class="text-main-dark">My Profile</span>
                                </a>
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}">
                                    <span class="text-theme-color mr-1">
                                      <i class="icofont-ui-play"></i>
                                    </span>
                                <span class="text-main-dark">Logout</span>
                                </a>
                            </div>
                        </div>
                     @endif
                </div>
                <div class="hanburger-icon ml-3 position-relative justify-content-center m-0 p-0 align-items-center cursor-pointer">
                    <div class="icon-lines"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="navbar-menu shadow no-gutters bg-white position-fixed vh-100">
    <div class="menu-content vh-100 px-3 mt-4 pb-5">
        <a href="{{ url('/') }}" class="d-block px-3 bg-alabaster text-violet py-3 mb-3">
            <small class="m-0">Home</small>
        </a>
        <a href="{{ url('/about') }}" class="d-block px-3 bg-alabaster text-violet py-3 mb-3">
            <small class="m-0">About</small>
        </a>
        <a href="{{ url('/contact') }}" class="d-block px-3 bg-alabaster text-violet py-3 mb-3">
            <small class="m-0">Contact</small>
        </a>
        <a href="{{ url('/pricing') }}" class="d-block px-3 bg-alabaster text-violet py-3 mb-3">
            <small class="m-0">Pricing</small>
        </a>
        @if(auth()->check())
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('admin') }}" class="d-block px-3 bg-alabaster text-violet py-3 mb-3">
                    <small class="m-0">Dashboard</small>
                </a>
                @else
                <a href="{{ route('user') }}" class="d-block px-3 bg-alabaster text-violet py-3 mb-3">
                    <small class="m-0">My Account</small>
                </a>
            @endif
        @else
            <a href="{{ url('/login') }}" class="d-block px-3 bg-alabaster text-violet py-3 mb-3">
                <small class="m-0">Login</small>
            </a>
            <a href="{{ url('/signup') }}" class="d-block px-3 bg-alabaster text-violet py-3 mb-3">
                <small class="m-0">Signup</small>
            </a>
        @endif
    </div>
</div>