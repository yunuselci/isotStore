@extends('theme.theme')
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
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="fixed-bar fl-wrap">
                                <div class="user-profile-menu-wrap fl-wrap">
                                    <!-- user-profile-menu-->
                                    <div class="user-profile-menu">
                                        <h3>Main</h3>
                                        <ul>
                                            <li><a href="dashboard.html" class="user-profile-act"><i class="fa fa-gears"></i>Dashboard</a></li>
                                            <li><a href="dashboard-myprofile.html"><i class="fa fa-user-o"></i> Edit profile</a></li>
                                            <li><a href="dashboard-password.html"><i class="fa fa-unlock-alt"></i>Change Password</a></li>

                                        </ul>
                                    </div>
                                    <!-- user-profile-menu end-->
                                    <!-- user-profile-menu-->
                                    <div class="user-profile-menu">
                                        <h3>Listings</h3>
                                        <ul>
                                            <li><a href="dashboard-listing-table.html"><i class="fa fa-th-list"></i> My listigs  </a></li>
                                            <li><a href="dashboard-add-listing.html"><i class="fa fa-plus-square-o"></i> Add New</a></li>
                                        </ul>
                                    </div>
                                    <!-- user-profile-menu end-->
                                    <a href="#" class="log-out-btn">Log Out</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <!-- profile-edit-container-->
                            <div class="profile-edit-container">
                                <div class="profile-edit-header fl-wrap" style="margin-top:30px">
                                    <h4>Merhaba , <span> {{ Auth::user()->name }}</span></h4>
                                </div>

                                <!-- statistic-container-->
                                <div class="statistic-container fl-wrap">
                                    <!-- statistic-item-wrap-->
                                    <div class="statistic-item-wrap">
                                        <div class="statistic-item gradient-bg fl-wrap">
                                            <i class="fa fa-map-marker"></i>
                                            <div class="statistic-item-numder">21</div>
                                            <h5>Active Listings</h5>
                                        </div>
                                    </div>
                                    <!-- statistic-item-wrap end-->
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
