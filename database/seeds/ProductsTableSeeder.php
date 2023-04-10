<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
        'company_id' => '1',
        'product_name' => 'パイナップル',
        'price' => '500',
        'stock' => '10',
        'comment' => 'これは、パイナップルです。',
        'img_path' => 'painapo.png'
            ],

            [
        'company_id' => '2',
        'product_name' => 'もも',
        'price' => '200',
        'stock' => '30',
        'comment' => 'これは、ももです。',
        'img_path' => 'peach'
            ],

            [
        'company_id' => '3',
        'product_name' => 'キウイ',
        'price' => '100',
        'stock' => '40',
        'comment' => 'これは、キウイです。',
        'img_path' => 'kiuki'
            ],

            [
        'company_id' => '4',
        'product_name' => 'さくらんぼ',
        'price' => '120',
        'stock' => '30',
        'comment' => 'これは、さくらんぼです。',
        'img_path' => 'cerry'
            ],

            [
        'company_id' => '5',
        'product_name' => 'クランベリー',
        'price' => '150',
        'stock' => '20',
        'comment' => 'これは、クランベリーです。',
        'img_path' => 'crunberry'
            ],

            [
        'company_id' => '6',
        'product_name' => 'りんご',
        'price' => '110',
        'stock' => '50',
        'comment' => 'これは、りんごです。',
        'img_path' => 'apple'
            ],
        ]);
    }
}
