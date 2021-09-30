@extends('layouts.template')

@section('title', '本の詳細')

@section('content')

<div id="books-deta" class="container">
    
    <div class="col-md-8 mx-auto">
    
    <h2>{{ $book_form->title }}</h2>
    <h3>{{ $book_form->author }}</h3>
    
    @if (isset($book_form->image_path))
        <img src="{{ $book_form->image_path }}" alt="本">
    @else
        <img src="https://mymybookshelf.s3.ap-northeast-1.amazonaws.com/HWWjEYVYUEiFoH2VCEO65auhLfTvPeoGAUNbq4HH.png" alt="本">
    @endif
    
    <div class="deta_col">
    <dl>
        <dt>タグ</dt>
        <dd>
            @foreach($book_tags as $book_tag)
            <a href="{{ url('admin/books/search/tag?tag=' .$book_tag->tag) }}">{{ "#" . $book_tag->tag . " " }}</a>
            @endforeach
        </dd>
    </dl>
    
    <dl>
        <dt>ジャンル</dt>
        <dd>{{ $book_genre_friendship }} {{ $book_genre_love }} {{ $book_genre_action }} {{ $book_genre_sf_horror }} {{ $book_genre_mystery }} {{ $book_genre_fantasy }} {{ $book_genre_history }} {{ $book_genre_nonfiction }} {{ $book_genre_essay }} {{ $book_genre_business }}</dd>
    </dl>
    
    <dl>
        <dt>カテゴリ</dt>
        <dd>{{ $book_category }}</dd>
    </dl>
    
    <dl>
        <dt>評価</dt>
        <dd><span class="star5_rating" data-rate="{{ $book_form->evaluation }}"></span></dd>
    </dl>
    
    <dl>
        <dt>金額</dt>
        <dd>{{ $book_form->money }}円</dd>
    </dl>
    
    <dl>
        <dt>状態</dt>
        <dd>{{ $book_status }}</dd>
    </dl>
    
    <dl>
        <dt>購入日</dt>
        <dd>{{ $book_form->buy_date }}</dd>
    </dl>
    
    <dl>
        <dt>読了日</dt>
        <dd>{{ $book_form->finish_date }}</dd>
    </dl>
    
    <dl class="memo">
        <dt>感想</dt>
        <dd>{{ $book_form->memo }}</dd>
    </dl>
    </div>
    
    <a href="{{ url('admin/books/edit?id=' . $book_form->id) }}">
        <button class="btn btn-primary btn-block">登録内容を更新する</button>
    </a>
    
    </div>
    
</div>

@endsection