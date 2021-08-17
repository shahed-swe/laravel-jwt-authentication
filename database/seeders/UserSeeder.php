<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $seeder = DB::table('users');
        $seeder->insert([
            'uid'=> time().rand(100000,999999),
            'name'=>'Md Shahed Talukder',
            'email'=> 'shahedtalukder51@gmail.com',
            'phone_no'=> '01762178238',
            'password'=> Hash::make("srsas1234.?dfin")
        ]);
        $seeder->insert([
            'uid'=> time().rand(100000,999999),
            'name'=>'Md Rafi Hasan',
            'email'=> 'rafik8785@gmail.com',
            'phone_no'=> '01762178239',
            'password'=> Hash::make("srsas1234.?dfin")
        ]);
    }
}
