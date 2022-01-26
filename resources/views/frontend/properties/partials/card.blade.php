<?php $propertytitle = ucfirst(retitle($property)); $categoryname = $property->category ? strtolower($property->category->name) : 'any'; ?>
<div class="card border-0 bg-white w-100 card-raduis position-relative">
        <div class="position-absolute ml-4 mt-4" style="z-index: 2;">
            <div class="d-flex align-items-center">
                @if($property->promoted)
                    <small class="bg-success px-3 py-1 mr-3">
                        <small class="text-white">Promoted</small>
                    </small>
                @else
                    <small class="bg-info px-3 py-1 mr-3">
                        <small class="text-white">Active</small>
                    </small>
                @endif
                <?php $actions = \App\Models\Property::$actions; $action = strtolower($property->action); ?>
                @if(isset($actions[$action]))
                    <small class="bg-theme-color px-3 py-1 mr-3">
                        <small class="text-white">
                            {{ ucwords($actions[$action]) }}
                        </small>
                    </small>
                @endif
                <small class="bg-white text-theme-color cursor-pointer px-3 py-1 rounded">
                    <i class="icofont-share"></i>
                </small>
            </div>
        </div>
    <div class="position-relative" style="height: 160px; line-height: 160px;">
        <a href="{{ route('property.category.id.slug', ['category' => $categoryname, 'id' => $property->id ?? 0, 'slug' => \Str::slug($propertytitle)]) }}" class="text-decoration-none">
            <img src="{{ empty($property->image) ? '/images/banners/holder.png' : $property->image }}" class="img-fluid border w-100 h-100 object-cover" style="border-radius: 20px 20px 0 0;">
        </a>
        <div class="position-absolute w-100 px-3 d-flex align-items-center justify-content-between" style="height: 45px; line-height: 45px; bottom: 0; background-color: rgba(160, 15, 15, 0.2);">
            <small class="">
                <span class="text-theme-color">
                    <i class="icofont-location-pin"></i>
                </span>
                <span class="text-white">
                    {{ ucwords($property->city) }}
                </span>
            </small>
        </div>
    </div>
    <div class="card-body">
        <div class="font-weight-bolder mb-3">
            <a href="{{ route('property.category.id.slug', ['category' => $categoryname, 'id' => $property->id ?? 0, 'slug' => \Str::slug($propertytitle)]) }}" class="text-main-dark text-underline">
                {{ \Str::limit($propertytitle, 44) }}
            </a>
        </div>
        <h4 class="text-theme-color">
            {{ $property->currency->symbol ?? 'NGN' }}{{ number_format($property->price * 1000) }}
        </h4>
        <div class="geodir-card-text">
            <a href="{{ route('property.category.id.slug', ['category' => $property->category->name ?? 'any', 'id' => $property->id ?? 0, 'slug' => \Str::slug($propertytitle)]) }}" class="text-underline text-muted">
                <small class="">
                    {{ \Str::limit($property->additional, 65) }}
                </small>
            </a>
        </div>
    </div>
    <div class="card-footer">
        <small class="">
            <small>
                <span class="text-theme-color">By</span> 
                {{ $property->user ? ucwords($property->user->name) : 'Our agent' }}
            </small>
        </small>
    </div>
</div>