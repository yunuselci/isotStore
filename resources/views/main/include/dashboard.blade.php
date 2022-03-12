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
                        <div class="breadcrumbs"><a href="{{route('home')}}">Ana Sayfa</a><span>Profil</span></div>

                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            @include('main.data.user-menu')

                        </div>
                        <div class="col-md-9">
                            <!-- profile-edit-container-->
                            <div class="profile-edit-container">
                                <div class="profile-edit-header fl-wrap" style="margin-top:30px">
                                    <h4>Merhaba , <span> {{ Auth::user()->name }}</span></h4>
                                </div>
                                @if ($message = Session::get('success'))
                                    <div class="notification success fl-wrap">
                                        <p> {{ $message }}</p>
                                        <a class="notification-close" href="#"><i class="fa fa-times"></i></a>
                                    </div>
                                @elseif($message = Session::get('error'))
                                    <div class="notification reject fl-wrap">
                                        <p> {{ $message }}</p>
                                        <a class="notification-close" href="#"><i class="fa fa-times"></i></a>
                                    </div>
                                @endif
                                @if ($errors->any())
                                    <div class="notification reject fl-wrap">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                        <a class="notification-close" href="#"><i class="fa fa-times"></i></a>

                                    </div>
                                @endif
                                <!-- statistic-container-->
                                <div class="statistic-container fl-wrap">
                                    <div class="dashboard-list-box fl-wrap activities">
                                        <div class="dashboard-header fl-wrap">
                                            <h3>Recent Activities ( Bu kısımı geliştirmedim henüz )</h3>
                                        </div>
                                        <!-- dashboard-list end-->
                                        <div class="dashboard-list">
                                            <div class="dashboard-message">
                                                <span class="new-dashboard-item"><i class="fa fa-times"></i></span>

                                                <div class="dashboard-message-text">
                                                    <p><i class="fa fa-check"></i> Your listing <a href="#">Luxury Restourant</a> has been approved! </p>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- dashboard-list end-->
                                        <!-- dashboard-list end-->
                                        <div class="dashboard-list">
                                            <div class="dashboard-message">
                                                <span class="new-dashboard-item"><i class="fa fa-times"></i></span>

                                                <div class="dashboard-message-text">
                                                    <p><i class="fa fa-heart"></i>Someone bookmarked your <a href="#">Event In City Mol</a> listing!</p>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- dashboard-list end-->
                                        <!-- dashboard-list end-->
                                        <div class="dashboard-list">
                                            <div class="dashboard-message">
                                                <span class="new-dashboard-item"><i class="fa fa-times"></i></span>

                                                <div class="dashboard-message-text">
                                                    <p><i class="fa fa-comments-o"></i> Someone left a review on <a href="#">Gym in the Center</a> listing!</p>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- dashboard-list end-->
                                        <!-- dashboard-list end-->
                                        <div class="dashboard-list">
                                            <div class="dashboard-message">
                                                <span class="new-dashboard-item"><i class="fa fa-times"></i></span>

                                                <div class="dashboard-message-text">
                                                    <p><i class="fa fa-check"></i> Your listing <a href="#">Luxury Restourant</a> has been approved! </p>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- dashboard-list end-->
                                        <!-- dashboard-list end-->
                                        <div class="dashboard-list">
                                            <div class="dashboard-message">
                                                <span class="new-dashboard-item"><i class="fa fa-times"></i></span>

                                                <div class="dashboard-message-text">
                                                    <p><i class="fa fa-heart"></i>Someone bookmarked your <a href="#">Event In City Mol</a> listing!</p>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- dashboard-list end-->
                                        <!-- dashboard-list end-->
                                        <div class="dashboard-list">
                                            <div class="dashboard-message">
                                                <span class="new-dashboard-item"><i class="fa fa-times"></i></span>

                                                <div class="dashboard-message-text">
                                                    <p><i class="fa fa-comments-o"></i> Someone left a review on <a href="#">Gym in the Center</a> listing!</p>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- dashboard-list end-->
                                    </div>
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
