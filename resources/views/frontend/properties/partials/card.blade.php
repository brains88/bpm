

<?php $propertytitle = ucfirst(\Str::limit(retitle($property), 34)); ?>

<!-- listing-item -->
<div class="cthiso-item listing-item listing-item-loop post-6152 listing type-listing status-publish has-post-thumbnail hentry listing_cat-house listing_location-01-new-york listing_status-for-sale listing_feature-breakfast listing_feature-free-parking listing_feature-free-wi-fi listing_feature-restaurant-inside listing_tag-fitness listing_tag-gym listing_tag-indoor listing_tag-outdoor listing_tag-running listing_tag-tour" data-postid="6152">
    <article class="geodir-category-listing fl-wrap">
      <div class="azp_element preview_listing azp-element-azp-withqfz5u2l geodir-category-img">
        <a href="{{route('AdvancedSearch')}}" class="listing-thumb-link geodir-category-img_item">
          <img width="424" height="280" src="{{ $property->image }}" class="respimg" alt="" loading="lazy" style="height: 280px;">
          <div class="overlay"></div>
        </a>
        <div class="geodir-category-location">
            <a href="{{ route('property.category.id.slug', ['category' => $property->category->name ?? 'any', 'id' => $property->id ?? 0, 'slug' => \Str::slug($propertytitle)]) }}" class="single-map-item tolt" data-microtip-position="top-left" data-tooltip="On the map"> 
          <i class="fas fa-map-marker-alt"></i> 
          <span>{{ ucwords($property->city.', '.empty($property->country->name) ? 'Nigeria') : $property->country->name }}</span></a>
        </div>
        <div class="list-single-opt_header_cat dis-flex-wrap">
          <a href="{{ route('AdvancedSearch') }}" class="cat-opt status-opt flex-items-center">
              {{ ucwords(\App\Models\Property::$actions[$property->action]) }}
          </a> 
          <a href="{{ route('AdvancedSearch') }}" class="cat-opt flex-items-center">{{ ucfirst($property->category->name ?? 'any') }}</a>
        </div>
        <a href="javascript:;" class="geodir_save-btn tolt logreg-modal-open" data-message="Logging in first to save this listing." data-microtip-position="left" data-tooltip="Login">
        <span>
            <i class="fal fa-heart"></i></span>
        </a> 
        <a href="javascript:;" class="compare-btn tolt compare-btn-{{ $property->id }}" data-microtip-position="left" data-tooltip="Compare" data-text1="Compare" data-text2="Added to Compare" data-lid="{{ $property->id }}" data-ltitle="{{ $propertytitle }}" data-lthumb="{{ $property->image }}" data-laddress="{{ ucwords($property->address) }}">
        <span><i class="fal fa-random"></i></span></a>
        <div class="geodir-category-listing_media-list"> 
          <span><i class="fas fa-camera"></i> 
            {{ $property->images->count() }}
          </span>
        </div>
        <div class="lcfields-wrap lcfields-abs dis-flex-wrap"></div>
      </div>
      <div class="azp_element preview_listing_content azp-element-azp-byjy53nmnw geodir-category-content">
        <h3 class="title-sin_item dis-flex-wrap-center">
          <a href="{{ route('property.category.id.slug', ['category' => $property->category->name ?? 'any', 'id' => $property->id ?? 0, 'slug' => \Str::slug($propertytitle)]) }}" style="text-decoration: underline !important;">
              {{ $propertytitle }}
          </a>
        </h3>
        <div class="geodir-category-content_price">{{ $property->currency->symbol ?? 'NGN' }}{{ number_format($property->price * 1000) }}</div>
        <div class="geodir-card-text">
            <a href="{{ route('property.category.id.slug', ['category' => $property->category->name ?? 'any', 'id' => $property->id ?? 0, 'slug' => \Str::slug($propertytitle)]) }}" class="geodir-card-excerpt" style="text-decoration: underline!important;">
                {{ \Str::limit($property->additional, 85) }}
            </a>
          <div class="lcfields-wrap dis-flex-wrap-center"></div>
          <div class="geodir-category-content-details">
            <ul class="no-list-style dis-flex-wrap">
              <li><i class="fal fa-bed"></i><span>
                  {{ $property->bedroom ?? 0 }}
              </span></li>
              <li><i class="fal fa-bath"></i>
                <span>
                    {{ $property->bathroom ?? 0 }}
                </span>
              </li>
              <li><i class="fal fa-cube"></i><span> {{ $property->measurement }}Sqft</span></li>
            </ul>
          </div>
        </div>
        <div class="geodir-category-footer dis-flex-wrap-center jtf-space-between">
            <span class="lcard-avatar">By {{ !empty($property->user->name) ? ucwords($property->user->name) : 'Our agent' }}</span>
          <div class="listing-rating card-popup-rainingvis tolt" data-microtip-position="top" data-tooltip="Good" data-stars="5" data-rating="4.0">
          </div>
        </div>
      </div>
    </article>
</div>