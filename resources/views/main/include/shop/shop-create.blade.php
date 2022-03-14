@extends('main.theme')
@section('title')
    Mağaza Oluştur - iSotStore
@endsection

@section('shop-create')

    <div class="content">
        <!--section -->
        <section id="sec1">
            <!-- container -->
            <div class="container">
                <!-- profile-edit-wrap -->
                <div class="profile-edit-wrap">
                    <div class="profile-edit-page-header">
                        <h2>Mağaza oluştur</h2>
                        <div class="breadcrumbs"><a href="{{route('home')}}">Ana Sayfa</a><a href="{{route('dashboard')}}">Profil</a><span>Mağaza Oluştur</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            @include('main.data.user-menu')

                        </div>
                        <div class="col-md-9">
                            <!-- profile-edit-container-->
                            <div class="profile-edit-container add-list-container">
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
                                <div class="custom-form">
                                    <form action="{{ route('magazalar.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <label>Mağaza Adı <i class="fa fa-user-o"></i></label>
                                        <input type="text" name="name" placeholder="" value="{{old('name')}}"/>
                                        <label>E-Posta<i class="fa fa-envelope-o"></i> </label>
                                        <input type="text" name="email" placeholder="" value="{{old('email')}}"/>
                                        <label>Phone<i class="fa fa-phone"></i> </label>
                                        <input type="text" name="phone" placeholder="" value="{{old('phone')}}"/>
                                        <label>Adres <i class="fa fa-map-marker"></i> </label>
                                        <input type="text" name="address" placeholder="" value="{{old('address')}}"/>
                                        <label>Resim:</label>
                                        <div class="change-photo-btn">
                                            <div class="photoUpload">
                                                <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                <input type="file" class="upload" name="image">
                                            </div>
                                        </div>
                                        <label>Hakkımızda </label>
                                        <textarea cols="40" rows="3" name="about" placeholder="">
                                            {{old('about')}}
                                        </textarea>
                                        <button class="btn  big-btn  color-bg flat-btn">Değişiklikleri Kaydet<i
                                                class="fa fa-angle-right"></i></button>
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
        <!-- section end -->
    </div>

@endsection
