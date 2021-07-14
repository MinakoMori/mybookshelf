@extends('layouts.template')

@section('title', '本の詳細')

@section('content')

<div id="books-deta" class="container">
    
    <div class="col-md-8 mx-auto">
    
    <h2>{{ $book_form->title }}</h2>
    <h3>{{ $book_form->author }}</h3>
    
    <img src="{{ asset('storage/image/' . $book_form->image_path) }}" alt="本">
    
    <div class="deta_col">
    <dl>
        <dt>タグ</dt>
        <dd>{{ "#" . $book_tag . " " }}</dd>
    </dl>
    
    <dl>
        <dt>ジャンル</dt>
        <dd>{{ $book_form->genre_friendship }} {{ $book_form->genre_love }} {{ $book_form->genre_action }} {{ $book_form->genre_sf_horror }} {{ $book_form->genre_mystery }} {{ $book_form->genre_fantasy }} {{ $book_form->genre_history }} {{ $book_form->genre_nonfiction }} {{ $book_form->genre_essay }} {{ $book_form->genre_business }}</dd>
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