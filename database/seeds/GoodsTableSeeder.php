<?php

use Illuminate\Database\Seeder;

class GoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('goods')->insert([
          'name' => 'そば',
          'comment' => 'そば粉100％',
          'price' => 500,
          'stock' => 10,
          'image' => '',
        ]);
    }
}
