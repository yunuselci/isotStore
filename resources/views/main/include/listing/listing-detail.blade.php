@extends('main.theme')
@section('title')
    {{ $listing->seflink }} - iSotStore
@endsection

@section('listing-detail')
    <div class="content">
        <!--section -->
        <section class="gray-section" id="sec1">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="list-single-main-wrapper fl-wrap" id="sec2">
                            <!-- article> -->
                            <article>
                                <div class="list-single-main-media fl-wrap">
                                    <div class="single-slider-wrapper fl-wrap">
                                        <div class="single-slider fl-wrap">
                                            <div class="slick-slide-item"><img
                                                    src="{{ asset('main/images/listing/'. $listing->image ) }}" alt=""></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-single-main-item fl-wrap">
                                    <div class="list-single-main-item-title fl-wrap">
                                        <h3>{{ $listing->name }}</h3>
                                    </div>
                                    <p>Ürün Açıklaması: {{ $listing->description }}</p>
                                    <p>Birim: {{ $listing->unit }}</p>
                                    <p>Tipi: @if($listing->type==1) Satılık @else Kiralık @endif</p>
                                    <p>Durumu: @if($listing->status==1) Sıfır @else İkinci El @endif</p>
                                    <p>Teslim Durumu: @if($listing->delivery_status==1) Stokta var @elseif($listing->delivery_status==2) Stokta yok @else Sipariş durumuna göre stok oluşturulabilir. @endif</p>
                                    <p>Defolu: @if($listing->faulty==1) Hayır @else Defolu Ürün @endif</p>
                                    <p>Menşei: {{$listing->origin}}</p>

                                </div>
                            </article>
                            <!-- article end -->
                        </div>
                    </div>
                    <!--box-widget-wrap -->
                    <div class="col-md-4">
                        <div class="box-widget-wrap">
                            <!--box-widget-item -->
                            <div class="box-widget-item fl-wrap">
                                <div class="box-widget-item-header">
                                    <h3>Tedarikçi Mağaza : </h3>
                                </div>
                                <div class="box-widget list-author-widget">
                                    <div class="list-author-widget-header shapes-bg-small  color-bg fl-wrap">
                                        <span class="list-author-widget-link"><a
                                                href="author-single.html"></a>{{ $listing->shops->name }}</span>
                                        <img src="{{ asset('main/images/shop/'. $listing->shops->image ) }}" alt="">
                                    </div>
                                    <div class="box-widget-content">
                                        <div class="list-author-widget-text">
                                            <div class="list-author-widget-contacts">
                                                <p>{{ $listing->shops->address }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--box-widget-item end -->
                        </div>
                    </div>
                    <!--box-widget-wrap end -->
                </div>
            </div>
        </section>
        <!--section end -->
        <div class="limit-box fl-wrap"></div>
    </div>
@endsection
