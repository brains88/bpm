<div class="fixed-top bg-white">
	<div class="py-3">
		<div class="container">
			<div class="d-flex justify-content-between align-items-center">
				<ul class="d-flex">
					<li class="mr-3 cursor-pointer bg-violet navbar-icon text-center">
				    	<a href="{{ route('admin'); }}" class="text-decoration-none">
				    		<small class="text-dark">Dashboard</small>
				    	</a>
				    </li>
				</ul>
				<ul class="d-flex align-items-baseline">
					<div class="cursor-pointer position-relative mr-3">
						<small class="rounded-pill px-1 position-absolute bg-info text-center" style="top: -7.5px; right: -7.5px; z-index: 2;">
							<small class="text-white">13</small>
						</small>
						<div>
							<i class="icofont-ui-messaging"></i>
						</div>
					</div>
					<div class="cursor-pointer position-relative mr-3">
						<small class="rounded-pill px-1 position-absolute bg-danger text-center" style="top: -7.5px; right: -7.5px; z-index: 2;">
							<small class="text-white">56</small>
						</small>
						<div style="transform: rotate(-20deg);">
							<i class="icofont-notification"></i>
						</div>
					</div>
					<div class="d-flex align-items-center position-relative" style="top: -2.5px;">
						<div data-url="{{ route('logout'); }}" class="cursor-pointer text-center mr-3">
					    	<i class="icofont-power text-danger"></i>
					    </div>
						<div class="cursor-pointer backend-navigation-menu-icon text-center">
					    	<i class="icofont-navigation-menu text-dark"></i>
					    </div>
					</div>
				</ul>
			</div>
		</div>
	</div>
</div>

