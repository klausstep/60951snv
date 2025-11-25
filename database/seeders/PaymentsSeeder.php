<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment;
use App\Models\Flat;
use App\Models\Period;
use Carbon\Carbon;

class PaymentsSeeder extends Seeder
{
    public function run(): void
    {
        Payment::truncate();
        echo "✅ Таблица платежей очищена\n";

        $flats = Flat::all();

        // Создаем 12 периодов (целый год!)
        $periods = [];
        for ($i = 1; $i <= 12; $i++) {
            $date = Carbon::now()->addMonths($i);
            $periodName = $date->locale('ru')->translatedFormat('F Y');
            $dateBeg = $date->copy()->startOfMonth();
            $dateEnd = $date->copy()->endOfMonth();

            $period = Period::firstOrCreate([
                'name' => $periodName
            ], [
                'sequence' => $i,
                'date_beg' => $dateBeg,
                'date_end' => $dateEnd
            ]);
            $periods[] = $period;
        }

        $createdCount = 0;

        // Создаем платежи для ВСЕХ комбинаций
        foreach ($flats as $flat) {
            foreach ($periods as $period) {
                Payment::create([
                    'id_flat' => $flat->id,
                    'id_period' => $period->id,
                    'sum' => rand(100000, 600000) / 100
                ]);
                $createdCount++;
            }
        }

        echo "✅ Создано 12 периодов\n";
        echo "✅ Добавлено $createdCount новых платежей!\n";
        echo "📊 Всего платежей в базе: " . Payment::count() . "\n";
    }
}
