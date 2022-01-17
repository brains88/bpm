@include('layouts.header')
    @include('frontend.layouts.navbar')

<!--  header end --> <!--  wrapper  -->
<div id="wrapper">
  <!-- Content-->
  <div class="content">
    <!--  section  -->
    <section class="parallax-section hidden-section single-par2" data-scrollax-parent="true">
      <div class="bg-wrap bg-parallax-wrap-gradien">
        <div class="bg par-elem" data-bg="../../bpm-content/uploads/2021/05/3.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
      </div>
      <div class="container idx-5">
        <div class="container-inner">
          <div class="section-title center-align big-title">
            <h2 class="post-head-title"><span>Properties</span></h2>
            Kindly see our Properties displayed randomly by cities.<br> You can customise your search with our advanced form.
          </div>
          <div class="scroll-down-wrap">
            <div class="mousey">
              <div class="scroller"></div>
            </div>
            <span>Scroll Down To Discover</span>
          </div>
        </div>
      </div>
    </section>
    <!--  section  end-->
    <div class="listings-grid-wrap clearfix two-cols template-no-map-filter">
      <!-- breadcrumbs-->
      <div class="breadcrumbs-wrapper inline-breadcrumbs fw-breadcrumbs sp-brd fl-wrap">
        <div class="container">
          <div class="inline-breadcrumbs-wrap flex-items-center jtf-space-between flw-wrap">
            <div class="inline-breadcrumbs-inner">
              <div class="container-inner flex-items-center jtf-space-between flw-wrap">
                <div class="breadcrumbs-list "><a class="breadcrumb-link breadcrumb-home" href="{{route('home')}}" title="Home">Home</a><a class="breadcrumb-link breadcrumb-parent-6733" href="#" title="Listings">Listings</a><span class="breadcrumb-current breadcrumb-item-page-6737" title="Properties">Properties</span></div>
              </div>
            </div>
            <div class="inline-breadcrumbs-right flex-items-center">
              <div class="categoties-column_container cat-list inline-categories">
                <ul>
                  <li><a href="#" class=" tolt" data-microtip-position="bottom" data-tooltip="House"> <i class="fal fa-house"></i> </a></li>
                  <li><a href="#" class=" tolt" data-microtip-position="bottom" data-tooltip="Apartment"> <i class="fal fa-city"></i> </a></li>
                  <li><a href="#" class=" tolt" data-microtip-position="bottom" data-tooltip="Villa"> <i class="fal fa-warehouse-alt"></i> </a></li>
                  <li><a href="#" class=" tolt" data-microtip-position="bottom" data-tooltip="Home"> <i class="fal fa-home"></i> </a></li>
                  <li><a href="#" class=" tolt" data-microtip-position="bottom" data-tooltip="Hotel"> <i class="far fa-hotel"></i> </a></li>
                </ul>
              </div>
              <div class="share-holder hid-share">
                <a href="#" class="share-btn showshare"><i class="fas fa-share-alt"></i>Share</a>
                <div class="share-container isShare" data-share="facebook, pinterest, googleplus, twitter, linkedin"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- breadcrumbs end -->
      <section class="gray-bg small-padding ">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="mob-nav-content-btn  color-bg show-list-wrap-search ntm fl-wrap">Show  Filters</div>
            </div>
            <!-- search sidebar-->
            <div class="col-md-4">
              <!-- list-searh-input-wrap-->
              <div class="fl-wrap lws_mobile listsearch-inputs-sides search-sb" id="filters-column">
                <!-- listsearch-input-wrap-->
                <div class="listsearch-input-wrap" id="lisfw">
                  <div class="fl-wrap filters-search-wrap list-search-page-form-wrap">
                    <form id="list-search-page-form" role="search" method="get" action="#" class="list-search-page-form list-search-form-js">
                      <div class="listsearch-inputs-wrapper">
                        <div class="azp_element filter_form_listing azp-element-azp-dpyur9ylop">
                          <div class="list-searh-input-wrap-title fl-wrap"> <i class="far fa-sliders-h"></i> 
                          	<span>Search Filters</span>
                          </div>
                          <div class="filter-inputs-row main-inputs">
                            <div class="azp_element filter_title azp-element-azp-wtrrmojj5ai filter-gid-item filter-gid-wid-6">
                              <div class="filter-item-inner"> 
                              	<input type="text" name="search_term" placeholder="What are you looking for?" value=""></div>
                            </div>
                            <div class="azp_element filter_status azp-element-azp-38rcw8q8fm filter-gid-item filter-gid-wid-3">
                              <div class="filter-item-inner">
                                <select data-placeholder="All Status" class="chosen-select" name="status">
                                  <option value="">All Status</option>
                                  <option value="for-sale">For Sale</option>
                                  <option value="for-rent">For Rent</option>
                                </select>
                              </div>
                            </div>
                            <div class="azp_element filter_loc azp-element-azp-lf4xstjtdvl filter-gid-item filter-gid-wid-3">
                              <div class="filter-item-inner">
                                <select data-placeholder="All Cities" class="chosen-select" name="llocs">
                                  <option value="">All Cities</option>
                                  <option value="05-london">London</option>
                                  <option value="03-moscow">Moscow</option>
                                  <option value="01-new-york">New York</option>
                                  <option value="02-paris">Paris</option>
                                  <option value="04-rome">Rome</option>
                                  <option value="us">United States</option>
                                </select>
                              </div>
                            </div>
                            <div class="azp_element filter_cat azp-element-azp-mmwynvpg73 filter-gid-item filter-gid-wid-3">
                              <div class="filter-item-inner">
                                <select data-placeholder="All Categories" class="chosen-select" name="lcats[]">
                                  <option value="">All Categories</option>
                                  <option value="626">Apartment</option>
                                  <option value="629">Home</option>
                                  <option value="195">Hotel</option>
                                  <option value="627">House</option>
                                  <option value="630">Office</option>
                                  <option value="628">Villa</option>
                                </select>
                              </div>
                            </div>
                            <div class="azp_element filter_price azp-element-azp-g7xbsgjelyd filter-gid-item filter-gid-wid-6">
                              <div class="filter-item-inner">
                                <div class="price-rage-wrap fl-wrap">
                                  <div class="price-rage-wrap-title"> Price:</div>
                                  <div class="price-rage-item fl-wrap"> <input class="price-slider" data-type="double" data-from="0" data-to="2000000" data-step="1000" data-min="0" data-max="2000000" data-prefix="$" data-prettify-separator=","> <input type="hidden" name="fprice" class="price_range_hidden" value="0;2000000"></div>
                                </div>
                              </div>
                            </div>
                            <div class="azp_element filter_submit azp-element-azp-iuwo5odgbu9 filter-gid-item filter-gid-wid-3 hide-on-sides">
                              <div class="filter-item-inner"> <button class="btn color-bg fw-btn small-btn filter-submit-btn" type="submit"> <span>Search</span> </button></div>
                            </div>
                          </div>
                        </div>
                        <div class="azp_element filter_form_advanced azp-element-azp-p7zqk0l62c">
                          <!-- hidden-listing-filter -->
                          <div class="hidden-listing-filter fl-wrap">
                            <div class="advanced-filter-head">
                              <div class="msotw_title fl-wrap"> <i class="far fa-sliders-h"></i> Advanced Search</div>
                              <div class="close_msotw"><i class="fal fa-times"></i></div>
                            </div>
                            <div class="fl-wrap mar-btoom">
                              <div class="filter-inputs-row advanced-inputs">
                                <div class="azp_element filter_beds azp-element-azp-lg6dl7ripd filter-gid-item filter-gid-wid-2">
                                  <div class="filter-item-inner">
                                    <div class="listsearch-input-title"> <label>Bedrooms</label></div>
                                    <input type="number" name="bedrooms" value="">
                                  </div>
                                </div>
                                <div class="azp_element filter_baths azp-element-azp-ciatdatr7rr filter-gid-item filter-gid-wid-2">
                                  <div class="filter-item-inner">
                                    <div class="listsearch-input-title"> <label>Bathrooms</label></div>
                                    <input type="number" name="bathrooms" value="">
                                  </div>
                                </div>
                                <div class="azp_element filter_garage azp-element-azp-w48wmt2odm filter-gid-item filter-gid-wid-2">
                                  <div class="filter-item-inner">
                                    <div class="listsearch-input-title"> <label>Garage (Cars)</label></div>
                                    <input type="number" name="garage" value="">
                                  </div>
                                </div>
                                <div class="azp_element filter_ptid azp-element-azp-o6kjih5fv8r filter-gid-item filter-gid-wid-2">
                                  <div class="filter-item-inner">
                                    <div class="listsearch-input-title"> <label>Property Id</label></div>
                                    <input type="text" name="property_id" value="">
                                  </div>
                                </div>
                                <div class="azp_element filter_area_size azp-element-azp-1r9lvbor2h8 filter-gid-item filter-gid-wid-4">
                                  <div class="filter-item-inner">
                                    <div class="price-rage-wrap fl-wrap area-filter-slider">
                                      <div class="price-rage-wrap-title"> Area Size</div>
                                      <div class="price-rage-item fl-wrap"> <input class="price-slider" data-type="double" data-from="100" data-to="3500" data-step="100" data-min="0" data-max="5000" data-prefix="ft2" data-prettify-separator=","> <input type="hidden" name="area_size" class="price_range_hidden" value="100;3500"></div>
                                    </div>
                                  </div>
                                </div>
                                <div class="azp_element filter_features azp-element-azp-elgsosxlj6w features-cols-four filter-gid-item filter-gid-wid-12">
                                  <div class="filter-item-inner">
                                    <div class="listsearch-input-title"> <label>Amenities</label></div>
                                    <div class="listing-features-view">
                                      <div class="listing-features">
                                        <div class="listing-feature-wrap"> <input id="features_295" type="checkbox" value="295" name="lfeas[]"> <label for="features_295">Elevator in building</label></div>
                                        <!-- end listing-feature-wrap -->
                                        <div class="listing-feature-wrap"> <input id="features_297" type="checkbox" value="297" name="lfeas[]"> <label for="features_297">Free Parking</label></div>
                                        <!-- end listing-feature-wrap -->
                                        <div class="listing-feature-wrap"> <input id="features_298" type="checkbox" value="298" name="lfeas[]"> <label for="features_298">Air Conditioned</label></div>
                                        <!-- end listing-feature-wrap -->
                                        <div class="listing-feature-wrap"> <input id="features_296" type="checkbox" value="296" name="lfeas[]"> <label for="features_296">Free Wi Fi</label></div>
                                        <!-- end listing-feature-wrap -->
                                        <div class="listing-feature-wrap"> <input id="features_300" type="checkbox" value="300" name="lfeas[]"> <label for="features_300">Pet Friendly</label></div>
                                        <!-- end listing-feature-wrap -->
                                        <div class="listing-feature-wrap"> <input id="features_306" type="checkbox" value="306" name="lfeas[]"> <label for="features_306">Non-smoking</label></div>
                                        <!-- end listing-feature-wrap -->
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- hidden-listing-filter end -->
                          <div class="more-filter-option-wrap dis-flex-wrap-center">
                            <button class="btn color-bg small-btn show-on-sides" type="submit">Search</button>
                            <div class="more-filter-option-btn more-filter-option act-hiddenpanel"> <span>Advanced search</span> <i class="fas fa-caret-down"></i></div>
                            <div class="reset-form reset-btn clear-filter-btn"> <i class="far fa-sync-alt"></i>Reset Filters</div>
                          </div>
                        </div>
                      </div>
                      <input type="hidden" name="morderby" value="">
                    </form>
                    <div class="loading-indicator filter-form-loading"> <span></span> <span></span> <span></span></div>
                  </div>
                </div>
                <!-- listsearch-input-wrap end--> <a class="back-tofilters color-bg custom-scroll-link fl-wrap scroll-to-fixed-fixed" href="#filters-column">Back to filters <i class="fas fa-caret-up"></i></a>
              </div>
              <!-- list-searh-input-wrap end-->
            </div>
            <!-- search sidebar end-->
            <div class="col-md-8">
              <!-- list-main-wrap-header-->
              <div class="list-main-wrap-header fixed-listing-header">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12 flex-items-center jtf-space-between list-main-head-inner">
                      <!-- list-main-wrap-title-->
                      <div class="list-main-wrap-title">
                        <h2>Results for: <span>Listings</span><strong class="lresults-counter"></strong></h2>
                      </div>
                      <!-- list-main-wrap-title end--> <!-- list-main-wrap-opt-->
                      <div class="list-main-wrap-opt flex-items-center">
                        <!-- price-opt-->
                        <div class="price-opt flex-items-center">
                          <span class="price-opt-title">Sort by:</span>
                          <div class="listsearch-input-item">
                            <select id="lfilter-orderby" data-placeholder="Popularity" class="chosen-select no-search-select" name="morderby">
                              <option value="">Default</option>
                              <option value="most_viewed">Popularity</option>
                              <option value="most_liked">Most Liked</option>
                              <option value="highest_rated">Most Rated</option>
                              <option value="price_low">Price: low to high</option>
                              <option value="price_high">Price: high to low</option>
                            </select>
                          </div>
                        </div>
                        <!-- price-opt end--> <!-- price-opt-->
                        <div class="grid-opt">
                          <ul class="no-list-style">
                            <li class="grid-opt_act grid-opt-lgrid"><span class="lgrid tolt act-grid-opt" data-microtip-position="bottom" data-tooltip="Grid View"><i class="far fa-th"></i></span></li>
                            <li class="grid-opt_act grid-opt-llist"><span class="llist tolt" data-microtip-position="bottom" data-tooltip="List View"><i class="far fa-list"></i></span></li>
                            <li class="grid-opt_act grid-opt-toggle-map"><span class="expand-listing-view tolt" data-microtip-position="bottom" data-tooltip="Toggle Map"><i class="far fa-expand"></i></span></li>
                          </ul>
                        </div>
                        <!-- price-opt end-->
                      </div>
                      <!-- list-main-wrap-opt end-->
                    </div>
                    <div class="col-md-12 ltax-desc-wrap">
                      <div class="listings_tax_desc listings-tax-column"></div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- list-main-wrap-header end--> <!-- list-main-wrap-->
              <div class="list-main-wrap fl-wrap card-listing listings-full-map">
                <div class="listing-term-desc"></div>
                <div class="listing-item-container init-grid-items" id="lisconfw">
                  <div id="listing-items" class="listing-items listing-items-wrapper">
                    
                    @if(empty($properties->count()))
                     <div></div>
                    @else
                    <!-- listing-item -->
                        @foreach($properties as $property)
                            @include('frontend.properties.partials.card')
                        @endforeach
                    @endif
                    <!-- listing-item end-->
                  </div>
                  {{ $properties->links('vendor.pagination.ui') }}
                  <div class="lresults-data" style="display:none;">17</div>
                </div>
                <!-- end listing-item-container -->
              </div>
              <!-- list-main-wrap end-->
            </div>
            <!-- col-m-8 end -->
          </div>
          <!-- row end -->
        </div>
        <!-- container end -->
      </section>
    </div>
    <!--template wrap end -->
    <div class="limit-box"></div>
    <div class="clearfix"></div>
  </div>
  <!-- Content end -->
</div>
<!-- wrapper end -->
<div class="clearfix"></div>
	@include('frontend.layouts.bottom')
@include('layouts.footer')