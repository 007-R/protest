<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Datetime;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'サンプル太郎',
            'email' => 'shaftsbury_works@yahoo.co.jp',
            'password' => \Hash::make('password'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => 'サンプル次郎',
            'email' => 'shaftsbury@yahoo.co.jp',
            'password' => \Hash::make('password'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => 'サンプル三郎',
            'email' => 'works@yahoo.co.jp',
            'password' => \Hash::make('password'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => 'サンプル四郎',
            'email' => 'w@yahoo.co.jp',
            'password' => \Hash::make('password'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('users')->insert($param);
    }
}
