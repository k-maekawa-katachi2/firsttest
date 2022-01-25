<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class EvaluationsController extends Controller
{
    //
    public function index(Request $request)
    {
        /**最終問題をデーターに入力する
         * ⓵　if = 何かしらの理由でデータがあった場合、上書き
         * ⓶　else= 正常の入力
         */
        $user_id = Auth::user()->id;
        $param = [
            'user_id' => $user_id,
            'question_id' => $request->question_id,
            'answer' => $request->answer
        ];


        $question_id_check = DB::table('answers')->where('question_id', $request->question_id)->exists();
        if ($question_id_check == true) {
            DB::table('answers')->where('question_id', $request->question_id)->update($param);
        } else {
            DB::table('answers')->insert($param);
        }


        /**診断結果を出す
         * ⓵　すべての結果およびハイスコアだった問題だけ出すを表示
         * ⓶　各項目を計算
         * ⓷　計算結果をevaluationsテーブルから該当するものを抽出する
         */

        // ⓵すべての結果を表示  
        $evaluations_data = DB::table('evaluations')->get();
        $high_scores= DB::table('questions')->join('answers', 'answers.question_id', '=','questions.id')
                    ->select('questions.*')
                    ->where('user_id', $user_id)->where('answer','2')
                    ->get();

      
        // ⓶　各項目を計算
        $kouzou_total = DB::table('answers')->where('user_id', $user_id)->whereRaw('question_id >= ? and question_id <=?', [1, 5])->sum('answer');
        $byouteki_total = DB::table('answers')->where('user_id', $user_id)->whereRaw('question_id >= ? and question_id <=?', [6, 10])->sum('answer');
        $shinin_total = DB::table('answers')->where('user_id', $user_id)->whereRaw('question_id >= ? and question_id <=?', [11, 15])->sum('answer');
        $sonota_total = DB::table('answers')->where('user_id', $user_id)->whereRaw('question_id >= ? and question_id <=?', [16, 20])->sum('answer');

        // ⓷　計算結果をevaluationsテーブルから該当するものを抽出する
        // A $kouzou = 構造的要因の情報を取得
        if ($kouzou_total >= 6) {
            $kouzou = DB::table('evaluations')->where('id', 1)->get();
        } elseif ($kouzou_total >= 3 || $kouzou_total <= 6) {
            $kouzou = DB::table('evaluations')->where('id', 2)->get();
        } else {
            $kouzou = DB::table('evaluations')->where('id', 3)->get();
        }
        // B $byouteki = 病的要因の情報を取得
        if ($byouteki_total >= 6) {
            $byouteki = DB::table('evaluations')->where('id', 4)->get();
        } elseif ($byouteki_total >= 3 || $byouteki_total <= 6) {
            $byouteki = DB::table('evaluations')->where('id', 5)->get();
        } else {
            $byouteki = DB::table('evaluations')->where('id', 6)->get();
        }

        // C $shinin = 心因的要因の情報を取得
        if ($shinin_total >= 6) {
            $shinin = DB::table('evaluations')->where('id', 7)->get();
        } elseif ($shinin_total >= 3 || $shinin_total <= 6) {
            $shinin = DB::table('evaluations')->where('id', 8)->get();
        } else {
            $shinin = DB::table('evaluations')->where('id', 9)->get();
        }

        // D $sonota = その他要因の情報を取得
        if ($sonota_total >= 6) {
            $sonota = DB::table('evaluations')->where('id', 10)->get();
        } elseif ($sonota_total >= 3 || $sonota_total <= 6) {
            $sonota = DB::table('evaluations')->where('id', 11)->get();
        } else {
            $sonota = DB::table('evaluations')->where('id', 12)->get();
        }

         
        // データをquestions.blade.phpに変数で持っていく
        return view('low_back_pain.evaluations', [
            'kouzou' => $kouzou[0],
            'byouteki' => $byouteki[0],
            'shinin' => $shinin[0],
            'sonota' => $sonota[0],
            'high_scores' => $high_scores
        ]);
 
    }
}