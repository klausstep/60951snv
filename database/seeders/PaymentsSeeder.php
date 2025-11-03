<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment;
use App\Models\Flat;
use App\Models\Period;

class PaymentsSeeder extends Seeder
{
    public function run(): void
    {
        $flats = Flat::all();
        $periods = Period::all();

        $createdCount = 0;

        foreach ($flats as $flat) {
            foreach ($periods as $period) {
                // Проверяем, есть ли уже платеж для этой квартиры за этот период
                $existingPayment = Payment::where('id_flat', $flat->id)
                    ->where('id_period', $period->id)
                    ->exists();

                if (!$existingPayment) {
                    // Случайная сумма платежа от 1500 до 5000
                    Payment::create([
                        'id_flat' => $flat->id,
                        'id_period' => $period->id,
                        'sum' => rand(150000, 500000) / 100 // в формате decimal
                    ]);
                    $createdCount++;
                }
            }
        }

        echo "✅ Добавлено $createdCount новых платежей!\n";
    }
}
