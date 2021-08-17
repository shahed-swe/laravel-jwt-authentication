<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Dokan;
use App\Models\Mechanic;

class MechanicTableSeeder extends Seeder
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

        Mechanic::insert([
            [
                'uid'=> time().rand(100000,999999),
                "dokan_uid" => $dokan_first->uid,
                "name" => "mechanic name",
                "email" => "mechanic@gmail.com",
                "phone" => "01663473434",
                "mechanic_percentage" => 50,
                "created_by" => $userfirst->uid
            ]
        ]);
    }
}
