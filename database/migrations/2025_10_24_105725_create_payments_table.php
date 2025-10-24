<?php
// database/migrations/[...]_create_payments_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id(); // id : int (primary key)

            // Внешний ключ на flats
            $table->unsignedBigInteger('id_flat'); // id_flat : int
            $table->foreign('id_flat')
                ->references('id')
                ->on('flats')
                ->onDelete('cascade');

            // Внешний ключ на periods
            $table->unsignedBigInteger('id_period'); // id_period : int
            $table->foreign('id_period')
                ->references('id')
                ->on('periods')
                ->onDelete('cascade');

            $table->decimal('sum', 20, 0); // sum : decimal(20,0)

            $table->timestamps();

            // Уникальность платежа для квартиры в определенный период
            $table->unique(['id_flat', 'id_period']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
