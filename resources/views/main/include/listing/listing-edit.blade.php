@extends('main.theme')
@section('title')
    İlan Düzenle - iSotStore
@endsection

@section('listing-edit')

    <div class="content">
        <!--section -->
        <section id="sec1">
            <!-- container -->
            <div class="container">
                <!-- profile-edit-wrap -->
                <div class="profile-edit-wrap">
                    <div class="profile-edit-page-header">
                        <h2>İlan Oluştur </h2>
                        <div class="breadcrumbs"><a href="{{route('home')}}">Ana Sayfa</a><a href="{{route('dashboard')}}">Profil</a><span>İlan oluştur</span></div>
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
                                    <div class="user-profile-menu">
                                        <h3>Mağazam</h3>
                                        <ul>
                                            @foreach(Auth::user()->whereId(Auth::id())->with('shops')->get() as $value)
                                                @if(!is_null($value->shops))
                                                    @if($value->shops->first()->status == 1)
                                                        <li><a href="{{ route('magazalar.show', $value->shops->first()->id) }}"><i class="fa fa-shopping-bag"></i> Mağazam </a></li>
                                                        <li><a href="{{ route('magazalar.edit',$value->shops->first()->id) }}"><i class="fa fa-edit"></i>Mağaza düzenle</a></li>
                                                    @else
                                                        <li><a class="user-profile-act"><i class="fa fa-warning"></i>Onay bekliyor</a></li>
                                                    @endif
                                                @else
                                                    <li><a href="{{ route('magazalar.create') }}"><i class="fa fa-shopping-bag"></i>Mağaza oluştur</a></li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                    <!-- user-profile-menu end-->
                                    <!-- user-profile-menu-->
                                    <div class="user-profile-menu">
                                        <h3>Listelemeler</h3>
                                        <ul>
                                            <li><a href="{{ route('ilanlar.show',$value->shops->first()->id) }}" class="user-profile-act"><i class="fa fa-th-list"></i>İlanlarım </a></li>
                                            <li><a href="{{ route('ilanlar.create') }}"  ><i class="fa fa-plus-square-o"></i>Yenisini Ekle</a></li>
                                        </ul>
                                    </div>
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
                                    @foreach($listing as $l)
                                    <form action="{{ route('ilanlar.update', $l->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <label>Ürün Adı (İlan Adı) <i class="fa fa-text-height"></i></label>
                                        <input type="text" name="name" placeholder="{{ $l->name }}" value="{{ $l->name }}"/>
                                        <label>Ürün Açıklaması <i class="fa fa-pencil-square"></i> </label>
                                        <input type="text" name="description" placeholder="{{ $l->description }}" value="{{ $l->description }}"/>
                                        <label>Resim:</label>
                                        <img src="{{ asset( 'main/images/listing/'. $l->image ) }}" class="respimgsmall" alt="">
                                        <div class="change-photo-btn">
                                            <div class="photoUpload">
                                                <span><i class="fa fa-upload"></i> Resim Yükle</span>
                                                <input type="file" class="upload" name="image" value="{{ $l->image }}">
                                            </div>
                                        </div>
                                        <label>Birim: <i class="fa fa-balance-scale"></i> </label>
                                        <input type="text" name="unit" placeholder="{{ $l->unit }}" value="{{ $l->unit }}"/>
                                        <label>Tipi: <i class="fa fa-map-marker"></i> </label>
                                        <select class="chosen-select"  name="type" >
                                            <option value="1" @if($l->type==1) selected @endif >Satılık</option>
                                            <option value="2" @if($l->type==2) selected @endif>Kiralık</option>
                                        </select>
                                        <label>Durumu: <i class="fa fa-map-marker"></i> </label>
                                        <select class="chosen-select"  name="status">
                                            <option value="1" @if($l->status==1) selected @endif >Sıfır</option>
                                            <option value="2" @if($l->status==2) selected @endif >İkinci el</option>
                                        </select>
                                        <label>Stok Durumu: <i class="fa fa-map-marker"></i> </label>
                                        <select class="chosen-select"  name="delivery_status">
                                            <option value="1" @if($l->delivery_status==1) selected @endif>Stok mevcut</option>
                                            <option value="2" @if($l->delivery_status==2) selected @endif>Stok yok</option>
                                            <option value="3" @if($l->delivery_status==3) selected @endif>Sipariş durumuna göre stok getirilebilir.</option>
                                        </select>
                                        <label>Defolu: <i class="fa fa-map-marker"></i> </label>
                                        <select class="chosen-select"  name="faulty">
                                            <option value="1" @if($l->faulty==1) selected @endif>Hayır</option>
                                            <option value="2" @if($l->faulty==2) selected @endif>Defolu ürün</option>
                                        </select>
                                        <label>Kategorisi: <i class="fa fa-map-marker"></i> </label>
                                        <select class="chosen-select"  name="category_id">
                                            @foreach($categories as $category)
                                                <option value="{{ $l->category_id }}"
                                                        @if($l->category_id == $category->id) selected @endif>{{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label>Menşei: <i class="fa fa-globe"></i> </label>
                                        <input type="text" name="origin" placeholder="{{ $l->origin }}" value="{{ $l->origin }}"/>
                                        <button class="btn  big-btn  color-bg flat-btn">Değişiklikleri Kaydet <i class="fa fa-angle-right"></i></button>
                                    </form>
                                        @endforeach

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
    </div>

@endsection