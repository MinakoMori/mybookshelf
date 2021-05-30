@extends('layouts.template')

@section('title', 'My本棚')

@section('content')

<div id="home-page" class="container">
    
    <div class="image_col">
        <!-- <img src="{{ asset('storage/images/kujira.jpg') }}" alt="ヘッダー画像"> -->
        <div>
            <img src="{{ asset('storage/images/unnamed.png') }}" alt="アイコン画像">
        </div>
        <h1>{{ Auth::user()->name }}の本棚</h1>
    </div>
    
    <div class="icon">
        <a href="{{ url('/') }}">
            <i class="fas fa-plus-circle"></i>
            <span>追加ボタン</span>
        </a>
    </div>
    
    <div class="search_col">
        <div class="row">
        <div class="col-6">
            <a href="{{ url('/') }}">
                <div class="search_icon">
                    <i class="fas fa-search"></i>
                    <span>検索ボタン</span>
                </div>
            </a>
        </div>
        <div class="col-3">
            <a href="{{ url('/') }}">
                <div class="star_icon">
                    <i class="fas fa-star"></i>
                    <span>評価順ボタン</span>
                </div>
            </a>
        </div>
        <div class="col-3">
            <a href="{{ url('/') }}">
                <div class="lift_icon">
                    <i class="fas fa-arrows-alt-v"></i>
                    <span>昇降順ボタン</span>
                </div>
            </a>
        </div>
        </div>
    </div>
    
    <div class="garally_col row">
        <div class="col-4 books_col">
            <a href="{{ url('/') }}">
            <img src="{{ asset('storage/images/100001007470001.jpg') }}" alt="本">
            </a>
        </div>
        <div class="col-4 books_col">
            <a href="{{ url('/') }}">
            <img src="{{ asset('storage/images/zodi10.jpg') }}" alt="本">
            </a>
        </div>
        <div class="col-4 books_col">
            <a href="{{ url('/') }}">
            <img src="{{ asset('storage/images/X.jpg') }}" alt="本">
            </a>
        </div>
        <div class="col-4 books_col">
            <a href="{{ url('/') }}">
            <img src="{{ asset('storage/images/511lC-pGIoL.jpg') }}" alt="本">
            </a>
        </div>
        <div class="col-4 books_col">
            <a href="{{ url('/') }}">
            <img src="{{ asset('storage/images/100000705510001.jpg') }}" alt="本">
            </a>
        </div>
        <div class="col-4 books_col">
            <a href="{{ url('/') }}">
            <img src="{{ asset('storage/images/2L-1.jpg') }}" alt="本">
            </a>
        </div>
        <div class="col-4 books_col">
            <a href="{{ url('/') }}">
            <img src="{{ asset('storage/images/2L.jpg') }}" alt="本">
            </a>
        </div>
        <div class="col-4 books_col">
            <a href="{{ url('/') }}">
            <img src="{{ asset('storage/images/51CRRCJBHFL._SX314_BO1,204,203,200_.jpg') }}" alt="本">
            </a>
        </div>
        <div class="col-4 books_col">
            <a href="{{ url('/') }}">
            <img src="{{ asset('storage/images/100001468780001.jpg') }}" alt="本">
            </a>
        </div>
    </div>
    
</div>

@endsection
