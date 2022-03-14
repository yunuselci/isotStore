@extends('main.theme')
@section('title')
    İlanlar - iSotStore
@endsection

@section('listings')
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
                                <input type="text" placeholder="İlan Adı / Kodu" value=""/>
                            </div>
                            <button class="button fs-map-btn">Ara</button>
                        </div>
                        <!-- list-main-wrap-->
                        <div class="list-main-wrap fl-wrap card-listing">
                            <!-- listing-item -->
                            @isset($listings)
                                @foreach($listings as $listing)
                                    @if($listing->shops->status == 1)
                                    <div class="listing-item">
                                        <article class="geodir-category-listing fl-wrap">
                                            <div class="geodir-category-img">
                                                <a href="{{ route('listingDetail', $listing->seflink) }}">
                                                <img src="{{ asset( 'main/images/listing/'. $listing->image ) }}"
                                                     alt="{{ $listing->name }}">
                                                </a>
                                                <div class="list-post-counter"><span> Ürün Kodu:{{ $listing->id }}</span></div>

                                            </div>
                                            <div class="geodir-category-content fl-wrap">
                                                <h3><a href="{{ route('listingDetail', $listing->seflink) }}">{{ $listing->name }}</a></h3>
                                                <p>Ürün Tipi: @if($listing->type==1) Satılık @else Kiralık @endif <span class="fa fa-shopping-bag"></span> </p>
                                                <p>Ürün Kategorisi: <a href="{{ route('categoryDetail', $listing->category->seflink) }}">{{ $listing->category->name }} </a> </p>
                                            </div>
                                        </article>
                                    </div>
                                    @endif
                            @endforeach
                        @endisset
                        <!-- listing-item end-->
                        </div>
                        @if($listings->lastPage()>1)
                            <div class="pagination">
                                <a href="{{ $listings->previousPageUrl() }}" class="prevposts-link"><i class="fa fa-caret-left"></i></a>
                                @for($i = 1; $i<=$listings->lastPage(); $i++)
                                    <a href="{{ $listings->url($i) }}" @if($listings->currentPage()==$i) class="current-page" @endif>{{ $i }}</a>
                                @endfor
                                <a href="{{ $listings->nextPageUrl() }}" class="nextposts-link"><i class="fa fa-caret-right"></i></a>
                            </div>
                        @endif
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
