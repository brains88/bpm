<?php $status = strtolower($subscription->status ?? 'error'); $statusbg = $status === 'error' || $status === 'expired' ? 'bg-danger' : ($status === 'suspended' || $status === 'cancelled' || $status === 'paused' ? 'bg-warning' : 'bg-success'); ?>
<div class="card border-0 admin-card position-relative">
	<div class="card-body">
		<div class="d-flex justify-content-between mb-3">
			<small class="text-dark">
				{{ ucwords($subscription->plan->name ?? 'nill') }} ({{ ucfirst($subscription->plan->duration ?? '') }})
			</small>
			<small class="text-dark">
				${{ number_format($subscription->amount ?? 0) }}
			</small>
		</div>
		<?php $start = \Carbon\Carbon::create($subscription->subscribed ?? 0); ?>
		<div class="w-100 position-relative mb-3 p-1 border">
			<div class="bg-main-ash d-flex px-3 justify-content-between position-relative align-items-center rounded w-100" style="height: 4px; line-height: 4px;">
				<?php $percent = ((\Carbon\Carbon::now()->diffInDays($start))/$subscription->duration) * 100; ?>
				{{-- <small class="text-center text-dark px-2">
					{{ round($percent) }}%
				</small> --}}
				<div class="{{ $statusbg }} d-flex position-absolute" style="width: {{ $percent >= 100 ? 95 : $percent }}%; left: 0; right: 0; bottom: 0; height: 4px;">
				</div>
			</div>
		</div>
		<div class="d-flex justify-content-between align-items-center">
			<a href="">
				<small class="text-dark">
					<em>By</em> {{ ucwords(\Str::limit(firstname($subscription->user->name, 12))) }}
				</small>
			</a>
			<small class=" px-2 rounded-pill {{ $statusbg }}">
				<small class="text-white">
					{{ ucfirst($status) }}
				</small>
			</small>
		</div>
	</div>
</div>