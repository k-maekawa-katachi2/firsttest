<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
    /**各メソッド共通、最新の診断結果一覧を表示する  */
    private function getResultsData($user_id)
    {
        return DB::table('results')    
            ->where('user_id', $user_id)
            ->orderBy('date', 'desc')
            ->get();
    }


    /**　今回のデータを登録して、データを表示する */
    public function index(Request $request)
    {
        $user_id = Auth::user()->id;

        $param = [
            'kouzou' => $request->kouzou,
            'byouteki' => $request->byouteki,
            'shinin' => $request->shinin,
            'sonota' => $request->sonota,
            'user_id' => $user_id,
            'date' => $request->date,
        ];

        /**リダイレクトされたときに同じ内容が重複登録しないように設定する
         *      ⓵if = 重複している　→　登録せず一覧表示
         *      ⓶else = 重複してない →　新規登録して一覧表示 
         */
        $check = DB::table('results')
            ->whereRaw(
                'kouzou= ? and byouteki=? and shinin=? and sonota=? and date=?',
                [$request->kouzou, $request->byouteki, $request->shinin, $request->sonota,  $request->date]
            )
            ->exists();
        if ($check == true) {
            return redirect()->route('show');
        } else {
            DB::table('results')->insert($param);
            return redirect()->route('show');
        }
    }


    /**　ゲーム中に過去の結果を見る */
    public function store()
    {
        $user_id = Auth::user()->id;
        $results = $this->getResultsData($user_id);

        return view('low_back_pain.result', ['results' => $results]);
    }
}
