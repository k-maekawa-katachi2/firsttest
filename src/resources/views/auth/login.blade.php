@extends('layouts.index')
@section('title', 'TOPページ')
@section('header')
    <h1>腰痛簡易診断</h1>
    <h4>- 20の質問であなたの腰痛の原因を判定します - </h4>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card" style="margin-top: 2rem;">
                    <div class="card-header">
                        <p>あなたの腰痛の原因を判定します</p>
                        <p>メールアドレスとパスワードを入力して</p>
                        <p>診察を始めてください</p>
                        <p>初めての方は新規登録から行ってください</p>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>
                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check mt-3">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('チェックしてください') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mt-3 mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('ログインして診察を始める') }}
                                    </button>
                                    <br><br>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('パスワードを忘れた方はこちらをクリック') }}
                                        </a>
                                    @endif
                                    <a class="btn btn-link mt-2" href="{{ route('register') }}">
                                        {{ __('新規登録はこちらをクリック') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
