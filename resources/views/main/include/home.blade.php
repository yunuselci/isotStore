@extends('main.theme')
@section('title')
    iSotStore - Urfadan Toptan Ürünler Platformu
@endsection

@section('master')
<!-- Content-->
<div class="content">
    <!--section -->
    <section class="scroll-con-sec hero-section" data-scrollax-parent="true" id="sec1">
        <div class="bg"  data-bg="{{ asset('main') }}/images/home.jpg" data-scrollax="properties: { translateY: '200px' }"></div>
        <div class="overlay"></div>
        <div class="hero-section-wrap fl-wrap">
            @if ($message = Session::get('success'))
                <div class="notification success fl-wrap">
                    <p> {{ $message }}</p>
                    <a class="notification-close" href="#"><i class="fa fa-times"></i></a>
                </div>
            @elseif($message = Session::get('error'))
                <div class="notification reject fl-wrap">
                    <p> {{ $message }}</p>
                    <a class="notification-close" href="#"><i class="fa fa-times"></i></a>
                </div>
            @endif
            @if ($errors->any())
                <div class="notification reject fl-wrap">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <a class="notification-close" href="#"><i class="fa fa-times"></i></a>

                </div>
            @endif
            <div class="container">
                <div class="intro-item fl-wrap">
                    <h2>Türkiye’nin Lider Stok Platformu</h2>
                    <h3>Binlerce ürün arasından aradığınıza kolayca ulaşın.</h3>
                </div>
                <div class="main-search-input-wrap">
                    <div class="main-search-input fl-wrap">
                        <div class="main-search-input-item">
                            <input type="text" placeholder="Ürün Kodu & Ürün Adı" value=""/>
                        </div>
                        <div class="main-search-input-item">
                            <input type="text" placeholder="Firma & Mağaza Adı" value=""/>
                        </div>
                        <button class="main-search-button">Search</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="bubble-bg"> </div>
    </section>
    <!-- section end -->
    <!--section -->
    <section id="sec2">
        <div class="container">
            <div class="section-title">
                <h2>Kategoriler</h2>
                <div class="section-subtitle">Bİ DÜNYA STOK BURADA</div>
                <span class="section-separator"></span>
                <p>TÜM SEKTÖRLERE ÖZEL ÜRÜN ÇEŞİTLİLİĞİ</p>
            </div>
            <!-- portfolio start -->
            <div class="gallery-items fl-wrap mr-bot spad">
                <!-- gallery-item-->
                @foreach($categories as $category)
                <div class="gallery-item">
                    <div class="grid-item-holder">
                        <div class="listing-item-grid">
                            <div class="bg"  data-bg="{{ asset('main/images/category/'. $category->image ) }}"></div>
                            <div class="listing-item-cat">
                                <h3><a href="/kategoriler/{{ $category->seflink }}">{{ $category->name }}</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- gallery-item end-->
            </div>
            <!-- portfolio end -->
        </div>
    </section>
    <!-- section end -->
    <!--section -->
    <section class="parallax-section" data-scrollax-parent="true">
        <div class="bg"  data-bg="{{ asset('main') }}/images/home2.jpg" data-scrollax="properties: { translateY: '100px' }"></div>
        <div class="overlay co lor-overlay"></div>
        <!--container-->
        <div class="container">
            <div class="intro-item fl-wrap">
                <h2>Ücretsiz Stoklarınızdaki Ürünleri Satın</h2>
                <h3>Hemen Bir Mağaza Açmak İster Misiniz?</h3>
                <a class="trs-btn" href="#">Mağazanı Oluştur, Hemen İlan Ver!</a>
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
                                <img src="{{ asset('main') }}/images/all/1.jpg" alt="">
                                <div class="overlay"></div>
                                <div class="list-post-counter"><span>4</span><i class="fa fa-heart"></i></div>
                            </div>
                            <div class="geodir-category-content fl-wrap">
                                <a class="listing-geodir-category" href="listing.html">Retail</a>
                                <div class="listing-avatar"><a href="author-single.html"><img src="{{ asset('main') }}/images/avatar/1.jpg" alt=""></a>
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
                                <img src="{{ asset('main') }}/images/all/1.jpg" alt="">
                                <div class="overlay"></div>
                                <div class="list-post-counter"><span>15</span><i class="fa fa-heart"></i></div>
                            </div>
                            <div class="geodir-category-content fl-wrap">
                                <a class="listing-geodir-category" href="listing.html">Event</a>
                                <div class="listing-avatar"><a href="author-single.html"><img src="{{ asset('main') }}/images/avatar/1.jpg" alt=""></a>
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
