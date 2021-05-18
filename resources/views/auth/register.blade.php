@extends('layouts.template')

@section('title', 'ユーザー登録')

@section('content')

<div id="register-page" class="container">
    
    <div class="card-body justify-content-center">
        
        <h1>{{ __('messages.Register') }}</h1>
        
        <form method="POST" action="{{ route('register') }}">
        @csrf
        
        <div class="form-group row">
            <!-- <label for="name" class="col-md-4 col-form-label">{{ __('messages.Name') }}</label> -->
            
            <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="{{ __('messages.Name') }}" required autocomplete="name" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
        </div>

        <div class="form-group row">
            <!-- <label for="email" class="col-md-4 col-form-label">{{ __('messages.E-Mail Address') }}</label> -->
            
            <div class="col-md-6">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="{{ __('messages.E-Mail Address') }}" required autocomplete="email">
                                
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
        </div>

        <div class="form-group row">
            <!-- <label for="password" class="col-md-4 col-form-label">{{ __('messages.Password') }}</label> -->
            
            <div class="col-md-6">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('messages.Password') }}" required autocomplete="new-password">
                                
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
        </div>
        
        <div class="form-group row">
            <!-- <label for="password-confirm" class="col-md-4 col-form-label">{{ __('messages.Confirm Password') }}</label> -->
                            
            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ __('messages.Confirm Password') }}" required autocomplete="new-password">
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary btn-block">登録</button>
             </div>
        </div>
        
        </form>
    </div>
</div>
@endsection
