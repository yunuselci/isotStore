@extends('theme.theme')
@section('title')
    Şifre Değiştirme - iSotStore
@endsection

@section('update-password')

    <div class="content">
        <!--section -->
        <section>
            <!-- container -->
            <div class="container">
                <!-- profile-edit-wrap -->
                <div class="profile-edit-wrap">
                    <div class="profile-edit-page-header">
                        <h2>Şifre güncelleme</h2>
                        <div class="breadcrumbs"><a href=" {{ route('dashboard') }}">Profil</a><a href="{{ route('edit.profile') }}">Profili düzenle</a><span>Şifreyi değiş</span></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="fixed-bar fl-wrap">
                                <div class="user-profile-menu-wrap fl-wrap">
                                    <!-- user-profile-menu-->
                                    <div class="user-profile-menu">
                                        <h3>Ana Bölüm</h3>
                                        <ul>
                                            <li><a href="{{ route('dashboard') }}" class="user-profile-act"><i class="fa fa-gears"></i>Kullanıcı paneli</a></li>
                                            <li><a href="{{ route('edit.profile') }}"><i class="fa fa-user-o"></i> Profili düzenle</a></li>
                                            <li><a href="{{ route('update.password') }}"><i class="fa fa-unlock-alt"></i>Şifreyi değiş</a></li>
                                        </ul>
                                    </div>
                                    <!-- user-profile-menu end-->
                                    <!-- user-profile-menu-->
                                    <div class="user-profile-menu">
                                        <h3>Listelemeler</h3>
                                        <ul>
                                            <li><a href="dashboard-listing-table.html"><i class="fa fa-th-list"></i>İlanlarım </a></li>
                                            <li><a href="dashboard-add-listing.html"><i class="fa fa-plus-square-o"></i>Yenisini Ekle</a></li>
                                        </ul>
                                    </div>
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
                        <div class="col-md-7">
                            <!-- profile-edit-container-->
                            <div class="profile-edit-container">
                                <div class="profile-edit-header fl-wrap">
                                    <h4>Hesabım</h4>
                                </div>
                                <div class="custom-form">
                                    <form method="post" action="{{ route('user-password.update') }}">
                                    @csrf
                                        @method('PUT')
                                    <label>Mevcut Şifre <i class="fa fa-unlock-alt"></i></label>
                                    <input id="current_password" name="password" type="password" value=""/>
                                    <label>Yeni Şifre <i class="fa fa-unlock-alt"></i></label>
                                    <input id="password" name="password" type="password" value=""/>
                                    <label>Yeni Şifre Tekrar <i class="fa fa-unlock-alt"></i>  </label>
                                    <input id="password_confirmation" name="password" type="password" value=""/>
                                    <button type="submit" class="btn  big-btn  color-bg flat-btn">Şifreyi güncelle</button>
                                    </form>
                                </div>
                            </div>
                            <!-- profile-edit-container end-->
                        </div>
                        <div class="col-md-2">
                            <div class="edit-profile-photo fl-wrap">
                                <img src="{{ Auth::user()->profile_photo_url }}" class="respimg" alt="">
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
