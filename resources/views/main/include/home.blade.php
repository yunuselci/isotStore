@extends('main.theme')
@section('title')
    iSotStore - Urfadan Toptan Ürünler Platformu
@endsection

@section('master')
    <!-- Content-->
    <div class="content">
        <!--section -->
        <section class="scroll-con-sec hero-section" data-scrollax-parent="true" id="sec1">
            <div class="bg" data-bg="{{ asset('main') }}/images/home.jpg"
                 data-scrollax="properties: { translateY: '200px' }"></div>
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
                <div class="container">
                    <div class="intro-item fl-wrap">
                        <h2>Türkiye’nin Lider Stok Platformu</h2>
                        <h3>Binlerce ürün arasından aradığınıza kolayca ulaşın.</h3>
                    </div>
                    <div class="main-search-input-wrap">
                        <div class="main-search-input fl-wrap">
                            <form action="{{ route('listing.search') }}" method="GET">
                                <div class="main-search-input-item">
                                    <input type="text" name="search" placeholder="İlan Adı / Kodu" required/>
                                </div>
                                <button type="submit" class="main-search-button">Ara</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bubble-bg"></div>
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
                                    <div class="bg"
                                         data-bg="{{ asset('main/images/category/'. $category->image ) }}"></div>
                                    <div class="listing-item-cat">
                                        <h3>
                                            <a href="{{ route('categoryDetail', $category->seflink) }}">{{ $category->name }}</a>
                                        </h3>
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
            <div class="bg" data-bg="{{ asset('main') }}/images/home2.jpg"
                 data-scrollax="properties: { translateY: '100px' }"></div>
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
                    <h2>Öne Çıkan Yeni Mağazalar</h2>
                    <div class="section-subtitle">Onaylı Mağazalarımız</div>
                    <span class="section-separator"></span>
                    <p>iSotStore; tüm tedarikçi ve üreticileri bir araya getirdi !</p>
                </div>
            </div>
            <!-- carousel -->
            <div class="list-carousel fl-wrap card-listing ">
                <!--listing-carousel-->
                <div class="listing-carousel  fl-wrap ">
                @isset($shops)
                    @foreach($shops as $shop)
                        <!--slick-slide-item-->


                            <div class="slick-slide-item">
                                <!-- listing-item -->
                                @if($shop->status == 1)
                                    <div class="listing-item">
                                        <article class="geodir-category-listing fl-wrap">
                                            <div class="geodir-category-img">
                                                <a href="{{ route('magazalar.show', $shop->id) }}">
                                                    <img src="{{ asset( 'main/images/shop/'. $shop->image ) }}"
                                                         alt="">
                                                </a>
                                                <div class="list-post-counter"><span> Mağaza Kodu:{{ $shop->id }}</span>
                                                </div>

                                            </div>
                                            <div class="geodir-category-content fl-wrap">
                                                <h3>
                                                    <a href="{{ route('magazalar.show', $shop->id) }}">{{ $shop->name }}</a>
                                                </h3>
                                                <p>İlan Sayısı: {{ $shop->listings->count() }} <span
                                                        class="fa fa-shopping-basket"></span></p>
                                            </div>
                                        </article>
                                    </div>
                                @else
                                    <div class="listing-item">
                                        <article class="geodir-category-listing fl-wrap">

                                            <div class="geodir-category-img">

                                                <img src="{{ asset('main') }}/images/shop/default_shop_image.jpg"
                                                     alt="">
                                                <div class="overlay"></div>
                                                <div class="list-post-counter"><span> Mağaza Kodu:</span></div>

                                            </div>
                                            <div class="geodir-category-content fl-wrap">
                                                <h3>İlk mağazamız olmak için hemen üye olun!</h3>
                                                <p>İlan Sayısı: 100 <span
                                                        class="fa fa-shopping-basket"></span></p>

                                            </div>
                                        </article>
                                    </div>
                            @endif
                            <!-- listing-item end-->
                            </div>

                            <!--slick-slide-item end-->
                        @endforeach
                    @endisset
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
