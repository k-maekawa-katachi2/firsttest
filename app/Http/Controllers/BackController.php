<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Question;

/**「戻る」を押したときの処理
* 　・ひとつ前の情報を表示
* 　・next = 次へのボタンで使用するID
*   ・back = 前へのボタンで使用するID
 */

class BackController extends Controller
{
 
    public function back(Request $request)
    {
        $question = DB::table('questions')->where('id', $request->id)->first();
        
        // 次のID番号を取得するための変数を作成
        $next = DB::table('questions')->where('id', '>', $request->id)->first('id');
        // 次のID番号を取得するための変数を作成
        $back = DB::table('questions')->where('id', '<', $request->id)->orderBy('id', 'desc')->first('id');
        // ユーザーIDを取得する
        $user_id = Auth::user()->id;


        // データをquestions.blade.phpに変数で持っていく
        return view('low_back_pain.questions', [
            'question' => $question,
            'next' => $next,
            'back' => $back,
            'user_id' => $user_id
        ]);
    }
}
