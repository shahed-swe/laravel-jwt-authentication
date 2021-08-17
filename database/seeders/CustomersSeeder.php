<?php

namespace Database\Seeders;

use App\Models\Customers;
use App\Models\User;
use App\Models\Dokan;
use Illuminate\Database\Seeder;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $userfirst = User::get('uid')->first();
        $dokan_first = Dokan::get('uid')->first();

        Customers::insert([
            [
                'uid'=> time().rand(100000,999999),
                "user_uid" => $userfirst->uid,
                "dokan_uid" => $dokan_first->uid,
            ]
        ]);

    }
}
