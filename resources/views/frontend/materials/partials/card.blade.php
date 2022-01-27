<div class="card border-0 bg-white w-100 card-raduis position-relative">
        <div class="position-absolute ml-4 mt-4" style="z-index: 2;">
            <div class="d-flex align-items-center flex-wrap">
                @if($material->promoted)
                    <small class="bg-success px-3 py-1 mr-3 mb-3">
                        <small class="text-white">Promoted</small>
                    </small>
                @endif
                <small class="bg-theme-color text-white cursor-pointer px-3 py-1 mb-3">
                    <i class="icofont-share"></i>
                </small>
            </div>
        </div>
    <div class="position-relative" style="height: 160px; line-height: 160px;">
        <a href="{{ route('material.id.slug', ['id' => $material->id ?? 0, 'slug' => \Str::slug($material->name)]) }}" class="text-decoration-none">
            <img src="{{ empty($material->image) ? '/images/banners/holder.png' : $material->image }}" class="img-fluid w-100 h-100 object-cover">
        </a>
        <div class="position-absolute w-100 px-3 d-flex align-items-center justify-content-between" style="height: 45px; line-height: 45px; bottom: 0; background-color: rgba(0, 0, 0, 0.6);">
            <small class="">
                <small class="text-theme-color">
                    <i class="icofont-location-pin"></i>
                </small>
                <small class="text-white">
                    {{ ucwords($material->city) }} {{ $material->country ? ', '.ucwords($material->country->name) : '' }} 
                </small>
            </small>
        </div>
    </div>
    <div class="card-body">
        <div class="font-weight-bolder mb-3">
            <a href="{{ route('material.id.slug', ['id' => $material->id ?? 0, 'slug' => \Str::slug($material->name)]) }}" class="text-main-dark text-underline">
                {{ \Str::limit($material->name, 24) }}
            </a>
        </div>
        <div class="row">
            <div class="col-12 mb-3">
                <a href="tel:{{ $material->user ? $material->user->phone : 'Nill' }}" class="btn btn-block bg-theme-color icon-raduis">
                    <small class="text-white">Call {{ $material->user ? $material->user->phone : 'Nill' }}</small>
                </a>
            </div>
        </div>
        <div class="">
            <a href="{{ route('material.id.slug', ['id' => $material->id ?? 0, 'slug' => \Str::slug($material->name)]) }}" class="text-underline text-muted">
                <small class="">
                    {{ \Str::limit($material->address, 24) }}
                </small>
            </a>
        </div>
    </div>
    <div class="card-footer">
        <small class="">
            <small>
                <span class="text-theme-color">By</span> 
                {{ $material->user ? ucwords($material->user->name) : 'Our agent' }}
            </small>
        </small>
    </div>
</div>