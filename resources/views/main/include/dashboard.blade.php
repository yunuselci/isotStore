@extends('main.theme')
@section('title')
    Profil
@endsection

@section('dashboard')

    <div class="content">
        <!--section -->
        <section id="sec1">
            <!-- container -->
            <div class="container">
                <!-- profile-edit-wrap -->
                <div class="profile-edit-wrap">
                    <div class="profile-edit-page-header">
                        <h2>Profil Yönetimi</h2>
                        <div class="breadcrumbs"><a href="{{route('home')}}">Ana Sayfa</a><a href=" {{route('dashboard')}}">Profil</a></div>

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
                                            <li><a href="{{ route('ilanlar.show',$value->shops->first()->id) }}"><i class="fa fa-th-list"></i>İlanlarım </a></li>
                                            <li><a href="{{ route('ilanlar.create') }}"><i class="fa fa-plus-square-o"></i>Yenisini Ekle</a></li>
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
                            <!-- profile-edit-container-->
                            <div class="profile-edit-container">
                                <div class="profile-edit-header fl-wrap" style="margin-top:30px">
                                    <h4>Merhaba , <span> {{ Auth::user()->name }}</span></h4>
                                </div>

                                <!-- statistic-container-->
                                <div class="statistic-container fl-wrap">
                                    <!-- statistic-item-wrap-->
                                    <div class="statistic-item-wrap">
                                        <div class="statistic-item gradient-bg fl-wrap">
                                            <i class="fa fa-map-marker"></i>
                                            <div class="statistic-item-numder">21</div>
                                            <h5>Active Listings</h5>
                                        </div>
                                    </div>
                                    <!-- statistic-item-wrap end-->
                                </div>
                                <!-- statistic-container end-->
                            </div>
                            <!-- profile-edit-container end-->
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
