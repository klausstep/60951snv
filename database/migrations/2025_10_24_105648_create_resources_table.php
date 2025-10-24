<?php
// database/migrations/[...]_create_resources_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->id(); // id : int (primary key)
            $table->string('name', 50); // name : varchar(50)
            $table->string('measure_of', 20); // MeasureOf : varchar(20)
            $table->decimal('rate_res', 7, 0); // rateRes : decimal(7,0)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('resources');
    }
};
