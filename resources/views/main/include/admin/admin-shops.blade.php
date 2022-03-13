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
                        <div class="breadcrumbs"><a href="{{route('home')}}">Ana Sayfa</a><span>Admin Mağazalar</span></div>

                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            @include('main.data.user-menu')

                        </div>
                        <div class="col-md-9">
                            <div class="dashboard-list-box fl-wrap">
                                <div class="dashboard-header fl-wrap">
                                    <h3>Onay Bekleyen Mağazalar</h3>
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
                                @foreach($shops as $shop)
                                    @if($shop->status == 2)
                                    <div class="dashboard-list">
                                        <div class="dashboard-message">
                                            <div class="dashboard-listing-table-image">
                                                <a href=""><img src="{{ asset( 'main/images/shop/'. $shop->image ) }}" alt=""></a>
                                            </div>
                                            <div class="dashboard-listing-table-text">
                                                <h4>Mağaza İsmi: {{ $shop->name }}</h4>
                                                <span class="dashboard-listing-table-address"><i class="fa fa-envelope"></i>
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
                                                        <form action="{{ route('adminShopStatusUpdate', $shop->id) }}" method="post" id="updateForm">
                                                            @csrf
                                                            @method('PUT')
                                                            <a onclick="updateFunction({{ $shop->id }})"> Onayla <i class="fa fa-check-square-o"></i></a>
                                                        </form>
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('adminShopDelete',$shop->id) }}" method="post" id="deleteForm">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a class="del-btn" onclick="deleteFunction({{ $shop->id }})"> Sil <i class="fa fa-trash-o"></i></a>
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
                            @if($shops->lastPage()>1)
                                <div class="pagination">
                                    <a href="{{ $shops->previousPageUrl() }}" class="prevposts-link"><i class="fa fa-caret-left"></i></a>
                                    @for($i = 1; $i<=$shops->lastPage(); $i++)
                                        <a href="{{ $shops->url($i) }}" @if($shops->currentPage()==$i) class="current-page" @endif>{{ $i }}</a>
                                    @endfor
                                    <a href="{{ $shops->nextPageUrl() }}" class="nextposts-link"><i class="fa fa-caret-right"></i></a>
                                </div>
                            @endif
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
        function updateFunction(id) {
            var url = '{{ route('adminShopStatusUpdate', ":id") }}';
            url = url.replace(':id', id);
            document.getElementById("updateForm").action = url;

            if(confirm('Mağazayı onaylamak istediğinizden emin misiniz ?'))
            {
                document.getElementById("updateForm").submit();
            }
        }
        function deleteFunction(id) {
            var url = '{{ route('adminShopDelete', ":id") }}';
            url = url.replace(':id', id);
            document.getElementById("deleteForm").action = url;

            if(confirm('Mağazayı silmek istediğinizden emin misiniz?'))
            {
                document.getElementById("deleteForm").submit();
            }
        }
    </script>

@endsection
