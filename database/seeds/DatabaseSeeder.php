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


        DB::table('sale_men')->insert(['name' => 'Ahmad','phone' => '0300-5868589']);
        DB::table('sale_men')->insert(['name' => 'Ali','phone' => '0300-5868589']);
        DB::table('sale_men')->insert(['name' => 'Faraz','phone' => '0300-5868589']);
        DB::table('sale_men')->insert(['name' => 'Hamid','phone' => '0300-5868589']);
        DB::table('sale_men')->insert(['name' => 'Mansoor','phone' => '0300-5868589']);
        DB::table('sale_men')->insert(['name' => 'Riaz','phone' => '0300-5868589']);
        DB::table('sale_men')->insert(['name' => 'Shahid','phone' => '0300-5868589']);
        DB::table('sale_men')->insert(['name' => 'Sadaqat','phone' => '0300-5868589']);
        DB::table('sale_men')->insert(['name' => 'Bilal','phone' => '0300-5868589']);
        DB::table('sale_men')->insert(['name' => 'Sfeer','phone' => '0300-5868589']);
        DB::table('sale_men')->insert(['name' => 'Tasawur','phone' => '0300-5868589']);
        DB::table('sale_men')->insert(['name' => 'Asad','phone' => '0300-5868589']);
        DB::table('sale_men')->insert(['name' => 'Yasir','phone' => '0300-5868589']);
        DB::table('sale_men')->insert(['name' => 'Sibti','phone' => '0300-5868589']);
        DB::table('sale_men')->insert(['name' => 'Sajjad','phone' => '0300-5868589']);
        DB::table('sale_men')->insert(['name' => 'Khizer','phone' => '0300-5868589']);
        DB::table('sale_men')->insert(['name' => 'Raza','phone' => '0300-5868589']);
        DB::table('sale_men')->insert(['name' => 'SHAHID MUNAWWAR','phone' => '0300-5868589']);
        DB::table('sale_men')->insert(['name' => 'MUHAMMAD ZAWISH','phone' => '0300-5868589']);
        DB::table('sale_men')->insert(['name' => 'RABEEL NAZEER','phone' => '0300-5868589']);
        DB::table('sale_men')->insert(['name' => 'HASAN','phone' => '0300-5868589']);
        DB::table('sale_men')->insert(['name' => 'KHIZAR HUSSAIN','phone' => '0300-5868589']);
        DB::table('sale_men')->insert(['name' => 'MUHAMMAD ZAIN UL ABIDIN','phone' => '0300-5868589']);
        DB::table('sale_men')->insert(['name' => 'MUHAMMAD DAWOOD TALLAT','phone' => '0300-5868589']);
        DB::table('sale_men')->insert(['name' => 'TAYYAB AKASH','phone' => '0300-5868589']);
        DB::table('sale_men')->insert(['name' => 'MUHAMMAD ASIM','phone' => '0300-5868589']);
        DB::table('sale_men')->insert(['name' => 'HAMZA MEHMOOD','phone' => '0300-5868589']);
        DB::table('sale_men')->insert(['name' => 'SYED SAAD ALI SHAH','phone' => '0300-5868589']);
        DB::table('sale_men')->insert(['name' => 'SAMEER TARIQ','phone' => '0300-5868589']);
        DB::table('sale_men')->insert(['name' => 'ABDULLAH ASLAM','phone' => '0300-5868589']);
        DB::table('sale_men')->insert(['name' => 'ZAIN UL ABDIN','phone' => '0300-5868589']);
        DB::table('sale_men')->insert(['name' => 'NAZIM SHEHZAD','phone' => '0300-5868589']);
        DB::table('sale_men')->insert(['name' => 'JAWAD AHMED MALIK','phone' => '0300-5868589']);
        DB::table('sale_men')->insert(['name' => 'FAISAL NOSHAD TAHIR','phone' => '0300-5868589']);
        DB::table('sale_men')->insert(['name' => 'HAMZA JAHANGIR','phone' => '0300-5868589']);
        DB::table('sale_men')->insert(['name' => 'MAJADIL HUSSAIN','phone' => '0300-5868589']);
        DB::table('sale_men')->insert(['name' => 'MUHAMMAD MOHSIN TALLAT','phone' => '0300-5868589']);
        DB::table('sale_men')->insert(['name' => 'SOHA KHIZAR','phone' => '0300-5868589']);
        DB::table('sale_men')->insert(['name' => 'MUHAMMAD KHIZAR','phone' => '0300-5868589']);
        DB::table('sale_men')->insert(['name' => 'MUHAMMAD JABIR','phone' => '0300-5868589']);
        DB::table('sale_men')->insert(['name' => 'HAROON MOAZZAM ELAHI','phone' => '0300-5868589']);
        DB::table('sale_men')->insert(['name' => 'ABDUL HANAN','phone' => '0300-5868589']);
        DB::table('sale_men')->insert(['name' => 'ANISA SALEEM','phone' => '0300-5868589']);
        DB::table('sale_men')->insert(['name' => 'HAMZA','phone' => '0300-5868589']);
        DB::table('sale_men')->insert(['name' => 'HAMZA TAHIR','phone' => '0300-5868589']);
        DB::table('sale_men')->insert(['name' => 'MUHAMMAD AZFAR REHMAN','phone' => '0300-5868589']);
        DB::table('sale_men')->insert(['name' => 'M.FURQAN SHABBIR','phone' => '0300-5868589']);
        
    }
}
