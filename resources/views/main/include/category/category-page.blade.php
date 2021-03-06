@extends('main.theme')
@section('title')
    {{$categories->pluck('name')->first()}} - iSotStore
@endsection

@section('category-page')

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
                                <input type="text" placeholder="İlan Adı / Kodu" value=""/>
                            </div>
                            <button class="button fs-map-btn">Ara</button>
                        </div>
                        <!-- list-main-wrap-->
                        <div class="list-main-wrap fl-wrap card-listing">
                            <!-- listing-item -->
                            @foreach($categories as $category)
                                @if(!($category->listings->count()))
                                    <div class="listsearch-header fl-wrap">
                                        <h3>Bu kategoride henüz hiçbir ilan<span> bulunmamaktadır!</span></h3>
                                    </div>
                                @else
                                    @foreach($category->listings as $listing)
                                        @if(\App\Models\Shop::whereId($listing->shop_id)->pluck('status')->first() == 1)
                                        <div class="listing-item">
                                            <article class="geodir-category-listing fl-wrap">
                                                <div class="geodir-category-img">
                                                    <img src="{{ asset( 'main/images/listing/'. $listing->image ) }}"
                                                         alt="{{  $listing->name }}" height="50" width="50">
                                                    <div class="overlay"></div>
                                                    <div class="list-post-counter">
                                                        <span> Ürün Kodu:{{ $listing->id }}</span></div>
                                                </div>
                                                <div class="geodir-category-content fl-wrap">
                                                    <h3>
                                                        <a href="{{ route('listingDetail',  $listing->seflink) }}">{{  $listing->name }}</a>
                                                    </h3>
                                                    <p>Ürün Tipi: @if( $listing->type==1) Satılık @else Kiralık @endif
                                                        <span
                                                            class="fa fa-shopping-bag"></span></p>
                                                    <p>Ürün Kategorisi: <a
                                                            href="{{ route('categoryDetail', $category->seflink) }}">{{ $category->name }} </a>
                                                    </p>
                                                </div>
                                            </article>
                                        </div>
                                        @endif
                                @endforeach
                            @endif
                        @endforeach
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

@endsection
