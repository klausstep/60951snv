<?php
// database/migrations/[...]_create_counters_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('counters', function (Blueprint $table) {
            $table->id(); // id : int (primary key)

            // Внешний ключ на flats
            $table->unsignedBigInteger('id_flat'); // id_flat : int
            $table->foreign('id_flat')
                ->references('id')
                ->on('flats')
                ->onDelete('cascade');

            // Внешний ключ на resources
            $table->unsignedBigInteger('id_res'); // id_res : int
            $table->foreign('id_res')
                ->references('id')
                ->on('resources')
                ->onDelete('cascade');

            $table->timestamps();

            // Составной индекс для обеспечения уникальности счетчика в квартире
            $table->unique(['id_flat', 'id_res']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('counters');
    }
};
