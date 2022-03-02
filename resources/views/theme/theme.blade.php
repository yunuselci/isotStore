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
    <link type="text/css" rel="stylesheet" href="{{ asset('theme') }}/css/reset.css">
    <link type="text/css" rel="stylesheet" href="{{ asset('theme') }}/css/plugins.css">
    <link type="text/css" rel="stylesheet" href="{{ asset('theme') }}/css/style.css">
    <link type="text/css" rel="stylesheet" href="{{ asset('theme') }}/css/color.css">
    <!--=============== favicons ===============-->
    <link rel="shortcut icon" href="{{ asset('theme') }}/images/favicon.ico">
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

    <!--  wrapper  -->
    <div id="wrapper">
        @include('theme.data.header')

        @yield('master')

        @include('theme.data.footer')

    </div>
    <!-- wrapper end -->

    <!--register form -->
    <div class="main-register-wrap modal">
        <div class="main-overlay"></div>
        <div class="main-register-holder">
            <div class="main-register fl-wrap">
                <div class="close-reg"><i class="fa fa-times"></i></div>
                <h3>Sign In <span>City<strong>Book</strong></span></h3>
                <div class="soc-log fl-wrap">
                    <p>For faster login or register use your social account.</p>
                    <a href="#" class="facebook-log"><i class="fa fa-facebook-official"></i>Log in with Facebook</a>
                    <a href="#" class="twitter-log"><i class="fa fa-twitter"></i> Log in with Twitter</a>
                </div>
                <div class="log-separator fl-wrap"><span>or</span></div>
                <div id="tabs-container">
                    <ul class="tabs-menu">
                        <li class="current"><a href="#tab-1">Login</a></li>
                        <li><a href="#tab-2">Register</a></li>
                    </ul>
                    <div class="tab">
                        <div id="tab-1" class="tab-content">
                            <div class="custom-form">
                                <form method="post"  name="registerform">
                                    <label>Username or Email Address * </label>
                                    <input name="email" type="text"   onClick="this.select()" value="">
                                    <label >Password * </label>
                                    <input name="password" type="password"   onClick="this.select()" value="" >
                                    <button type="submit"  class="log-submit-btn"><span>Log In</span></button>
                                    <div class="clearfix"></div>
                                    <div class="filter-tags">
                                        <input id="check-a" type="checkbox" name="check">
                                        <label for="check-a">Remember me</label>
                                    </div>
                                </form>
                                <div class="lost_password">
                                    <a href="#">Lost Your Password?</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab">
                            <div id="tab-2" class="tab-content">
                                <div class="custom-form">
                                    <form method="post"   name="registerform" class="main-register-form" id="main-register-form2">
                                        <label >First Name * </label>
                                        <input name="name" type="text"   onClick="this.select()" value="">
                                        <label>Second Name *</label>
                                        <input name="name2" type="text"  onClick="this.select()" value="">
                                        <label>Email Address *</label>
                                        <input name="email" type="text"  onClick="this.select()" value="">
                                        <label >Password *</label>
                                        <input name="password" type="password"   onClick="this.select()" value="" >
                                        <button type="submit"     class="log-submit-btn"  ><span>Register</span></button>
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
<script type="text/javascript" src="{{ asset('theme') }}/js/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('theme') }}/js/plugins.js"></script>
<script type="text/javascript" src="{{ asset('theme') }}/js/scripts.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwJSRi0zFjDemECmFl9JtRj1FY7TiTRRo&libraries=places&callback=initAutocomplete"></script>
@yield('js')
</body>
</html>
