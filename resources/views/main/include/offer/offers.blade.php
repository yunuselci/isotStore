@extends('main.theme')
@section('title')
    Teklifler - iSotStore
@endsection

@section('offers')
    <div class="content">
        <!--section -->
        <section id="sec1">
            <!-- container -->
            <div class="container">
                <!-- profile-edit-wrap -->
                <div class="profile-edit-wrap">
                    <div class="profile-edit-page-header">
                        <h2>Teklifler </h2>
                        <div class="breadcrumbs"><a href="{{route('home')}}">Ana Sayfa</a><a href="{{route('dashboard')}}">Profil</a><span>Teklifler</span></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            @include('main.data.user-menu')

                        </div>

                        <div class="col-md-9">
                            <div class="dashboard-list-box fl-wrap">
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
                                <div class="dashboard-header fl-wrap">
                                    <h3>Gelen Kutusu</h3>
                                </div>
                                @foreach($offers as $offer)
                                <div class="dashboard-list">
                                    <div class="dashboard-message">
                                        @if($offer->status == 2)
                                        <span class="new-dashboard-item"> Yeni </span>
                                        @endif
                                        <div class="dashboard-message-avatar">
                                            <img src="{{ asset( 'main/images/shop/'. \App\Models\Shop::whereId($offer->shop_id)->pluck('image')->first() ) }}" alt="">
                                        </div>
                                        <div class="dashboard-message-text">
                                            <h4>{{ $offer->user_name }} - <span> {{ $offer->created_at->toFormattedDateString() }}</span></h4>
                                            <p> {{ $offer->description }}</p>
                                            <span class="reply-mail clearfix">Mail Yoluyla Cevapla : <a  class="dashboard-message-user-mail" href="mailto:{{ $offer->user_email }}" target="_top">{{ $offer->user_email }}</a></span>
                                            <span class="reply-mail clearfix">Whatsapp Üzerinden Ulaş : <a  class="dashboard-message-user-mail" href="https://api.WhatsApp.com/send?phone={{ $offer->user_phone }}" target="_blank">{{ $offer->user_phone }}</a></span>
                                            @if($offer->status==2)
                                            <form action="{{ route('teklifler.update', $offer->id) }}" method="post" id="updateForm">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="user_name" value="{{ $offer->user_name }}">
                                                <input type="hidden" name="user_phone" value="{{ $offer->user_phone }}">
                                                <input type="hidden" name="user_email" value="{{ $offer->user_email }}">
                                                <input type="hidden" name="description" value="{{ $offer->description }}">
                                                <input type="hidden" name="status" value="1">
                                                <input type="hidden" name="shop_id" value="{{ $offer->shop_id }}">
                                                <a class="btn circle-btn color-bg flat-btn" onclick="myFunction({{ $offer->id }})">Okundu<i class="fa fa-check-square-o"></i></a>
                                            </form>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <!-- pagination-->
                            @if($offers->lastPage()>1)
                            <div class="pagination">
                                <a href="{{ $offers->previousPageUrl() }}" class="prevposts-link"><i class="fa fa-caret-left"></i></a>
                                @for($i = 1; $i<=$offers->lastPage(); $i++)
                                <a href="{{ $offers->url($i) }}" @if($offers->currentPage()==$i) class="current-page" @endif>{{ $i }}</a>
                                @endfor
                                <a href="{{ $offers->nextPageUrl() }}" class="nextposts-link"><i class="fa fa-caret-right"></i></a>
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
        function myFunction(id) {
            var url = '{{ route('teklifler.update', ":id") }}';
            url = url.replace(':id', id);
            document.getElementById("updateForm").action = url;

            if(confirm('Teklife geri dönüş yapıldı mı ?'))
            {
                document.getElementById("updateForm").submit();
            }
        }
    </script>
@endsection
