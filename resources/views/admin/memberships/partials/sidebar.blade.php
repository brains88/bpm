<div class="card icon-raduis shadow-sm border-0">
	<div class="card-body d-flex justify-content-between align-items-center">
		<div class="d-flex align-items-center">
			<div class="md-circle text-center rounded-circle text-main-dark mr-2" style="background-color: {{ randomrgba() }};">
				<small class="">
					{{ ucfirst(substr($subscription->user->name, 0, 1)) }}
				</small>
			</div>
			<div>
				<a href="{{ route('admin.user.profile', ['id' => $subscription->user->id]) }}" class="text-main-dark font-weight-bold d-block">
					{{ \Str::limit(ucwords($subscription->user->name), 12) }}
				</a>
				<small class="text-main-dark">
					{{ $subscription->membership->name }} Plan
				</small>
			</div>
		</div>
		<div class="rounded-circle sm-circle bg-{{ strtolower($subscription->status) == 'active' ? 'success' : 'danger' }} text-center">
            <small class="text-white tiny-font">
                <i class="icofont-tick-mark"></i>
            </small>
        </div>
	</div>
</div>