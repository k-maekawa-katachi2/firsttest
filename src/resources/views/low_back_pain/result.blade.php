@extends('layouts.result_design')

@section('title', '診断結果ページ')
@section('header')
    ユーザー名　：{{ Auth::user()->name }}様
@endsection
@section('content')
    <h3>{{ Auth::user()->name }}様の診断結果履歴です。</h3>
    <div class="scroll" style="height: 20rem; width: 100%; overflow-y: scroll">
        <table class="table caption-top">
            <thead>
                <tr>
                    <th scope="col">実施日</th>
                    <th scope="col">構造的要因</th>
                    <th scope="col">病的要因</th>
                    <th scope="col">心因的要因</th>
                    <th scope="col">心因的要因</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($results as $result)
                    @php
                        $date = new \DateTime($result->date);
                        $test_date = $date->format('Y年m月d日');
                    @endphp
                    <tr>
                        <th scope="row">{{ $test_date }}</th>
                        <td>{{ $result->kouzou }}</td>
                        <td>{{ $result->byouteki }}</td>
                        <td>{{ $result->shinin }}</td>
                        <td>{{ $result->sonota }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row mt-5 ">
        <input type="submit" value="もう一度やる" class="btn btn-danger w-50" onclick="location.href='/questions'">
    </div>
@endsection
@section('footer')

@endsection
