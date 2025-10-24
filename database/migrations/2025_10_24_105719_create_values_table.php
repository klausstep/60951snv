<?php
// database/migrations/[...]_create_values_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('values', function (Blueprint $table) {
            $table->id(); // id : int (primary key)

            // Внешний ключ на counters
            $table->unsignedBigInteger('id_counter'); // id_counter : int
            $table->foreign('id_counter')
                ->references('id')
                ->on('counters')
                ->onDelete('cascade');

            // Внешний ключ на periods
            $table->unsignedBigInteger('id_period'); // id_period : int
            $table->foreign('id_period')
                ->references('id')
                ->on('periods')
                ->onDelete('cascade');

            $table->integer('value'); // value : int

            $table->timestamps();

            // Уникальность показаний для счетчика в определенный период
            $table->unique(['id_counter', 'id_period']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('values');
    }
};
