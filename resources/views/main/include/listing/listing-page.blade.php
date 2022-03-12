@extends('main.theme')
@section('title')
    İlanlarım - iSotStore
@endsection

@section('listing-page')

    <div class="content">
        <!--section -->
        <section id="sec1">
            <!-- container -->
            <div class="container">
                <!-- profile-edit-wrap -->
                <div class="profile-edit-wrap">
                    <div class="profile-edit-page-header">
                        <h2>İlanlarım </h2>
                        <div class="breadcrumbs"><a href="{{route('home')}}">Ana Sayfa</a><a href=" {{route('dashboard')}}">Profil</a><span>İlanlarım</span></div>

                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            @include('main.data.user-menu')

                        </div>
                        <div class="col-md-9">
                            <div class="dashboard-list-box fl-wrap">
                                <div class="dashboard-header fl-wrap">
                                    <h3>İlan listesi</h3>
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
                                @foreach($listings as $listing)
                                <div class="dashboard-list">
                                    <div class="dashboard-message">
                                        <div class="dashboard-listing-table-image">
                                            <a href="{{ route('listingDetail', $listing->seflink) }}"><img src="{{ asset('main/images/listing/'. $listing->image ) }}" alt=""></a>
                                        </div>
                                        <div class="dashboard-listing-table-text">
                                            <h4>{{ $listing->name }}</h4>
                                            <span class="dashboard-listing-table-address"><i class="fa fa-barcode"></i>
                                                Kategori: {{ $listing->category->name }} </span>
                                            <div class="listing-rating card-popup-rainingvis fl-wrap">
                                                <i class="fa fa-cart-arrow-down"></i>
                                                @if($listing->delivery_status == 1)
                                                Stok durumu: Stokta Var!
                                                @elseif($listing->delivery_status == 2 )
                                                Stok durumu: Stokta Yok!
                                                @elseif($listing->delivery_status == 3)
                                                Stok durumu: Siparişe göre stok oluşturulabilir!
                                                @endif

                                            </div>
                                            <ul class="dashboard-listing-table-opt  fl-wrap">
                                                <li><a href="{{ route('ilanlar.edit', $listing->id) }}">Edit <i class="fa fa-pencil-square-o"></i></a></li>
                                                <li>
                                                <form action="{{ route('ilanlar.destroy', $listing->id) }}" method="post" id="deleteForm">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a class="del-btn" onclick="myFunction({{ $listing->id }})"> Delete <i class="fa fa-trash-o"></i></a>
                                                </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                 @endforeach
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
    </div>
    <script>
        function myFunction(id) {
            var url = '{{ route('ilanlar.destroy', ":id") }}';
            url = url.replace(':id', id);
            document.getElementById("deleteForm").action = url;

            if(confirm('İlanı silmek istediğinizden emin misiniz ?'))
            {
                document.getElementById("deleteForm").submit();
            }
        }
    </script>
@endsection
