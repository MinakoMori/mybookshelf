@extends('layouts.template')

@section('title', 'My本棚')

@section('content')

<div id="home-page" class="container">
    
    <div class="image_col">
        @if (isset(Auth::user()->header_image_path))
        <img src="{{ asset('storage/image/' . Auth::user()->header_image_path) }}" alt="ヘッダー画像">
        @else
        <img src="{{ asset('storage/images/background.png') }}" alt="ヘッダー画像">
        @endif
        <div>
            @if (isset(Auth::user()->icon_image_path))
            <img src="{{ asset('storage/image/' . Auth::user()->icon_image_path) }}" alt="アイコン画像">
            @else
            <img src="{{ asset('storage/images/unnamed.png') }}" alt="アイコン画像">
            @endif
        </div>
        <h1>{{ Auth::user()->name }}の本棚</h1>
    </div>
    
    <div class="icon">
        <a href="{{ url('admin/books/create') }}">
            <i class="fas fa-plus-circle"></i>
            <span>追加ボタン</span>
        </a>
    </div>
    
    <div class="search_col">
        <div class="row">
        
        <div class="col">
            <a href="{{ url('admin/books/search') }}">
                <div class="search_icon">
                    <i class="fas fa-search"></i>
                    <span>検索ボタン</span>
                </div>
            </a>
        </div>
        
        <div class="col">
            <a href="{{ url('/admin/home/sort_rank?sortType='.$sortTypeRank) }}">
                <div class="star_icon">
                    <i class="fas fa-star"></i>
                    <span>評価順ボタン</span>
                </div>
            </a>
        </div>
        
        <div class="col-4">
            <a href="{{ url('/admin/home/sort_new?sortType='.$sortTypeNew) }}">
                <div class="lift_icon">
                    <i class="fas fa-arrows-alt-v"></i>
                    <span>昇降順ボタン</span>
                </div>
            </a>
        </div>
        
        </div>
    </div>
    
    <div class="garally_col row">
        @foreach($posts as $post)
            <div class="col-4 books_col">
                <!-- <p>{{ $post->title }}</p> -->
                <a href="{{ url('admin/books/deta?id=' . $post->id) }}">
                    @if (isset($post->image_path))
                    <img src="{{ asset('storage/image/' . $post->image_path) }}" alt="本">
                    @else
                    <img src="{{ asset('storage/images/no_image.png') }}" alt="本">
                    @endif
                </a>
            </div>
        @endforeach
    </div>
    
</div>

@endsection
