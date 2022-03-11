@extends('main.theme')
@section('title')
    {{ $seflink }} - iSotStore
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
                                                    src="{{ asset('main') }}/images/all/1.jpg" alt=""></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-single-main-item fl-wrap">
                                    <div class="list-single-main-item-title fl-wrap">
                                        <h3>Aliquam erat volutpat. Curabitur convallis.</h3>
                                    </div>
                                    <p>
                                        Vestibulum orci felis, ullamcorper non condimentum non, ultrices ac nunc. Mauris
                                        non ligula suscipit, vulputate mi accumsan, dapibus felis. Nullam sed sapien
                                        dui. Nulla auctor sit amet sem non porta. Integer iaculis tellus nulla, quis
                                        imperdiet magna venenatis vitae..
                                    </p>
                                    <p>Ut nec hinc dolor possim. An eros argumentum vel, elit diceret duo eu, quo et
                                        aliquid ornatus delicatissimi. Cu nam tale ferri utroque, eu habemus albucius
                                        mel, cu vidit possit ornatus eum. Eu ius postulant salutatus definitionem,
                                        explicari. Graeci viderer qui ut, at habeo facer solet usu. Pri choro pertinax
                                        indoctum ne, ad partiendo persecuti forensibus est.</p>
                                    <blockquote>
                                        <p>Vestibulum id ligula porta felis euismod semper. Sed posuere consectetur est
                                            at lobortis. Aenean eu leo quam. Pellentesque ornare sem lacinia quam
                                            venenatis vestibulum. Duis mollis, est non commodo luctus, nisi erat
                                            porttitor ligula, eget lacinia odio sem nec elit. Donec ullamcorper nulla
                                            non metus auctor fringilla. Vestibulum id ligula porta felis euismod
                                            semper.</p>
                                    </blockquote>
                                    <p>Ut nec hinc dolor possim. An eros argumentum vel, elit diceret duo eu, quo et
                                        aliquid ornatus delicatissimi. Cu nam tale ferri utroque, eu habemus albucius
                                        mel, cu vidit possit ornatus eum. Eu ius postulant salutatus definitionem, an e
                                        trud erroribus explicari. Graeci viderer qui ut, at habeo facer solet usu. Pri
                                        choro pertinax indoctum ne, ad partiendo persecuti forensibus est.</p>
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
                                    <h3>About Athor : </h3>
                                </div>
                                <div class="box-widget list-author-widget">
                                    <div class="list-author-widget-header shapes-bg-small  color-bg fl-wrap">
                                        <span class="list-author-widget-link"><a
                                                href="author-single.html">Alisa Noory</a></span>
                                        <img src="{{ asset('main') }}/images/avatar/1.jpg" alt="">
                                    </div>
                                    <div class="box-widget-content">
                                        <div class="list-author-widget-text">
                                            <div class="list-author-widget-contacts">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in
                                                    pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur
                                                    nulla.</p>
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
