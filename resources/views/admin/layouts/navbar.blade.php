<div class="fixed-top bg-white">
	<div class="py-3">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<ul class="d-flex">
				<li class="mr-3 cursor-pointer bg-violet navbar-icon text-center">
			    	<a href="{{ route('admin'); }}" class="text-decoration-none">
			    		<small class="text-dark">Dashboard</small>
			    	</a>
			    </li>
			</ul>
			<ul class="d-flex align-items-center">
				<div class="cursor-pointer position-relative mr-3">
					<div class="rounded-circle position-absolute bg-danger text-center" style="height: 18.5px; line-height: 18.5px; width: 18.5px; top: -7.5px; right: -7.5px; z-index: 2;">
						<small class="text-white" style="font-size: 10px;">56</small>
					</div>
					<div style="transform: rotate(-20deg);">
						<i class="icofont-notification"></i>
					</div>
				</div>
			    <div data-url="{{ route('logout'); }}" class="cursor-pointer text-center mr-3">
			    	<i class="icofont-power text-danger"></i>
			    </div>
				<div class="cursor-pointer backend-navigation-menu-icon text-center">
			    	<i class="icofont-navigation-menu text-dark"></i>
			    </div>
			</ul>
		</div>
	</div>
</div>

