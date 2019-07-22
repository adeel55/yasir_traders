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

        




        DB::table('companies')->insert(['name' => 'company'.rand(1,15)]);
        DB::table('companies')->insert(['name' => 'company'.rand(1,15)]);
        DB::table('companies')->insert(['name' => 'company'.rand(1,15)]);
        DB::table('companies')->insert(['name' => 'company'.rand(1,15)]);
        DB::table('companies')->insert(['name' => 'company'.rand(1,15)]);
        DB::table('companies')->insert(['name' => 'company'.rand(1,15)]);
        DB::table('companies')->insert(['name' => 'company'.rand(1,15)]);
        DB::table('companies')->insert(['name' => 'company'.rand(1,15)]);
        DB::table('companies')->insert(['name' => 'company'.rand(1,15)]);
        DB::table('companies')->insert(['name' => 'company'.rand(1,15)]);
        DB::table('companies')->insert(['name' => 'company'.rand(1,15)]);
        DB::table('companies')->insert(['name' => 'company'.rand(1,15)]);
        DB::table('companies')->insert(['name' => 'company'.rand(1,15)]);
        DB::table('companies')->insert(['name' => 'company'.rand(1,15)]);
        DB::table('companies')->insert(['name' => 'company'.rand(1,15)]);
        DB::table('companies')->insert(['name' => 'company'.rand(1,15)]);
        DB::table('companies')->insert(['name' => 'company'.rand(1,15)]);
















        DB::table('products')->insert(['name' => 'Rio','qty' => 50,'unit_sale' => rand(10,150),'unit_purchase' => rand(10,100),'company_id' => rand(1,15)]);
        DB::table('products')->insert(['name' => 'Super','qty' => 50,'unit_sale' => rand(10,150),'unit_purchase' => rand(10,100),'company_id' => rand(1,15)]);
        DB::table('products')->insert(['name' => 'Lays','qty' => 50,'unit_sale' => rand(10,150),'unit_purchase' => rand(10,100),'company_id' => rand(1,15)]);
        DB::table('products')->insert(['name' => 'Coke','qty' => 50,'unit_sale' => rand(10,150),'unit_purchase' => rand(10,100),'company_id' => rand(1,15)]);
        DB::table('products')->insert(['name' => 'Sprite','qty' => 50,'unit_sale' => rand(10,150),'unit_purchase' => rand(10,100),'company_id' => rand(1,15)]);
        DB::table('products')->insert(['name' => 'Slanty','qty' => 50,'unit_sale' => rand(10,150),'unit_purchase' => rand(10,100),'company_id' => rand(1,15)]);
        DB::table('products')->insert(['name' => 'Prince','qty' => 50,'unit_sale' => rand(10,150),'unit_purchase' => rand(10,100),'company_id' => rand(1,15)]);
        DB::table('products')->insert(['name' => 'Gala','qty' => 50,'unit_sale' => rand(10,150),'unit_purchase' => rand(10,100),'company_id' => rand(1,15)]);
        DB::table('products')->insert(['name' => 'Zera Plus','qty' => 50,'unit_sale' => rand(10,150),'unit_purchase' => rand(10,100),'company_id' => rand(1,15)]);
        DB::table('products')->insert(['name' => 'Tuk','qty' => 50,'unit_sale' => rand(10,150),'unit_purchase' => rand(10,100),'company_id' => rand(1,15)]);
        DB::table('products')->insert(['name' => 'KurKuray','qty' => 50,'unit_sale' => rand(10,150),'unit_purchase' => rand(10,100),'company_id' => rand(1,15)]);
        DB::table('products')->insert(['name' => 'Walls Icecream','qty' => 50,'unit_sale' => rand(10,150),'unit_purchase' => rand(10,100),'company_id' => rand(1,15)]);
        DB::table('products')->insert(['name' => 'Lolypop','qty' => 50,'unit_sale' => rand(10,150),'unit_purchase' => rand(10,100),'company_id' => rand(1,15)]);


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


        // Seeder for order bookers
        DB::table('order_bookers')->insert(['name' => 'Shahid','phone' => '0300-500589']);
        DB::table('order_bookers')->insert(['name' => 'Amna','phone' => '0300-500589']);
        DB::table('order_bookers')->insert(['name' => 'Arooj','phone' => '0300-500589']);
        DB::table('order_bookers')->insert(['name' => 'Saba','phone' => '0300-500589']);
        DB::table('order_bookers')->insert(['name' => 'Alia','phone' => '0300-500589']);
        DB::table('order_bookers')->insert(['name' => 'Riaz','phone' => '0300-500589']);
        DB::table('order_bookers')->insert(['name' => 'Sadaqat Ali','phone' => '0300-500589']);
        DB::table('order_bookers')->insert(['name' => 'Ashar Ali','phone' => '0300-500589']);
        DB::table('order_bookers')->insert(['name' => 'Furqan','phone' => '0300-500589']);
        DB::table('order_bookers')->insert(['name' => 'Asad','phone' => '0300-500589']);
        DB::table('order_bookers')->insert(['name' => 'Qasim Ali','phone' => '0300-500589']);
        DB::table('order_bookers')->insert(['name' => 'Sami Ali','phone' => '0300-500589']);
        DB::table('order_bookers')->insert(['name' => 'Kamran Ali','phone' => '0300-500589']);
        DB::table('order_bookers')->insert(['name' => 'Umer','phone' => '0300-500589']);
        DB::table('order_bookers')->insert(['name' => 'Tehseen','phone' => '0300-500589']);
        DB::table('order_bookers')->insert(['name' => 'Rana','phone' => '0300-500589']);



        // Seeder for Customers
        DB::table('customers')->insert(['name' => 'Ilias genral Store pakki kotly','phone' => '0300-500589','balance' => 0.00,'address'=>'New Kashif street','area'=>'Lahore']);
        DB::table('customers')->insert(['name' => 'Hafiz Fahad General Store','phone' => '0300-500589','balance' => 0.00,'address'=>'Fateh Gharh','area'=>'sialkot']);
        DB::table('customers')->insert(['name' => 'Haji Liaqat Store','phone' => '0300-500589','balance' => 0.00,'address'=>'New Kashif street','area'=>'Lahore']);
        DB::table('customers')->insert(['name' => 'Ali Store daska','phone' => '0300-500589','balance' => 0.00,'address'=>'Daska Road','area'=>'Lahore']);
        DB::table('customers')->insert(['name' => 'Umar Farooq Store rangpura','phone' => '0300-500589','balance' => 0.00,'address'=>'Adha Road','area'=>'circular road']);
        DB::table('customers')->insert(['name' => 'Raza General stor kachari','phone' => '0300-500589','balance' => 0.00,'address'=>'Rana Colony','area'=>'samrial']);
        DB::table('customers')->insert(['name' => 'Aqib Pawn Shop Doburji chownk','phone' => '0300-500589','balance' => 0.00,'address'=>'Model Town','area'=>'Lahore']);
        DB::table('customers')->insert(['name' => 'Asad Karyana store peris road','phone' => '0300-500589','balance' => 0.00,'address'=>'Aamar road','area'=>'Rangpura']);
        DB::table('customers')->insert(['name' => 'Qazi Studio rangpura','phone' => '0300-500589','balance' => 0.00,'address'=>'New Kashif street','area'=>'Lahore']);
        DB::table('customers')->insert(['name' => 'Bismila karyana store hajipura road','phone' => '0300-500589','balance' => 0.00,'address'=>'New Kashif street','area'=>'hajipura']);





        // inventory





        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);
        DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,12),'qty' => rand(50,300),'carton'=>0,'unit_purchase'=>rand(5,110),'unit_sale'=>rand(15,150),'total_purchase'=>rand(5,35000),'expire'=>'2019-12-12']);






        // Seeder for Invoices
        // DB::table('invoices')->insert(['customer_id' => rand(1,10), 'sale_man_id' => rand(1,40), 'order_booker_id' => rand(1,5), 'created_at' => '2019-07-08']);
        // DB::table('invoices')->insert(['customer_id' => rand(1,10), 'sale_man_id' => rand(1,40), 'order_booker_id' => rand(1,5), 'created_at' => '2019-07-08']);
        // DB::table('invoices')->insert(['customer_id' => rand(1,10), 'sale_man_id' => rand(1,40), 'order_booker_id' => rand(1,5), 'created_at' => '2019-07-08']);
        // DB::table('invoices')->insert(['customer_id' => rand(1,10), 'sale_man_id' => rand(1,40), 'order_booker_id' => rand(1,5), 'created_at' => '2019-07-08']);
        // DB::table('invoices')->insert(['customer_id' => rand(1,10), 'sale_man_id' => rand(1,40), 'order_booker_id' => rand(1,5), 'created_at' => '2019-07-08']);
        // DB::table('invoices')->insert(['customer_id' => rand(1,10), 'sale_man_id' => rand(1,40), 'order_booker_id' => rand(1,5), 'created_at' => '2019-07-08']);
        // DB::table('invoices')->insert(['customer_id' => rand(1,10), 'sale_man_id' => rand(1,40), 'order_booker_id' => rand(1,5), 'created_at' => '2019-07-08']);
        // DB::table('invoices')->insert(['customer_id' => rand(1,10), 'sale_man_id' => rand(1,40), 'order_booker_id' => rand(1,5), 'created_at' => '2019-07-08']);
        // DB::table('invoices')->insert(['customer_id' => rand(1,10), 'sale_man_id' => rand(1,40), 'order_booker_id' => rand(1,5), 'created_at' => '2019-07-08']);
        // DB::table('invoices')->insert(['customer_id' => rand(1,10), 'sale_man_id' => rand(1,40), 'order_booker_id' => rand(1,5), 'created_at' => '2019-07-08']);
        // DB::table('invoices')->insert(['customer_id' => rand(1,10), 'sale_man_id' => rand(1,40), 'order_booker_id' => rand(1,5), 'created_at' => '2019-07-08']);
        // DB::table('invoices')->insert(['customer_id' => rand(1,10), 'sale_man_id' => rand(1,40), 'order_booker_id' => rand(1,5), 'created_at' => '2019-07-08']);
        // DB::table('invoices')->insert(['customer_id' => rand(1,10), 'sale_man_id' => rand(1,40), 'order_booker_id' => rand(1,5), 'created_at' => '2019-07-08']);
        // DB::table('invoices')->insert(['customer_id' => rand(1,10), 'sale_man_id' => rand(1,40), 'order_booker_id' => rand(1,5), 'created_at' => '2019-07-08']);
        // DB::table('invoices')->insert(['customer_id' => rand(1,10), 'sale_man_id' => rand(1,40), 'order_booker_id' => rand(1,5), 'created_at' => '2019-07-08']);
        // DB::table('invoices')->insert(['customer_id' => rand(1,10), 'sale_man_id' => rand(1,40), 'order_booker_id' => rand(1,5), 'created_at' => '2019-07-08']);
        // DB::table('invoices')->insert(['customer_id' => rand(1,10), 'sale_man_id' => rand(1,40), 'order_booker_id' => rand(1,5), 'created_at' => '2019-07-08']);
        // DB::table('invoices')->insert(['customer_id' => rand(1,10), 'sale_man_id' => rand(1,40), 'order_booker_id' => rand(1,5), 'created_at' => '2019-07-08']);
        // DB::table('invoices')->insert(['customer_id' => rand(1,10), 'sale_man_id' => rand(1,40), 'order_booker_id' => rand(1,5), 'created_at' => '2019-07-08']);
        // DB::table('invoices')->insert(['customer_id' => rand(1,10), 'sale_man_id' => rand(1,40), 'order_booker_id' => rand(1,5), 'created_at' => '2019-07-08']);
        // DB::table('invoices')->insert(['customer_id' => rand(1,10), 'sale_man_id' => rand(1,40), 'order_booker_id' => rand(1,5), 'created_at' => '2019-07-08']);
        // DB::table('invoices')->insert(['customer_id' => rand(1,10), 'sale_man_id' => rand(1,40), 'order_booker_id' => rand(1,5), 'created_at' => '2019-07-08']);
        // DB::table('invoices')->insert(['customer_id' => rand(1,10), 'sale_man_id' => rand(1,40), 'order_booker_id' => rand(1,5), 'created_at' => '2019-07-08']);
        // DB::table('invoices')->insert(['customer_id' => rand(1,10), 'sale_man_id' => rand(1,40), 'order_booker_id' => rand(1,5), 'created_at' => '2019-07-08']);
        // DB::table('invoices')->insert(['customer_id' => rand(1,10), 'sale_man_id' => rand(1,40), 'order_booker_id' => rand(1,5), 'created_at' => '2019-07-08']);
        // DB::table('invoices')->insert(['customer_id' => rand(1,10), 'sale_man_id' => rand(1,40), 'order_booker_id' => rand(1,5), 'created_at' => '2019-07-08']);
        // DB::table('invoices')->insert(['customer_id' => rand(1,10), 'sale_man_id' => rand(1,40), 'order_booker_id' => rand(1,5), 'created_at' => '2019-07-08']);
        // DB::table('invoices')->insert(['customer_id' => rand(1,10), 'sale_man_id' => rand(1,40), 'order_booker_id' => rand(1,5), 'created_at' => '2019-07-08']);
        // DB::table('invoices')->insert(['customer_id' => rand(1,10), 'sale_man_id' => rand(1,40), 'order_booker_id' => rand(1,5), 'created_at' => '2019-07-08']);
        // DB::table('invoices')->insert(['customer_id' => rand(1,10), 'sale_man_id' => rand(1,40), 'order_booker_id' => rand(1,5), 'created_at' => '2019-07-08']);






        // // Sales Seedeer
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);
        // DB::table('sales')->insert(['invoice_id' => rand(1,30),'product_id' => rand(1,13), 'qty' => rand(1,150), 'bonus' => rand(1,5), 'unit_price' => rand(1,120), 'total_price' => rand(1,5000), 'discount' => rand(1,5), 'discount_amount' => rand(1,6000),'discount_total' => rand(1,6000), 'created_at' => '2019-07-08']);



        
    }
}
