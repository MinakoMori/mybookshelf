@extends('layouts.template')

@section('title', '本の詳細')

@section('content')

<div id="books-deta" class="container">
    
    <div class="col-md-8 mx-auto">
    
    <h2>タイトル</h2>
    <h3>著者名</h3>
    
    <img src="{{ asset('storage/images/100001007470001.jpg') }}" alt="本">
    
    <div class="deta_col">
    <dl>
        <dt>タグ</dt>
        <dd>#○○○ #○○○</dd>
    </dl>
    
    <dl>
        <dt>ジャンル</dt>
        <dd>■■■ ■■■</dd>
    </dl>
    
    <dl>
        <dt>カテゴリ</dt>
        <dd>■■■</dd>
    </dl>
    
    <dl>
        <dt>評価</dt>
        <dd><span class="star5_rating" data-rate="4"></span></dd>
    </dl>
    
    <dl>
        <dt>金額</dt>
        <dd>0.000円</dd>
    </dl>
    
    <dl>
        <dt>状態</dt>
        <dd>読了</dd>
    </dl>
    
    <dl>
        <dt>購入日</dt>
        <dd>○○○○ / ○ / ○</dd>
    </dl>
    
    <dl>
        <dt>読了日</dt>
        <dd>○○○○ / ○ / ○</dd>
    </dl>
    
    <dl class="memo">
        <dt>感想</dt>
        <dd>ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。</dd>
    </dl>
    </div>
    
    <input type="submit" class="btn btn-primary btn-block" value="登録内容を更新する">
    
    </div>
    
</div>

@endsection