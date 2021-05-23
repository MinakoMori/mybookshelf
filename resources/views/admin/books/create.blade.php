@extends('layouts.template')

@section('title', '本の登録')

@section('content')

<div id="books-create" class="container">
    
    <h1>本の登録</h1>
    
    <div class="col-md-8 mx-auto">
    <div class="card card-body">
    
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
        <label class="col-md-3">購入日<span>*</span></label>
        <div class="col">
            <input type="text" class="form-control" name="year" value="{{ old('year') }}" placeholder="年" required >
        </div>
        <span>/</span>
        <div class="col">
            <input type="text" class="form-control" name="month" value="{{ old('month') }}" placeholder="月" required >
        </div>
        <span>/</span>
        <div class="col">
            <input type="text" class="form-control" name="day" value="{{ old('day') }}" placeholder="日" required >
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-md-3">状態</label>
        <select class="form-select form-control col-md-8" aria-label="状態">
            <option selected>読みたい</option>
            <option value="1">購入済み</option>
            <option value="2">読書中</option>
            <option value="3">読了</option>
            <option value="3">ゴミ箱</option>
        </select>
    </div>
    
    <div class="form-group row">
        <label class="col-md-3">タグ</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="tag" value="{{ old('tag') }}" required >
            <p>※「#」で区切って登録</p>
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-md-3">ジャンル</label>
        <div class="col-md-9">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
                友情
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault2">
                恋愛
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault3">
                アクション
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault4">
                SF・ホラー
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault5">
                ミステリー
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault6">
                ファンタジー
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault7">
                歴史
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault8">
                ノンフィクション
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault9">
                エッセイ
            </label>
        </div>
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-md-3">カテゴリ</label>
        <div class="col-md-9">
        <div class="row">
        <div class="form-check col-6 col-md-4">
            <input class="form-check-input" type="radio" name="flexRadioDefault2" id="flexRadioDefault2">
            <label class="form-check-label" for="flexRadioDefault1">
                小説
            </label>
        </div>
        <div class="form-check col-6 col-md-4">
            <input class="form-check-input" type="radio" name="flexRadioDefault2" id="flexRadioDefault2">
            <label class="form-check-label" for="flexRadioDefault2">
                漫画
            </label>
        </div>
        <div class="form-check col-6 col-md-4">
            <input class="form-check-input" type="radio" name="flexRadioDefault2" id="flexRadioDefault2">
            <label class="form-check-label" for="flexRadioDefault3">
                雑誌
            </label>
        </div>
        <div class="form-check col-6 col-md-4">
            <input class="form-check-input" type="radio" name="flexRadioDefault2" id="flexRadioDefault2">
            <label class="form-check-label" for="flexRadioDefault4">
                図鑑
            </label>
        </div>
        </div>
        </div>
    </div>
    
    <input type="submit" class="btn btn-primary btn-block" value="登録">
    
    </div>
    </div>
    
</div>

@endsection