<div class="fixed-top bg-white">
	<div class="py-3">
		<div class="container d-flex justify-content-between align-items-center">
			<ul class="d-flex">
				<li class="mr-3 cursor-pointer bg-violet navbar-icon text-center">
			    	<a href="{{ route('admin.dashboard'); }}" class="text-white text-decoration-none">
			    		<i class="icofont-home"></i>
			    	</a>
			    </li>
			</ul>
			<ul class="d-flex align-items-center">
			    <a href="{{ route('logout'); }}" class="cursor-pointer navbar-icon bg-danger text-center mr-3">
			    	<i class="icofont-power text-white"></i>
			    </a>
				<li class="cursor-pointer backend-navigation-menu-icon navbar-icon bg-violet text-center">
			    	<i class="icofont-navigation-menu text-white"></i>
			    </li>
			</ul>
		</div>
	</div>
</div>
<div class="backend-sidebar shadow no-gutters bg-white position-fixed vh-100">
	<div class="menu-content vh-100 pb-5">
		<div class="d-flex bg-violet p-3 justify-content-between align-items-center mb-4">
			<div class="text-white">Sidebar</div>
			<div class="backend-navigation-menu-close-icon text-white">
				<i class="icofont-close"></i>
			</div>
		</div>
		<div class="px-3">
			<a href="{{ url('/admin/pricing') }}" class="d-block p-3 bg-alabaster text-violet mb-3">
				Pricing
			</a>
			<a href="{{ url('/admin/users') }}" class="d-block p-3 bg-alabaster text-violet mb-3">
				Users
			</a>
			<a href="{{ url('/admin/payments') }}" class="d-block p-3 bg-alabaster text-violet mb-3">
				Payments
			</a>
			<a href="{{ url('/admin/companies') }}" class="d-block p-3 bg-alabaster text-violet mb-3">
				Electricity
			</a>
			<a href="{{ url('/admin/transactions') }}" class="d-block p-3 bg-alabaster text-violet mb-3">
				Transactions
			</a>
			<a href="{{ url('/admin/products') }}" class="d-block p-3 bg-alabaster text-violet mb-3">
				Products
			</a>
		</div>
	</div>
</div>

