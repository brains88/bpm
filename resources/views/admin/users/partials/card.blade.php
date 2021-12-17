<div class="card">
	<?php $role = $user->role ?? 'nill'; ?>
	<div class="position-relative border-bottom {{ $role === 'admin' ? 'bg-success' : ($role === 'agent' ? 'bg-warning' : ($role === 'artisan' ? 'bg-primary' : 'bg-secondary')) }}" style="height: 40px;">
		<?php $link = empty($user->profile->image) ? '/images/user.png' : $user->profile->image; ?>
		<a href="{{ $link }}" class="position-absolute bg-transparent rounded-circle border" style="bottom: -10px; left: 20px; width: 40px; height: 40px;">
			<img src="{{ $link }}" class="img-fluid object-cover w-100 h-100">
		</a>
	</div>
	<div class="card-body">
		<div class="d-flex align-items-center justify-content-between mb-3 pb-3 border-bottom">
			<div class="dropdown">
                <a href="javascript:;" class="text-dark text-underline">
                	<div data-toggle="dropdown">
                		<small>{{ ucwords(\Str::limit($user->name, 24)) }}</small>
	                    <i class="icofont icofont-caret-down"></i>
                	</div>
	                <div class="dropdown-menu border-0 shadow dropdown-menu-left">
	                	<div class="dropdown-item">
	                		<small class="text-dark">
	                			{{ ucwords($user->name) ?? 'Nill' }}
	                		</small>
	                	</div>
	                </div>
	            </a>
            </div>
            <a href="tel:{{ $user->phone }}" class="d-flex align-items-center">
                <small class="text-main-dark">
                	<i class="icofont-phone-circle"></i>
                </small>
            </a>
		</div>
		<div class="d-flex align-items-center justify-content-between">
            <small class="text-dark">
            	{{ ucwords($role) }}
            </small>
            <a href="{{ route('admin.user.profile', ['id' => $user->id]) }}" class="text-underline text-dark">
				<small class="">
	            	({{ $user->properties->count() ?? '0' }}) properties
	            </small>
            </a>
		</div>
	</div>
	<div class="card-footer d-flex justify-content-between align-items-center bg-main-dark">
		<small class="text-white">
			{{ $user->created_at->diffForHumans() }}
		</small>
		<a href="{{ '' }}">
			<small class="text-warning">
				<i class="icofont-edit"></i>
			</small>
		</a>
	</div>
</div>