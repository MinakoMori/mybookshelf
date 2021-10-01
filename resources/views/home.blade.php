@extends('layouts.template')

@section('title', 'My本棚')

@section('content')

<div id="home-page" class="container">
    
    <div class="image_col">
        @if (isset(Auth::user()->header_image_path))
        <img src="{{ Auth::user()->header_image_path }}" alt="ヘッダー画像">
        @else
        <img src="https://mymybookshelf.s3.ap-northeast-1.amazonaws.com/KUa74VE9JvQUi28zqz3zgR6QsmCp51hPA44U8ava.png" alt="ヘッダー画像">
        @endif
        <div>
            @if (isset(Auth::user()->icon_image_path))
            <img src="{{ Auth::user()->icon_image_path }}" alt="アイコン画像">
            @else
            <img src="https://mymybookshelf.s3.ap-northeast-1.amazonaws.com/wyQfCSuW20pu2mkSTmQnu1RUz61p51tfUUda14GJ.png" alt="アイコン画像">
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
                @if (is_null($post->image_path))
                <p>{{ str_limit($post->title , 30) }}</p>
                @endif
                <a href="{{ url('admin/books/deta?id=' . $post->id) }}">
                    @if (isset($post->image_path))
                    <img src="{{ $post->image_path }}" alt="{{ $post->title }}">
                    @else
                    <img src="https://mymybookshelf.s3.ap-northeast-1.amazonaws.com/HWWjEYVYUEiFoH2VCEO65auhLfTvPeoGAUNbq4HH.png" alt="{{ $post->title }}">
                    @endif
                </a>
            </div>
        @endforeach
    </div>
    
</div>

@endsection
