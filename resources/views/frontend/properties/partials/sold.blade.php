<div class="card border-0 bg-transparent position-relative rounded-0">
    <div class="position-relative" style="height: 225px;">
    	<div class="position-absolute ml-4 mt-4">
            <small class="bg-success px-3 py-1">
                <small class="text-white">{{ ucwords($property->action) }}</small>
            </small>
        </div>
        <img src="{{ $property->image }}" class="card-img-top img-fluid object-cover border rounded-0 w-100 h-100" alt="{{ ucwords($property->status) }}">
    </div>
    <div class="p-3 position-absolute d-flex align-items-center justify-content-between" style="background-color: rgba(0, 0, 0, 0.8); bottom: 0; left: 0; right: 0;">
    	<small class="text-white">
            Sold {{ $property->currency->symbol ?? 'NGN' }}{{ number_format($property->price * 1000) }}
        </small>
    </div>
</div>