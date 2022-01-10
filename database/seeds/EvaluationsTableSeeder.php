<?php

use Illuminate\Database\Seeder;

class EvaluationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'cause' => 1,
            'rank' => 'A',
            'evaluation' => 'かなり姿勢の悪さが影響してそうです',
        ];

        DB::table('evaluations')->insert($param);
        
        $param = [
            'cause' => 1,
            'rank' => 'B',
            'evaluation' => '姿勢の悪さが多少してそうです',
        ];

        DB::table('evaluations')->insert($param);
        
        $param = [
            'cause' => 1,
            'rank' => 'C',
            'evaluation' => '構造的にはあなたの腰痛には関係が少なく様です',
        ];

        DB::table('evaluations')->insert($param);
        
        $param = [
            'cause' => 2,
            'rank' => 'A',
            'evaluation' => '大きな病気や手術しないといけない疾患が隠れている可能性があります。',
        ];

        DB::table('evaluations')->insert($param);
        
        $param = [
            'cause' => 2,
            'rank' => 'B',
            'evaluation' => '定期的に病院の先生に相談をしてみてください',
        ];

        DB::table('evaluations')->insert($param);
        
        $param = [
            'cause' => 2,
            'rank' => 'C',
            'evaluation' => '今回の腰痛は他の病気から来ている可能性は少ないと思います。',
        ];

        DB::table('evaluations')->insert($param);
        
        $param = [
            'cause' => 3,
            'rank' => 'A',
            'evaluation' => 'あなたの考え方がそもそも直さないといけないかもしれませんね',
        ];

        DB::table('evaluations')->insert($param);
        
        $param = [
            'cause' => 3,
            'rank' => 'B',
            'evaluation' => '多少メンタルが影響している可能性があります。他にも体のことに無頓着になってないでしょうか？',
        ];

        DB::table('evaluations')->insert($param);
        
        $param = [
            'cause' => 3,
            'rank' => 'C',
            'evaluation' => 'あなたの腰痛はそこまで心因的な原因ではない可能性が高いです。',
        ];

        DB::table('evaluations')->insert($param);
        
        $param = [
            'cause' => 4,
            'rank' => 'A',
            'evaluation' => '生活習慣の見直しをお勧めします。バランスの良い栄養、睡眠、運動の心がけが大切です',
        ];

        DB::table('evaluations')->insert($param);
        
        $param = [
            'cause' => 4,
            'rank' => 'B',
            'evaluation' => '偏った食事や水分の接種などを心がけよう',
        ];

        DB::table('evaluations')->insert($param);
        
        $param = [
            'cause' => 4,
            'rank' => 'C',
            'evaluation' => 'その他の要因では該当する点は少ないと思います。',
        ];

        DB::table('evaluations')->insert($param);
        
    }
}
