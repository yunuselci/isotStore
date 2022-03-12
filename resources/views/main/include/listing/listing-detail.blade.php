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
                                                href="{{ route('magazalar.show', $listing->shops->id) }}">{{ $listing->shops->name }}</a></span>
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
                            <div class="box-widget-item fl-wrap">
                                <div class="box-widget-item-header">
                                    <h3>Teklif Al : </h3>
                                </div>
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
                                <div class="box-widget">
                                    <div class="box-widget-content">
                                        @if (Route::has('login'))
                                            @auth
                                                <form action="{{ route('teklifler.store') }}" method="post" class="add-comment custom-form">
                                                    @csrf
                                                    <fieldset>
                                                        <label><i class="fa fa-user-o"></i></label>
                                                        <input type="text" name="user_name" placeholder="Adı *" value="{{ Auth::user()->name }}"/>
                                                        <div class="clearfix"></div>
                                                        <label><i class="fa fa-phone"></i></label>
                                                        <input type="text" name="user_phone" placeholder="Telefon numarası *"/>
                                                        <div class="clearfix"></div>
                                                        <label><i class="fa fa-envelope-o"></i>  </label>
                                                        <input type="email" name="user_email" placeholder="E-Posta Adresi *" value="{{ Auth::user()->email }}"/>
                                                        <textarea name="description" cols="40" rows="3" placeholder="Mesajınız:"></textarea>
                                                        <input type="hidden" name="shop_id" value="{{$listing->shops->id}}">
                                                        <input type="hidden" name="listingSeflink" value="{{$listing->seflink}}">

                                                    </fieldset>
                                                    <button class="btn  big-btn  color-bg flat-btn">Teklif Al<i class="fa fa-angle-right"></i></button>
                                                </form>
                                            @else
                                                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Zaten üye misiniz ? Giriş yap</a>

                                                @if (Route::has('register'))
                                                    <h3> Teklif almak için kayıt olun! </h3>
                                                @endif
                                            @endauth
                                        @endif

                                    </div>
                                </div>
                            </div>
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
