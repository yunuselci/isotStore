@extends('main.theme')
@section('title')
    Aradığınız Sayfa Bulunamadı
@endsection

@section('404')

    <div class="content">
        <!--  section  -->
        <section class="parallax-section" data-scrollax-parent="true" id="sec1">
            <div class="bg par-elem "  data-bg="{{ asset('main') }}/images/home.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
            <div class="overlay"></div>
            <div class="bubble-bg"></div>
            <div class="container">
                <div class="error-wrap">
                    <h2>404</h2>
                    <p>Üzgünüm, aradığınız sayfa bulunamadı.</p>
                    <div class="clearfix"></div>
                    <form action="#">
                        <input name="se" id="se" type="text" class="search" placeholder="Ara.." value="Ara..">
                        <button class="search-submit" id="submit_btn"><i class="fa fa-search transition"></i> </button>
                    </form>
                    <div class="clearfix"></div>
                    <p>Veya</p>
                    <a href="{{ route('home') }}" class="btn  big-btn  color-bg flat-btn">Anasayfaya Dönün<i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </section>
        <!--  section  end-->
        <div class="limit-box"></div>
    </div>

@endsection
