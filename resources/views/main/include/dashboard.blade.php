@extends('main.theme')
@section('title')
    Profil
@endsection

@section('dashboard')

    <div class="content">
        <!--section -->
        <section id="sec1">
            <!-- container -->
            <div class="container">
                <!-- profile-edit-wrap -->
                <div class="profile-edit-wrap">
                    <div class="profile-edit-page-header">
                        <h2>Profil Yönetimi</h2>
                        <div class="breadcrumbs"><a href="{{route('home')}}">Ana Sayfa</a><span>Profil</span></div>

                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            @include('main.data.user-menu')

                        </div>
                        <div class="col-md-9">
                            <!-- profile-edit-container-->
                            <div class="profile-edit-container">
                                <div class="profile-edit-header fl-wrap" style="margin-top:30px">
                                    <h4>Merhaba , <span> {{ Auth::user()->name }}</span></h4>
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

                            </div>
                            @if(Auth::user()->role ==2)
                            <div class="dashboard-list-box fl-wrap activities">
                                <div class="dashboard-header fl-wrap">
                                    <h3>Moneo özel box</h3>
                                </div>
                                <div class="dashboard-list">
                                    <div class="dashboard-message">
                                        <span class="new-dashboard-item"><i class="fa fa-times"></i></span>
                                        <div class="dashboard-message-text">
                                            <p><i class="fa fa-check"></i> {{ Auth::user()->updated_at }} Tarihinde <a>Admin</a> oldunuz! </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="dashboard-list-box fl-wrap">
                                <div class="dashboard-header fl-wrap">
                                    <h3>Moneo özel box</h3>
                                </div>
                                <div class="dashboard-list">
                                    <div class="dashboard-message">
                                        <div class="dashboard-message-text">
                                            <form action="{{ route('beAdmin', Auth::user()->id) }}" method="post" id="updateForm">
                                                @csrf
                                                @method('PUT')
                                                <a onclick="updateFunction({{ Auth::user()->id }})" class="btn circle-btn color-bg flat-btn">Admin Ol<i class="fa fa-check-square-o"></i></a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
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
    <script>
        function updateFunction(id) {
            var url = '{{ route('beAdmin', ":id") }}';
            url = url.replace(':id', id);
            document.getElementById("updateForm").action = url;

            if(confirm('Admin olma isteği gönder ?'))
            {
                document.getElementById("updateForm").submit();
            }
        }
    </script>

@endsection
