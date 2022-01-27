@include('layouts.header')
    @include('frontend.layouts.navbar')
    <div class="bg-main-ash min-vh-100">
        <section class="about-banner">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-10">
                        <h1 class="text-white">About Us</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="core-values position-relative" style="padding: 120px 0;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 mb-4">
                        <h1 class="text-main-dark">Our <span class="text-main-green">Core</span> Values</h1>
                        <div class="text-main-dark">Over the past 25 years that we have been in existence, we have identified and outlined some core values which guide everything we do as a company. These core values define our brand, culture, and business strategies, and they are:</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="bg-theme-color text-center mb-4 rounded-circle" style="width: 70px; height: 70px; line-height: 70px;">
                            <p class="m-0 text-white">01</p>
                        </div>
                        <h3 class="text-main-dark">Innovation</h3>
                        <div class="text-dark-500">We always pursue excellence by pushing ourselves to become better every day and maximizing the latest technological advancements in providing solutions for our clients.</div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="bg-theme-color text-center mb-4 rounded-circle core-values-icons" style="width: 70px; height: 70px; line-height: 70px;">
                            <p class="m-0 text-white">02</p>
                        </div>
                        <h3 class="text-main-dark">Quality</h3>
                        <div class="text-dark-500">Excellence is our watchword, and we strive to exceed expectations in every aspect of our business.</div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="bg-theme-color text-center mb-4 rounded-circle" style="width: 70px; height: 70px; line-height: 70px;">
                            <div class="m-0 text-white">03</div>
                        </div>
                        <h3 class="text-main-dark">Integrity</h3>
                        <div class="text-dark-500">We take pride in conducting ourselves in the highest ethical standards. We demonstrate fairness and honesty in every decision and action we take.</div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="bg-theme-color text-center mb-4 rounded-circle" style="width: 70px; height: 70px; line-height: 70px;">
                            <p class="m-0 text-white">04</p>
                        </div>
                        <h3 class="text-main-dark">Solution-oriented</h3>
                        <div class="text-dark-500">We are always seeking to discover solutions and provide our clients with options that we will serve them better.</div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="bg-theme-color text-center mb-4 rounded-circle" style="width: 70px; height: 70px; line-height: 70px;">
                            <p class="m-0 text-white">05</p>
                        </div>
                        <h3 class="text-main-dark">Loyalty</h3>
                        <div class="text-dark-500">We are committed to our clients and loyal to them. We commit ourselves to provide long-term opportunities and ensuring long-term stability in our dealings.</div>
                    </div>
                </div>
            </div>
        </section>
        <section class="mission-vision position-relative">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-7 mb-4">
                        <h1 class="font-weight-bolder text-white">Our <span class="text-main-green">Vision</span></h1>
                        <div class="text-white">Our vision is to be the number one modern real estate provider in Nigeria and the final stop for all real estate needs of our clients from purchase to development.</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-7 mb-4">
                        <h1 class="font-weight-bolder text-white">Our <span class="text-main-green">Mission</span></h1>
                        <div class="text-white">Our mission is to serve the real estate needs of our clients in a trustworthy environment where they will be served with the highest amount of professionalism, ease of business, innovation, and quality that will ensure maximum client satisfaction.</div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('frontend.layouts.bottom')
@include('layouts.footer')