<!-- header-->
<header class="main-header dark-header fs-header sticky">
    <div class="header-inner">
        <div class="logo-holder">
            <a href="{{route('home')}}"><img src="{{ asset('main') }}/images/logo.png" alt=""></a>
        </div>
        <div class="show-search-button"><i class="fa fa-search"></i> <span>Search</span></div>
        @if (Route::has('login'))
            @auth
                <div class="header-user-menu">
                    <div class="header-user-name">
                        <span><img src="{{ Auth::user()->profile_photo_url }}" alt=""></span>
                        {{ Auth::user()->name }}
                    </div>
                    <ul>
                        <li><a href="{{ route('dashboard') }}" class="user-profile-act"><i class="fa fa-user"></i>Kullanıcı
                                Paneli</a></li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button class="log-out-btn" type="submit"
                                    onclick="event.preventDefault();
                                                     this.closest('form').submit();">
                                Çıkış Yap
                            </button>
                        </form>
                    </ul>
                </div>
            @endif

            @if (Route::has('register'))
                <div class="show-reg-form modal-open"><i class="fa fa-sign-in"></i>Giriş Yap</div>
            @endif
            @endauth

    <!-- nav-button-wrap-->
        <div class="nav-button-wrap color-bg">
            <div class="nav-button">
                <span></span><span></span><span></span>
            </div>
        </div>
        <!-- nav-button-wrap end-->
        <!--  navigation -->
        <div class="nav-holder main-menu">
            <nav>
                <ul>
                    <li>
                        <a href="{{ route('home') }}"
                           class="{{ Route::currentRouteName() === 'home' ? 'act-link' : '' }}">Anasayfa</a>
                    </li>
                    @isset($categories)
                        <li>
                            <a href=" {{ route('categories') }}"
                               class="{{ Route::currentRouteName() === 'categories' ? 'act-link' : '' }}"> Kategoriler
                                <i class="fa fa-caret-down"></i></a>
                            <!--second level -->
                            <ul>
                                <div class="nav-scroll" id="style-pinar">
                                    @foreach ( $categories as $category )
                                        <li>
                                            <a href="{{ route('categoryDetail',$category->seflink) }}">{{ $category->name }}</a>
                                        </li>
                                    @endforeach
                                </div>
                            </ul>
                            <!--second level end-->
                        </li>
                    @endisset
                    <li>
                        <a href=" {{ route('listings') }}"
                           class="{{ Route::currentRouteName() === 'listings' ? 'act-link' : '' }}">İlanlar</a>
                    </li>
                    <li>
                        <a href=" {{ route('shops') }}"
                           class="{{ Route::currentRouteName() === 'shops' ? 'act-link' : '' }}">Mağazalar</a>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- navigation  end -->
    </div>
</header>
<!--  header end -->
