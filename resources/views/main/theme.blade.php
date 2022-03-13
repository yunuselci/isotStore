<!DOCTYPE HTML>
<html lang="en">
<head>
    <!--=============== basic  ===============-->
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="robots" content="index, follow"/>
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <!--=============== css  ===============-->
    <link type="text/css" rel="stylesheet" href="{{ asset('main') }}/css/reset.css">
    <link type="text/css" rel="stylesheet" href="{{ asset('main') }}/css/plugins.css">
    <link type="text/css" rel="stylesheet" href="{{ asset('main') }}/css/style.css">
    <link type="text/css" rel="stylesheet" href="{{ asset('main') }}/css/color.css">
    <!--=============== favicons ===============-->
    <link rel="shortcut icon" href="{{ asset('main') }}/images/favicon.ico">
    @yield('css')
</head>
<body>
<!--loader-->
<div class="loader-wrap">
    <div class="pin"></div>
    <div class="pulse"></div>
</div>
<!--loader end-->
<!-- Main  -->
<div id="main">
    @include('main.data.header')
    <!--  wrapper  -->
    <div id="wrapper">

        @yield('master')
        @yield('categories')
        @yield('category-page')
        @yield('dashboard')
        @yield('show')
        @yield('shops')
        @yield('shop-page')
        @yield('shop-edit')
        @yield('shop-create')
        @yield('listings')
        @yield('listing-create')
        @yield('listing-edit')
        @yield('listing-page')
        @yield('listing-detail')
        @yield('offers')
        @yield('admin-shops')



    </div>
    <!-- wrapper end -->
    @include('main.data.footer')

    <!--register form -->
    <div class="main-register-wrap modal">
        <div class="main-overlay"></div>
        <div class="main-register-holder">
            <div class="main-register fl-wrap">
                <div class="close-reg"><i class="fa fa-times"></i></div>
                <h3>Giriş Yap <span>iSot<strong>Store</strong></span></h3>
                <div id="tabs-container">
                    <ul class="tabs-menu">
                        <li class="current"><a href="#tab-1">Giriş Yap</a></li>
                        <li><a href="#tab-2">Kayıt Ol</a></li>
                    </ul>
                    <div class="tab">
                        <div id="tab-1" class="tab-content">
                            <div class="custom-form">
                                <form method="post" action="{{ route('login') }}">
                                    @csrf
                                    <label>E-Posta Adresi</label>
                                    <input id="email" name="email" type="email"  onClick="this.select()" value="{{ 'E-Posta' }}" required>
                                    <label >Şifre</label>
                                    <input id="password" name="password" type="password"   onClick="this.select()" value="{{ 'Şifre' }}" required>
                                    <div class="clearfix"></div>
                                    <div class="filter-tags">
                                        <label for="remember_me">
                                        <input id="remember_me" type="checkbox" name="remember">
                                        <span for="check-a">{{ 'Beni hatırla' }}</span>
                                        </label>
                                    </div>
                                    <button type="submit"  class="log-submit-btn"><span> {{ 'Giriş Yap' }}</span></button>
                                </form>
                                @if (Route::has('password.request'))
                                <div class="lost_password">
                                    <a href="{{ route('password.request') }}">{{ 'Şifreni mi unuttun ?' }}</a>
                                </div>
                                @endif

                            </div>
                        </div>
                        <div class="tab">
                            <div id="tab-2" class="tab-content">
                                <div class="custom-form">
                                    <form method="post" action="{{ route('register') }}" n class="main-register-form" id="main-register-form2">
                                        @csrf
                                        <label >İsim </label>
                                        <input id="name" name="name" type="text"   onClick="this.select()" value="{{ 'İsim' }}" required>
                                        <label>E-Posta Adresi</label>
                                        <input id="email" name="email" type="email"  onClick="this.select()" value="{{ 'E-Posta' }}" required>
                                        <label >Şifre</label>
                                        <input id="password" name="password" type="password"   onClick="this.select()" value="{{ 'Şifre' }}" required>
                                        <label >Şifre Tekrar</label>
                                        <input id="password_confirmation" name="password_confirmation" type="password"  onClick="this.select()" value="{{ 'Şifre Tekrar' }}" required>
                                        <button type="submit" class="log-submit-btn"  ><span>{{ 'Kayıt Ol' }}</span></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--register form end -->
    <a class="to-top"><i class="fa fa-angle-up"></i></a>
</div>
<!-- Main end -->
<!--=============== scripts  ===============-->
<script type="text/javascript" src="{{ asset('main') }}/js/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('main') }}/js/plugins.js"></script>
<script type="text/javascript" src="{{ asset('main') }}/js/scripts.js"></script>
@yield('js')
</body>
</html>
