<div class="fixed-top bg-main-dark border-bottom-dark-500">
    @if(auth()->check())
        <small class="bg-success d-block text-center text-white py-1"></small>
    @else
        <small class="bg-danger d-block text-center text-white py-1"></small>
    @endif
	<div class="container">
        <div class="d-flex py-3 align-items-center justify-content-between">
            <div class="">
                <h5 class="m-0">
                	<a href="{{ route('user') }}" class="text-white text-decoration-none">Dashboard</a>
                </h5>
            </div>
        	<div class="d-flex align-items-center">
        		<div class="d-flex align-items-center">
                    <small class="user-icon text-center bg-dark text-white mr-3 icon-raduis">
                        <small class="">
                        	<i class="icofont-settings"></i>
                        </small>
                    </small>
                    <div class="dropdown">
                        <a href="javascript:;" class="align-items-center d-flex text-decoration-none
                        " id="promote-{{ auth()->user()->id }}" data-toggle="dropdown">
                            <small class="user-icon text-center bg-info text-white mr-3 icon-raduis">
                                <small>
                                    <i class="icofont-ui-user"></i>
                                </small>
                            </small>
                        </a>
                        <div class="dropdown-menu border-0 card-raduis shadow dropdown-menu-right" aria-labelledby="promote-{{ auth()->user()->id }}" style="width: 210px !important;">
                            <a href="{{ route('user.profile') }}" class="dropdown-item text-dark">
                                My Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}" class="dropdown-item text-danger">
                                Logout
                            </a>
                        </div>
                    </div>   
                </div>
            	<div class="d-flex">
                    <small class="user-icon text-center bg-dark text-white icon-raduis">
                        <small>
                        	<i class="icofont-navigation-menu"></i>
                        </small>
                    </small>
                </div>
        	</div>
        </div>
    </div>
</div>

