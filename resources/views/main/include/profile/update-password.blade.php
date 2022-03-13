@extends('main.theme')
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
                        <div class="breadcrumbs"><a href=" {{ route('dashboard') }}">Profil</a><span>Şifreyi değiş</span></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            @include('main.data.user-menu')
                        </div>
                        <div class="col-md-9">
                            <!-- profile-edit-container-->
                            <div class="profile-edit-container">
                                @if (session('status') == 'password-updated')
                                    <div class="notification success fl-wrap">
                                        <p> Şifre başarıyla güncellendi.</p>
                                        <a class="notification-close" href="#"><i class="fa fa-times"></i></a>
                                    </div>
                                @endif
                                @if ($errors->updatePassword->any())
                                    <div class="notification reject fl-wrap">
                                        <ul>
                                            @foreach ($errors->updatePassword->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                        <a class="notification-close" href="#"><i class="fa fa-times"></i></a>

                                    </div>
                                @endif
                                <div class="profile-edit-header fl-wrap">
                                    <h4>Şifreyi değiştir</h4>
                                </div>
                                <div class="custom-form no-icons">
                                    <form method="post" action="{{ route('user-password.update', Auth::user()->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="pass-input-wrap fl-wrap">
                                            <label>Mevcut Şifre</label>
                                            <input id="current_password" name="current_password" class="pass-input" type="password" />
                                            <span class="eye"><i class="fa fa-eye" aria-hidden="true"></i> </span>
                                        </div>
                                        <div class="pass-input-wrap fl-wrap">
                                            <label>Yeni Şifre</label>
                                            <input id="password" name="password" class="pass-input" type="password" />
                                            <span class="eye"><i class="fa fa-eye" aria-hidden="true"></i> </span>
                                        </div>
                                        <div class="pass-input-wrap fl-wrap">
                                            <label>Yeni Şifre Tekrar</label>
                                            <input id="password_confirmation" name="password_confirmation" class="pass-input" type="password" />
                                            <span class="eye"><i class="fa fa-eye" aria-hidden="true"></i> </span>
                                        </div>
                                        <button type="submit" class="btn  big-btn  color-bg flat-btn">Şifreyi güncelle</button>
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
    </div>


@endsection
