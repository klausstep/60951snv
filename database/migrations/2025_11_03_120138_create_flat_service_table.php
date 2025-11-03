<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('flat_service', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('flat_id');
            $table->unsignedBigInteger('service_id');
            $table->date('connected_at')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->foreign('flat_id')->references('id')->on('flats')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');

            // Уникальная пара квартира-услуга
            $table->unique(['flat_id', 'service_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('flat_service');
    }
};
