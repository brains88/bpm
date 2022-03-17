<div class="fixed-top bg-white">
	<div class="py-3">
		<div class="container-fluid">
			<div class="d-flex justify-content-between align-items-center">
				<ul class="d-flex">
					<li class="mr-3 cursor-pointer bg-violet navbar-icon text-center">
				    	<a href="{{ route('admin.dashboard'); }}" class="text-decoration-none text-main-dark">Dashboard</a>
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
				    <a href="{{ route('logout'); }}" class="text-decoration-none text-center mr-3">
				    	<i class="icofont-power text-danger"></i>
				    </a>
					<div class="cursor-pointer backend-navigation-menu-icon text-center">
				    	<i class="icofont-navigation-menu text-dark"></i>
				    </div>
				</ul>
			</div>
		</div>
	</div>
</div>

