<?php $propertytitle = property()->title($property); ?>
<div class="card border bg-transparent position-relative m-0 rounded">
    <div class="position-relative" style="height: 225px;">
        <small class="position-absolute border-bottom border-top {{ $property->status == 'for rent' ? 'bg-info' : ($property->status == 'for sale' ? 'bg-tillgreen' : 'bg-main-red') }} rounded-0 px-4 py-2 text-white" style="top: 20px; left: 0;">
            {{ ucwords($property->status) }}
        </small>
        <a href="{{ route('property.category.id.slug', ['category' => $property->category->name ?? '-', 'id' => $property->id ?? 0, 'slug' => \Str::slug($propertytitle)]) }}">
            <img src="{{ $property->image }}" class="card-img-top img-fluid object-cover rounded w-100 h-100 border" alt="{{ $propertytitle }}">
        </a>
        <div class="p-3 position-absolute d-flex align-items-center justify-content-between" style="background-color: rgba(0, 0, 0, 0.8); bottom: 0; left: 0; right: 0;">
            <div class="d-flex align-items-center justify-content-between">
                <small class="text-theme-color mr-2">
                    <i class="icofont-measure"></i>
                </small>
                <small class="text-white">
                    {{ number_format($property->measurement) }} Sqm
                </small>
            </div>  
            <?php $name = $property->category->name ?? ''; ?>
            @if($name == 'residential')
                <small class="text-white">
                    {{ number_format($property->bedrooms) }} bedroom(s)
                </small>
            @endif
        </div>
    </div>
    <div class="card-body bg-transparent m-0 pb-1">
        <a href="{{ route('property.category.id.slug', ['category' => $property->category->name ?? '-', 'id' => $property->id ?? 0, 'slug' => \Str::slug($propertytitle)]) }}" class="d-block text-main-dark mb-3" style="text-decoration: underline;">
        	<div class="position-relative">
        		<h5 class="text-main-dark d-inline mb-0">
	            	{{ \Str::limit($propertytitle, 50) }}
	            </h5>
        	</div>
        </a>
        <div class="d-flex mb-3">
            <div class="text-dark-500 mr-2">
                By {{ $property->user->name ?? env('APP_NAME') }} ({{ ucfirst($property->country->name ?? 'Nigeria') }})
            </div>
        </div>
        <div class="d-flex mb-4">
            <a href="{{ route('property.category.id.slug', ['category' => $property->category->name ?? '-', 'id' => $property->id ?? 0, 'slug' => \Str::slug($propertytitle)]) }}" class="text-dark-500 mr-3 text-underline">
                {{ \Str::limit(ucfirst($property->address), 35) }}
            </a>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 mb-4">
                <a href="{{ route('property.category.id.slug', ['category' => $property->category->name ?? 'any', 'id' => $property->id ?? 0, 'slug' => \Str::slug($propertytitle)]) }}" class="btn btn-block bg-tillgreen">
                    <small class="text-white">
                        NGN{{ number_format($property->price.'000') }}
                    </small>
                </a>
            </div>
            <div class="col-12 col-md-6 mb-4">
                <a href="tel:{{ $property->user->phone }}" class="btn btn-block border-tillgreen">
                    <small class="text-theme-color">{{ $property->user->phone }}</small>
                </a>
            </div>
        </div>
        <div class="d-flex mb-4">
            <div class="sharethis-inline-share-buttons d-flex justify-content-between"></div>
        </div>
    </div>
</div>