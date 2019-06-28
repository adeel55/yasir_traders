<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Company::class, 20)->create();

        DB::table('products')->insert(['name' => 'Rio','qty' => 50]);
        DB::table('products')->insert(['name' => 'Super','qty' => 50]);
        DB::table('products')->insert(['name' => 'Lays','qty' => 50]);
        DB::table('products')->insert(['name' => 'Coke','qty' => 50]);
        DB::table('products')->insert(['name' => 'Sprite','qty' => 50]);
        DB::table('products')->insert(['name' => 'Slanty','qty' => 50]);
        DB::table('products')->insert(['name' => 'Prince','qty' => 50]);
        DB::table('products')->insert(['name' => 'Gala','qty' => 50]);
        DB::table('products')->insert(['name' => 'Zera Plus','qty' => 50]);
        DB::table('products')->insert(['name' => 'Tuk','qty' => 50]);
        DB::table('products')->insert(['name' => 'KurKuray','qty' => 50]);
        DB::table('products')->insert(['name' => 'Walls Icecream','qty' => 50]);
        DB::table('products')->insert(['name' => 'Lolypop','qty' => 50]);
    }
}
