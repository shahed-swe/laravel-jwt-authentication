<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ShopType;
use App\Models\User;

class DokanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shoptypefirst = ShopType::get('uid')->first();
        $shoptypelast = ShopType::get('uid')->last();
        $userfirst = User::get('uid')->first();
        $userlast = User::get('uid')->last();

        $dokans = DB::table('dokans');
        $dokans->insert([
            'uid'=> time().rand(100000,999999),
            'title' => 'Amar Notun Dokan',
            'shop_type' => $shoptypefirst->uid,
            'created_by' => $userfirst->uid,
        ]);
        $dokans->insert([
            'uid'=> time().rand(100000,999999),
            'title' => 'Amar Notun Dokan Another',
            'shop_type' => $shoptypelast->uid,
            'created_by' => $userlast->uid,
        ]);
    }
}
