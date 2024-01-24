<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Vegetable 1',
            'price' => '100000',
            'desc' => 'This is Vegetable 1'
        ]);

        DB::table('products')->insert([
            'name' => 'Vegetable 2',
            'price' => '200000',
            'desc' => 'This is Vegetable 2'
        ]);

        DB::table('products')->insert([
            'name' => 'Vegetable 3',
            'price' => '300000',
            'desc' => 'This is Vegetable 3'
        ]);

        DB::table('products')->insert([
            'name' => 'Vegetable 4',
            'price' => '400000',
            'desc' => 'This is Vegetable 4'
        ]);

        DB::table('products')->insert([
            'name' => 'Vegetable 5',
            'price' => '500000',
            'desc' => 'This is Vegetable 5'
        ]);
    }
}
