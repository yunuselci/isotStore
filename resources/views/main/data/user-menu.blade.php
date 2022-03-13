<div class="fixed-bar fl-wrap">
    <div class="user-profile-menu-wrap fl-wrap">
        <!-- user-profile-menu-->
        <div class="user-profile-menu">
            <h3>Ana Bölüm</h3>
            <ul>
                <li><a href="{{ route('dashboard') }}"
                       class="{{ Route::currentRouteName() === 'dashboard' ? 'user-profile-act' : '' }}"><i
                            class="fa fa-user"></i>Kullanıcı paneli</a></li>
                <li><a href="{{ route('profile.show') }}"
                       class="{{ Route::currentRouteName() === 'profile.show' ? 'user-profile-act' : '' }}"><i
                            class="fa fa-edit"></i>Profili düzenle</a></li>
            </ul>
        </div>
        <!-- user-profile-menu end-->
        <!-- user-profile-menu-->
        <div class="user-profile-menu">
            <h3>Admin Yönetim</h3>
            <ul>
                <li><a href="{{ route('adminShopList') }}"
                       class="{{ Route::currentRouteName() === 'adminShopList' ? 'user-profile-act' : '' }}"><i
                            class="fa fa-user"></i>Mağazalar </a></li>
            </ul>
        </div>
        <!-- user-profile-menu end-->
        <!-- user-profile-menu-->
        <div class="user-profile-menu">
            <h3>Mağazam</h3>
            <ul>
                @foreach(Auth::user()->whereId(Auth::id())->with('shops')->get() as $value)
                    @if(!is_null($value->shops))
                        @if($value->shops->status == 1)
                            <li><a href="{{ route('magazalar.show', $value->shops->id) }}"
                                   class="{{ Route::currentRouteName() === 'magazalar.show' ? 'user-profile-act' : '' }}"><i
                                        class="fa fa-shopping-bag"></i> Mağazam </a></li>
                            <li><a href="{{ route('teklifler.show',$value->shops->id ) }}"
                                   class="{{ Route::currentRouteName() === 'teklifler.show' ? 'user-profile-act' : '' }}"><i
                                        class="fa fa-envelope-o"></i> Teklifler</a></li>
                            <li><a href="{{ route('magazalar.edit',$value->shops->id) }}"
                                   class="{{ Route::currentRouteName() === 'magazalar.edit' ? 'user-profile-act' : '' }}"><i
                                        class="fa fa-edit"></i>Mağaza düzenle</a></li>
                        @else
                            <li><a class="user-profile-act"><i class="fa fa-warning"></i>Onay bekliyor</a></li>
                        @endif
                    @else
                        <li><a href="{{ route('magazalar.create') }}"
                               class="{{ Route::currentRouteName() === 'magazalar.create' ? 'user-profile-act' : '' }}"><i
                                    class="fa fa-shopping-bag"></i>Mağaza oluştur</a></li>
                    @endif
                @endforeach
            </ul>
        </div>
        <!-- user-profile-menu end-->
        <!-- user-profile-menu-->
        @if(!is_null($value->shops))
            @if($value->shops->status == 1)
            <div class="user-profile-menu">
            <h3>Listelemeler</h3>
            <ul>
                <li><a href="{{ route('ilanlar.show',$value->shops->id) }}"
                       class="{{ Route::currentRouteName() === 'ilanlar.show' ? 'user-profile-act' : '' }}"><i
                            class="fa fa-th-list"></i>İlanlarım </a></li>
                <li><a href="{{ route('ilanlar.create') }}"
                       class="{{ Route::currentRouteName() === 'ilanlar.create' ? 'user-profile-act' : '' }}"><i
                            class="fa fa-plus-square-o"></i>Yenisini Ekle</a></li>
            </ul>
        </div>
            @endif
        @endif
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
