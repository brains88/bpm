<div class="card border-0 bg-transparent position-relative rounded-0">
    <div class="position-relative">
    	<div class="position-absolute ml-4 mt-4">
            <small class="bg-success px-3 py-1">
                <small class="text-white">
                    {{ ucwords($property->action) }}
                </small>
            </small>
        </div>
        <div style="height: 220px;">
            <img src="{{ $property->image }}" class="img-fluid object-cover border rounded-0 w-100 h-100" alt="{{ ucwords($property->status) }}">
        </div>
    </div>
    <div class="p-3 position-absolute m-0 d-flex align-items-center justify-content-between" style="background-color: rgba(0, 0, 0, 0.8); bottom: 0; left: 0; right: 0;">
    	<small class="text-white">
            Sold {{ $property->currency->symbol ?? 'NGN' }}{{ number_format($property->price * 1000) }}
        </small>
    </div>
</div>