<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class FeaturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //inserting data
        $seeder=DB::table('features');
        $seeder->insert(
            [
                'uid'=> time().rand(100000,999999),
                'title'=> 'Accounting',
                'description'=>Str::random(30),
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ]);
        $seeder->insert(
            [
                'uid'=> time().rand(100000,999999),
                'title'=> 'Customer Management',
                'description'=>Str::random(30),
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ]);
        $seeder->insert(
            [
                'uid'=> time().rand(100000,999999),
                'title'=> 'Due Management',
                'description'=>Str::random(30),
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ]);
        $seeder->insert(
            [
                'uid'=> time().rand(100000,999999),
                'title'=> 'E-Commerce',
                'description'=>Str::random(30),
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ]);
        $seeder->insert(
            [
                'uid'=> time().rand(100000,999999),
                'title'=> 'Employee Management',
                'description'=>Str::random(30),
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ]);
        $seeder->insert(
            [
                'uid'=> time().rand(100000,999999),
                'title'=> 'Inventory Management',
                'description'=>Str::random(30),
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ]);
        $seeder->insert(
            [
                'uid'=> time().rand(100000,999999),
                'title'=> 'IMEI/Seprate Code Management',
                'description'=>Str::random(30),
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ]);
        $seeder->insert(
            [
                'uid'=> time().rand(100000,999999),
                'title'=> 'Installment Management',
                'description'=>Str::random(30),
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ]);
        $seeder->insert(
            [
                'uid'=> time().rand(100000,999999),
                'title'=> 'Messaging/Messanger',
                'description'=>Str::random(30),
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ]);
        $seeder->insert(
            [
                'uid'=> time().rand(100000,999999),
                'title'=> 'Mechanic & Servicing',
                'description'=>Str::random(30),
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ]);
        $seeder->insert(
            [
                'uid'=> time().rand(100000,999999),
                'title'=> 'POS',
                'description'=>Str::random(30),
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ]);
        $seeder->insert(
            [
                'uid'=> time().rand(100000,999999),
                'title'=> 'Product Return & Replacement',
                'description'=>Str::random(30),
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ]);
        $seeder->insert(
            [
                'uid'=> time().rand(100000,999999),
                'title'=> 'Reports',
                'description'=>Str::random(30),
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ]);
        $seeder->insert(
            [
                'uid'=> time().rand(100000,999999),
                'title'=> 'SMS',
                'description'=>Str::random(30),
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
            ]);
    }
}
