@extends('layouts.result_design')

@section('title', '診断結果だよ')

@section('header')
    ユーザー名　：{{ Auth::user()->name }}様
@endsection
@section('content')
    <h3>{{ Auth::user()->name }}様の診断結果はこうなりました。</h3>
    <div class="container mt-5">
        <div class="result">
            <h3>●　構造的な要因は{{ $kouzou->rank }}です。</h3>
        </div>
        <p>{{ $kouzou->evaluation }}</p>
        <div class="result mt-3">
            <h3>●　病的な要因は{{ $byouteki->rank }}です。</h3>
        </div>
        <p>{{ $byouteki->evaluation }}</p>
        <div class="result mt-3">
            <h3>●　心因的な要因は{{ $shinin->rank }}です。</h3>
        </div>
        <p>{{ $shinin->evaluation }}</p>
        <div class="result mt-3">
            <h3>●　その他の要因は{{ $sonota->rank }}です。</h3>
        </div>
        <p>{{ $sonota->evaluation }}</p>
    </div>

    <p class="mt-5">今回の内容を見直して改善していきましょう。</p>
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            @foreach ($high_scores as $high_score)
                <h2 class="accordion-header" id="heading {{ $high_score->id }}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse{{ $high_score->id }}" aria-expanded="false"
                        aria-controls="collapseTwo">
                        {{ $high_score->id }}問目 <span class="mgl-10"
                            style="margin-left : 10px;">{{ $high_score->question }}</span>
                    </button>
                </h2>
                <div id="collapse{{ $high_score->id }}" class="accordion-collapse collapse"
                    aria-labelledby="heading {{ $high_score->id }}" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        【解説】：{{ $high_score->comment }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="result mt-5">
        今回の結果を保存しますか？
    </div>
    <div class="row justify-content-around mt-5 fluid">
        <div class="col-3">
            <form action="/result" method="post">
                @csrf
                <input type="hidden" name="kouzou" value={{ $kouzou->rank }}>
                <input type="hidden" name="byouteki" value={{ $byouteki->rank }}>
                <input type="hidden" name="shinin" value={{ $shinin->rank }}>
                <input type="hidden" name="sonota" value={{ $sonota->rank }}>
                <input type="hidden" name="date" value="{{ date('Y/m/d H:i:s') }}">
                <input type="submit" value="はい、登録します" class="btn btn-primary">
            </form>
        </div>
        <div class="col-3">
            <input type="button" value="いいえ、登録せず、終了します" class="btn btn-warning">
        </div>
        <div class="col-3">
            <form action="/result/store" method="get">
                <input type="submit" value="登録せず、今までの結果を見る" class="btn btn-Success">
            </form>
        </div>
    </div>
@endsection
