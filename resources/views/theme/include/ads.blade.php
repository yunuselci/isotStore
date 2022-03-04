@extends('theme.theme')
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
                    <!-- list-main-wrap-->
                    <div class="list-main-wrap fl-wrap card-listing">
                        <!-- listing-item -->
                        @isset($products)
                            @foreach($products as $product)
                                <div class="listing-item">
                                    <article class="geodir-category-listing fl-wrap">
                                        <div class="geodir-category-img">
                                            <img src="" alt="">
                                            <div class="overlay"></div>
                                        </div>
                                        <div class="geodir-category-content fl-wrap">
                                            <h3>{{ $product->name }}</a></h3>

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
        </section>
        <!--  section  end-->
        <div class="limit-box fl-wrap"></div>
    </div>
    <!--  content  end-->
@endsection
