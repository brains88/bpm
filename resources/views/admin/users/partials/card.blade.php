<div class="card border-0">
    <div class="card-body d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <div class="mr-3" style="height: 40px; width: 40px; line-height: 40px;">
            	@if(empty($user->profile->image))
            	    <div class="w-100 h-100 border rounded-circle text-center" style="background-color: {{ randomrgba() }};">
            	    	{{ substr(strtoupper($user->name), 0, 1) }}
            	    </div>
            	@else
                	<img src="{{ $user->profile->image }}" class="img-fluid object-cover rounded-circle w-100 h-100 border">
                @endif
            </div>
            <div class="">
            	<a href="{{ '' }}" class="d-flex align-items-center">
            		<small class="d-block text-dark mr-2">
	                	{{ ucwords(\Str::limit(firstname($user->name), 12)) }}
	                </small>
            	</a>
                <small class="d-block text-dark">
                	{{ $user->created_at->diffForHumans() }}
                </small>
            </div>
        </div>
        <small class="">
        	<?php $status = strtolower($user->status ?? ''); ?>
        	<small class="text-white px-2 py-1 rounded-pill bg-{{ $status == 'active' ? 'success' : ($status == 'suspended' ? 'warning' : 'danger') }}">
        		{{ ucfirst($status) }}
        	</small>
        </small>
    </div>
</div>