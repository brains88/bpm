<div class="card border-0 bg-white w-100 card-raduis position-relative">
        <div class="position-absolute ml-4 mt-4" style="z-index: 2;">
            <div class="d-flex align-items-center flex-wrap">
                @if($material->promoted)
                    <small class="bg-success px-3 py-1 mr-3 mb-3">
                        <small class="text-white">Promoted</small>
                    </small>
                @endif
            </div>
        </div>
    <div class="position-relative" style="height: 140px;">
        <a href="{{ route('material.id.slug', ['id' => $material->id ?? 0, 'slug' => \Str::slug($material->name)]) }}" class="text-decoration-none">
            <img src="{{ empty($material->image) ? '/images/banners/holder.png' : $material->image }}" class="img-fluid w-100 h-100 object-cover" style="border-radius: 20px 20px 0 0;">
        </a>
        <div class="position-absolute d-flex justify-content-between w-100 px-3 d-flex align-items-center justify-content-between" style="height: 45px; line-height: 45px; bottom: 0; background-color: rgba(0, 0, 0, 0.6);">
            <small class="">
                <small class="text-theme-color">
                    <i class="icofont-location-pin"></i>
                </small>
                <small class="text-white">
                    {{ ucwords(\Str::limit($material->city, 14)) }} 
                </small>
            </small>
            @if($material->user)
                <a href="tel:{{ $material->user->phone }}" class="text-decoration-none">
                    <small class="text-theme-color">
                        <i class="icofont-phone"></i>
                    </small>
                </a>
            @endif
        </div>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <a href="{{ route('material.id.slug', ['id' => $material->id ?? 0, 'slug' => \Str::slug($material->name)]) }}" class="text-main-dark text-underline">
                <small>{{ \Str::limit($material->name, 12) }}</small>
            </a>
        </div>
        <div class="mb-2">
            <a href="{{ route('material.id.slug', ['id' => $material->id ?? 0, 'slug' => \Str::slug($material->name)]) }}" class="text-theme-color">
                {{ $material->currency ? $material->currency->symbol : 'NGN' }}{{ number_format($material->price) }}
            </a>
        </div>
    </div>
</div>