<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['over_name' => '田中',
            'under_name' => '太郎',
            'over_name_kana' => 'タナカ',
            'under_name_kana' => 'タロウ',
            'mail_address' => 'a@mail.com',
            'sex' => '1',
            'birth_day' => '2000-01-02',
            'role' => '4',
            'password' => bcrypt('12345678')
            ],
            ['over_name' => '田中',
            'under_name' => '二子',
            'over_name_kana' => 'タナカ',
            'under_name_kana' => 'ニコ',
            'mail_address' => 'b@mail.com',
            'sex' => '2',
            'birth_day' => '2000-01-03',
            'role' => '1',
            'password' => bcrypt('12345678')
            ],
        ]);
    }
}
