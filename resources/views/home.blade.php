@extends('layouts.template')

@section('title', 'My本棚')

@section('content')

<div id="bookshelf-page" class="container">
    <h1>{{ Auth::user()->name }}の本棚</h1>
</div>

@endsection
