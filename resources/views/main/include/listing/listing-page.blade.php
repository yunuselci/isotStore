@extends('main.theme')
@section('title')
    İlanlarım - iSotStore
@endsection

@section('listing-page')

    <div class="content">
        <!--section -->
        <section id="sec1">
            <!-- container -->
            <div class="container">
                <!-- profile-edit-wrap -->
                <div class="profile-edit-wrap">
                    <div class="profile-edit-page-header">
                        <h2>İlanlarım </h2>
                        <div class="breadcrumbs"><a href=" {{route('dashboard')}}">Profil</a><span>İlanlarım</span></div>

                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="fixed-bar fl-wrap">
                                <div class="user-profile-menu-wrap fl-wrap">
                                    <!-- user-profile-menu-->
                                    <div class="user-profile-menu">
                                        <h3>Ana Bölüm</h3>
                                        <ul>
                                            <li><a href="{{ route('dashboard') }}" class="user-profile-act"><i class="fa fa-user"></i>Kullanıcı paneli</a></li>
                                            <li><a href="{{ route('profile.show') }}"><i class="fa fa-edit"></i>Profili düzenle</a></li>
                                        </ul>
                                    </div>
                                    <!-- user-profile-menu end-->
                                    <!-- user-profile-menu-->
                                    @foreach(Auth::user()->whereId(Auth::id())->with('shops')->get() as $value)
                                        <div class="user-profile-menu">
                                            <h3>Mağazam</h3>
                                            <ul>
                                                @if(!is_null($value->shops))
                                                    @if($value->shops->first()->status == 1)
                                                        <li><a href="{{ route('magazalar.show', $value->shops->first()->id) }}"><i class="fa fa-shopping-bag"></i> Mağazam </a></li>
                                                        <li><a href="{{ route('magazalar.edit',$value->shops->first()->id) }}"><i class="fa fa-edit"></i>Mağaza düzenle</a></li>
                                                    @else
                                                        <li><a class="user-profile-act"><i class="fa fa-warning"></i>Onay bekliyor</a></li>
                                                    @endif
                                                @else
                                                    <li><a href="{{ route('magazalar.create') }}"><i class="fa fa-shopping-bag"></i>Mağaza oluştur</a></li>
                                                @endif
                                            </ul>
                                        </div>
                                        <!-- user-profile-menu end-->
                                        <!-- user-profile-menu-->
                                        @if(!is_null($value->shops) && $value->shops->first()->status == 1)
                                            <div class="user-profile-menu">
                                                <h3>Listelemeler</h3>
                                                <ul>
                                                    <li><a href="/iln"><i class="fa fa-th-list"></i>İlanlarım </a></li>
                                                    <li><a href="dashboard-add-listing.html"><i class="fa fa-plus-square-o"></i>Yenisini Ekle</a></li>
                                                </ul>
                                            </div>
                                    @endif

                                @endforeach
                                <!-- user-profile-menu end-->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <button class="log-out-btn"  type="submit"
                                                onclick="event.preventDefault();
                                                     this.closest('form').submit();">
                                            Çıkış Yap
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="dashboard-list-box fl-wrap">
                                <div class="dashboard-header fl-wrap">
                                    <h3>İlan listesi</h3>
                                </div>
                                <!-- dashboard-list end-->
                                <div class="dashboard-list">
                                    <div class="dashboard-message">
                                        <div class="dashboard-listing-table-image">
                                            <a href="listing-single.html"><img src="{{ asset('main') }}/images/listing/1.jpg" alt=""></a>
                                        </div>
                                        <div class="dashboard-listing-table-text">
                                            <h4>Event In City Hall</h4>
                                            <span class="dashboard-listing-table-address"><i class="fa fa-barcode"></i>
                                                Kategori:</span>
                                            <div class="listing-rating card-popup-rainingvis fl-wrap">
                                                <i class="fa fa-cart-arrow-down"></i>
                                                Stok durumu:
                                            </div>
                                            <ul class="dashboard-listing-table-opt  fl-wrap">
                                                <li><a href="#">Edit <i class="fa fa-pencil-square-o"></i></a></li>
                                                <li><a href="#" class="del-btn">Delete <i class="fa fa-trash-o"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- dashboard-list end-->
                            </div>
                            <!-- pagination-->
                            <div class="pagination">
                                <a href="#" class="prevposts-link"><i class="fa fa-caret-left"></i></a>
                                <a href="#">1</a>
                                <a href="#" class="current-page">2</a>
                                <a href="#">3</a>
                                <a href="#">4</a>
                                <a href="#" class="nextposts-link"><i class="fa fa-caret-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--profile-edit-wrap end -->
            </div>
            <!--container end -->
        </section>
        <!-- section end -->
        <div class="limit-box fl-wrap"></div>
    </div>

@endsection
