<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\Flat;

class ServicesSeeder extends Seeder
{
    public function run(): void
    {
        // Создаем услуги
        $internet = Service::create([
            'name' => 'Интернет',
            'price' => 500.00,
            'description' => 'Высокоскоростной интернет'
        ]);

        $tv = Service::create([
            'name' => 'Кабельное TV',
            'price' => 300.00,
            'description' => 'Пакет каналов'
        ]);

        $cleaning = Service::create([
            'name' => 'Клининг',
            'price' => 2000.00,
            'description' => 'Ежемесячная уборка'
        ]);

        $security = Service::create([
            'name' => 'Охрана',
            'price' => 800.00,
            'description' => 'Круглосуточная охрана'
        ]);

        // Находим квартиры
        $flat1 = Flat::find(1);
        $flat2 = Flat::find(2);
        $flat3 = Flat::find(3);

        // Подключаем услуги к квартирам
        if ($flat1) {
            $flat1->services()->attach($internet->id, ['connected_at' => '2024-01-01']);
            $flat1->services()->attach($tv->id, ['connected_at' => '2024-01-01']);
            $flat1->services()->attach($security->id, ['connected_at' => '2024-01-15']);
        }

        if ($flat2) {
            $flat2->services()->attach($cleaning->id, ['connected_at' => '2024-02-01']);
            $flat2->services()->attach($internet->id, ['connected_at' => '2024-02-01']);
        }

        if ($flat3) {
            $flat3->services()->attach($tv->id, ['connected_at' => '2024-01-20']);
            $flat3->services()->attach($security->id, ['connected_at' => '2024-01-20']);
        }

        echo "✅ Услуги созданы и подключены к квартирам!\n";
    }
}
