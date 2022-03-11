@extends('main.theme')
@section('title')
    Mağazam - iSotStore
@endsection

@section('shops')
    <div class="content">

    @foreach( $shop as $s)
        <!--section -->
            <section class="parallax-section small-par color-bg">
                <div class="shapes-bg-big"></div>
                <div class="container">
                    <div class="section-title center-align">
                        <div class="breadcrumbs fl-wrap"><a href="{{ route('home') }}">Anasayfa</a><a href="{{ route('shops') }}">Mağazalar</a><span>Mağaza Profili</span></div>

                        <h2><span>Mağaza : {{ $s->name }}</span></h2>
                        <div class="user-profile-avatar"><img src="{{ asset( 'main/images/shop/'. $s->image ) }}"
                                                              alt=""></div>

                    </div>
                </div>
                <div class="header-sec-link">
                    <div class="container"><a href="#sec1" class="custom-scroll-link">Mağaza detayları</a></div>
                </div>
            </section>
            <!-- section end -->
            <!--section -->
            <section class="gray-bg" id="sec1">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="list-single-main-item fl-wrap">
                                <div class="list-single-main-item-title fl-wrap">
                                    <h3>Hakkında: <span> {{ $s->name }}</span></h3>
                                </div>
                                <p> {{ $s->about }}</p>
                            </div>
                            <div class="listsearch-header fl-wrap">
                                <h3>{{ $s->name }} Ürünleri</h3>
                            </div>
                            <!-- list-main-wrap-->
                            <div class="list-main-wrap fl-wrap card-listing ">
                                <!-- listing-item -->
                                @if(!($s->listings->count()))
                                    <div class="listing-item">
                                        <article class="geodir-category-listing fl-wrap">
                                            <div class="geodir-category-content fl-wrap">
                                                <h3>Mağazanın hiçbir ürünü bulunmamaktadır</h3>
                                            </div>
                                        </article>
                                    </div>
                                @else
                                    @foreach($s->listings as $listing)
                                        <div class="listing-item">
                                            <article class="geodir-category-listing fl-wrap">
                                                <div class="geodir-category-img">
                                                    <img src="{{ asset( 'main/images/listing/'. $listing->image ) }}"
                                                         alt="{{ $listing->name }}">
                                                    <div class="overlay"></div>
                                                    <div class="list-post-counter"><span> Ürün Kodu:{{ $listing->id }}</span></div>

                                                </div>
                                                <div class="geodir-category-content fl-wrap">
                                                    <h3><a href="{{ route('listingDetail', $listing->seflink) }}">{{ $listing->name }}</a></h3>
                                                    <p>Ürün Tipi: @if($listing->type==1) Satılık @else Kiralık @endif <span class="fa fa-shopping-bag"></span> </p>
                                                    <p>Ürün Kategorisi: <a href="{{ route('categoryDetail', $listing->category->seflink) }}">{{ $listing->category->name }} </a> </p>
                                                </div>
                                            </article>
                                        </div>
                                    @endforeach
                                @endif
                            <!-- listing-item end-->
                                <div class="clearfix"></div>
                                <!-- pagination-->
                                <div class="pagination">
                                    <a href="#" class="prevposts-link"><i class="fa fa-caret-left"></i></a>
                                    <a href="#" class="current-page">1</a>
                                    <a href="#">2</a>
                                    <a href="#">3</a>
                                    <a href="#" class="nextposts-link"><i class="fa fa-caret-right"></i></a>
                                </div>
                            </div>
                            <!-- list-main-wrap end-->
                        </div>
                        <!--box-widget-wrap -->
                        <div class="col-md-4">
                            <div class="fl-wrap">
                                <!--box-widget-item -->
                                <div class="box-widget-item fl-wrap">
                                    <div class="box-widget-item-header">
                                        <h3>Mağaza Bilgileri : </h3>
                                    </div>
                                    <div class="box-widget">
                                        <div class="box-widget-content">
                                            <div class="list-author-widget-contacts list-item-widget-contacts">
                                                <ul>
                                                    <li><span><i
                                                                class="fa fa-map-marker"></i> Adres :</span> {{ $s->address }}
                                                    </li>
                                                    <li><span><i
                                                                class="fa fa-phone"></i> Telefon :</span> {{ $s->phone }}
                                                    </li>
                                                    <li><span><i
                                                                class="fa fa-envelope-o"></i> E-Posta :</span> {{ $s->email }}
                                                    </li>
                                                    <li><span><i class="fa fa-globe"></i> Website :</span> <a
                                                            href="yunuselci.com">iSotStore</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--box-widget-item end -->
                            </div>
                        </div>
                        <!--box-widget-wrap end-->
                    </div>
                </div>
            </section>
            <!-- section end -->
            <div class="limit-box fl-wrap"></div>
            <!-- section end -->
        @endforeach
    </div>


@endsection
