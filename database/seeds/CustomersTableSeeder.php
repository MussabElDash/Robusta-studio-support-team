<?php

use Illuminate\Database\Seeder;
use \App\Models\Customer;

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
                'slug' => 'mohamedx'
            ], [
                'twitter_id' => '9823474',
                'creator_id' => 1,
                'name' => 'mohamed',
                'slug' => 'mohamedy'

            ]
        ];

        foreach ($customers as $customer) {
            Customer::create($customer);
        }
    }
}
