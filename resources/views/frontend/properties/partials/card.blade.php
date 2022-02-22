<?php $title = ucfirst(retitle($property)); ?>
<div class="card border-0 bg-white w-100 card-raduis position-relative">
        <div class="position-absolute ml-4 mt-4" style="z-index: 2;">
            <div class="d-flex align-items-center flex-wrap">
                @if($property->promoted)
                    <small class="bg-success px-3 py-1 mr-3 mb-3">
                        <small class="text-white">Promoted</small>
                    </small>
                @endif
                <?php $actions = \App\Models\Property::$actions; $action = strtolower($property->action); ?>
                @if(isset($actions[$action]))
                    <small class="bg-theme-color px-3 py-1 mr-3 mb-3">
                        <small class="text-white">
                            {{ ucwords($actions[$action]) }}
                        </small>
                    </small>
                @endif
                <small class="bg-dark text-white cursor-pointer px-3 py-1 mb-3">
                    <i class="icofont-share"></i>
                </small>
            </div>
        </div>
    <div class="position-relative" style="height: 160px; line-height: 160px;">
        <a href="{{ route('property.category.id.slug', ['category' => $property->category, 'id' => $property->id ?? 0, 'slug' => \Str::slug($title)]) }}" class="text-decoration-none">
            <img src="{{ empty($property->image) ? '/images/banners/holder.png' : $property->image }}" class="img-fluid w-100 h-100 object-cover" style="border-radius: 20px 20px 0 0;">
        </a>
        <div class="position-absolute w-100 px-3 d-flex align-items-center justify-content-between" style="height: 45px; line-height: 45px; bottom: 0; background-color: rgba(0, 0, 0, 0.6);">
            <div class="">
                <small class="text-theme-color">
                    <i class="icofont-location-pin"></i>
                </small>
                <small class="text-white">
                    {{ \Str::limit(ucwords($property->city.' '.($property->state ? ', '.$property->state : '')), 30) }}
                </small>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="font-weight-bolder mb-3">
            <a href="{{ route('property.category.id.slug', ['category' => $property->category, 'id' => $property->id ?? 0, 'slug' => \Str::slug($title)]) }}" class="text-main-dark text-underline">
                {{ \Str::limit($title, 44) }}
            </a>
        </div>
        <h4 class="text-theme-color">
            {{ $property->currency->symbol ?? 'NGN' }}{{ number_format($property->price) }}
        </h4>
        <div class="geodir-card-text">
            <a href="{{ route('property.category.id.slug', ['category' => $property->category->name ?? 'any', 'id' => $property->id ?? 0, 'slug' => \Str::slug($title)]) }}" class="text-underline text-muted">
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