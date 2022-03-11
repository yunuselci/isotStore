@extends('main.theme')
@section('title')
    Teklifler - iSotStore
@endsection

@section('offers')
    <div class="content">
        <!--section -->
        <section id="sec1">
            <!-- container -->
            <div class="container">
                <!-- profile-edit-wrap -->
                <div class="profile-edit-wrap">
                    <div class="profile-edit-page-header">
                        <h2>Messages </h2>
                        <div class="breadcrumbs"><a href="#">Home</a><a href="#">Dasboard</a><span>Messages</span></div>
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
                                    @foreach(Auth::user()->whereId(Auth::id())->with('shops')->get() as $value)
                                        <div class="user-profile-menu">
                                            <h3>Mağazam</h3>
                                            <ul>
                                                @if(!is_null($value->shops))
                                                    @if($value->shops->first()->status == 1)
                                                        <li><a href="{{ route('magazalar.show', $value->shops->first()->id) }}"><i class="fa fa-shopping-bag"></i> Mağazam </a></li>
                                                        <li><a href="{{ route('teklifler.show', $value->shops->first()->id) }}"  class="user-profile-act"><i class="fa fa-envelope-o"></i> Teklifler </a></li>
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
                            <div class="dashboard-list-box fl-wrap">
                                <div class="dashboard-header fl-wrap">
                                    <h3>Indox</h3>
                                </div>
                                <!-- dashboard-list end-->
                                <div class="dashboard-list">
                                    <div class="dashboard-message">
                                        <span class="new-dashboard-item">New</span>
                                        <div class="dashboard-message-avatar">
                                            <img src="images/avatar/1.jpg" alt="">
                                        </div>
                                        <div class="dashboard-message-text">
                                            <h4>Andy Smith - <span>27 December 2018</span></h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc posuere convallis purus non cursus. Cras metus neque, gravida sodales massa ut. </p>
                                            <span class="reply-mail clearfix">Reply : <a  class="dashboard-message-user-mail" href="mailto:yourmail@domain.com" target="_top">yourmail@domain.com</a></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- dashboard-list end-->
                                <!-- dashboard-list end-->
                                <div class="dashboard-list">
                                    <div class="dashboard-message">
                                        <span class="new-dashboard-item">New</span>
                                        <div class="dashboard-message-avatar">
                                            <img src="images/avatar/avatar-bg.png" alt="">
                                        </div>
                                        <div class="dashboard-message-text">
                                            <h4>Andy Smith - <span>27 December 2018</span></h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc posuere convallis purus non cursus. Cras metus neque, gravida sodales massa ut. </p>
                                            <span class="reply-mail clearfix">Reply : <a  class="dashboard-message-user-mail" href="mailto:yourmail@domain.com" target="_top">yourmail@domain.com</a></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- dashboard-list end-->
                                <!-- dashboard-list end-->
                                <div class="dashboard-list">
                                    <div class="dashboard-message">
                                        <div class="dashboard-message-avatar">
                                            <img src="images/avatar/1.jpg" alt="">
                                        </div>
                                        <div class="dashboard-message-text">
                                            <h4>Andy Smith - <span>27 December 2018</span></h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc posuere convallis purus non cursus. Cras metus neque, gravida sodales massa ut. </p>
                                            <span class="reply-mail clearfix">Reply : <a  class="dashboard-message-user-mail" href="mailto:yourmail@domain.com" target="_top">yourmail@domain.com</a></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- dashboard-list end-->
                                <!-- dashboard-list end-->
                                <div class="dashboard-list">
                                    <div class="dashboard-message">
                                        <div class="dashboard-message-avatar">
                                            <img src="images/avatar/avatar-bg.png" alt="">
                                        </div>
                                        <div class="dashboard-message-text">
                                            <h4>Andy Smith - <span>27 December 2018</span></h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc posuere convallis purus non cursus. Cras metus neque, gravida sodales massa ut. </p>
                                            <span class="reply-mail clearfix">Reply : <a  class="dashboard-message-user-mail" href="mailto:yourmail@domain.com" target="_top">yourmail@domain.com</a></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- dashboard-list end-->
                                <!-- dashboard-list end-->
                                <div class="dashboard-list">
                                    <div class="dashboard-message">
                                        <div class="dashboard-message-avatar">
                                            <img src="images/avatar/1.jpg" alt="">
                                        </div>
                                        <div class="dashboard-message-text">
                                            <h4>Andy Smith - <span>27 December 2018</span></h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc posuere convallis purus non cursus. Cras metus neque, gravida sodales massa ut. </p>
                                            <span class="reply-mail clearfix">Reply : <a  class="dashboard-message-user-mail" href="mailto:yourmail@domain.com" target="_top">yourmail@domain.com</a></span>
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
        <!--section -->
        <section class="gradient-bg">
            <div class="cirle-bg">
                <div class="bg" data-bg="images/bg/circle.png"></div>
            </div>
            <div class="container">
                <div class="join-wrap fl-wrap">
                    <div class="row">
                        <div class="col-md-8">
                            <h3>Do You Have Questions ?</h3>
                            <p>Lorem ipsum dolor sit amet, harum dolor nec in, usu molestiae at no.</p>
                        </div>
                        <div class="col-md-4"><a href="contacts.html" class="join-wrap-btn">Get In Touch <i class="fa fa-envelope-o"></i></a></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section end -->
    </div>
@endsection
