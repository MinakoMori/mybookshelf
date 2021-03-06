@extends('layouts.template')

@section('title', '登録内容の更新')

@section('content')

<div id="books-edit" class="container">
    
    <h1>登録内容の更新</h1>
    
    <div class="col-md-8 mx-auto">
    <div class="card card-body">
    
    <form action="{{ action('Admin\EditController@update') }}" method="post" enctype="multipart/form-data">
    
    @if (count($errors) > 0)
    <ul>
        @foreach($errors->all() as $e)
        <li>{{ $e }}</li>
        @endforeach
    </ul>
    @endif
    
    <div class="form-group row">
        <label class="col-md-3">タイトル<span>*</span></label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="title" value="{{ $book_form->title }}" required >
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-md-3">著者<span>*</span></label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="author" value="{{ $book_form->author }}" required >
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-md-3">画像</label>
        <div class="col-md-9">
            <input type="file" class="form-control-file" name="image">
            <div class="form-text text-info">設定中: {{ $book_form->image_path }}</div>
            <div class="form-check">
                <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                </label>
            </div>
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-md-3">金額<span>*</span></label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="money" value="{{ $book_form->money }}" placeholder="0" required >
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-md-3">購入日</label>
        <div class="col-md-9">
            <input type="date" class="form-control" name="buy_date" value="{{ $book_form->buy_date }}">
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-md-3">状態</label>
        <select class="form-select form-control col-md-8" name="status" aria-label="状態">
            <option selected value="{{ $book_form->status }}">{{ $book_status }}</option>
            <option value="1">読みたい</option>
            <option value="2">購入済み</option>
            <option value="3">読書中</option>
            <option value="4">読了</option>
        </select>
    </div>
    
    <div class="form-group row">
        <label class="col-md-3">タグ</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="tag" value="@if($book_form->tags != NULL)@foreach($book_form->tags as $tag){{ "#".$tag->tag." " }}@endforeach @endif">
            <p>※「#」で区切って登録</p>
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-md-3">読了日</label>
        <div class="col-md-9">
            <input type="date" class="form-control" name="finish_date" value="{{ $book_form->finish_date }}">
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-md-3">評価</label>
        <select class="form-select form-control col-md-8" name="evaluation" aria-label="状態">
            <option selected value="{{ $book_form->evaluation }}">{{ $book_evaluation }}</option>
            <option value="5">★★★★★</option>
            <option value="4">★★★★</option>
            <option value="3">★★★</option>
            <option value="2">★★</option>
            <option value="1">★</option>
        </select>
    </div>

    <div class="form-group row">
        <label class="col-md-3">感想</label>
        <div class="col-md-9">
            <textarea class="form-control" name="memo" rows="10">{{ $book_form->memo }}</textarea>
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-md-3">ジャンル</label>
        <div class="col-md-9">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="genre_friendship" value="1" id="defaultCheck1" @if($book_form->genre_friendship == "1")checked @endif>
            <label class="form-check-label" for="flexRadioDefault1">
                友情
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="genre_love" value="1" id="defaultCheck2" @if($book_form->genre_love == "1")checked @endif>
            <label class="form-check-label" for="flexRadioDefault2">
                恋愛
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="genre_action" value="1" id="defaultCheck3" @if($book_form->genre_action == "1")checked @endif>
            <label class="form-check-label" for="flexRadioDefault3">
                アクション
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="genre_sf_horror" value="1" id="defaultCheck4" @if($book_form->genre_sf_horror == "1")checked @endif>
            <label class="form-check-label" for="flexRadioDefault4">
                SF・ホラー
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="genre_mystery" value="1" id="defaultCheck5" @if($book_form->genre_mystery == "1")checked @endif>
            <label class="form-check-label" for="flexRadioDefault5">
                ミステリー
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="genre_fantasy" value="1" id="defaultCheck6" @if($book_form->genre_fantasy == "1")checked @endif>
            <label class="form-check-label" for="flexRadioDefault6">
                ファンタジー
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="genre_history" value="1" id="defaultCheck7" @if($book_form->genre_history == "1")checked @endif>
            <label class="form-check-label" for="flexRadioDefault7">
                歴史
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="genre_nonfiction" value="1" id="defaultCheck8" @if($book_form->genre_nonfiction == "1")checked @endif>
            <label class="form-check-label" for="flexRadioDefault8">
                ノンフィクション
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="genre_essay" value="1" id="defaultCheck9" @if($book_form->genre_essay == "1")checked @endif>
            <label class="form-check-label" for="flexRadioDefault9">
                エッセイ
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="genre_business" value="1" id="defaultCheck10" @if($book_form->genre_business == "1")checked @endif>
            <label class="form-check-label" for="flexRadioDefault9">
                ビジネス
            </label>
        </div>
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-md-3">カテゴリ</label>
        <div class="col-md-9">
        <div class="row">
        <div class="form-check col-6 col-md-4">
            <input class="form-check-input" type="radio" name="category" value="1" id="flexRadioDefault1" @if($book_form->category == "1")checked @endif>
            <label class="form-check-label" for="flexRadioDefault1">
                小説
            </label>
        </div>
        <div class="form-check col-6 col-md-4">
            <input class="form-check-input" type="radio" name="category" value="2" id="flexRadioDefault2" @if($book_form->category == "2")checked @endif>
            <label class="form-check-label" for="flexRadioDefault2">
                漫画
            </label>
        </div>
        <div class="form-check col-6 col-md-4">
            <input class="form-check-input" type="radio" name="category" value="3" id="flexRadioDefault3" @if($book_form->category == "3")checked @endif>
            <label class="form-check-label" for="flexRadioDefault3">
                雑誌
            </label>
        </div>
        <div class="form-check col-6 col-md-4">
            <input class="form-check-input" type="radio" name="category" value="4" id="flexRadioDefault4" @if($book_form->category == "4")checked @endif>
            <label class="form-check-label" for="flexRadioDefault4">
                図鑑
            </label>
        </div>
        <div class="form-check col-6 col-md-4">
            <input class="form-check-input" type="radio" name="category" value="5" id="flexRadioDefault5" @if($book_form->category == "5")checked @endif>
            <label class="form-check-label" for="flexRadioDefault5">
                その他
            </label>
        </div>
        </div>
        </div>
    </div>
    
     {{ csrf_field() }}
    
    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
    <input type="hidden" name="id" value="{{ $book_form->id }}">
    <input type="submit" class="btn btn-primary btn-block" name="update" value="更新">
    <input type="submit" class="btn btn-delete btn-block" name="delete" value="削除" onclick='return confirm("本当に削除しますか？");'>
    
    </form>
    
    </div>
    </div>
    
</div>

@endsection