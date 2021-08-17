<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ShopTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seed=DB::table('shop_types');
        $seed->insert([
            'uid'=> time().rand(100000,999999),
            'title'=>"Babies Toys Shop",
            'description'=>Str::random(10),
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $seed->insert([
            'uid'=> time().rand(100000,999999),
            'title'=>"Bekary & Sweets",
            'description'=>Str::random(10),
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $seed->insert([
            'uid'=> time().rand(100000,999999),
            'title'=>"Cloth Shop",
            'description'=>Str::random(10),
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $seed->insert([
            'uid'=> time().rand(100000,999999),
            'title'=>"Computer Shop",
            'description'=>Str::random(10),
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $seed->insert([
            'uid'=> time().rand(100000,999999),
            'title'=>"Construction Products",
            'description'=>Str::random(10),
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $seed->insert([
            'uid'=> time().rand(100000,999999),
            'title'=>"Cosmetics Shop",
            'description'=>Str::random(10),
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $seed->insert([
            'uid'=> time().rand(100000,999999),
            'title'=>"Electronics Shop",
            'description'=>Str::random(10),
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $seed->insert([
            'uid'=> time().rand(100000,999999),
            'title'=>"Electronics Showroom",
            'description'=>Str::random(10),
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $seed->insert([
            'uid'=> time().rand(100000,999999),
            'title'=>"Fittings & Sanitary",
            'description'=>Str::random(10),
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $seed->insert([
            'uid'=> time().rand(100000,999999),
            'title'=>"Furniture Shop",
            'description'=>Str::random(10),
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $seed->insert([
            'uid'=> time().rand(100000,999999),
            'title'=>"Gift Shop",
            'description'=>Str::random(10),
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $seed->insert([
            'uid'=> time().rand(100000,999999),
            'title'=>"Glass Shop",
            'description'=>Str::random(10),
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $seed->insert([
            'uid'=> time().rand(100000,999999),
            'title'=>"Grocery Store",
            'description'=>Str::random(10),
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $seed->insert([
            'uid'=> time().rand(100000,999999),
            'title'=>"Home Applicance",
            'description'=>Str::random(10),
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $seed->insert([
            'uid'=> time().rand(100000,999999),
            'title'=>"Jewellery",
            'description'=>Str::random(10),
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $seed->insert([
            'uid'=> time().rand(100000,999999),
            'title'=>"Kitchenware",
            'description'=>Str::random(10),
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $seed->insert([
            'uid'=> time().rand(100000,999999),
            'title'=>"Library",
            'description'=>Str::random(10),
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $seed->insert([
            'uid'=> time().rand(100000,999999),
            'title'=>"Mobile Servicing",
            'description'=>Str::random(10),
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $seed->insert([
            'uid'=> time().rand(100000,999999),
            'title'=>"Mobile Shop",
            'description'=>Str::random(10),
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $seed->insert([
            'uid'=> time().rand(100000,999999),
            'title'=>"Paint & Hardware Shop",
            'description'=>Str::random(10),
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $seed->insert([
            'uid'=> time().rand(100000,999999),
            'title'=>"Pharmacy",
            'description'=>Str::random(10),
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $seed->insert([
            'uid'=> time().rand(100000,999999),
            'title'=>"Resturant",
            'description'=>Str::random(10),
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $seed->insert([
            'uid'=> time().rand(100000,999999),
            'title'=>"Shoe Shop",
            'description'=>Str::random(10),
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $seed->insert([
            'uid'=> time().rand(100000,999999),
            'title'=>"Tailor Shop",
            'description'=>Str::random(10),
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $seed->insert([
            'uid'=> time().rand(100000,999999),
            'title'=>"Home Appliance",
            'description'=>Str::random(10),
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $seed->insert([
            'uid'=> time().rand(100000,999999),
            'title'=>"Watch Shop",
            'description'=>Str::random(10),
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $seed->insert([
            'uid'=> time().rand(100000,999999),
            'title'=>"Wholesale",
            'description'=>Str::random(10),
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
