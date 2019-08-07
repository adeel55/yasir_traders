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
    function rand_date()
    {
        return '2019-07-'.rand(28,30);
    }
    function rand_phone()
    {
        return '03'.rand(10,50).'-'.rand(5000000,9000000);
    }
        factory(App\Company::class, 50)->create();

        
        $products = array('Rio','Super','Lays','Coke','Sprite','Slanty','Prince','Gala','Zera','Tuk','KurKuray','Walls','Lolypop','Soap','Cady','Bombay','Shezaan','Buble','Catchup','Cake','Imli','DairyMilk','Chocklate','Biskit','Pencil');
        $saleman = array('Ahmad','Ali','Faraz','Hamid','Mansoor','Riaz','Shahid','Sadaqat','Bilal','Sfeer','Tasawur','Asad','Yasir','Sibti','Sajjad','Khizer','Raza','SHAHID MUNAWWAR','MUHAMMAD ZAWISH','RABEEL NAZEER','HASAN','KHIZAR HUSSAIN','MUHAMMAD ZAIN UL ABIDIN','MUHAMMAD DAWOOD TALLAT','TAYYAB AKASH','MUHAMMAD ASIM','HAMZA MEHMOOD','SYED SAAD ALI SHAH','SAMEER TARIQ','ABDULLAH ASLAM','ZAIN UL ABDIN','NAZIM SHEHZAD','JAWAD AHMED MALIK','FAISAL NOSHAD TAHIR','HAMZA JAHANGIR','MAJADIL HUSSAIN','MUHAMMAD MOHSIN TALLAT','SOHA KHIZAR','MUHAMMAD KHIZAR','MUHAMMAD JABIR','HAROON MOAZZAM ELAHI','ABDUL HANAN','ANISA SALEEM','HAMZA','HAMZA TAHIR','MUHAMMAD AZFAR REHMAN','M.FURQAN SHABBIR','Hannan Ali','Haseeb','Aitzaz');
        $order_bookers = array('Shahid','Amna','Arooj','Saba','Alia','Riaz','Sadaqat Ali','Ashar Ali','Furqan','Asad','Qasim Ali','Sami Ali','Kamran Ali','Umer','Tehseen','Rana');
        $order_bookers = array('Shahid','Amna','Arooj','Saba','Alia','Riaz','Sadaqat Ali','Ashar Ali','Furqan','Asad','Qasim Ali','Sami Ali','Kamran Ali','Umer','Tehseen','Rana');
        $customers = array('Ilias genral Store pakki kotly','Hafiz Fahad General Store','Haji Liaqat Store','Ali Store daska','Umar Farooq Store rangpura','Raza General stor kachari','Aqib Pawn Shop Doburji chownk','Asad Karyana store peris road','Qazi Studio rangpura','Bismila karyana store hajipura road');
        $area = array('Lahore','sialkot','Lahore','Lahore','circular Road','samrial','Lahore','Rangpura','Lahore','hajipura');
        $address = array('New Kashif street','Fateh Gharh','New Kashif street','Daska Road','Adha Road','Rana Colony','Model Town','Aamar road','New Kashif street','New Kashif street');


        // Seeder For Companies
        for ($i=0; $i < 15; $i++) { 
            DB::table('companies')->insert(['name' => 'company'.$i,'created_at' => rand_date()]);
        }


        // Seeder For Products
        for ($i=0; $i < 25; $i++) { 
            DB::table('products')->insert(['name' => $products[$i],'qty' => rand(40,400),'unit_sale' => rand(30,40),'unit_purchase' => rand(10,20),'company_id' => rand(1,15),'created_at' => rand_date()]);
        }

        // Seeder For Sale Man
        for ($i=0; $i < 50; $i++) {
            DB::table('sale_men')->insert(['name' => $saleman[$i],'phone' => rand_phone(),'created_at' => rand_date()]);
        }

        // Seeder For order_bookers
        for ($i=0; $i < 15; $i++) { 
            DB::table('order_bookers')->insert(['name' => $order_bookers[$i],'phone' => rand_phone(),'target' => rand(500,5000),'created_at' => rand_date()]);
        }

        // Seeder for Customers
        for ($i=0; $i < 10; $i++) { 
            DB::table('customers')->insert(['name' => $customers[$i],'phone' => rand_phone(),'balance' => 0.00,'address'=>$address[$i],'area'=>$area[$i],'created_at' => rand_date()]);

        }    

        // Seeder for Inventory
        for ($i=0; $i < 1000; $i++) { 
            DB::table('inventories')->insert(['company_id' => rand(1,15),'product_id' => rand(1,25),'qty' => rand(6,10),'carton'=>0,'unit_purchase'=>rand(28,30),'unit_sale'=>rand(50,55),'total_purchase'=>rand(150,300),'expire'=>rand_date(),'created_at'=>rand_date()]);
        }

        // Seeder for Invoices
        for ($i=1; $i < 200; $i++) { 
            $rand_date = rand_date();
            $lim = rand(2,6);
            DB::table('invoices')->insert(['customer_id' => rand(1,10), 'sale_man_id' => rand(1,40), 'order_booker_id' => rand(1,15), 'total_amount' => rand(1500,5000), 'total_discount' => rand(150,500), 'discount_total' => rand(1000,4000), 'received_amount' => rand(1000,4000), 'received' => rand(0,1), 'created_at' => $rand_date]);

            for ($j=0; $j < $lim; $j++) { 
                DB::table('sales')->insert(['invoice_id' => $i,'product_id' => rand(1,25), 'qty' => rand(6,10), 'bonus' => rand(1,3), 'unit_price' => rand(30,35), 'total_price' => rand(150,300), 'discount' => rand(5,25), 'discount_amount' => rand(5,10),'discount_total' => rand(100,250), 'created_at' => $rand_date]);
            }
        }
    }
}
