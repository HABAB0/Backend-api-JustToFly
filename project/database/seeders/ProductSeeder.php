<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $flights = [
            [
                'name'        => 'Рейс SU-100 Москва — Сочи',
                'description' => 'Аэрофлот, вылет 08:00, эконом-класс, багаж 10 кг включён',
                'order_price'       => 8500,
            ],
            [
                'name'        => 'Рейс S7-202 Москва — Санкт-Петербург',
                'description' => 'S7 Airlines, вылет 10:30, эконом-класс, ручная кладь',
                'order_price'       => 4200,
            ],
            [
                'name'        => 'Рейс DP-305 Санкт-Петербург — Калининград',
                'description' => 'Победа, вылет 06:15, тариф Стандарт, без багажа',
                'order_price'       => 3800,
            ],
            [
                'name'        => 'Рейс U6-412 Екатеринбург — Москва',
                'description' => 'Уральские авиалинии, вылет 14:40, эконом-класс',
                'order_price'       => 5100,
            ],
            [
                'name'        => 'Рейс SU-550 Москва — Казань',
                'description' => 'Аэрофлот, вылет 18:20, эконом-класс, питание на борту',
                'order_price'       => 4500,
            ],
            [
                'name'        => 'Рейс S7-601 Новосибирск — Москва',
                'description' => 'S7 Airlines, вылет 09:00, эконом-класс, багаж 23 кг',
                'order_price'       => 9200,
            ],
            [
                'name'        => 'Рейс DP-715 Москва — Минеральные Воды',
                'description' => 'Победа, вылет 11:45, тариф Плюс, багаж 10 кг',
                'order_price'       => 6300,
            ],
            [
                'name'        => 'Рейс U6-820 Санкт-Петербург — Сочи',
                'description' => 'Уральские авиалинии, вылет 07:30, эконом-класс',
                'order_price'       => 7100,
            ],
            [
                'name'        => 'Рейс SU-905 Казань — Калининград',
                'description' => 'Аэрофлот, вылет 16:10, эконом-класс, пересадка в Москве',
                'order_price'       => 8900,
            ],
            [
                'name'        => 'Рейс S7-112 Екатеринбург — Сочи',
                'description' => 'S7 Airlines, вылет 13:00, эконом-класс, багаж включён',
                'order_price'       => 7800,
            ],
        ];

        Product::insert($flights);
    }
}
