<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            [
                'company_name' => '北条',
            'street_address' => '伊豆の国市中條',
            'representative_name' => '北条時政'
            ],

            [
                'company_name' => '三浦',
            'street_address' => '横須賀市井笠町',
            'representative_name' => '三浦義澄'
            ],

            [
                'company_name' => '和田',
            'street_address' => '三浦市初声町和田',
            'representative_name' => '和田義盛'
            ],

            [
                'company_name' => '八田',
            'street_address' => '常睦国新治郡八田',
            'representative_name' => '八田知家'
            ],

            [
                'company_name' => '畠山',
            'street_address' => '比企郡嵐山町大字大字菅谷',
            'representative_name' => '畠山重忠'
            ],

            [
                'company_name' => '梶原',
            'street_address' => '高座郡寒川町一之宮',
            'representative_name' => '梶原景時'
            ],
        ]);
    }
}
