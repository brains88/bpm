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
                    <!-- listing-item -->
                    <div class="listing-item listing-item-loop" data-postid="7439" data-lmap="%7B%22url%22%3A%22https%3A%5C%2F%5C%2Fbestpropertymarket.%5C%2Flisting%5C%2Fgorgeous-house-for-sale%5C%2F%22%2C%22cat%22%3A%22%3Cdiv%20class%3D%5C%22map-popup-category%20mp-cat%20color-bg%5C%22%3EHouse%3C%5C%2Fdiv%3E%22%2C%22title%22%3A%22Gorgeous%20House%20For%20Sale%22%2C%22ID%22%3A7439%2C%22price%22%3A%22%24%26nbsp%3B700%20%5C%2F%20per%20month%22%2C%22gmap_marker%22%3A%22%22%2C%22thumbnail%22%3A%22https%3A%5C%2F%5C%2Fbestpropertymarket.%5C%2Fbpm-content%5C%2Fuploads%5C%2F2021%5C%2F03%5C%2F1-1-424x280.jpg%22%2C%22lstatus%22%3A%22%3Cdiv%20class%3D%5C%22map-popup-status%20mp-cat%20color-bg%5C%22%3EFor%20Rent%3C%5C%2Fdiv%3E%22%2C%22latitude%22%3A%2240.7130736%22%2C%22longitude%22%3A%22-73.9873037%22%2C%22address%22%3A%2234-42%20Montgomery%20St%20%2C%20NY%2C%20USA%22%7D">
                      <article class="geodir-category-listing fl-wrap">
                        <div class="azp_element preview_listing azp-element-azp-withqfz5u2l geodir-category-img">
                          <a href="#" class="listing-thumb-link geodir-category-img_item">
                            <img width="424" height="280" src="../../bpm-content/uploads/2021/03/1-1-424x280.jpg" class="respimg" alt="" loading="lazy">
                            <div class="overlay"></div>
                          </a>
                          <div class="geodir-category-location"> <a href="../../maps/search/index-3.htm?api=1&query=40.7130736,-73.9873037" class="single-map-item tolt" data-microtip-position="top-left" data-tooltip="On the map"> <i class="fas fa-map-marker-alt"></i> <span>34-42 Kagoru Street , Enugu State, Nigeria</span></a></div>
                          <div class="listing-featured">Featured</div>
                          <div class="list-single-opt_header_cat dis-flex-wrap"> <a href="@" class="cat-opt status-opt flex-items-center">For Rent</a> <a href="#" class="cat-opt flex-items-center">House</a></div>
                          <a href="#" class="geodir_save-btn tolt logreg-modal-open" data-message="Logging in first to save this listing." data-microtip-position="left" data-tooltip="Login"><span><i class="fal fa-heart"></i></span></a> <a href="#" class="compare-btn tolt compare-btn-7439" data-microtip-position="left" data-tooltip="Compare" data-text1="Compare" data-text2="Added to Compare" data-lid="7439" data-ltitle="Gorgeous House For Sale" data-lthumb="../../bpm-content/uploads/2021/03/1-1-150x150.jpg" data-lprice="$&nbsp;700 / per month" data-laddress="34-42 Montgomery St , NY, USA"><span><i class="fal fa-random"></i></span></a>
                          <div class="geodir-category-listing_media-list"> <span><i class="fas fa-camera"></i> 6</span></div>
                          <div class="lcfields-wrap lcfields-abs dis-flex-wrap"></div>
                        </div>
                        <div class="azp_element preview_listing_content azp-element-azp-byjy53nmnw geodir-category-content">
                          <h3 class="title-sin_item dis-flex-wrap-center"> <a href="#">Gorgeous House For Sale</a></h3>
                          <div class="geodir-category-content_price">₦&nbsp;500M</div>
                          <div class="geodir-card-text">
                            <div class="geodir-card-excerpt">A clean house built fresh ready for sale in the heart of Nigeria Enugu State. For this property ensure to contact Best Property Market. You can click on this peoperty to get further Details About it.</div>
                            <div class="lcfields-wrap dis-flex-wrap-center"></div>
                            <div class="geodir-category-content-details">
                              <ul class="no-list-style dis-flex-wrap">
                                <li><i class="fal fa-bed"></i><span>2</span></li>
                                <li><i class="fal fa-bath"></i><span>1</span></li>
                                <li><i class="fal fa-cube"></i><span> 220 ft2</span></li>
                              </ul>
                            </div>
                          </div>
                          <div class="geodir-category-footer dis-flex-wrap-center jtf-space-between">
                            <a href="{{route('author')}}" class="gcf-company"><img alt='Best Property Market' src='../../bpm-content/plugins/bestpropertymarket-add-ons/assets/images/avatar.jpg' class='avatar avatar-80 photo' height='80' width='80'><span class="lcard-avatar">By Best Property Market</span></a>
                            <div class="listing-rating card-popup-rainingvis tolt" data-microtip-position="top" data-tooltip="Good" data-stars="5" data-rating="4.2"></div>
                          </div>
                        </div>
                      </article>
                    </div>
                    <!-- listing-item end--> <!-- listing-item -->
                    <div class="listing-item listing-item-loop" data-postid="6355" data-lmap="%7B%22url%22%3A%22https%3A%5C%2F%5C%2Fbestpropertymarket.%5C%2Flisting%5C%2Fluxury-family-home%5C%2F%22%2C%22cat%22%3A%22%3Cdiv%20class%3D%5C%22map-popup-category%20mp-cat%20color-bg%5C%22%3EHome%3C%5C%2Fdiv%3E%22%2C%22title%22%3A%22Luxury%20Family%20Home%22%2C%22ID%22%3A6355%2C%22price%22%3A%22%24%26nbsp%3B49%22%2C%22gmap_marker%22%3A%22%22%2C%22thumbnail%22%3A%22https%3A%5C%2F%5C%2Fbestpropertymarket.%5C%2Fbpm-content%5C%2Fuploads%5C%2F2021%5C%2F03%5C%2F3-1-424x280.jpg%22%2C%22lstatus%22%3A%22%3Cdiv%20class%3D%5C%22map-popup-status%20mp-cat%20color-bg%5C%22%3EFor%20Sale%3C%5C%2Fdiv%3E%22%2C%22latitude%22%3A%2240.81986777037329%22%2C%22longitude%22%3A%22-74.00715942677003%22%2C%22address%22%3A%2275%20Prince%20St%2C%20NY%2C%20USA%22%7D">
                      <article class="geodir-category-listing fl-wrap">
                        <div class="azp_element preview_listing azp-element-azp-withqfz5u2l geodir-category-img">
                          <a href="#" class="listing-thumb-link geodir-category-img_item">
                            <img width="424" height="280" src="../../bpm-content/uploads/2021/03/3-1-424x280.jpg" class="respimg" alt="" loading="lazy">
                            <div class="overlay"></div>
                          </a>
                          <div class="geodir-category-location"> <a href="../../maps/search/index.htm?api=1&query=40.81986777037329,-74.00715942677003" class="single-map-item tolt" data-microtip-position="top-left" data-tooltip="On the map"> <i class="fas fa-map-marker-alt"></i> <span> 23 Parakou Crescent, Wuse2 , Abuja</span></a></div>
                          <div class="list-single-opt_header_cat dis-flex-wrap"> <a href="#" class="cat-opt status-opt flex-items-center">For Sale</a> <a href="#" class="cat-opt flex-items-center">Home</a></div>
                          <a href="#" class="geodir_save-btn tolt logreg-modal-open" data-message="Logging in first to save this listing." data-microtip-position="left" data-tooltip="Login"><span><i class="fal fa-heart"></i></span></a> <a href="#" class="compare-btn tolt compare-btn-6355" data-microtip-position="left" data-tooltip="Compare" data-text1="Compare" data-text2="Added to Compare" data-lid="" data-ltitle="Luxury Family Home" data-lthumb="../../bpm-content/uploads/2021/03/3-1-150x150.jpg" data-lprice="$&nbsp;49" data-laddress="23 Parakou Crescent, Wuse2 , Abuja"><span><i class="fal fa-random"></i></span></a>
                          <div class="geodir-category-listing_media-list"> <span>
                          	<i class="fas fa-camera"></i> 6</span></div>
                          <div class="lcard-saleoff">
                            <div class="saleoff-inner">Sale 20%</div>
                          </div>
                          <div class="lcfields-wrap lcfields-abs dis-flex-wrap"></div>
                        </div>
                        <div class="azp_element preview_listing_content azp-element-azp-byjy53nmnw geodir-category-content">
                          <h3 class="title-sin_item dis-flex-wrap-center"> <a href="#">Luxury Family Home</a> <span class="verified-badge tolt" data-microtip-position="top" data-tooltip="Verified"><i class="far fa-check"></i></span></h3>
                          <div class="geodir-category-content_price">₦&nbsp;490M</div>
                          <div class="geodir-card-text">
                            <div class="geodir-card-excerpt">A clean house built fresh ready for sale in the heart of Nigeria (FCT). For this property ensure to contact Best Property Market. You can click on this peoperty to get further Details About it.</div>
                            <div class="lcfields-wrap dis-flex-wrap-center"></div>
                            <div class="geodir-category-content-details">
                              <ul class="no-list-style dis-flex-wrap">
                                <li><i class="fal fa-bed"></i><span>4</span></li>
                                <li><i class="fal fa-bath"></i><span>3</span></li>
                                <li><i class="fal fa-cube"></i><span> 510 ft2</span></li>
                              </ul>
                            </div>
                          </div>
                          <div class="geodir-category-footer dis-flex-wrap-center jtf-space-between"> <a href="{{route('author')}}" class="gcf-company"><img alt='Best Property Market' src='../../bpm-content/plugins/bestpropertymarket-add-ons/assets/images/avatar.jpg' class='avatar avatar-80 photo' height='80' width='80'><span class="lcard-avatar">By Best Property Market</span></a></div>
                        </div>
                      </article>
                    </div>
                    <!-- listing-item end--> <!-- listing-item -->
                    <div class="listing-item listing-item-loop" data-postid="6152" data-lmap="%7B%22url%22%3A%22https%3A%5C%2F%5C%2Fbestpropertymarket.%5C%2Flisting%5C%2Ffamily-house-for-rent%5C%2F%22%2C%22cat%22%3A%22%3Cdiv%20class%3D%5C%22map-popup-category%20mp-cat%20color-bg%5C%22%3EHouse%3C%5C%2Fdiv%3E%22%2C%22title%22%3A%22Family%20House%20For%20Rent%22%2C%22ID%22%3A6152%2C%22price%22%3A%22%24%26nbsp%3B500%2C000%22%2C%22gmap_marker%22%3A%22%22%2C%22thumbnail%22%3A%22https%3A%5C%2F%5C%2Fbestpropertymarket.%5C%2Fbpm-content%5C%2Fuploads%5C%2F2021%5C%2F03%5C%2F5-424x280.jpg%22%2C%22lstatus%22%3A%22%3Cdiv%20class%3D%5C%22map-popup-status%20mp-cat%20color-bg%5C%22%3EFor%20Sale%3C%5C%2Fdiv%3E%22%2C%22latitude%22%3A%2240.701594124269405%22%2C%22longitude%22%3A%22-73.88509092852472%22%2C%22address%22%3A%2275%20Prince%20St%2C%20NY%2C%20USA%22%7D">
                      <article class="geodir-category-listing fl-wrap">
                        <div class="azp_element preview_listing azp-element-azp-withqfz5u2l geodir-category-img">
                          <a href="#" class="listing-thumb-link geodir-category-img_item">
                            <img width="424" height="280" src="../../bpm-content/uploads/2021/03/5-424x280.jpg" class="respimg" alt="" loading="lazy">
                            <div class="overlay"></div>
                          </a>
                          <div class="geodir-category-location"> <a href="../../maps/search/index-1.htm?api=1&query=40.701594124269405,-73.88509092852472" class="single-map-item tolt" data-microtip-position="top-left" data-tooltip="On the map"> <i class="fas fa-map-marker-alt"></i> <span>75 Prince St, NY, USA</span></a></div>
                          <div class="list-single-opt_header_cat dis-flex-wrap"> <a href="#" class="cat-opt status-opt flex-items-center">For Sale</a> <a href="#" class="cat-opt flex-items-center">House</a></div>
                          <a href="#" class="geodir_save-btn tolt logreg-modal-open" data-message="Logging in first to save this listing." data-microtip-position="left" data-tooltip="Login"><span><i class="fal fa-heart"></i></span></a> <a href="#" class="compare-btn tolt compare-btn-6152" data-microtip-position="left" data-tooltip="Compare" data-text1="Compare" data-text2="Added to Compare" data-lid="6152" data-ltitle="Family House For Rent" data-lthumb="../../bpm-content/uploads/2021/03/5-150x150.jpg" data-lprice="$&nbsp;500,000" data-laddress="75 Prince St, NY, USA"><span><i class="fal fa-random"></i></span></a>
                          <div class="geodir-category-listing_media-list"> <span><i class="fas fa-camera"></i> 6</span></div>
                          <div class="lcfields-wrap lcfields-abs dis-flex-wrap"></div>
                        </div>
                        <div class="azp_element preview_listing_content azp-element-azp-byjy53nmnw geodir-category-content">
                          <h3 class="title-sin_item dis-flex-wrap-center"> <a href="#">Family House For Rent</a></h3>
                          <div class="geodir-category-content_price">$&nbsp;500,000</div>
                          <div class="geodir-card-text">
                            <div class="geodir-card-excerpt">A clean house built fresh ready for sale in the heart of Nigeria (FCT). For this property ensure to contact Best Property Market. You can click on this peoperty to get further Details About it.</div>
                            <div class="lcfields-wrap dis-flex-wrap-center"></div>
                            <div class="geodir-category-content-details">
                              <ul class="no-list-style dis-flex-wrap">
                                <li><i class="fal fa-bed"></i><span>4</span></li>
                                <li><i class="fal fa-bath"></i><span>3</span></li>
                                <li><i class="fal fa-cube"></i><span> 510 ft2</span></li>
                              </ul>
                            </div>
                          </div>
                          <div class="geodir-category-footer dis-flex-wrap-center jtf-space-between">
                            <a href="{{route('author')}}" class="gcf-company"><img alt='Best Property Market' src='../../bpm-content/plugins/bestpropertymarket-add-ons/assets/images/avatar.jpg' class='avatar avatar-80 photo' height='80' width='80'><span class="lcard-avatar">By Best Property Market</span></a>
                            <div class="listing-rating card-popup-rainingvis tolt" data-microtip-position="top" data-tooltip="Good" data-stars="5" data-rating="4.0"></div>
                          </div>
                        </div>
                      </article>
                    </div>
                    <!-- listing-item end--> <!-- listing-item -->
                    <div class="listing-item listing-item-loop" data-postid="5126" data-lmap="%7B%22url%22%3A%22https%3A%5C%2F%5C%2Fbestpropertymarket.%5C%2Flisting%5C%2Fcontemporary-apartment%5C%2F%22%2C%22cat%22%3A%22%3Cdiv%20class%3D%5C%22map-popup-category%20mp-cat%20color-bg%5C%22%3EApartment%3C%5C%2Fdiv%3E%22%2C%22title%22%3A%22Contemporary%20Apartment%22%2C%22ID%22%3A5126%2C%22price%22%3A%22%24%26nbsp%3B600%2C000%22%2C%22gmap_marker%22%3A%22%22%2C%22thumbnail%22%3A%22https%3A%5C%2F%5C%2Fbestpropertymarket.%5C%2Fbpm-content%5C%2Fuploads%5C%2F2021%5C%2F03%5C%2F6-424x280.jpg%22%2C%22lstatus%22%3A%22%3Cdiv%20class%3D%5C%22map-popup-status%20mp-cat%20color-bg%5C%22%3EFor%20Sale%3C%5C%2Fdiv%3E%22%2C%22latitude%22%3A%2240.78708237136644%22%2C%22longitude%22%3A%22-73.97548763779922%22%2C%22address%22%3A%2270%20Bright%20St%20New%20York%2C%20USA%22%7D">
                      <article class="geodir-category-listing fl-wrap">
                        <div class="azp_element preview_listing azp-element-azp-withqfz5u2l geodir-category-img">
                          <a href="#" class="listing-thumb-link geodir-category-img_item">
                            <img width="424" height="280" src="../../bpm-content/uploads/2021/03/6-424x280.jpg" class="respimg" alt="" loading="lazy">
                            <div class="overlay"></div>
                          </a>
                          <div class="geodir-category-location"> <a href="../../maps/search/index-2.htm?api=1&query=40.78708237136644,-73.97548763779922" class="single-map-item tolt" data-microtip-position="top-left" data-tooltip="On the map"> <i class="fas fa-map-marker-alt"></i> <span>70 Bright St New York, USA</span></a></div>
                          <div class="listing-featured">Featured</div>
                          <div class="list-single-opt_header_cat dis-flex-wrap"> <a href="#" class="cat-opt status-opt flex-items-center">For Sale</a> <a href="#" class="cat-opt flex-items-center">Apartment</a></div>
                          <a href="#" class="geodir_save-btn tolt logreg-modal-open" data-message="Logging in first to save this listing." data-microtip-position="left" data-tooltip="Login"><span><i class="fal fa-heart"></i></span></a> <a href="#" class="compare-btn tolt compare-btn-5126" data-microtip-position="left" data-tooltip="Compare" data-text1="Compare" data-text2="Added to Compare" data-lid="5126" data-ltitle="Contemporary Apartment" data-lthumb="../../bpm-content/uploads/2021/03/6-150x150.jpg" data-lprice="$&nbsp;600,000" data-laddress="70 Bright St New York, USA"><span><i class="fal fa-random"></i></span></a>
                          <div class="geodir-category-listing_media-list"> <span><i class="fas fa-camera"></i> 6</span></div>
                          <div class="lcard-saleoff">
                            <div class="saleoff-inner">Sale 20%</div>
                          </div>
                          <div class="lcfields-wrap lcfields-abs dis-flex-wrap"></div>
                        </div>
                        <div class="azp_element preview_listing_content azp-element-azp-byjy53nmnw geodir-category-content">
                          <h3 class="title-sin_item dis-flex-wrap-center"> <a href="#">Contemporary Apartment</a> <span class="verified-badge tolt" data-microtip-position="top" data-tooltip="Verified"><i class="far fa-check"></i></span></h3>
                          <div class="geodir-category-content_price">$&nbsp;600,000</div>
                          <div class="geodir-card-text">
                            <div class="geodir-card-excerpt">A clean house built fresh ready for sale in the Geogia. For this property ensure to contact Best Property Market. You can click on this peoperty to get further Details About it.</div>
                            <div class="lcfields-wrap dis-flex-wrap-center"></div>
                            <div class="geodir-category-content-details">
                              <ul class="no-list-style dis-flex-wrap">
                                <li><i class="fal fa-bed"></i><span>3</span></li>
                                <li><i class="fal fa-bath"></i><span>2</span></li>
                                <li><i class="fal fa-cube"></i><span> 450 ft2</span></li>
                              </ul>
                            </div>
                          </div>
                          <div class="geodir-category-footer dis-flex-wrap-center jtf-space-between">
                            <a href="{{route('author')}}" class="gcf-company"><img alt='Best Property Market' src='../../bpm-content/plugins/bestpropertymarket-add-ons/assets/images/avatar.jpg' class='avatar avatar-80 photo' height='80' width='80'><span class="lcard-avatar">By Best Property Market</span></a>
                            <div class="listing-rating card-popup-rainingvis tolt" data-microtip-position="top" data-tooltip="Good" data-stars="5" data-rating="4.3"></div>
                          </div>
                        </div>
                      </article>
                    </div>
                    <!-- listing-item end--> <!-- listing-item -->
                    <div class="listing-item listing-item-loop" data-postid="5115" data-lmap="%7B%22url%22%3A%22https%3A%5C%2F%5C%2Fbestpropertymarket.%5C%2Flisting%5C%2Fkayak-point-house%5C%2F%22%2C%22cat%22%3A%22%3Cdiv%20class%3D%5C%22map-popup-category%20mp-cat%20color-bg%5C%22%3EHouse%3C%5C%2Fdiv%3E%22%2C%22title%22%3A%22Kayak%20Point%20House%22%2C%22ID%22%3A5115%2C%22price%22%3A%22%24%26nbsp%3B320%2C000%22%2C%22gmap_marker%22%3A%22%22%2C%22thumbnail%22%3A%22https%3A%5C%2F%5C%2Fbestpropertymarket.%5C%2Fbpm-content%5C%2Fuploads%5C%2F2021%5C%2F03%5C%2F8-424x280.jpg%22%2C%22lstatus%22%3A%22%3Cdiv%20class%3D%5C%22map-popup-status%20mp-cat%20color-bg%5C%22%3EFor%20Sale%3C%5C%2Fdiv%3E%22%2C%22latitude%22%3A%227.539988999999998%22%2C%22longitude%22%3A%22-5.547079999999999%22%2C%22address%22%3A%2240%20Journal%20Square%20%2C%20NJ%2C%20USA%22%7D">
                      <article class="geodir-category-listing fl-wrap">
                        <div class="azp_element preview_listing azp-element-azp-withqfz5u2l geodir-category-img">
                          <a href="#" class="listing-thumb-link geodir-category-img_item">
                            <img width="424" height="280" src="../../bpm-content/uploads/2021/03/8-424x280.jpg" class="respimg" alt="" loading="lazy">
                            <div class="overlay"></div>
                          </a>
                          <div class="geodir-category-location"> <a href="../../maps/search/index-6.htm?api=1&query=7.539988999999998,-5.547079999999999" class="single-map-item tolt" data-microtip-position="top-left" data-tooltip="On the map"> <i class="fas fa-map-marker-alt"></i> <span>40 Journal Square , NJ, USA</span></a></div>
                          <div class="listing-featured">Featured</div>
                          <div class="list-single-opt_header_cat dis-flex-wrap"> <a href="#" class="cat-opt status-opt flex-items-center">For Sale</a> <a href="#" class="cat-opt flex-items-center">House</a></div>
                          <a href="#" class="geodir_save-btn tolt logreg-modal-open" data-message="Logging in first to save this listing." data-microtip-position="left" data-tooltip="Login"><span><i class="fal fa-heart"></i></span></a> <a href="#" class="compare-btn tolt compare-btn-5115" data-microtip-position="left" data-tooltip="Compare" data-text1="Compare" data-text2="Added to Compare" data-lid="5115" data-ltitle="Kayak Point House" data-lthumb="../../bpm-content/uploads/2021/03/8-150x150.jpg" data-lprice="$&nbsp;320,000" data-laddress="40 Journal Square , NJ, USA"><span><i class="fal fa-random"></i></span></a>
                          <div class="geodir-category-listing_media-list"> <span><i class="fas fa-camera"></i> 6</span></div>
                          <div class="lcfields-wrap lcfields-abs dis-flex-wrap"></div>
                        </div>
                        <div class="azp_element preview_listing_content azp-element-azp-byjy53nmnw geodir-category-content">
                          <h3 class="title-sin_item dis-flex-wrap-center"> <a href="#">Kayak Point House</a> <span class="verified-badge tolt" data-microtip-position="top" data-tooltip="Verified"><i class="far fa-check"></i></span></h3>
                          <div class="geodir-category-content_price">$&nbsp;320,000</div>
                          <div class="geodir-card-text">
                            <div class="geodir-card-excerpt">A clean house built fresh ready for sale in the heart of Nigeria (FCT). For this property ensure to contact Best Property Market. You can click on this peoperty to get further Details About it.</div>
                            <div class="lcfields-wrap dis-flex-wrap-center"></div>
                            <div class="geodir-category-content-details">
                              <ul class="no-list-style dis-flex-wrap">
                                <li><i class="fal fa-bed"></i><span>3</span></li>
                                <li><i class="fal fa-bath"></i><span>2</span></li>
                                <li><i class="fal fa-cube"></i><span> 460 ft2</span></li>
                              </ul>
                            </div>
                          </div>
                          <div class="geodir-category-footer dis-flex-wrap-center jtf-space-between">
                            <a href="{{route('author')}}" class="gcf-company"><img alt='Best Property Market' src='../../bpm-content/plugins/bestpropertymarket-add-ons/assets/images/avatar.jpg' class='avatar avatar-80 photo' height='80' width='80'><span class="lcard-avatar">By Best Property Market</span></a>
                            <div class="listing-rating card-popup-rainingvis tolt" data-microtip-position="top" data-tooltip="Excellent" data-stars="5" data-rating="4.5"></div>
                          </div>
                        </div>
                      </article>
                    </div>
                    <!-- listing-item end--> <!-- listing-item -->
                    <div class="listing-item listing-item-loop" data-postid="1744" data-lmap="%7B%22url%22%3A%22https%3A%5C%2F%5C%2Fbestpropertymarket.%5C%2Flisting%5C%2Furban-house%5C%2F%22%2C%22cat%22%3A%22%3Cdiv%20class%3D%5C%22map-popup-category%20mp-cat%20color-bg%5C%22%3EHouse%3C%5C%2Fdiv%3E%22%2C%22title%22%3A%22Urban%20House%22%2C%22ID%22%3A1744%2C%22price%22%3A%22%24%26nbsp%3B500%2C000%22%2C%22gmap_marker%22%3A%22%22%2C%22thumbnail%22%3A%22https%3A%5C%2F%5C%2Fbestpropertymarket.%5C%2Fbpm-content%5C%2Fuploads%5C%2F2021%5C%2F03%5C%2F9-424x280.jpg%22%2C%22lstatus%22%3A%22%3Cdiv%20class%3D%5C%22map-popup-status%20mp-cat%20color-bg%5C%22%3EFor%20Sale%3C%5C%2Fdiv%3E%22%2C%22latitude%22%3A%2240.7172387%22%2C%22longitude%22%3A%22-74.04772960000003%22%2C%22address%22%3A%2275%20Prince%20St%2C%20NY%2C%20USA%22%7D">
                      <article class="geodir-category-listing fl-wrap">
                        <div class="azp_element preview_listing azp-element-azp-withqfz5u2l geodir-category-img">
                          <a href="#" class="listing-thumb-link geodir-category-img_item">
                            <img width="424" height="280" src="../../bpm-content/uploads/2021/03/9-424x280.jpg" class="respimg" alt="" loading="lazy">
                            <div class="overlay"></div>
                          </a>
                          <div class="geodir-category-location"> <a href="../../maps/search/index-7.htm?api=1&query=40.7172387,-74.04772960000003" class="single-map-item tolt" data-microtip-position="top-left" data-tooltip="On the map"> <i class="fas fa-map-marker-alt"></i> <span>75 Prince St, NY, USA</span></a></div>
                          <div class="listing-featured">Featured</div>
                          <div class="list-single-opt_header_cat dis-flex-wrap"> <a href="#" class="cat-opt status-opt flex-items-center">For Sale</a> <a href="#" class="cat-opt flex-items-center">House</a></div>
                          <a href="#" class="geodir_save-btn tolt logreg-modal-open" data-message="Logging in first to save this listing." data-microtip-position="left" data-tooltip="Login"><span><i class="fal fa-heart"></i></span></a> <a href="#" class="compare-btn tolt compare-btn-1744" data-microtip-position="left" data-tooltip="Compare" data-text1="Compare" data-text2="Added to Compare" data-lid="1744" data-ltitle="Urban House" data-lthumb="../../bpm-content/uploads/2021/03/9-150x150.jpg" data-lprice="$&nbsp;500,000" data-laddress="75 Prince St, NY, USA"><span><i class="fal fa-random"></i></span></a>
                          <div class="geodir-category-listing_media-list"> <span><i class="fas fa-camera"></i> 6</span></div>
                          <div class="lcfields-wrap lcfields-abs dis-flex-wrap"></div>
                        </div>
                        <div class="azp_element preview_listing_content azp-element-azp-byjy53nmnw geodir-category-content">
                          <h3 class="title-sin_item dis-flex-wrap-center"> <a href="#">Urban House</a> <span class="verified-badge tolt" data-microtip-position="top" data-tooltip="Verified"><i class="far fa-check"></i></span></h3>
                          <div class="geodir-category-content_price">$&nbsp;500,000</div>
                          <div class="geodir-card-text">
                            <div class="geodir-card-excerpt">A clean house built fresh ready for sale in the heart of Nigeria (FCT). For this property ensure to contact Best Property Market. You can click on this peoperty to get further Details About it.</div>
                            <div class="lcfields-wrap dis-flex-wrap-center"></div>
                            <div class="geodir-category-content-details">
                              <ul class="no-list-style dis-flex-wrap">
                                <li><i class="fal fa-bed"></i><span>4</span></li>
                                <li><i class="fal fa-bath"></i><span>3</span></li>
                                <li><i class="fal fa-cube"></i><span> 510 ft2</span></li>
                              </ul>
                            </div>
                          </div>
                          <div class="geodir-category-footer dis-flex-wrap-center jtf-space-between">
                            <a href="{{route('author')}}" class="gcf-company"><img alt='Best Property Market' src='../../bpm-content/plugins/bestpropertymarket-add-ons/assets/images/avatar.jpg' class='avatar avatar-80 photo' height='80' width='80'><span class="lcard-avatar">By Best Property Market</span></a>
                            <div class="listing-rating card-popup-rainingvis tolt" data-microtip-position="top" data-tooltip="Good" data-stars="5" data-rating="4.3"></div>
                          </div>
                        </div>
                      </article>
                    </div>
                    <!-- listing-item end-->
                  </div>
                  <div class="listings-pagination-wrap">
                    <span class="section-separator"></span>
                    <nav class="navigation pagination custom-pagination ajax-pagination" role="navigation">
                      <div class="nav-links"><span data-page="1" class="prevposts-link page-numbers"><i class="fa fa-caret-left"></i></span><span data-page="1" aria-current="page" class="page-numbers current">1</span><a data-page="2" href="#" class="page-numbers ajax-pagi-item">2</a><a data-page="3" href="#" class="page-numbers ajax-pagi-item">3</a><a data-page="2" href="#" class="nextposts-link page-numbers ajax-pagi-item"><i class="fa fa-caret-right"></i></a></div>
                    </nav>
                  </div>
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