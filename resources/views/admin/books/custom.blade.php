@extends('layouts.template')

@section('title', 'カスタム')

@section('content')

<div id="books-custom" class="container">
    
    <h1>カスタム</h1>
    
    <div class="col-md-8 mx-auto">
    <div class="card card-body">
    
    <form action="{{ action('Admin\CustomController@update') }}" method="post" enctype="multipart/form-data">
    
    @if (count($errors) > 0)
    <ul>
        @foreach($errors->all() as $e)
        <li>{{ $e }}</li>
        @endforeach
    </ul>
    @endif
    
    <!-- <div class="form-group row">
        <label class="col-md-3 col_title">ユーザーネーム</label>
        <div class="col-md-9">
            <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required >
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-md-3 col_title">アイコン画像</label>
        <div class="col-md-9">
            <input type="file" class="form-control-file" name="icon_image_path">
            <div class="form-text text-info">設定中:</div>
            <div class="form-check">
                <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="icon_image_path" value="true">画像を削除
                </label>
            </div>
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-md-3 col_title">ヘッダー画像</label>
        <div class="col-md-9">
            <input type="file" class="form-control-file" name="header_image_path">
            <div class="form-text text-info">設定中:</div>
            <div class="form-check">
                <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="header_image_path" value="true">画像を削除
                </label>
            </div>
        </div>
    </div> -->
    
    <div class="form-group row">
        <label class="col-md-3 col_title" for="title">アイコン画像</label>
        <div class="col-md-9">
            <input type="file" class="form-control-file" name="icon_image">
            <div class="form-text text-info">
            設定中: {{ $user->icon_image_path }}
            </div>
            <div class="form-check">
                <label class="form-check-label">
                     <input type="checkbox" class="form-check-input" name="icon_remove" value="true">画像を削除
                </label>
            </div>
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-md-3 col_title" for="title">ヘッダー画像</label>
        <div class="col-md-9">
            <input type="file" class="form-control-file" name="header_image">
            <div class="form-text text-info">
            設定中: {{ $user->header_image_path }}
            </div>
            <div class="form-check">
                <label class="form-check-label">
                     <input type="checkbox" class="form-check-input" name="head_remove" value="true">画像を削除
                </label>
            </div>
        </div>
    </div>
        
    {{ csrf_field() }}
    
    <input type="hidden" name="id" value="{{ Auth::id() }}">
    <input type="submit" class="btn btn-primary btn-block" value="更新">
    
    </form>
    
    </div>
    </div>
</div>

@endsection