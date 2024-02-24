<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Datetime;

class ScoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'score' => 1,
            'description' => 'おすすめしません',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('scores')->insert($param);
        $param = [
            'score' => 2,
            'description' => 'ちょっと不満です',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('scores')->insert($param);
        $param = [
            'score' => 3,
            'description' => '普通です',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('scores')->insert($param);
        $param = [
            'score' => 4,
            'description' => '大変満足です',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('scores')->insert($param);
        $param = [
            'score' => 5,
            'description' => 'おすすめします！',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('scores')->insert($param);
    }
}
