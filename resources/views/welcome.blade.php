@extends('layouts.template')

@section('title', 'Welcome')

@section('content')

<div id="welcome-page" class="container">
    <div class="row card-body justify-content-center">
        
        <a href="{{ route('login') }}" class="col-md-6">
            <button type="submit" class="btn btn-primary btn-block">
            {{ __('messages.Login') }}
            </button>
        </a>
        
        <a href="{{ route('register') }}" class="col-md-6">
            <button type="submit" class="btn btn-secondary btn-block">
            {{ __('messages.Register') }}
            </button>
        </a>
        
    </div>
</div>
@endsection
