<!-- header-->
<header class="main-header dark-header fs-header sticky">
    <div class="header-inner">
        <div class="logo-holder">
            <a href="{{route('home')}}"><img src="{{ asset('theme') }}/images/logo.png" alt=""></a>
        </div>
        <div class="show-search-button"><i class="fa fa-search"></i> <span>Search</span></div>
        <a href="dashboard-add-listing.html" class="add-list">Add Listing <span><i class="fa fa-plus"></i></span></a>
        <div class="show-reg-form modal-open"><i class="fa fa-sign-in"></i>Sign In</div>
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
                        <a href="{{ route('home') }}" class="act-link">Anasayfa </a>
                    </li>
                    <li>
                        <a href="{{ route('categories') }}"> Kategoriler <i class="fa fa-caret-down"></i></a>
                        <!--second level -->
                        <ul>
                            <li><a href="listing.html">Ziraat, İçecek ve Gıda Ürünleri</a></li>
                            <li><a href="listing2.html">Tekstil</a></li>
                            <li><a href="listing3.html">Deri ve Deri Kimyasalları</a></li>
                            <li><a href="listing4.html">Moda</a></li>
                            <li><a href="listing5.html">Elektrik ve Elektronik Ürünleri</a></li>
                            <li><a href="listing6.html">Hediyelik, Hobi ve Oyuncak</a></li>
                            <li><a href="listing.html">Medikal ve Tek Kullanımlık Ürünler</a></li>
                            <li><a href="listing2.html">Yapı Malzemeleri ve Bahçe</a></li>
                            <li><a href="listing3.html">Temizlik</a></li>
                            <li><a href="listing4.html">Kimyasallar ve Hammaddeler</a></li>
                            <li><a href="listing5.html">Ambalaj ve Kırtasiye</a></li>
                            <li><a href="listing6.html">Kozmetik ve Kişisel Bakım</a></li>
                            <li><a href="listing4.html">Spor Ekipmanları</a></li>
                            <li><a href="listing5.html">Anne ve Bebek Ürünleri</a></li>
                            <li><a href="listing6.html">Züccaciye</a></li>
                            <li><a href="listing6.html">Mobilya</a></li>
                            <li><a href="listing6.html">Oto Yedek Parça</a></li>
                            <li><a href="listing6.html">Diğer</a></li>
                            <li>
                                <a href="#">Single <i class="fa fa-caret-down"></i></a>
                                <!--third  level  -->
                                <ul>
                                    <li><a href="listing-single.html">Style 1</a></li>
                                    <li><a href="listing-single2.html">Style 2</a></li>
                                    <li><a href="listing-single3.html">Style 3</a></li>
                                    <li><a href="listing-single4.html">Style 4</a></li>
                                </ul>
                                <!--third  level end-->
                            </li>
                        </ul>
                        <!--second level end-->
                    </li>
                    <li>
                        <a href="blog.html">News</a>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- navigation  end -->
    </div>
</header>
<!--  header end -->
