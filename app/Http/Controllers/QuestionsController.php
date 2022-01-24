<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Question;

class QuestionsController extends Controller
{

    /**
     *   ログイン後、質問スタート
     */
    public function start()
    {
        // questionNO1から開始　・・　id=1
        $id = 1;
        $question = DB::table('questions')->where('id', $id)->first();

        // 次のID番号を取得するための変数を作成
        $next = DB::table('questions')->where('id', '>', $id)->first('id');
        // 次のID番号を取得するための変数を作成
        $back = DB::table('questions')->where('id', '<', $id)->orderBy('id', 'desc')->first('id');

        // データをquestions.blade.phpに変数で持っていく
        return view('low_back_pain.questions', [
            'question' => $question,
            'next' => $next,
            'back' => $back,
        ]);
    }


    /**
     * 各問の解答および2問目以降の質問の表示 
     * 
     */
    public function repeat(Request $request)
    {

        // ラジオボタンがチェックが入っているか確認する
        $answer = $request->answer;
        //    チェックが空(null)の場合、エラー表示を加えて表示する
        if ($answer == null) {
            $question = DB::table('questions')->where('id', $request->question_id)->first();
            // 次のID番号を取得するための変数を作成
            $next = DB::table('questions')->where('id', '>', $request->question_id)->first('id');
            // 次のID番号を取得するための変数を作成
            $back = DB::table('questions')->where('id', '<', $request->question_id)->orderBy('id', 'desc')->first('id');

            return view('low_back_pain.questions', [
                'question' => $question,
                'next' => $next,
                'back' => $back,
                'ans_error' => '解答項目のどれかにチェックを入れてください'
            ]);
        }

        $param = [
            'user_id' => Auth::user()->id,
            'question_id' => $request->question_id,
            'answer' => $request->answer
        ];

        /** 
         * if = 戻るボタンから再度入力したとき　＝　上書き
         * else = 次へを押したとき　＝　新規登録
         */

        //  $question_idが存在するかチェックする　・・　存在する＝戻る条件になる
        $question_id_check = DB::table('answers')->where('question_id', $request->question_id)->exists();
        if ($question_id_check == true) {
            DB::table('answers')->where('question_id', $request->question_id)->update($param);
        } else {
            DB::table('answers')->insert($param);
        }

        $id = $request->id;
        $question = DB::table('questions')->where('id', $id)->first();

        // 次のID番号を取得するための変数を作成
        $next = DB::table('questions')->where('id', '>', $id)->first('id');
        // 次のID番号を取得するための変数を作成
        $back = DB::table('questions')->where('id', '<', $id)->orderBy('id', 'desc')->first('id');

        // データをquestions.blade.phpに変数で持っていく
        return view('low_back_pain.questions', [
            'question' => $question,
            'next' => $next,
            'back' => $back,
        ]);
    }
}
