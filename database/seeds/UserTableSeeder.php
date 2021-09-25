<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' =>'Jhon Doe',
            'email' =>'jhondoe@gmail.com',
            'phone' =>+8801775433222,
            'country'=>'USA',
            'gender' => 'Male',
            'password' => bcrypt('12345678'),
        ]);

        DB::table('users')->insert([
            'name' =>'Rokibul Alom',
            'email' =>'rokibul@gmail.com',
            'phone' =>+88017754332111,
            'country'=>'Franch',
            'gender' => 'Male',
            'password' => bcrypt('12345678'),
        ]);

        DB::table('users')->insert([
            'name' =>'Smith',
            'email' =>'smith@gmail.com',
            'phone' =>+88017754332555,
            'country'=>'Canada',
            'gender' => 'Male',
            'password' => bcrypt('12345678'),
        ]);
        
    }
}
