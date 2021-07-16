<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shipments')->insert([
            [
                'shipment_method' => 'пункт самовывоза (Москва)'
            ],

            [
                'shipment_method' => 'курьер (Москва и Подмосковье)'
            ],

            [
                'shipment_method' => 'транспортная компания (другие города России и СНГ)'
            ],
        ]);
    }
}
