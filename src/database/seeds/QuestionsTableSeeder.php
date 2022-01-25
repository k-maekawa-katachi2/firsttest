<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //問題文章および解答のサンプル入力（Q1からQ２０）
        $param = [
            'question' => 'これは１問目ですか',
            'comment' => 'そうです。１問目です。',
        ];
        DB::table('questions')->insert($param);

        $param = [
            'question' => 'これは2問目ですか',
            'comment' => 'そうです。2問目です。',
        ];

        DB::table('questions')->insert($param);

        $param = [
            'question' => 'これは3問目ですか',
            'comment' => 'そうです。3問目です。',
        ];

        DB::table('questions')->insert($param);

        $param = [
            'question' => 'これは4問目ですか',
            'comment' => 'そうです。4問目です。',
        ];

        DB::table('questions')->insert($param);

        $param = [
            'question' => 'これは5問目ですか',
            'comment' => 'そうです。5問目です。',
        ];
        DB::table('questions')->insert($param);

        $param = [
            'question' => 'これは6問目ですか',
            'comment' => 'そうです。6問目です。',
        ];
        DB::table('questions')->insert($param);

        $param = [
            'question' => 'これは7問目ですか',
            'comment' => 'そうです。7問目です。',
        ];
        DB::table('questions')->insert($param);

        $param = [
            'question' => 'これは8問目ですか',
            'comment' => 'そうです。8問目です。',
        ];

        DB::table('questions')->insert($param);

        $param = [
            'question' => 'これは9問目ですか',
            'comment' => 'そうです。9問目です。',
        ];

        DB::table('questions')->insert($param);

        $param = [
            'question' => 'これは10問目ですか',
            'comment' => 'そうです。10問目です。',
        ];
        DB::table('questions')->insert($param);

        $param = [
            'question' => 'これは11問目ですか',
            'comment' => 'そうです。11問目です。',
        ];
        DB::table('questions')->insert($param);

        $param = [
            'question' => 'これは12問目ですか',
            'comment' => 'そうです。12問目です。',
        ];
        DB::table('questions')->insert($param);

        $param = [
            'question' => 'これは13問目ですか',
            'comment' => 'そうです。13問目です。',
        ];
        DB::table('questions')->insert($param);

        $param = [
            'question' => 'これは14問目ですか',
            'comment' => 'そうです。14問目です。',
        ];
        DB::table('questions')->insert($param);

        $param = [
            'question' => 'これは15問目ですか',
            'comment' => 'そうです。15問目です。',
        ];
        DB::table('questions')->insert($param);

        $param = [
            'question' => 'これは16問目ですか',
            'comment' => 'そうです。16問目です。',
        ];
        DB::table('questions')->insert($param);

        $param = [
            'question' => 'これは17問目ですか',
            'comment' => 'そうです。17問目です。',
        ];
        DB::table('questions')->insert($param);

        $param = [
            'question' => 'これは18問目ですか',
            'comment' => 'そうです。18問目です。',
        ];
        DB::table('questions')->insert($param);

        $param = [
            'question' => 'これは19問目ですか',
            'comment' => 'そうです。19問目です。',
        ];
        DB::table('questions')->insert($param);

        $param = [
            'question' => 'これは20問目ですか',
            'comment' => 'そうです。20問目です。',
        ];
        DB::table('questions')->insert($param);
    }
}
