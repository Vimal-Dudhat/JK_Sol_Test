<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate(['user_name'=>"vimal",'name'=>'Vimal Dudhat','email'=>'vimal@gmail.com','password'=>'1234','role'=>'1']);
    }
}
