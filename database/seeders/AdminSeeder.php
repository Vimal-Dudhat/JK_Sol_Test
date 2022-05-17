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
        User::truncate();
        
        $user = new User();
        $user->user_name = "vimal";
        $user->name = "Vimal Dudhat";
        $user->email = "vimaldudhat@gmail.com";
        $user->role = 1;
        // $user->password = Hash::make('1234');
        $user->password = '1234';
        $user->save();
    }
}
