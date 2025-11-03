<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\House;
use App\Models\Flat;
use App\Models\Resource;
use App\Models\Counter;
use App\Models\Period;
use App\Models\Value;
use App\Models\Payment;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Отключаем проверку внешних ключей
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // Очищаем таблицы в правильном порядке (сначала дочерние, потом родительские)
        Payment::truncate();
        Value::truncate();
        Counter::truncate();
        Flat::truncate();
        Period::truncate();
        Resource::truncate();
        House::truncate();

        // Включаем проверку обратно
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // Создаем дома
        $house1 = House::create([
            'name' => 'ЖК Центральный',
            'address' => 'ул. Ленина, д. 1'
        ]);

        $house2 = House::create([
            'name' => 'ЖК Садовый',
            'address' => 'ул. Садовая, д. 15'
        ]);

        // Создаем ресурсы
        $water = Resource::create([
            'name' => 'Вода',
            'measure_of' => 'м³',
            'rate_res' => 45.00
        ]);

        $electricity = Resource::create([
            'name' => 'Электричество',
            'measure_of' => 'кВт/ч',
            'rate_res' => 5.50
        ]);

        $gas = Resource::create([
            'name' => 'Газ',
            'measure_of' => 'м³',
            'rate_res' => 8.30
        ]);

        // Создаем квартиры для первого дома
        $flat1 = Flat::create([
            'id_house' => $house1->id,
            'area' => 65.5,
            'residents' => 3,
            'number' => 45
        ]);

        $flat2 = Flat::create([
            'id_house' => $house1->id,
            'area' => 48.2,
            'residents' => 2,
            'number' => 46
        ]);

        // Создаем квартиры для второго дома
        $flat3 = Flat::create([
            'id_house' => $house2->id,
            'area' => 72.1,
            'residents' => 4,
            'number' => 12
        ]);

        $flat4 = Flat::create([
            'id_house' => $house2->id,
            'area' => 35.8,
            'residents' => 1,
            'number' => 13
        ]);

        // Создаем счетчики
        Counter::create(['id_flat' => $flat1->id, 'id_res' => $water->id]);
        Counter::create(['id_flat' => $flat1->id, 'id_res' => $electricity->id]);
        Counter::create(['id_flat' => $flat2->id, 'id_res' => $water->id]);
        Counter::create(['id_flat' => $flat3->id, 'id_res' => $electricity->id]);
        Counter::create(['id_flat' => $flat4->id, 'id_res' => $gas->id]);

        // Создаем периоды
        $period1 = Period::create([
            'name' => 'Январь 2024',
            'sequence' => 1,
            'date_beg' => '2024-01-01',
            'date_end' => '2024-01-31'
        ]);

        $period2 = Period::create([
            'name' => 'Февраль 2024',
            'sequence' => 2,
            'date_beg' => '2024-02-01',
            'date_end' => '2024-02-29'
        ]);

        echo "✅ Тестовые данные созданы успешно!\n";
    }
}
