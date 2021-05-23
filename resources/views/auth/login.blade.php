@extends('layouts.template')

@section('title', 'ログイン')

@section('content')

<div id="login-page" class="container">
    
        <div class="login-body card-body">
        
        <h1>{{ __('messages.Login') }}</h1>
        
        <form method="POST" action="{{ route('login') }}">
        @csrf
            
            <div class="form-group row">
                <!-- <label for="email" class="col-sm-4">{{ __('messages.E-Mail Address') }}</label> -->
                <div class="col-md-6">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="{{ __('messages.E-Mail Address') }}" required autofocus>
                    @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <!-- <label for="password" class="col-md-4">{{ __('messages.Password') }}</label> -->
                <div class="col-md-6">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('messages.Password') }}" required>
                    @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <div class="checkbox">
                    <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    {{ __('messages.Remember Me') }}
                    </label>
                    </div>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary btn-block">
                    {{ __('messages.Login') }}
                    </button>
                </div>
            </div>
            
        </form>
        
        <div class="col-md-6">
        <a href="{{ route('register') }}">
            <button type="submit" class="btn btn-secondary btn-block">
            {{ __('messages.Register') }}
            </button>
        </a>
        </div>
        
        </div>
    
</div>
@endsection
