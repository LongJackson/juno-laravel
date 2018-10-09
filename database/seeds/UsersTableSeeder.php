<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
        	'user_name' => 'Cao Anh Nhất 2',
        	'user_email' => 'anhnhata8cool@gmail.com',
        	'user_pass' => bcrypt('123456'),
        	'user_avatar' => '',
        	'user_phone'  => '01674754648',
        	'user_role'  => 1
        ];

        DB::table('account')->insert($data);
    }
}
