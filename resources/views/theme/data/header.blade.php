<!-- header-->
<header class="main-header dark-header fs-header sticky">
    <div class="header-inner">
        <div class="logo-holder">
            <a href="{{route('home')}}"><img src="{{ asset('theme') }}/images/logo.png" alt=""></a>
        </div>
        <div class="show-search-button"><i class="fa fa-search"></i> <span>Search</span></div>
        <a href="dashboard-add-listing.html" class="add-list">Ürün Listele <span><i class="fa fa-plus"></i></span></a>
        @if (Route::has('login'))
            @auth
                <div class="header-user-menu">
                    <div class="header-user-name">
                        <span><img src="{{ Auth::user()->profile_photo_url }}" alt=""></span>
                        {{ Auth::user()->name }}
                    </div>
                    <ul>
                        <li><a href="{{ route('dashboard') }}" class="user-profile-act"><i class="fa fa-user"></i>Kullanıcı Paneli</a></li>
                        <li><a href="dashboard-bookings.html"><i class="fa fa-list"></i> İlanlarım </a></li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button class="log-out-btn"  type="submit"
                                    onclick="event.preventDefault();
                                                     this.closest('form').submit();">
                                Çıkış Yap
                            </button>
                        </form>
                    </ul>
                </div>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                @if (Route::has('register'))
                    <div class="show-reg-form modal-open"><i class="fa fa-sign-in"></i>Giriş Yap</div>
                @endif
            @endauth
        @endif
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
                        <a href="{{ route('home') }}" class="act-link">Anasayfa</a>
                    </li>
                    @isset($categories)
                        <li>
                            <a href=" {{ route('categories') }}"> Kategoriler <i class="fa fa-caret-down"></i></a>
                            <!--second level -->
                            <ul>
                                <div class="nav-scroll" id="style-pinar">
                                    @foreach ( $categories as $category )
                                        <li><a href="kategoriler/{{ $category->seflink }}">{{ $category->name }}</a>
                                        </li>
                                    @endforeach
                                </div>
                            </ul>
                            <!--second level end-->
                        </li>
                    @endisset
                    <li>
                        <a href=" {{ route('ads') }}">İlanlar</a>
                    </li>
                    <li>
                        <a href=" {{ route('shops') }}">Mağazalar</a>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- navigation  end -->
    </div>
</header>
<!--  header end -->
