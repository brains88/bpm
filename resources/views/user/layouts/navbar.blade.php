<div class="fixed-top bg-main-dark">
    @if(auth()->check())
        <small class="bg-success d-block text-center text-white py-1"></small>
    @else
        <small class="bg-danger d-block text-center text-white py-1"></small>
    @endif
	<div class="container">
        <div class="d-flex border-bottom-dark-500 py-3 align-items-center justify-content-between">
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
                    <small class="user-icon text-center bg-info text-white mr-3 icon-raduis">
                        <a href="{{ route('user.profile') }}" class="text-decoration-none text-white">
	                        <small>
	                        	<i class="icofont-ui-user"></i>
	                        </small>
	                   </a>
                    </small> 
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

