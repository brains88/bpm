@include('layouts.header')
    @include('frontend.layouts.navbar')
   <!--  wrapper  -->
   <div id="wrapper">
  <!-- Content-->
  <div class="content">
    <div data-elementor-type="wp-post" data-elementor-id="6808" class="elementor elementor-6808" data-elementor-settings="[]">
      <div class="elementor-section-wrap">
        <section class="elementor-section elementor-top-section elementor-element elementor-element-3464d599 elementor-section-full_width overvi pad-bot-0 pad-top-0 elementor-section-height-default elementor-section-height-default" data-id="3464d599" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;video&quot;}">
          <div class="elementor-container elementor-column-gap-no">
            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-6ce5ad3d" data-id="6ce5ad3d" data-element_type="column">
              <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-7e2da03 elementor-widget elementor-widget-hero_section" data-id="7e2da03" data-element_type="widget" data-widget_type="hero_section.default">
                  <div class="elementor-widget-container">
                    <section class="hero-section hero-section_dec elementor-hero-section hero-slideshow" data-scrollax-parent="true">
                      <div class="bg-wrap">
                        <div class="half-hero-bg-media full-height">
                          <div class="slider-progress-bar">
                            <span>
                              <svg class="circ" width="30" height="30">
                                <circle class="circ2" cx="15" cy="15" r="13" stroke="rgba(255,255,255,0.4)" stroke-width="1" fill="none"></circle>
                                <circle class="circ1" cx="15" cy="15" r="13" stroke="#fff" stroke-width="2" fill="none">
                                </circle>
                              </svg>
                            </span>
                          </div>
                          <div class="slideshow-container">
                            <!-- slideshow-item -->
                            <div class="slideshow-item">
                              <div class="bg" data-bg="uploads/sliderPics/19.jpg"></div>
                            </div>
                            <!--  slideshow-item end  --> 
                            <!-- slideshow-item -->
                            <div class="slideshow-item">
                              <div class="bg" data-bg="uploads/sliderPics/17.jpg">
                              </div>
                            </div>
                            <!--  slideshow-item end  -->
                            <!-- slideshow-item -->
                            <div class="slideshow-item">
                              <div class="bg" data-bg="uploads/sliderPics/12.jpg"></div>
                            </div>
                            <!--  slideshow-item end  -->
                          </div>
                        </div>
                      </div>
                      <div class="container idx-5">
                        <div class="hrsec-inner pos-relative al-left bsform-yes">
                          <div class="hero-title hero-title_small">
                            <h1>Best Property Market Searching Platform</h1>
                            <h2>Find The House of Your Dream <br> Using Our Platform</h2>
                          </div>
                          <div class="main-search-form-wrap clearfix">
                            <!-- main-search-input-tabs-->
                            <div class="main-search-input-tabs  tabs-act fl-wrap tabs-wrapper ltypes-count-1">
                              <ul class="tabs-menu change_bg no-list-style">
                                <li class="lfilter-tabitem current">
                                  <a href="#lfilter-tab-6379" data-bgtab="">Sale</a>
                                </li>
                              </ul>
                              <!--tabs -->
                              <div class="tabs-container fl-wrap">
                                <!--tab -->
                                <div class="tab lfilter-tab-6379">
                                  <div id="lfilter-tab-6379" class="tab-content first-tab">
                                    <div class="main-search-input-wrap fl-wrap">
                                      <form  action="{{route('AdvancedSearch')}}" class="list-search-hero-form list-search-form-js">
                                        <div class="azp_element filter_form_hero azp-element-azp-krjgkspo8rj">
                                          <div class="hero-inputs-wrap fl-wrap">
                                            <div class="azp_element filter_title azp-element-azp-w3dh4rx8g8n filter-gid-item filter-gid-wid-3">
                                              <div class="filter-item-inner"> 
                                                <input type="text" name="search_term" placeholder="What you need?" value="">
                                              </div>
                                            </div>
                                            <div class="azp_element filter_status azp-element-azp-nbgzzmoad3i filter-gid-item filter-gid-wid-3">
                                              <div class="filter-item-inner">
                                                <select data-placeholder="All Type" class="chosen-select" name="status">
                                                  <option value="">All Type</option>
                                                  @foreach(\App\Models\Property::$actions as $key => $value)
                                                    @if($key !== 'sold')
                                                        <option value="{{ $key }}">
                                                            {{ ucwords($value) }}
                                                        </option>
                                                    @endif
                                                  @endforeach
                                                </select>
                                              </div>
                                            </div>
                                            <div class="azp_element filter_loc azp-element-azp-mo80hru1jrf filter-gid-item filter-gid-wid-3">
                                              <div class="filter-item-inner">
                                                <select data-placeholder="All Cities" class="chosen-select" name="llocs">
                                                  <option value="">All Countries</option>
                                                    <?php $countries = \App\Models\Country::all(); ?>
                                                    @if(empty($countries))
                                                        <option>No countries listed</option>
                                                    @else
                                                        @foreach($countries as $country)
                                                            <option value="{{ $country->iso2 }}">
                                                                {{ ucwords($country->name) }}
                                                            </option>
                                                        @endforeach
                                                  @endif
                                                </select>
                                              </div>
                                            </div>
                                            <?php $cities = \DB::table('properties')->distinct('city')->pluck('city'); ?>
                                            <div class="azp_element filter_loc azp-element-azp-mo80hru1jrf filter-gid-item filter-gid-wid-3">
                                              <div class="filter-item-inner">
                                                <select data-placeholder="All Cities" class="chosen-select" name="llocs">
                                                    <option value="">All Cities</option>
                                                    @if(empty($cities->count()))
                                                        <option>No cities listed</option>
                                                    @else
                                                        @foreach($cities as $city)
                                                            <option value="{{ $city }}">
                                                                {{ ucwords($city) }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                              </div>
                                            </div>
                                            <button class="main-search-button color-bg" type="submit">Search <i class="far fa-search"></i></button>
                                          </div>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                                <!--tab end-->
                              </div>
                              <!--tabs end-->
                            </div>
                            <!-- main-search-input-tabs end-->
                          </div>
                          <div class="intro-item-after fl-wrap">
                            <div class="hero-notifer fl-wrap">Need more search options? <a href="{{route('AdvancedSearch')}}">Advanced Search</a>
                            </div>
                          </div>
                          <div class="scroll-down-wrap">
                            <div class="mousey">
                              <div class="scroller">
                              </div>
                            </div>
                            <span>Scroll Down To Discover</span>
                          </div>
                        </div>
                        <!-- end hrsec-inner -->
                      </div>
                    </section>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="elementor-section elementor-top-section elementor-element elementor-element-d697f56 elementor-section-full_width no-padding elementor-section-height-default elementor-section-height-default" data-id="d697f56" data-element_type="section">
          <div class="elementor-container elementor-column-gap-no">
            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-448263fe" data-id="448263fe" data-element_type="column">
              <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-4a84c78d elementor-widget elementor-widget-cthbreadcrumbs" data-id="4a84c78d" data-element_type="widget" data-widget_type="cthbreadcrumbs.default">
                  <div class="elementor-widget-container">
                    <!-- breadcrumbs-->
                    <div class="breadcrumbs-wrapper inline-breadcrumbs fw-breadcrumbs sp-brd fl-wrap">
                      <div class="container">
                        <div class="inline-breadcrumbs-wrap flex-items-center jtf-space-between flw-wrap">
                          <div class="inline-breadcrumbs-inner">
                            <div class="container-inner flex-items-center jtf-space-between flw-wrap">
                              <div class="breadcrumbs-list ">
                                <a class="breadcrumb-link breadcrumb-home" href="/" title="Home">Home</a>
                                <span class="breadcrumb-current breadcrumb-item-page-6808" title="Home Best Property Market">Best Property Market</span>
                              </div>
                            </div>
                          </div>
                          <div class="inline-breadcrumbs-right flex-items-center">
                            <div class="share-holder hid-share">
                              <a href="#" class="share-btn showshare">
                              <i class="fas fa-share-alt"></i>Share</a>
                              <div class="share-container isShare" data-share="facebook, pinterest, googleplus, twitter, linkedin">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- breadcrumbs end -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="elementor-section elementor-top-section elementor-element elementor-element-517ba243 gray-bg small-padding elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="517ba243" data-element_type="section">
          <div class="elementor-container elementor-column-gap-default">
            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-64120373" data-id="" data-element_type="column">
              <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-1b042ce1 elementor-widget elementor-widget-listings_grid_new" data-id="" data-element_type="widget" data-widget_type="listings_grid_new.default">
                  <div class="elementor-widget-container">
                    <!-- carousel -->
                    <div class="listings-grid-wrap clearfix three-cols">
                      <!-- list-main-wrap-->
                      <div class="list-main-wrap fl-wrap card-listing cthiso-isotope-wrapper">
                        <div class="cthiso-top listing-grid-top flex-items-center jtf-space-between flw-wrap">
                          <div class="section-title st-left st-st1">
                            <h4 class="sec-subtitle"><span>BROWSE HOT OFFERS</span></h4>
                            <h2 class="sec-title">Latest Properties</h2>
                          </div>
                          <!-- filter  -->
                          <div class="cthiso-filters jtf-flex-end"> 
                            <a href="#" class="cthiso-filter cthiso-filter-active" data-filter="*">All Types</a>
                            @foreach(\App\Models\Property::$actions as $key => $value)
                                @if($key !== 'sold')
                                    <a href="{{ route('properties.action', ['action' => $key]) }}" class="cthiso-filter" data-filter=".listing_status-for-sale">
                                        {{ ucwords($value) }}
                                    </a>
                                @endif
                              @endforeach
                          </div>
                          <!-- filter end -->
                        </div>
                        <!-- cthiso-top -->
                        <div class="cthiso-items cthiso-xm-pad cthiso-three-cols clearfix cthiso-flex">
                          <div class="cthiso-sizer"></div>
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
                        <div class="view-all-listings">
                          <a href="{{ route('properties') }}" class="btn  dec_btn  color2-bg">Check Out All Listings</a>
                        </div>
                      </div>
                      <!-- list-main-wrap end-->
                    </div>
                    <!--  listings-grid-wrap end-->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="elementor-section elementor-top-section elementor-element elementor-element-2ad8e977 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="2ad8e977" data-element_type="section">
          <div class="elementor-container elementor-column-gap-default">
            <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-2517afc3" data-id="2517afc3" data-element_type="column">
              <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-2c3d4b47 elementor-widget elementor-widget-section_title" data-id="2c3d4b47" data-element_type="widget" data-widget_type="section_title.default">
                  <div class="elementor-widget-container">
                    <div class="section-title st-left st-st2">
                      <h4 class="sec-subtitle">
                        <span>Why Choose Our Properties</span>
                      </h4>
                      <h2 class="sec-title">Check video presentation to find out more about us .</h2>
                      <div class="st-desc">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="elementor-element elementor-element-369b84 elementor-widget elementor-widget-feature_box" data-id="369b84" data-element_type="widget" data-widget_type="feature_box.default">
                  <div class="elementor-widget-container">
                    <!--services-box -->
                    <div class="services-item sty2">
                      <div class="service-icon">
                        <i class="fal fa-headset"></i>
                      </div>
                      <div class="service-ithead dis-flex jtf-space-between">
                        <h4 class="service-title">24 Hours Support</h4>
                        <span></span>
                      </div>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar.</p>
                    </div>
                    <!-- services-box end  -->
                  </div>
                </div>
                <div class="elementor-element elementor-element-64a9254d elementor-widget elementor-widget-feature_box" data-id="64a9254d" data-element_type="widget" data-widget_type="feature_box.default">
                  <div class="elementor-widget-container">
                    <!--services-box -->
                    <div class="services-item sty2">
                      <div class="service-icon"> <i class="fal fa-users-cog"></i></div>
                      <div class="service-ithead dis-flex jtf-space-between">
                        <h4 class="service-title">User Admin Panel</h4>
                        <span></span>
                      </div>
                      <p>Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Curabitur convallis fringilla diam sed aliquam.
                      </p>
                    </div>
                    <!-- services-box end  -->
                  </div>
                </div>
                <div class="elementor-element elementor-element-4257e127 elementor-widget elementor-widget-feature_box" data-id="4257e127" data-element_type="widget" data-widget_type="feature_box.default">
                  <div class="elementor-widget-container">
                    <!--services-box -->
                    <div class="services-item sty2">
                      <div class="service-icon">
                        <i class="fal fa-phone-laptop"></i>
                      </div>
                      <div class="service-ithead dis-flex jtf-space-between">
                        <h4 class="service-title">Mobile Friendly</h4>
                        <span></span>
                      </div>
                      <p>Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa.</p>
                    </div>
                    <!-- services-box end  -->
                  </div>
                </div>
              </div>
            </div>
            <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-1d0f6c41 elementor-hidden-tablet elementor-hidden-phone" data-id="1d0f6c41" data-element_type="column">
              <div class="elementor-widget-wrap"></div>
            </div>
            <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-6faa41ce" data-id="6faa41ce" data-element_type="column">
              <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-50e5ea1e elementor-widget elementor-widget-image_quote" data-id="50e5ea1e" data-element_type="widget" data-widget_type="image_quote.default">
                  <div class="elementor-widget-container">
                    <div class="about-img fl-wrap">
                      <img width="1200" height="800" src="bpm-content/uploads/2021/02/27.jpg" class="respimg" alt="" loading="lazy">
                      <div class="about-img-hotifer color-bg">
                        <p>Our Website is super responsive and and full  of  dynamic properties , from all over the world, try by countries and cities in your search</p>
                        <h5>Mr Uche</h5>
                        <h6>Best Market Property CEO</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="elementor-section elementor-top-section elementor-element elementor-element-282329be elementor-section-full_width no-padding elementor-section-content-middle elementor-section-height-default elementor-section-height-default" data-id="282329be" data-element_type="section">
          <div class="elementor-container elementor-column-gap-no">
            <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-2a11c2e9 color-bg bot-bg-pos" data-id="2a11c2e9" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
              <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-background-overlay"></div>
                <div class="elementor-element elementor-element-49a96af9 elementor-widget elementor-widget-heading" data-id="49a96af9" data-element_type="widget" data-widget_type="heading.default">
                  <div class="elementor-widget-container">
                    <h2 class="elementor-heading-title elementor-size-default">Explore Best Cities</h2>
                  </div>
                </div>
                <div class="elementor-element elementor-element-e240667 elementor-widget elementor-widget-heading" data-id="e240667" data-element_type="widget" data-widget_type="heading.default">
                  <div class="elementor-widget-container">
                    <p class="elementor-heading-title elementor-size-default">Take a tour with us as we show your new, big and best cities of the world. Just incase you want to invest on a property, you can take a peak over this section to see very beautiful cities you can own a home.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="elementor-column elementor-col-66 elementor-top-column elementor-element elementor-element-2ba3ddd5" data-id="2ba3ddd5" data-element_type="column">
              <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-5ae4e478 elementor-widget elementor-widget-listing_locations" data-id="5ae4e478" data-element_type="widget" data-widget_type="listing_locations.default">
                  <div class="elementor-widget-container">
                    <div class="half-carousel-wrapper listing-slider-editor-col-3">
                      <!-- carousel -->
                      <div class="single-carousel-wrap carousel-wrap half-carousel full-heights">
                        <div class="single-carousel carousel" data-options='{"slidesToShow":3,"adaptiveHeight":false,"variableWidth":false,"centerMode":false,"arrows":false,"dots":true,"infinite":true,"responsive":[{"breakpoint":1650,"settings":{"slidesToShow":3}},{"breakpoint":1224,"settings":{"slidesToShow":2}},{"breakpoint":564,"settings":{"slidesToShow":1}}]}'>
                          <div class="slick-item">
                            <div class="half-carousel-item fl-wrap">
                              <div class="bg-wrap bg-parallax-wrap-gradien">
                                <div class="bg" data-bg="uploads/2021/04/1-1.jpg">
                                </div>
                              </div>
                              <div class="half-carousel-content">
                                <div class="hc-counter color-bg">
                                  <span>3</span> Properties
                                </div>
                                <h3>
                                  <a href="#">Rome</a>
                                </h3>
                                <p>Constant care and attention to the patients makes good record</p>
                              </div>
                            </div>
                          </div>
                          <div class="slick-item">
                            <div class="half-carousel-item fl-wrap">
                              <div class="bg-wrap bg-parallax-wrap-gradien">
                                <div class="bg" data-bg="uploads/2021/04/3.jpg">
                                </div>
                              </div>
                              <div class="half-carousel-content">
                                <div class="hc-counter color-bg">
                                  <span>3 </span> Properties
                                </div>
                                <h3>
                                  <a href="#">Paris</a>
                                </h3>
                                <p>Constant care and attention to the patients makes good record</p>
                              </div>
                            </div>
                          </div>
                          <div class="slick-item">
                            <div class="half-carousel-item fl-wrap">
                              <div class="bg-wrap bg-parallax-wrap-gradien">
                                <div class="bg" data-bg="uploads/2021/04/1-1.jpg">
                                </div>
                              </div>
                              <div class="half-carousel-content">
                                <div class="hc-counter color-bg">
                                  <span>5 </span> Properties
                                </div>
                                <h3><a href="#">New York</a></h3>
                                <p>Constant care and attention to the patients makes good record</p>
                              </div>
                            </div>
                          </div>
                          <div class="slick-item">
                            <div class="half-carousel-item fl-wrap">
                              <div class="bg-wrap bg-parallax-wrap-gradien">
                                <div class="bg" data-bg="uploads/2021/04/4.jpg">
                                </div>
                              </div>
                              <div class="half-carousel-content">
                                <div class="hc-counter color-bg">
                                  <span>4 </span> Properties
                                </div>
                                <h3>
                                  <a href="#">Moscow</a>
                                </h3>
                                <p>Constant care and attention to the patients makes good record</p>
                              </div>
                            </div>
                          </div>
                          <div class="slick-item">
                            <div class="half-carousel-item fl-wrap">
                              <div class="bg-wrap bg-parallax-wrap-gradien">
                                <div class="bg" data-bg="uploads/2021/04/2.jpg">
                                </div>
                              </div>
                              <div class="half-carousel-content">
                                <div class="hc-counter color-bg">
                                  <span>2 </span> Properties
                                </div>
                                <h3>
                                  <a href="#">London</a>
                                </h3>
                                <p>Constant care and attention to the patients makes good record</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--  carousel end-->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="elementor-section elementor-top-section elementor-element elementor-element-1fda5299 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="1fda5299" data-element_type="section">
          <div class="elementor-container elementor-column-gap-default">
            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-746dfdbd" data-id="746dfdbd" data-element_type="column">
              <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-14bdc14e elementor-widget elementor-widget-section_title" data-id="14bdc14e" data-element_type="widget" data-widget_type="section_title.default">
                  <div class="elementor-widget-container">
                    <div class="section-title st-center st-st1">
                      <h4 class="sec-subtitle">
                        <span>THE BEST AGENTS</span>
                      </h4>
                      <h2 class="sec-title">Meet Our Agents</h2>
                      <div class="st-desc"></div>
                    </div>
                  </div>
                </div>
                <div class="elementor-element elementor-element-ad9fe6e elementor-widget elementor-widget-agents" data-id="ad9fe6e" data-element_type="widget" data-widget_type="agents.default">
                  <div class="elementor-widget-container">
                    <!-- carousel -->
                    <div class="single-carousel-wrap carousel-wrap agents-carousel-wrap">
                      <div class="single-carousel carousel listing-slider-editor-col-3" data-options='{"slidesToShow":3,"adaptiveHeight":true,"variableWidth":false,"centerMode":true,"arrows":false,"dots":true,"infinite":true}'>
                        <!-- slick-slide-item -->
                        <div class="slick-slide-item slick-item">
                          <!--  agent card item -->
                          <article class="geodir-category-listing fl-wrap">
                            <div class="geodir-category-img fl-wrap  agent_card">
                              <a href="#" class="geodir-category-img_item">
                                <img width="800" height="533" src="bpm-content/uploads/2021/02/2.jpg" class="attachment-full size-full wp-post-image" alt="" loading="lazy"
                                  >
                                <ul class="list-single-opt_header_cat no-list-style">
                                  <li><span class="cat-opt color-bg"> 17 Listings </span></li>
                                </ul>
                              </a>
                              <div class="agent-card-social fl-wrap">
                                <ul class="no-list-style">
                                  <li><a href="#" target="_blank">
                                    <i class="fab fa-facebook-f"></i></a>
                                  </li>
                                  <li><a href="#" target="_blank">
                                    <i class="fab fa-twitter"></i></a>
                                  </li>
                                  <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                                  </li>
                                </ul>
                              </div>
                              <div class="listing-rating card-popup-rainingvis" data-rating="4" data-stars="5">
                                <span class="re_stars-title review-text">Good</span>
                              </div>
                            </div>
                            <div class="geodir-category-content fl-wrap">
                              <div class="card-verified tolt" data-microtip-position="top-left" data-tooltip="Verified">
                                <i class="fal fa-user-check"></i>
                              </div>
                              <div class="agent_card-title fl-wrap">
                                <h4 class="agent-title"><a href="#">Liza Rose</a></h4>
                                <h5 class="agent-agency"><a href="#">Mavers RealEstate Agency</a></h5>
                              </div>
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla.</p>
                              <div class="geodir-category-footer fl-wrap">
                                <a href="../agent/liza-rose/index.htm" class="btn float-btn color-bg small-btn">View Profile</a> 
                                <a href="mailto:liza-rose@domain.com" class="tolt ftr-btn" data-microtip-position="top-left" data-tooltip="Write Message"><i class="fal fa-envelope"></i></a>
                                <a href="tel:+7(123)987654" class="tolt ftr-btn" data-microtip-position="top-left" data-tooltip="Call Now"><i class="fal fa-phone"></i></a>
                              </div>
                            </div>
                          </article>
                          <!--  agent card item end -->
                        </div>
                        <!-- slick-slide-item end-->
                        <!-- slick-slide-item -->
                        <div class="slick-slide-item slick-item">
                          <!--  agent card item -->
                          <article class="geodir-category-listing fl-wrap">
                            <div class="geodir-category-img fl-wrap  agent_card">
                              <a href="#" class="geodir-category-img_item">
                                <img width="800" height="533" src="bpm-content/uploads/2021/02/2.jpg" class="attachment-full size-full wp-post-image" alt="" loading="lazy"
                                  >
                                <ul class="list-single-opt_header_cat no-list-style">
                                  <li><span class="cat-opt color-bg"> 17 Listings </span></li>
                                </ul>
                              </a>
                              <div class="agent-card-social fl-wrap">
                                <ul class="no-list-style">
                                  <li><a href="#" target="_blank">
                                    <i class="fab fa-facebook-f"></i></a>
                                  </li>
                                  <li><a href="#" target="_blank">
                                    <i class="fab fa-twitter"></i></a>
                                  </li>
                                  <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                                  </li>
                                </ul>
                              </div>
                              <div class="listing-rating card-popup-rainingvis" data-rating="4" data-stars="5">
                                <span class="re_stars-title review-text">Good</span>
                              </div>
                            </div>
                            <div class="geodir-category-content fl-wrap">
                              <div class="card-verified tolt" data-microtip-position="top-left" data-tooltip="Verified">
                                <i class="fal fa-user-check"></i>
                              </div>
                              <div class="agent_card-title fl-wrap">
                                <h4 class="agent-title"><a href="#">Liza Rose</a></h4>
                                <h5 class="agent-agency"><a href="#">Mavers RealEstate Agency</a></h5>
                              </div>
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla.</p>
                              <div class="geodir-category-footer fl-wrap">
                                <a href="bpm-content/agent/liza-rose/index.htm" class="btn float-btn color-bg small-btn">View Profile</a> 
                                <a href="mailto:liza-rose@domain.com" class="tolt ftr-btn" data-microtip-position="top-left" data-tooltip="Write Message"><i class="fal fa-envelope"></i></a>
                                <a href="tel:+7(123)987654" class="tolt ftr-btn" data-microtip-position="top-left" data-tooltip="Call Now"><i class="fal fa-phone"></i></a>
                              </div>
                            </div>
                          </article>
                          <!--  agent card item end -->
                        </div>
                        <!-- slick-slide-item end-->
                        <!-- slick-slide-item -->
                        <div class="slick-slide-item slick-item">
                          <!--  agent card item -->
                          <article class="geodir-category-listing fl-wrap">
                            <div class="geodir-category-img fl-wrap  agent_card">
                              <a href="bpm-content/agent/andy-sposty/index.htm" class="geodir-category-img_item">
                                <img width="800" height="533" src="bpm-content/uploads/2021/02/4.jpg" class="attachment-full size-full wp-post-image" alt="" loading="lazy">
                                <ul class="list-single-opt_header_cat no-list-style">
                                  <li><span class="cat-opt color-bg"> 17 Listings </span></li>
                                </ul>
                              </a>
                              <div class="agent-card-social fl-wrap">
                                <ul class="no-list-style">
                                  <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                  <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                  <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                              </div>
                              <div class="listing-rating card-popup-rainingvis" data-rating="3.5" data-stars="5"><span class="re_stars-title review-text">Good</span></div>
                            </div>
                            <div class="geodir-category-content fl-wrap">
                              <div class="card-verified tolt" data-microtip-position="top-left" data-tooltip="Verified">
                                <i class="fal fa-user-check"></i>
                              </div>
                              <div class="agent_card-title fl-wrap">
                                <h4 class="agent-title">
                                  <a href=".bpm-content/agent/andy-sposty/index.htm">Andy Sposty</a>
                                </h4>
                                <h5 class="agent-agency"><a href="bpm-content/agency/condorhome-realestate-agency/index.htm">CondorHome RealEstate Agency</a>
                                </h5>
                              </div>
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla.</p>
                              <div class="geodir-category-footer fl-wrap">
                                <a href="bpm-content/agent/andy-sposty/index.htm" class="btn float-btn color-bg small-btn">View Profile</a>
                                <a href="mailto:andy-sposty@domain.com" class="tolt ftr-btn" data-microtip-position="top-left" data-tooltip="Write Message">
                                <i class="fal fa-envelope"></i></a>
                                <a href="tel:+7(123)987654" class="tolt ftr-btn" data-microtip-position="top-left" data-tooltip="Call Now">
                                <i class="fal fa-phone"></i>
                                </a>
                              </div>
                            </div>
                          </article>
                          <!--  agent card item end -->
                        </div>
                        <!-- slick-slide-item end-->
                        <!-- slick-slide-item -->
                        <div class="slick-slide-item slick-item">
                          <!--  agent card item -->
                          <article class="geodir-category-listing fl-wrap">
                            <div class="geodir-category-img fl-wrap  agent_card">
                              <a href="bpm-content/agent/anna-lips/index.htm" class="geodir-category-img_item">
                                <img width="800" height="533" src="bpm-content/uploads/2021/02/1.jpg" class="attachment-full size-full wp-post-image" alt="" loading="lazy">
                                <ul class="list-single-opt_header_cat no-list-style">
                                  <li><span class="cat-opt color-bg"> 17 Listings </span></li>
                                </ul>
                              </a>
                              <div class="agent-card-social fl-wrap">
                                <ul class="no-list-style">
                                  <li><a href="#" target="_blank">
                                    <i class="fab fa-facebook-f"></i></a>
                                  </li>
                                  <li><a href="#" target="_blank">
                                    <i class="fab fa-twitter"></i></a>
                                  </li>
                                  <li>
                                    <a href="#" target="_blank">
                                    <i class="fab fa-instagram"></i>
                                    </a>
                                  </li>
                                  <li><a href="#" target="_blank">
                                    <i class="fab fa-vk"></i>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                              <div class="listing-rating card-popup-rainingvis" data-rating="5" data-stars="5">
                                <span class="re_stars-title review-text">Excellent</span>
                              </div>
                            </div>
                            <div class="geodir-category-content fl-wrap">
                              <div class="card-verified cv_not tolt" data-microtip-position="top-left" data-tooltip="Not Verified"><i class="fal fa-minus-octagon"></i>
                              </div>
                              <div class="agent_card-title fl-wrap">
                                <h4 class="agent-title"><a href="bpm-content/agent/anna-lips/index.htm">Anna Lips</a></h4>
                                <h5 class="agent-agency"><a href="bpm-content/agency/modern-house-real-estate/index.htm">Modern House Real Estate</a></h5>
                              </div>
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla.</p>
                              <div class="geodir-category-footer fl-wrap"> <a href="../agent/anna-lips/index.htm" class="btn float-btn color-bg small-btn">View Profile</a>
                                <a href="mailto:anna-lips@domain.com" class="tolt ftr-btn" data-microtip-position="top-left" data-tooltip="Write Message"><i class="fal fa-envelope"></i></a>
                                <a href="tel:+7(123)987654" class="tolt ftr-btn" data-microtip-position="top-left" data-tooltip="Call Now"><i class="fal fa-phone"></i></a>
                              </div>
                            </div>
                          </article>
                          <!--  agent card item end -->
                        </div>
                        <!-- slick-slide-item end-->
                        <!-- slick-slide-item -->
                        <div class="slick-slide-item slick-item">
                          <!--  agent card item -->
                          <article class="geodir-category-listing fl-wrap">
                            <div class="geodir-category-img fl-wrap  agent_card">
                              <a href="#" class="geodir-category-img_item">
                                <img width="800" height="533" src="bpm-content/uploads/2021/02/2.jpg" class="attachment-full size-full wp-post-image" alt="" loading="lazy"
                                  >
                                <ul class="list-single-opt_header_cat no-list-style">
                                  <li><span class="cat-opt color-bg"> 17 Listings </span></li>
                                </ul>
                              </a>
                              <div class="agent-card-social fl-wrap">
                                <ul class="no-list-style">
                                  <li><a href="#" target="_blank">
                                    <i class="fab fa-facebook-f"></i></a>
                                  </li>
                                  <li><a href="#" target="_blank">
                                    <i class="fab fa-twitter"></i></a>
                                  </li>
                                  <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                                  </li>
                                </ul>
                              </div>
                              <div class="listing-rating card-popup-rainingvis" data-rating="4" data-stars="5">
                                <span class="re_stars-title review-text">Good</span>
                              </div>
                            </div>
                            <div class="geodir-category-content fl-wrap">
                              <div class="card-verified tolt" data-microtip-position="top-left" data-tooltip="Verified">
                                <i class="fal fa-user-check"></i>
                              </div>
                              <div class="agent_card-title fl-wrap">
                                <h4 class="agent-title"><a href="bpm-content/agent/liza-rose/index.htm">Liza Rose</a></h4>
                                <h5 class="agent-agency"><a href="bpm-content/agency/mavers-realestate-agency/index.htm">Mavers RealEstate Agency</a></h5>
                              </div>
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla.</p>
                              <div class="geodir-category-footer fl-wrap">
                                <a href="bpm-content/agent/liza-rose/index.htm" class="btn float-btn color-bg small-btn">View Profile</a> 
                                <a href="mailto:liza-rose@domain.com" class="tolt ftr-btn" data-microtip-position="top-left" data-tooltip="Write Message"><i class="fal fa-envelope"></i></a>
                                <a href="tel:+7(123)987654" class="tolt ftr-btn" data-microtip-position="top-left" data-tooltip="Call Now"><i class="fal fa-phone"></i></a>
                              </div>
                            </div>
                          </article>
                          <!--  agent card item end -->
                        </div>
                        <!-- slick-slide-item end-->
                      </div>
                      <div class="crs-button-prev lc-wbtn lc-wbtn_prev color-bg"><i class="fal fa-angle-left"></i></div>
                      <div class="crs-button-next lc-wbtn lc-wbtn_next color-bg"><i class="fal fa-angle-right"></i></div>
                    </div>
                    <!--  carousel end-->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="elementor-section elementor-top-section elementor-element elementor-element-6d564acc facts-svg color-bg small-padding elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="6d564acc" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
          <div class="elementor-background-overlay">
          </div>
          <div class="elementor-container elementor-column-gap-default">
            <div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-9b40440" data-id="9b40440" data-element_type="column">
              <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-7bb6d427 elementor-widget elementor-widget-counter" data-id="7bb6d427" data-element_type="widget" data-widget_type="counter.default">
                  <div class="elementor-widget-container">
                    <div class="main-facts single-facts_2 hide-decor-no">
                      <div class="inline-facts-wrap">
                        <div class="inline-facts">
                          <div class="milestone-counter">
                            <div class="stats animaper">
                              <div class="num" data-content="0" data-num="578">578</div>
                            </div>
                          </div>
                          <h6>Agents and Agencies</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-4235d4ab" data-id="4235d4ab" data-element_type="column">
              <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-61334068 elementor-widget elementor-widget-counter" data-id="61334068" data-element_type="widget" data-widget_type="counter.default">
                  <div class="elementor-widget-container">
                    <div class="main-facts single-facts_2 hide-decor-no">
                      <div class="inline-facts-wrap">
                        <div class="inline-facts">
                          <div class="milestone-counter">
                            <div class="stats animaper">
                              <div class="num" data-content="0" data-num="12168">12168</div>
                            </div>
                          </div>
                          <h6>Happy customers every year</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-6257b9ce" data-id="6257b9ce" data-element_type="column">
              <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-6bb20535 elementor-widget elementor-widget-counter" data-id="6bb20535" data-element_type="widget" data-widget_type="counter.default">
                  <div class="elementor-widget-container">
                    <div class="main-facts single-facts_2 hide-decor-no">
                      <div class="inline-facts-wrap">
                        <div class="inline-facts">
                          <div class="milestone-counter">
                            <div class="stats animaper">
                              <div class="num" data-content="0" data-num="2172">2172</div>
                            </div>
                          </div>
                          <h6>Won Awards</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-2fc030" data-id="2fc030" data-element_type="column">
              <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-1b165f5e elementor-widget elementor-widget-counter" data-id="1b165f5e" data-element_type="widget" data-widget_type="counter.default">
                  <div class="elementor-widget-container">
                    <div class="main-facts single-facts_2 hide-decor-yes">
                      <div class="inline-facts-wrap">
                        <div class="inline-facts">
                          <div class="milestone-counter">
                            <div class="stats animaper">
                              <div class="num" data-content="0" data-num="732">732</div>
                            </div>
                          </div>
                          <h6>New Listing Every Week</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="elementor-section elementor-top-section elementor-element elementor-element-28a577cc elementor-section-full_width gray-bg elementor-section-height-default elementor-section-height-default" data-id="28a577cc" data-element_type="section">
          <div class="elementor-container elementor-column-gap-no">
            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-566f3a2b" data-id="566f3a2b" data-element_type="column">
              <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-64c25a21 elementor-widget elementor-widget-section_title" data-id="64c25a21" data-element_type="widget" data-widget_type="section_title.default">
                  <div class="elementor-widget-container">
                    <div class="section-title st-center st-st1">
                      <h4 class="sec-subtitle"><span>TESTIMONILAS</span></h4>
                      <h2 class="sec-title">What Our Clients Say</h2>
                      <div class="st-desc">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="elementor-element elementor-element-3f5fcf16 elementor-widget elementor-widget-testimonials" data-id="3f5fcf16" data-element_type="widget" data-widget_type="testimonials.default">
                  <div class="elementor-widget-container">
                    <!-- carousel -->
                    <div class="single-carousel-wrap carousel-wrap testimonials-carousel-wrap">
                      <div class="single-carousel carousel listing-slider-editor-col-3" data-options='{"slidesToShow":3,"adaptiveHeight":true,"variableWidth":false,"centerMode":true,"arrows":false,"dots":true,"infinite":true}'>
                        <div class="slick-item">
                          <div class="text-carousel-item fl-wrap">
                            <div class="text-carousel-item-header fl-wrap">
                              <div class="popup-avatar">
                                <img width="150" height="150" src="bpm-content/uploads/2021/04/1-2.jpg" class="attachment-thumbnail size-thumbnail wp-post-image" alt="" loading="lazy">
                              </div>
                              <div class="review-owner fl-wrap">Jessie Wilcox</div>
                              <div class="listing-rating card-popup-rainingvis" data-rating="5" data-stars="5"></div>
                            </div>
                            <div class="text-carousel-content fl-wrap">
                              <p>&#8220;In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna. Etiam suscipit commodo gravida. Lorem ipsum dolor sit amet, conse ctetuer adipiscing elit, sed diam nonu mmy nibh euismod tincidunt ut laoreet dolore magna aliquam erat.&#8221;</p>
                              <p><a class="testim-link color-bg" href="#" target="_blank" rel="noopener noreferrer">Via Facebook</a></p>
                            </div>
                          </div>
                        </div>
                        <div class="slick-item">
                          <div class="text-carousel-item fl-wrap">
                            <div class="text-carousel-item-header fl-wrap">
                              <div class="popup-avatar">
                                <img width="150" height="150" src="bpm-content/uploads/2019/08/5-4.jpg" class="attachment-thumbnail size-thumbnail wp-post-image" alt="" loading="lazy">
                              </div>
                              <div class="review-owner fl-wrap">Linda Svensky</div>
                              <div class="listing-rating card-popup-rainingvis" data-rating="5" data-stars="5"></div>
                            </div>
                            <div class="text-carousel-content fl-wrap">
                              <p>&#8220;Feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te odio dignissim qui blandit praesent blandit praesent luptatum zzril.Vulputate urna. Nulla tristique mi a massa convallis.&#8221;</p>
                              <p>
                                <a class="testim-link color-bg" href="#" target="_blank" rel="noopener noreferrer">Via Instagram</a>
                              </p>
                            </div>
                          </div>
                        </div>
                        <div class="slick-item">
                          <div class="text-carousel-item fl-wrap">
                            <div class="text-carousel-item-header fl-wrap">
                              <div class="popup-avatar">
                                <img width="100" height="100" src="bpm-content/uploads/2016/10/4.jpg" class="attachment-thumbnail size-thumbnail wp-post-image" alt="" loading="lazy">
                              </div>
                              <div class="review-owner fl-wrap">Austin Harisson</div>
                              <div class="listing-rating card-popup-rainingvis" data-rating="4.5" data-stars="5"></div>
                            </div>
                            <div class="text-carousel-content fl-wrap">
                              <p>&#8220;Feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te odio dignissim qui blandit praesent blandit praesent luptatum zzril.Vulputate urna. Nulla tristique mi a massa convallis.&#8221;</p>
                              <p>
                                <a class="testim-link color-bg" href="#" target="_blank" rel="noopener noreferrer">Via Facebook</a>
                              </p>
                            </div>
                          </div>
                        </div>
                        <div class="slick-item">
                          <div class="text-carousel-item fl-wrap">
                            <div class="text-carousel-item-header fl-wrap">
                              <div class="popup-avatar">
                                <img width="150" height="150" src="bpm-content/uploads/2019/08/6-4.jpg" class="attachment-thumbnail size-thumbnail wp-post-image" alt="" loading="lazy">
                              </div>
                              <div class="review-owner fl-wrap">Antony Moore</div>
                              <div class="listing-rating card-popup-rainingvis" data-rating="4" data-stars="5"></div>
                            </div>
                            <div class="text-carousel-content fl-wrap">
                              <p>&#8220;In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus.
                                Nulla eu mi magna. Etiam suscipit commodo gravida. Lorem ipsum dolor sit amet, conse ctetuer adipiscing elit, sed diam nonu mmy nibh euismod tincidunt ut laoreet dolore magna aliquam erat.&#8221;
                              </p>
                              <p>
                                <a class="testim-link color-bg" href="#" target="_blank" rel="noopener noreferrer">Via Twitter</a>
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--<div class="crs-button-prev lc-wbtn lc-wbtn_prev">
                        <i class="fal fa-angle-left"></i></div>
                        <div class="crs-button-next lc-wbtn lc-wbtn_next">
                        <i class="fal fa-angle-right"></i>
                        </div> -->
                    </div>
                    <!--  carousel end-->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  <!-- Content end -->
</div>
        <!-- wrapper end -->
<div class="clearfix"></div>
    {{-- @include('frontend.layouts.bottom') --}}
@include('layouts.footer')