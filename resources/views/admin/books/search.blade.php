@extends('layouts.template')

@section('title', '検索')

@section('content')

<div id="books-search" class="container">
    
    <h1>検索</h1>
    
    <div class="col-md-8 mx-auto">
    <div class="card card-body">
    
    <form action="{{ action('Admin\SearchController@index') }}" method="post">
    
    <div class="form-group row">
        <label class="col-md-3">タイトル</label>
        <div class="col-md-8 form-normal">
            <input type="text" class="form-control" name="title">
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-md-3">著者</label>
        <div class="col-md-8 form-normal">
            <input type="text" class="form-control" name="author">
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-md-3">状態</label>
        <select class="form-select form-control col-md-8" name="status">
            <option selected value="0"></option>
            <option value="1">読みたい</option>
            <option value="2">購入済み</option>
            <option value="3">読書中</option>
            <option value="4">読了</option>
            <option value="5">ゴミ箱</option>
        </select>
    </div>
    
    <div class="form-group row">
        <label class="col-md-3">カテゴリ</label>
        <select class="form-select form-control col-md-8" name="category">
            <option selected value="0"></option>
            <option value="1">小説</option>
            <option value="2">漫画</option>
            <option value="3">雑誌</option>
            <option value="4">図鑑</option>
        </select>
    </div>
    <!--
    <div class="form-group row">
        <label class="col-md-3">評価</label>
        <select class="form-select form-control col-md-8" name="status">
            <option selected value="0">-</option>
            <option value="1">★★★★★</option>
            <option value="2">★★★★</option>
            <option value="3">★★★</option>
            <option value="4">★★</option>
            <option value="5">★</option>
        </select>
    </div>
    
    <div class="form-group row">
        <label class="col-md-3">感想</label>
        <select class="form-select form-control col-md-8" name="status" aria-label="状態">
            <option selected value="1">なし</option>
            <option value="2">あり</option>
        </select>
    </div>
    
    <div class="form-group row">
        <label class="col-md-3">タグ</label>
        <div class="col-md-8 form-normal">
            <input type="text" class="form-control" name="tag">
        </div>
    </div>
    -->
    <div class="form-group row">
        <label class="col-md-3">ジャンル</label>
        <div class="col-md-9">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="genre_friendship">
            <label class="form-check-label">
                友情
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="genre_love">
            <label class="form-check-label">
                恋愛
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="genre_action">
            <label class="form-check-label">
                アクション
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="genre_sf_horror">
            <label class="form-check-label">
                SF・ホラー
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="genre_mystery">
            <label class="form-check-label">
                ミステリー
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="genre_fantasy">
            <label class="form-check-label">
                ファンタジー
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="genre_history">
            <label class="form-check-label">
                歴史
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="genre_nonfiction">
            <label class="form-check-label">
                ノンフィクション
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="genre_essay">
            <label class="form-check-label">
                エッセイ
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="genre_business">
            <label class="form-check-label">
                ビジネス
            </label>
        </div>
        </div>
    </div>
    
    <div class="btn_col">
    <i class="fas fa-search"></i>
    {{ csrf_field() }}
    <input type="submit" class="btn btn-primary btn-block" value="検索">
    </div>
    
    </form>
    
    </div>
    </div>
    
    <!-- 終わったら消す
    <tbody>
        @foreach($posts as $books)
            <tr>
            <th>{{ $books->id }}</th>
            <td>{{ \Str::limit($books->title, 100) }}</td>
            </tr>
        @endforeach
    </tbody>
    -->
</div>

@endsection