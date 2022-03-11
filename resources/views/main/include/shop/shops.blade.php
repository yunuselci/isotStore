@extends('main.theme')
@section('title')
    Mağazalar - iSotStore
@endsection

@section('shops')
    <!--  content  -->
    <div class="content">
        <!--  section  -->
        <section class="gray-bg no-pading no-top-padding" id="sec1">
            <div class="col-list-wrap  center-col-list-wrap left-list">
                <div class="container">
                    <div class="listsearch-maiwrap box-inside fl-wrap">
                        <div class="listsearch-header fl-wrap">
                            <h3>Detaylı Arama</h3>
                        </div>
                        <!-- listsearch-input-wrap  -->
                        <div class="listsearch-input-wrap fl-wrap">
                            <div class="listsearch-input-item">
                                <i class="mbri-key single-i"></i>
                                <input type="text" placeholder="Mağaza Adı / Kodu" value=""/>
                            </div>
                            <button class="button fs-map-btn">Ara</button>
                        </div>
                        <!-- list-main-wrap-->
                        <div class="list-main-wrap fl-wrap card-listing">
                            <!-- listing-item -->
                            @isset($shops)
                                @foreach($shops as $shop)
                                    @if($shop->status == 1)
                                    <div class="listing-item">
                                        <article class="geodir-category-listing fl-wrap">
                                            <div class="geodir-category-img">
                                                <img src="{{ asset( 'main/images/shop/'. $shop->image ) }}"
                                                     alt="">
                                                <div class="overlay"></div>
                                                <div class="list-post-counter"><span> Mağaza Kodu:{{ $shop->id }}</span></div>

                                            </div>
                                            <div class="geodir-category-content fl-wrap">
                                                <h3>{{ $shop->name }}</a></h3>
                                                <p>İlan Sayısı: {{ $shop->listings->count() }} <span class="fa fa-shopping-basket"></span> </p>
                                            </div>
                                        </article>
                                    </div>
                                     @endif
                            @endforeach

                        @endisset
                        <!-- listing-item end-->
                        </div>
                        <!-- list-main-wrap end-->
                    </div>
                </div>
            </div>
        </section>
        <!--  section  end-->
        <div class="limit-box fl-wrap"></div>
    </div>
    <!--  content  end-->
@endsection
