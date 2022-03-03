@extends('theme.theme')
@section('title')
    iSotStore - Urfadan Toptan Ürünler Platformu
@endsection

@section('master')
<!-- Content-->
<div class="content">
    <!--section -->
    <section class="scroll-con-sec hero-section" data-scrollax-parent="true" id="sec1">
        <div class="bg"  data-bg="images/bg/1.jpg" data-scrollax="properties: { translateY: '200px' }"></div>
        <div class="overlay"></div>
        <div class="hero-section-wrap fl-wrap">
            <div class="container">
                <div class="intro-item fl-wrap">
                    <h2>We will help you to find all</h2>
                    <h3>Find great places , hotels , restourants , shops.</h3>
                </div>
                <div class="main-search-input-wrap">
                    <div class="main-search-input fl-wrap">
                        <div class="main-search-input-item">
                            <input type="text" placeholder="What are you looking for?" value=""/>
                        </div>
                        <div class="main-search-input-item location" id="autocomplete-container">
                            <input type="text" placeholder="Location" id="autocomplete-input" value=""/>
                            <a href="#"><i class="fa fa-dot-circle-o"></i></a>
                        </div>
                        <div class="main-search-input-item">
                            <select data-placeholder="All Categories" class="chosen-select" >
                                <option>All Categories</option>
                                <option>Shops</option>
                                <option>Hotels</option>
                                <option>Restaurants</option>
                                <option>Fitness</option>
                                <option>Events</option>
                            </select>
                        </div>
                        <button class="main-search-button" onclick="window.location.href='listings-half-screen-map-list.html'">Search</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="bubble-bg"> </div>
        <div class="header-sec-link">
            <div class="container"><a href="#sec2" class="custom-scroll-link">Let's Start</a></div>
        </div>
    </section>
    <!-- section end -->
    <!--section -->
    <section id="sec2">
        <div class="container">
            <div class="section-title">
                <h2>Featured Categories</h2>
                <div class="section-subtitle">Catalog of Categories</div>
                <span class="section-separator"></span>
                <p>Explore some of the best tips from around the city from our partners and friends.</p>
            </div>
            <!-- portfolio start -->
            <div class="gallery-items fl-wrap mr-bot spad">
                <!-- gallery-item-->
                <div class="gallery-item">
                    <div class="grid-item-holder">
                        <div class="listing-item-grid">
                            <div class="bg"  data-bg="{{ asset('theme') }}/images/all/1.jpg"></div>
                            <div class="listing-counter"><span>10 </span> Locations</div>
                            <div class="listing-item-cat">
                                <h3><a href="listing.html">Conference and Event</a></h3>
                                <p>Constant care and attention to the patients makes good record</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- gallery-item end-->
                <!-- gallery-item-->
                <div class="gallery-item gallery-item-second">
                    <div class="grid-item-holder">
                        <div class="listing-item-grid">
                            <div class="bg"  data-bg="{{ asset('theme') }}/images/all/1.jpg"></div>
                            <div class="listing-counter"><span>6 </span> Locations</div>
                            <div class="listing-item-cat">
                                <h3><a href="listing.html">Cafe - Pub</a></h3>
                                <p>Constant care and attention to the patients makes good record</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- gallery-item end-->
                <!-- gallery-item-->
                <div class="gallery-item">
                    <div class="grid-item-holder">
                        <div class="listing-item-grid">
                            <div class="bg"  data-bg="{{ asset('theme') }}/images/all/1.jpg"></div>
                            <div class="listing-counter"><span>21 </span> Locations</div>
                            <div class="listing-item-cat">
                                <h3><a href="listing.html">Gym - Fitness</a></h3>
                                <p>Constant care and attention to the patients makes good record</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- gallery-item end-->
                <!-- gallery-item-->
                <div class="gallery-item">
                    <div class="grid-item-holder">
                        <div class="listing-item-grid">
                            <div class="bg"  data-bg="{{ asset('theme') }}/images/all/1.jpg"></div>
                            <div class="listing-counter"><span>7 </span> Locations</div>
                            <div class="listing-item-cat">
                                <h3><a href="listing.html">Hotels</a></h3>
                                <p>Constant care and attention to the patients makes good record</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- gallery-item end-->
                <!-- gallery-item-->
                <div class="gallery-item">
                    <div class="grid-item-holder">
                        <div class="listing-item-grid">
                            <div class="bg"  data-bg="{{ asset('theme') }}/images/all/1.jpg"></div>
                            <div class="listing-counter"><span>15 </span> Locations</div>
                            <div class="listing-item-cat">
                                <h3><a href="listing.html">Shop - Store</a></h3>
                                <p>Constant care and attention to the patients makes good record</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- gallery-item end-->
            </div>
            <!-- portfolio end -->
            <a href="listing.html" class="btn  big-btn circle-btn dec-btn  color-bg flat-btn">View All<i class="fa fa-eye"></i></a>
        </div>
    </section>
    <!-- section end -->
    <!--section -->
    <section class="color-bg">
        <div class="shapes-bg-big"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="images-collage fl-wrap">
                        <div class="images-collage-title">City<span>Book</span></div>
                        <div class="images-collage-main images-collage-item"><img src="{{ asset('theme') }}/images/avatar/1.jpg" alt=""></div>
                        <div class="images-collage-other images-collage-item" data-position-left="23" data-position-top="10" data-zindex="2"><img src="{{ asset('theme') }}/images/avatar/1.jpg" alt=""></div>
                        <div class="images-collage-other images-collage-item" data-position-left="62" data-position-top="54" data-zindex="5"><img src="{{ asset('theme') }}/images/avatar/1.jpg" alt=""></div>
                        <div class="images-collage-other images-collage-item anim-col" data-position-left="18" data-position-top="70" data-zindex="11"><img src="{{ asset('theme') }}/images/avatar/1.jpg" alt=""></div>
                        <div class="images-collage-other images-collage-item" data-position-left="37" data-position-top="90" data-zindex="1"><img src="{{ asset('theme') }}/images/avatar/1.jpg" alt=""></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="color-bg-text">
                        <h3>Join our online community</h3>
                        <p>In ut odio libero, at vulputate urna. Nulla tristique mi a massa convallis cursus. Nulla eu mi magna. Etiam suscipit commodo gravida. Lorem ipsum dolor sit amet, conse ctetuer adipiscing elit, sed diam nonu mmy nibh euismod tincidunt ut laoreet dolore magna aliquam erat.</p>
                        <a href="#" class="color-bg-link modal-open">Sign In Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--section   end -->
    <!--section -->
    <section class="gray-section">
        <div class="container">
            <div class="section-title">
                <h2>Popular listings</h2>
                <div class="section-subtitle">Best Listings</div>
                <span class="section-separator"></span>
                <p>Nulla tristique mi a massa convallis cursus. Nulla eu mi magna.</p>
            </div>
        </div>
        <!-- carousel -->
        <div class="list-carousel fl-wrap card-listing ">
            <!--listing-carousel-->
            <div class="listing-carousel  fl-wrap ">
                <!--slick-slide-item-->
                <div class="slick-slide-item">
                    <!-- listing-item -->
                    <div class="listing-item">
                        <article class="geodir-category-listing fl-wrap">
                            <div class="geodir-category-img">
                                <img src="{{ asset('theme') }}/images/all/1.jpg" alt="">
                                <div class="overlay"></div>
                                <div class="list-post-counter"><span>4</span><i class="fa fa-heart"></i></div>
                            </div>
                            <div class="geodir-category-content fl-wrap">
                                <a class="listing-geodir-category" href="listing.html">Retail</a>
                                <div class="listing-avatar"><a href="author-single.html"><img src="{{ asset('theme') }}/images/avatar/1.jpg" alt=""></a>
                                    <span class="avatar-tooltip">Added By  <strong>Lisa Smith</strong></span>
                                </div>
                                <h3><a href="listing-single.html">Event in City Mol</a></h3>
                                <p>Sed interdum metus at nisi tempor laoreet.  </p>
                                <div class="geodir-category-options fl-wrap">
                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="5">
                                        <span>(7 reviews)</span>
                                    </div>
                                    <div class="geodir-category-location"><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> 27th Brooklyn New York, NY 10065</a></div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <!-- listing-item end-->
                </div>
                <!--slick-slide-item end-->
                <!--slick-slide-item-->
                <div class="slick-slide-item">
                    <!-- listing-item -->
                    <div class="listing-item">
                        <article class="geodir-category-listing fl-wrap">
                            <div class="geodir-category-img">
                                <img src="{{ asset('theme') }}/images/all/1.jpg" alt="">
                                <div class="overlay"></div>
                                <div class="list-post-counter"><span>15</span><i class="fa fa-heart"></i></div>
                            </div>
                            <div class="geodir-category-content fl-wrap">
                                <a class="listing-geodir-category" href="listing.html">Event</a>
                                <div class="listing-avatar"><a href="author-single.html"><img src="{{ asset('theme') }}/images/avatar/1.jpg" alt=""></a>
                                    <span class="avatar-tooltip">Added By  <strong>Mark Rose</strong></span>
                                </div>
                                <h3><a href="listing-single.html">Cafe "Lollipop"</a></h3>
                                <p>Morbi suscipit erat in diam bibendum rutrum in nisl.</p>
                                <div class="geodir-category-options fl-wrap">
                                    <div class="listing-rating card-popup-rainingvis" data-starrating2="4">
                                        <span>(17 reviews)</span>
                                    </div>
                                    <div class="geodir-category-location"><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> 27th Brooklyn New York, NY 10065</a></div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <!-- listing-item end-->
                </div>
                <!--slick-slide-item end-->


            </div>
            <!--listing-carousel end-->
            <div class="swiper-button-prev sw-btn"><i class="fa fa-long-arrow-left"></i></div>
            <div class="swiper-button-next sw-btn"><i class="fa fa-long-arrow-right"></i></div>
        </div>
        <!--  carousel end-->
    </section>
    <!-- section end -->




</div>
<!-- Content end -->
@endsection
