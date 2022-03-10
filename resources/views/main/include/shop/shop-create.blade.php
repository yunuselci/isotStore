@extends('main.theme')
@section('title')
    Mağaza Oluştur - iSotStore
@endsection

@section('shop-create')

    <div class="content">
        <!--section -->
        <section id="sec1">
            <!-- container -->
            <div class="container">
                <!-- profile-edit-wrap -->
                <div class="profile-edit-wrap">
                    <div class="profile-edit-page-header">
                        <h2>Mağaza oluştur</h2>
                        <div class="breadcrumbs"><a href="{{route('home')}}">Ana Sayfa</a><a href="{{route('dashboard')}}">Profil</a><span>Mağaza Oluştur</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="fixed-bar fl-wrap">
                                <div class="user-profile-menu-wrap fl-wrap">
                                    <!-- user-profile-menu-->
                                    <div class="user-profile-menu">
                                        <h3>Ana Bölüm</h3>
                                        <ul>
                                            <li><a href="{{ route('dashboard') }}"><i class="fa fa-user"></i>Kullanıcı paneli</a></li>
                                            <li><a href="{{ route('profile.show') }}"><i class="fa fa-edit"></i>Profili düzenle</a></li>
                                        </ul>
                                    </div>
                                    <!-- user-profile-menu end-->
                                    <!-- user-profile-menu-->
                                    <div class="user-profile-menu">
                                        <h3>Mağazam</h3>
                                        <ul>
                                            @foreach(Auth::user()->whereId(Auth::id())->with('shops')->get() as $value)
                                                @if(!is_null($value->shops))
                                                    <li><a href="{{ route('magazalar.show', $value->shops->first()->id) }}"><i class="fa fa-shopping-bag"></i> Mağazam </a></li>
                                                    <li><a href="{{ route('magazalar.edit',$value->shops->first()->id) }}"><i class="fa fa-edit"></i>Mağaza düzenle</a></li>
                                                @else
                                                    <li><a href="{{ route('magazalar.create') }}"><i class="fa fa-shopping-bag"></i>Mağaza oluştur</a></li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                    <!-- user-profile-menu end-->
                                    <!-- user-profile-menu-->
                                    <div class="user-profile-menu">
                                        <h3>Listelemeler</h3>
                                        <ul>
                                            <li><a href="{{ route('ilanlar.show',$value->shops->first()->id) }}"><i class="fa fa-th-list"></i>İlanlarım </a></li>
                                            <li><a href="{{ route('ilanlar.create') }}"><i class="fa fa-plus-square-o"></i>Yenisini Ekle</a></li>
                                        </ul>
                                    </div>
                                    <!-- user-profile-menu end-->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <button class="log-out-btn" type="submit"
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
                            <div class="profile-edit-container add-list-container">
                                <div class="custom-form">
                                    <form action="{{ route('magazalar.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <label>Mağaza Adı <i class="fa fa-user-o"></i></label>
                                        <input type="text" name="name" placeholder="" value=""/>
                                        <label>E-Posta<i class="fa fa-envelope-o"></i> </label>
                                        <input type="text" name="email" placeholder="" value=""/>
                                        <label>Phone<i class="fa fa-phone"></i> </label>
                                        <input type="text" name="phone" placeholder="" value=""/>
                                        <label>Adres <i class="fa fa-map-marker"></i> </label>
                                        <input type="text" name="address" placeholder="" value=""/>
                                        <label>Resim:</label>
                                        <div class="change-photo-btn">
                                            <div class="photoUpload">
                                                <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                <input type="file" class="upload" name="image">
                                            </div>
                                        </div>
                                        <label>Hakkımızda </label>
                                        <textarea cols="40" rows="3" name="about" placeholder="" value=""></textarea>
                                        <button class="btn  big-btn  color-bg flat-btn">Değişiklikleri Kaydet<i
                                                class="fa fa-angle-right"></i></button>
                                    </form>

                                </div>
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
        <!-- section end -->
    </div>

@endsection
