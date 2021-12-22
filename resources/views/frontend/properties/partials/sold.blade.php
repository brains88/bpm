<div class="card border-0 bg-transparent position-relative rounded-0">
    <div class="position-relative" style="height: 225px;">
    	<small class="position-absolute bg-theme-color rounded-0 px-4 py-2 text-white" style="top: 20px; left: 0;">
            {{ ucwords($property->status) }}
        </small>
        <img src="{{ $property->image }}" class="card-img-top img-fluid object-cover border rounded-0 w-100 h-100" alt="{{ ucwords($property->status) }}">
    </div>
    <div class="p-3 position-absolute d-flex align-items-center justify-content-between" style="background-color: rgba(0, 0, 0, 0.8); bottom: 0; left: 0; right: 0;">
    	<small class="text-white">
            Sold NGN{{ number_format($property->price.'00000') }}
        </small>
    </div>
</div>