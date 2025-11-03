<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Counter;
use App\Models\Period;
use App\Models\Value;

class CounterValuesSeeder extends Seeder
{
    public function run(): void
    {
        // Находим существующие периоды
        $period1 = Period::where('name', 'Январь 2024')->first();
        $period2 = Period::where('name', 'Февраль 2024')->first();

        // Если периодов нет - создаем
        if (!$period1) {
            $period1 = Period::create([
                'name' => 'Январь 2024',
                'sequence' => 1,
                'date_beg' => '2024-01-01',
                'date_end' => '2024-01-31'
            ]);
        }

        if (!$period2) {
            $period2 = Period::create([
                'name' => 'Февраль 2024',
                'sequence' => 2,
                'date_beg' => '2024-02-01',
                'date_end' => '2024-02-29'
            ]);
        }

        // Получаем все счетчики
        $counters = Counter::with(['resource'])->get();

        $createdCount = 0;

        foreach ($counters as $counter) {
            // Проверяем, есть ли уже показания для этого счетчика за январь
            $existingJanuary = Value::where('id_counter', $counter->id)
                ->where('id_period', $period1->id)
                ->exists();

            if (!$existingJanuary) {
                // Показания за январь
                Value::create([
                    'id_counter' => $counter->id,
                    'id_period' => $period1->id,
                    'value' => $this->getBaseValue($counter->resource->name)
                ]);
                $createdCount++;
            }

            // Проверяем, есть ли уже показания для этого счетчика за февраль
            $existingFebruary = Value::where('id_counter', $counter->id)
                ->where('id_period', $period2->id)
                ->exists();

            if (!$existingFebruary) {
                // Показания за февраль
                Value::create([
                    'id_counter' => $counter->id,
                    'id_period' => $period2->id,
                    'value' => $this->getBaseValue($counter->resource->name) + rand(5, 20)
                ]);
                $createdCount++;
            }
        }

        echo "✅ Добавлено $createdCount новых показаний счетчиков!\n";
    }

    private function getBaseValue($resourceName)
    {
        // Базовые значения для разных типов ресурсов
        return match($resourceName) {
            'Вода' => rand(100, 300),        // м³
            'Электричество' => rand(500, 1000), // кВт/ч
            'Газ' => rand(50, 150),          // м³
            default => rand(100, 500)
        };
    }
}
