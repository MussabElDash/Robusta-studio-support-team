<?php

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('customers')->delete();
        $customers = [
            [
                'twitter_id' => '9823475',
                'creator_id' => 1,
                'name' => 'mohamed',
            ], [
                'twitter_id' => '9823474',
                'creator_id' => 1,
                'name' => 'Ahmed',

            ]
        ];

        foreach ($customers as $customer) {
            Customer::create($customer);
        }
    }
}
