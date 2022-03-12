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
                                <div class="dashboard-header fl-wrap">
                                    <h3>Gelen Kutusu</h3>
                                </div>
                                @foreach($offers as $offer)
                                <div class="dashboard-list">
                                    <div class="dashboard-message">
                                        <span class="new-dashboard-item">@if($offer->status == 2) Yeni @endif</span>
                                        <div class="dashboard-message-avatar">
                                            <img src="{{ asset('main') }}/images/avatar/1.jpg" alt="">
                                        </div>
                                        <div class="dashboard-message-text">
                                            <h4>{{ $offer->user_name }} - <span> {{ $offer->created_at->toFormattedDateString() }}</span></h4>
                                            <p> {{ $offer->description }}</p>
                                            <span class="reply-mail clearfix">Mail Yoluyla Cevapla : <a  class="dashboard-message-user-mail" href="mailto:{{ $offer->user_email }}" target="_top">{{ $offer->user_email }}</a></span>
                                            <span class="reply-mail clearfix">Whatsapp Üzerinden Ulaş : <a  class="dashboard-message-user-mail" href="https://api.WhatsApp.com/send?phone={{ $offer->user_phone }}" target="_blank">{{ $offer->user_phone }}</a></span>


                                        </div>
                                    </div>
                                </div>
                                @endforeach
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
@endsection
