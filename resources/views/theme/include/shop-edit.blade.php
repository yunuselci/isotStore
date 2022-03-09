@extends('theme.theme')
@section('title')
    Mağaza Düzenle - iSotStore
@endsection

@section('shop-edit')
    <div class="content">
        <!--section -->
        <section>
            <!-- container -->
            <div class="container">
                <!-- profile-edit-wrap -->
                <div class="profile-edit-wrap">
                    <div class="profile-edit-page-header">
                        <h2>Profil Yönetimi</h2>
                        <div class="breadcrumbs"><a href=" {{route('dashboard')}}">Profil</a><span>Mağaza düzenle</span>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="fixed-bar fl-wrap">
                                <div class="user-profile-menu-wrap fl-wrap">
                                    <!-- user-profile-menu-->
                                    <div class="user-profile-menu">
                                        <h3>Ana Bölüm</h3>
                                        <ul>
                                            <li><a href="{{ route('dashboard') }}"><i class="fa fa-user"></i>Kullanıcı
                                                    paneli</a></li>
                                            <li><a href="{{ route('profile.show') }}"><i class="fa fa-edit"></i>Profili
                                                    düzenle</a></li>
                                        </ul>
                                    </div>
                                    <!-- user-profile-menu end-->
                                    <!-- user-profile-menu-->
                                    <div class="user-profile-menu">
                                        <h3>Mağazam</h3>
                                        <ul>
                                            @foreach($shop as $s)
                                                <li><a href="{{ route('magazalar.show',$s->id) }}"><i
                                                            class="fa fa-shopping-bag"></i>Mağazam</a></li>
                                                <li><a href="{{ route('magazalar.edit',$s->id) }}"
                                                       class="user-profile-act"><i class="fa fa-edit"></i>Mağaza düzenle</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <!-- user-profile-menu end-->
                                    <!-- user-profile-menu-->
                                    <div class="user-profile-menu">
                                        <h3>Listelemeler</h3>
                                        <ul>
                                            <li><a href="dashboard-listing-table.html"><i class="fa fa-th-list"></i>İlanlarım
                                                </a></li>
                                            <li><a href="dashboard-add-listing.html"><i class="fa fa-plus-square-o"></i>Yenisini
                                                    Ekle</a></li>
                                        </ul>
                                    </div>
                                    <!-- user-profile-menu end-->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <button class="log-out-btn" type="submit"
                                                onclick="event.preventDefault();
                                                     this.closest('form').submit();">
                                            Çıkış Yap
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @foreach($shop as $s)
                            <div class="col-md-7">
                                <!-- profile-edit-container-->
                                <div class="profile-edit-container">
                                    <div class="profile-edit-header fl-wrap">
                                        <h4>Mağaza Bilgileri</h4>
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
                                    <div class="custom-form">
                                        <form action="{{route('magazalar.update',$s->id)}}" method="post"
                                              enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <label>Mağaza Adı <i class="fa fa-user-o"></i></label>
                                            <input type="text" name="name" placeholder="{{ $s->name }}"
                                                   value="{{ $s->name }}"/>
                                            <label>E-Posta<i class="fa fa-envelope-o"></i> </label>
                                            <input type="text" name="email" placeholder="{{ $s->email }}"
                                                   value="{{ $s->email }}"/>
                                            <label>Phone<i class="fa fa-phone"></i> </label>
                                            <input type="text" name="phone" placeholder="{{ $s->phone }}"
                                                   value="{{ $s->phone }}"/>
                                            <label>Adres <i class="fa fa-map-marker"></i> </label>
                                            <input type="text" name="address" placeholder="{{ $s->address }}"
                                                   value="{{ $s->address }}"/>
                                            <label>Hakkımızda </label>
                                            <textarea cols="40" rows="3" name="about" placeholder="{{ $s->about }}"
                                                      value="{{ $s->about }}"></textarea>
                                            <button class="btn  big-btn  color-bg flat-btn">Değişiklikleri Kaydet<i
                                                    class="fa fa-angle-right"></i></button>
                                        </form>

                                    </div>
                                </div>
                                <!-- profile-edit-container end-->
                            </div>
                            <div class="col-md-2">
                                <div class="edit-profile-photo fl-wrap">
                                    <img src="{{ asset( 'theme/images/shop/'. $s->image ) }}" class="respimg" alt="">
                                    <div class="change-photo-btn">
                                        <form action="{{route('magazalar.update',$s->id)}}" method="post"
                                              enctype="multipart/form-data">
                                            <div class="photoUpload">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="name" value="{{ $s->name }}"/>
                                                <input type="hidden" name="email" value="{{ $s->email }}"/>
                                                <input type="hidden" name="phone" value="{{ $s->phone }}"/>
                                                <input type="hidden" name="address" value="{{ $s->address }}"/>
                                                <span><i class="fa fa-upload"></i> Resim Seç</span>
                                                <input type="file" class="upload" name="image">
                                                <input type="hidden" name="about" value="{{ $s->about }}"/>
                                            </div>
                                            <button class="btn color-bg flat-btn">Yükle</button>
                                        </form>

                                    </div>
                                </div>
                            </div>

                        @endforeach
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

