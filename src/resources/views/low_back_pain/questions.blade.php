@extends('layouts.index')

@section('title', '質問ページ')
@section('header')
    ユーザー名　：{{ Auth::user()->name }}様
@endsection

@section('content')
    @if ($question->id > 19)
        <form action="{{ route('evalu') }}" method="post">

        @else
            <form action="/questions" method="post">
    @endif
    @csrf
    {{-- 質問の表示 --}}
    <P style="margin-top:5rem;">Q{{ $question->id }} ：{{ $question->question }}</P>
    <input type="hidden" name="id" value="{{ $next->id }}">
    <input type="hidden" name="question_id" value={{ $question->id }}>
    {{-- 質問の表示ここまで --}}

    {{-- エラー時ここにエラーが表示 --}}
    <div class="container mt-3">
        @isset($ans_error)
            <div class="alert alert-danger" role="alert">{{ $ans_error }}</div>
        @endisset
        {{-- エラー表示ここまで --}}

        <div class="row justify-content-center">
            <div class="col-4">
                <input type="radio" name="answer" value="2">はい
            </div>
            <div class="col-4">
                <input type="radio" name="answer" value="1">ときどきある
            </div>
            <div class="col-4">
                <input type="radio" name="answer" value="0">いいえ
            </div>
        </div>

        <div class="row mt-5">
            @if ($question->id > 19)
                <input type="submit" value="診断結果を見る" class="btn btn-danger" style="width:50%">
            @else
                <input type="submit" value="次へすすむ" class="btn btn-primary" style="width:50%">
            @endif
        </div>

        <div class="row mt-5">
            @if ($question->id != 1)
                <a href="/questions/back?id={{ $back->id }}">　⇐　１つ前にもどる</a>
            @endif
            </form>
        </div>

        <div class="row mt-5">
            <div class="row mt-5">
                <form action="{{ route('store') }}" method="post">
                    @csrf
                    <input type="submit" value="今までの結果を見る" class="btn btn-Success" style="width:50%">
                </form>
                <div class="remaining">
                    @php
                        $remaining = 20 - $question->id;
                    @endphp
                    残り：{{ $remaining }}問です
                    <hr size="10">
                </div>
            </div>
        </div>
    </div>
@endsection
