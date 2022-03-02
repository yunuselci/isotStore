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
                        <a href="{{ route('home') }}" class="act-link">Anasayfa</a>
                    </li>
                        <li>
                            <a href="{{ route('categories') }}">Kategoriler<i class="fa fa-caret-down"></i></a>
                        </li>

                            <ul>
                                <div class="nav-scroll" id="style-pinar">
                                    <li><a href="listing.html"></a></li>
                                </div>
                            </ul>


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
