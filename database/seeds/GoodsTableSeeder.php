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
        $now = \Carbon\Carbon::now();

        DB::table('goods')->insert([
          'name' => 'うどん',
          'comment' => 'コシのあるうどん',
          'price' => 500,
          'stock' => 10,
          'created_at' => $now,
          'updated_at' => $now,
        ]);
    }
}
