@extends('layouts.template')

@section('title', '本の登録')

@section('content')

<div id="books-create" class="container">
    
    <h1>本の登録</h1>
    
    <div class="col-md-8 mx-auto">
    <div class="card card-body">
    
    <form action="{{ action('Admin\CreateController@create') }}" method="post" enctype="multipart/form-data">
    
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
            <input type="text" class="form-control" name="title" value="{{ old('title') }}" required >
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-md-3">著者<span>*</span></label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="author" value="{{ old('author') }}" required >
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-md-3">画像</label>
        <div class="col-md-9">
            <input type="file" class="form-control-file" name="image">
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-md-3">金額<span>*</span></label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="money" value="{{ old('money') }}" placeholder="0" required >
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-md-3">購入日</label>
        <div class="col-md-9">
            <input type="date" class="form-control" name="buy_date" value="{{ old('buy_year') }}">
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-md-3">状態</label>
        <select class="form-select form-control col-md-8" name="status" aria-label="状態">
            <option selected value="1">読みたい</option>
            <option value="2">購入済み</option>
            <option value="3">読書中</option>
            <option value="4">読了</option>
        </select>
    </div>
    
    <div class="form-group row">
        <label class="col-md-3">タグ</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="tag" value="{{ old('tag') }}">
            <p>※「#」で区切って登録</p>
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-md-3">ジャンル</label>
        <div class="col-md-9">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="genre_friendship" value="1" id="defaultCheck1">
            <label class="form-check-label" for="flexRadioDefault1">
                友情
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="genre_love" value="1" id="defaultCheck2">
            <label class="form-check-label" for="flexRadioDefault2">
                恋愛
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="genre_action" value="1" id="defaultCheck3">
            <label class="form-check-label" for="flexRadioDefault3">
                アクション
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="genre_sf_horror" value="1" id="defaultCheck4">
            <label class="form-check-label" for="flexRadioDefault4">
                SF・ホラー
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="genre_mystery" value="1" id="defaultCheck5">
            <label class="form-check-label" for="flexRadioDefault5">
                ミステリー
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="genre_fantasy" value="1" id="defaultCheck6">
            <label class="form-check-label" for="flexRadioDefault6">
                ファンタジー
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="genre_history" value="1" id="defaultCheck7">
            <label class="form-check-label" for="flexRadioDefault7">
                歴史
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="genre_nonfiction" value="1" id="defaultCheck8">
            <label class="form-check-label" for="flexRadioDefault8">
                ノンフィクション
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="genre_essay" value="1" id="defaultCheck9">
            <label class="form-check-label" for="flexRadioDefault9">
                エッセイ
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="genre_business" value="1" id="defaultCheck10">
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
            <input class="form-check-input" type="radio" name="category" value="1" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
                小説
            </label>
        </div>
        <div class="form-check col-6 col-md-4">
            <input class="form-check-input" type="radio" name="category" value="2" id="flexRadioDefault2">
            <label class="form-check-label" for="flexRadioDefault2">
                漫画
            </label>
        </div>
        <div class="form-check col-6 col-md-4">
            <input class="form-check-input" type="radio" name="category" value="3" id="flexRadioDefault3">
            <label class="form-check-label" for="flexRadioDefault3">
                雑誌
            </label>
        </div>
        <div class="form-check col-6 col-md-4">
            <input class="form-check-input" type="radio" name="category" value="4" id="flexRadioDefault4">
            <label class="form-check-label" for="flexRadioDefault4">
                図鑑
            </label>
        </div>
        <div class="form-check col-6 col-md-4">
            <input class="form-check-input" type="radio" name="category" value="5" id="flexRadioDefault5">
            <label class="form-check-label" for="flexRadioDefault5">
                その他
            </label>
        </div>
        </div>
        </div>
    </div>
    
     {{ csrf_field() }}
    
    <input type="hidden" name="evaluation" value="0">
    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
    <input type="submit" class="btn btn-primary btn-block" value="登録">
    
    </form>
    
    </div>
    </div>
    
</div>

@endsection