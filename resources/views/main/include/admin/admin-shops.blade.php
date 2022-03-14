@extends('main.theme')
@section('title')
    Admin Mağazalar - iSotStore
@endsection

@section('admin-shops')

    <div class="content">
        <!--section -->
        <section id="sec1">
            <!-- container -->
            <div class="container">
                <!-- profile-edit-wrap -->
                <div class="profile-edit-wrap">
                    <div class="profile-edit-page-header">
                        <h2>Mağazalar </h2>
                        <div class="breadcrumbs"><a href="{{route('home')}}">Ana Sayfa</a><span>Admin Mağazalar</span>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            @include('main.data.user-menu')

                        </div>
                        <div class="col-md-9">
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
                            <div class="dashboard-list-box fl-wrap">
                                <div class="dashboard-header fl-wrap">
                                    <h3>Onay Bekleyen Mağazalar</h3>
                                </div>

                                @foreach($shops as $shop)
                                    @if($shop->status == 2)
                                        <div class="dashboard-list">
                                            <div class="dashboard-message">
                                                <div class="dashboard-listing-table-image">
                                                    <a href=""><img
                                                            src="{{ asset( 'main/images/shop/'. $shop->image ) }}"
                                                            alt=""></a>
                                                </div>
                                                <div class="dashboard-listing-table-text">
                                                    <h4>Mağaza İsmi: {{ $shop->name }}</h4>
                                                    <span class="dashboard-listing-table-address"><i
                                                            class="fa fa-envelope"></i>
                                                E-Posta: {{ $shop->email }} </span>
                                                    <div class="listing-rating card-popup-rainingvis fl-wrap">
                                                        <i class="fa fa-phone"></i>
                                                        Telefon: {{ $shop->phone }}
                                                    </div>
                                                    <div class="listing-rating card-popup-rainingvis fl-wrap">
                                                        <i class="fa fa-address-book"></i>
                                                        Adres: {{ $shop->address }}
                                                    </div>
                                                    <div class="listing-rating card-popup-rainingvis fl-wrap">
                                                        <i class="fa fa-address-card"></i>
                                                        Açıklaması: {{ $shop->about }}
                                                    </div>
                                                    <ul class="dashboard-listing-table-opt  fl-wrap">
                                                        <li>
                                                            <form
                                                                action="{{ route('adminShopStatusUpdate', $shop->id) }}"
                                                                method="post" id="confirmForm">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" value="1" name="status">
                                                                <a onclick="confirmFunction({{ $shop->id }})"> Onayla <i
                                                                        class="fa fa-check-square-o"></i></a>
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <form action="{{ route('adminShopDelete',$shop->id) }}"
                                                                  method="post" id="deleteForm">
                                                                @csrf
                                                                @method('DELETE')
                                                                <a class="del-btn"
                                                                   onclick="deleteFunction({{ $shop->id }})"> Sil <i
                                                                        class="fa fa-trash-o"></i></a>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                <div class="dashboard-header fl-wrap">
                                    <h3>Onaylı Mağazalar</h3>
                                </div>
                                @foreach($shops as $shop)
                                    @if($shop->status == 1)
                                        <div class="dashboard-list">
                                            <div class="dashboard-message">
                                                <div class="dashboard-listing-table-image">
                                                    <a href=""><img
                                                            src="{{ asset( 'main/images/shop/'. $shop->image ) }}"
                                                            alt=""></a>
                                                </div>
                                                <div class="dashboard-listing-table-text">
                                                    <h4>Mağaza İsmi: {{ $shop->name }}</h4>
                                                    <span class="dashboard-listing-table-address"><i
                                                            class="fa fa-envelope"></i>
                                                E-Posta: {{ $shop->email }} </span>
                                                    <div class="listing-rating card-popup-rainingvis fl-wrap">
                                                        <i class="fa fa-phone"></i>
                                                        Telefon: {{ $shop->phone }}
                                                    </div>
                                                    <div class="listing-rating card-popup-rainingvis fl-wrap">
                                                        <i class="fa fa-address-book"></i>
                                                        Adres: {{ $shop->address }}
                                                    </div>
                                                    <div class="listing-rating card-popup-rainingvis fl-wrap">
                                                        <i class="fa fa-address-card"></i>
                                                        Açıklaması: {{ $shop->about }}
                                                    </div>
                                                    <ul class="dashboard-listing-table-opt  fl-wrap">
                                                        <li>
                                                            <form
                                                                action="{{ route('adminShopStatusUpdate', $shop->id) }}"
                                                                method="post" id="unConfirmForm">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" value="2" name="status">
                                                                <a onclick="unConfirmFunction({{ $shop->id }})"> Onay
                                                                    Kaldır <i class="fa fa-check-square-o"></i></a>
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <form action="{{ route('adminShopDelete',$shop->id) }}"
                                                                  method="post" id="deleteForm">
                                                                @csrf
                                                                @method('DELETE')
                                                                <a class="del-btn"
                                                                   onclick="deleteFunction({{ $shop->id }})"> Sil <i
                                                                        class="fa fa-trash-o"></i></a>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                @endif
                            @endforeach
                            <!-- dashboard-list end-->
                            </div>
                            <!-- pagination-->
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
    <script>
        function confirmFunction(id) {
            var url = '{{ route('adminShopStatusUpdate', ":id") }}';
            url = url.replace(':id', id);
            document.getElementById("confirmForm").action = url;

            if (confirm('Mağazayı onaylamak istediğinizden emin misiniz ?')) {
                document.getElementById("confirmForm").submit();
            }


        }
        function unConfirmFunction(id) {
            var url = '{{ route('adminShopStatusUpdate', ":id") }}';
            url = url.replace(':id', id);
            document.getElementById("unConfirmForm").action = url;

            if (confirm('Mağaza onayını kaldırmak istediğinizden emin misiniz ?')) {
                document.getElementById("unConfirmForm").submit();
            }


        }

        function deleteFunction(id) {
            var url = '{{ route('adminShopDelete', ":id") }}';
            url = url.replace(':id', id);
            document.getElementById("deleteForm").action = url;

            if (confirm('Mağazayı silmek istediğinizden emin misiniz?')) {
                document.getElementById("deleteForm").submit();
            }
        }
    </script>

@endsection
