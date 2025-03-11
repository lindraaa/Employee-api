<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {    
         DB::table('users')->insert([
            'name'=>'christian',
            'email'=>'christian@gmail.com',
            'password'=>Hash::make('christian@')

         ]);
         //php artisan make:seeder UsersTableSeeder
         //php artisan db:seed --class=UsersTableSeeder
    }
}
