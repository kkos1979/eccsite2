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
        $now = \Carbon\Carbon::now();

        DB::table('users')->insert([
          'name' => '管理者',
          'address' => '東京都',
          'email' => 'admin@example.com',
          'tel' => '0312345678',
          'password' => Hash::make('asd'),
          'role' => 'admin',
          'created_at' => $now,
          'updated_at' => $now,
        ]);
    }
}
