<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(UsersTableSeeder::class);

        DB::table('vendors')->insert([
            ['name' => 'Fazal Rehman Fabrics', 'display_name'=>'v1'],
            ['name' => 'Zaman textile milld ltd', 'display_name'=>'v2'],
            ['name' => 'SWML', 'display_name'=>'v3'],
        ]);
        DB::table('customers')->insert([
            ['name' => 'Gallus spa', 'display_name'=>'c1'],
            ['name' => 'Centro del tessuto', 'display_name'=>'c2'],
            ['name' => 'Landini SPA', 'display_name'=>'c3'],
        ]);
        DB::table('product_categories')->insert([
            ['name' => 'Clothing & Fashion'],
            ['name' => 'Bed sheet'],
            ['name' => 'SPA'],
            ['name' => 'Institutional Articles'],
        ]);
        DB::table('products')->insert([
            ['category_id'=> 3, 'name' => 'Towel', 'code'=>'P01'],
            ['category_id'=> 4, 'name' => 'Doctor Coat', 'code'=>'P02'],
            ['category_id'=> 4, 'name' => 'Labour Shirt', 'code'=>'P03'],
            ['category_id'=> 2, 'name' => 'Bed Sheet', 'code'=>'P04'],
        ]);
        DB::table('orders')->insert([
            [
                'customer_id' => 2,
                'vendor_id' => 3,
                'order_no' => 'SO-102',
                'invoice_no' => 'INV-562',
                'customer_po_no' => 'PO-963',
                'order_date' => '2019-12-20',
                'due_date' => '2019-12-20',
                'shipment_date' => '2020-01-01',
                'notes' => 'some notes',
                'currency' => 'EUR',
                'created_by' => 1,
                'net_total' => 10000,
            ],
            [
                'customer_id' => 1,
                'vendor_id' => 2,
                'order_no' => 'SO-100',
                'invoice_no' => 'INV-852',
                'customer_po_no' => 'PO-102',
                'order_date' => '2019-12-20',
                'due_date' => '2019-12-20',
                'shipment_date' => '2020-01-01',
                'notes' => 'some notes',
                'currency' => 'USD',
                'created_by' => 1,
                'net_total' => 103000,
            ]
        ]);
        DB::table('order_items')->insert([
            [
                'order_id' => 1,
                'product_id' => 1,
                'foreigner_id' => 1,
                'description' => 'white and red',
                'qty' => '1000',
                'rate' => '10',
                'commission' => '1',
                'foreigner_commission' => '2',
                'packing' => 'box',
                'lc_days' => '10',
                'piece_length' => '90% 350 meters up 10% 50-349 meters',
                'status' => 'Contract',
            ],
            [
                'order_id' => 2,
                'product_id' => 2,
                'foreigner_id' => 2,
                'description' => 'white and red',
                'qty' => '5000',
                'rate' => '15',
                'commission' => '1.75',
                'foreigner_commission' => '2.25',
                'packing' => 'box',
                'lc_days' => '15',
                'piece_length' => '90% 350 meters up 10% 50-349 meters',
                'status' => 'Contract',
            ],
            [
                'order_id' => 2,
                'product_id' => 3,
                'foreigner_id' => 3,
                'description' => 'white and red',
                'qty' => '4000',
                'rate' => '7',
                'commission' => '1.25',
                'foreigner_commission' => '2.05',
                'packing' => 'box',
                'lc_days' => '5',
                'piece_length' => '90% 350 meters up 10% 50-349 meters',
                'status' => 'Contract',
            ]
        ]);
    }
}
