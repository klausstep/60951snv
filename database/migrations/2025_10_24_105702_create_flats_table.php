<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Log;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('flats')) {
            Schema::create('flats', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('id_house');
                $table->decimal('area', 7, 0);
                $table->integer('residents');
                $table->integer('number');
                $table->timestamps();

                $table->foreign('id_house')
                    ->references('id')
                    ->on('houses')
                    ->onDelete('cascade');

                $table->index('id_house');
            });

            // Логируем вместо info()
            Log::info('Table flats created successfully.');
        } else {
            Log::info('Table flats already exists. Skipping creation.');
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('flats');
    }
};
