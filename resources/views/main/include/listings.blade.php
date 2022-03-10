@extends('main.theme')
@section('title')
    İlanlar - iSotStore
@endsection

@section('ads')
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
                            <div class="listsearch-input-item">
                                <select data-placeholder="Location" class="chosen-select">
                                    <option>Konum / Bölge</option>
                                    <option>Bronx</option>
                                    <option>Brooklyn</option>
                                    <option>Manhattan</option>
                                    <option>Queens</option>
                                    <option>Staten Island</option>
                                </select>
                            </div>
                            <button class="button fs-map-btn">Ara</button>
                        </div>
                        <!-- list-main-wrap-->
                        <div class="list-main-wrap fl-wrap card-listing">
                            <!-- listing-item -->
                            @isset($ads)
                                @foreach($ads as $ad)
                                    <div class="listing-item">
                                        <article class="geodir-category-listing fl-wrap">
                                            <div class="geodir-category-img">
                                                <img src="{{ asset( 'main/images/product/'. $ad->products->image ) }}"
                                                     alt="">
                                                <div class="overlay"></div>
                                            </div>
                                            <div class="geodir-category-content fl-wrap">
                                                <h3>{{ $ad->products->name }}</a></h3>
                                            </div>
                                        </article>
                                    </div>
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
