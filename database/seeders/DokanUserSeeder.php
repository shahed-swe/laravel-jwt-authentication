<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Dokan;

class DokanUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_id_first = User::get('uid')->first();
        $user_id_last = User::get('uid')->last();

        $dokan_id_first = Dokan::get('uid')->first();
        $dokan_id_last = Dokan::get('uid')->last();

        $dokan_user = DB::table('dokan_users');
        $dokan_user->insert([
            'uid'=> time().rand(100000,999999),
            'user_uid' => $user_id_first->uid,
            'dokan_uid'=> $dokan_id_first->uid,
            'role'=> 'admin',
            'created_by' => $user_id_last->uid,
        ]);
        $dokan_user->insert([
            'uid'=> time().rand(100000,999999),
            'user_uid' => $user_id_last->uid,
            'dokan_uid'=> $dokan_id_last->uid,
            'role'=> 'admin',
            'created_by' => $user_id_first->uid,
        ]);
    }
}
