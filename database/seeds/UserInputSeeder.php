<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserInputSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('userinputs')->insert([
            'user_id' =>1,
            'input_values' =>'11, 10, 9, 7, 5, 1, 0',
            'timestamp'=> '2021-01-01'
            //'timestamp'=> Carbon::now()->format('Y-m-d')
        ]);

        DB::table('userinputs')->insert([
            'user_id' =>1,
            'input_values' =>'13, 11, 10, 7, 5, 2, 1',
            'timestamp'=> '2021-01-02'
        ]);
        DB::table('userinputs')->insert([
            'user_id' =>1,
            'input_values' =>'12, 10, 9, 7, 5, 2, 1',
            'timestamp'=> '2021-01-03'
        ]);

        DB::table('userinputs')->insert([
            'user_id' =>2,
            'input_values' =>'11, 10, 9, 7, 5, 1, 0',
            'timestamp'=> '2021-01-01'
        ]);

        DB::table('userinputs')->insert([
            'user_id' =>2,
            'input_values' =>'13, 11, 10, 7, 5, 2, 1',
            'timestamp'=> '2021-01-02'
        ]);
        DB::table('userinputs')->insert([
            'user_id' =>2,
            'input_values' =>'12, 10, 9, 7, 5, 2, 1',
            'timestamp'=> '2021-01-03'
        ]);

        DB::table('userinputs')->insert([
            'user_id' =>3,
            'input_values' =>'11, 10, 9, 7, 5, 1, 0',
            'timestamp'=> '2021-01-01'
        ]);

        DB::table('userinputs')->insert([
            'user_id' =>3,
            'input_values' =>'13, 11, 10, 7, 5, 2, 1',
            'timestamp'=> '2021-01-02'
        ]);
        DB::table('userinputs')->insert([
            'user_id' =>3,
            'input_values' =>'12, 10, 9, 7, 5, 2, 1',
            'timestamp'=> '2021-01-03'
        ]);

        
    }
}
