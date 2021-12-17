<div class="card">
	<div class="card-body">
		<div class="d-flex align-items-center justify-content-between">
            <a href="javascript:;" class="text-main-dark d-flex align-items-center text-underline" data-toggle="modal" data-target="#edit-skill-{{ $skill->id }}">
                <small class="text-dark">{{ ucwords($skill->name ?? 'Nill') }}</small>
            </a>
            <div class="custom-control custom-switch">
                <input class="custom-control-input skill-status" type="checkbox" data-url='{{ '' }}' id="status-{{ $skill->id }}" {{ $skill->status ? 'checked' : '' }} data-status="{{ $skill->status }}">
                <label class="custom-control-label" for="status-{{ $skill->id }}"></label>
            </div>
		</div>
	</div>
	<div class="card-footer d-flex justify-content-between align-items-center bg-main-dark">
		<small class="text-white">
			{{ $skill->created_at->diffForHumans() }}
		</small>
		<a href="{{ '' }}">
			<small class="text-warning">
				<i class="icofont-edit"></i>
			</small>
		</a>
	</div>
</div>