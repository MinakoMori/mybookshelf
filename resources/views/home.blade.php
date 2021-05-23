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
    
    <div class="icon_add">
        <a href="{{ url('/') }}">登録ボタン</a>
    </div>
    
</div>

@endsection
