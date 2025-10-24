<?php
// database/migrations/[...]_create_periods_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('periods', function (Blueprint $table) {
            $table->id(); // id : int (primary key)
            $table->string('name', 20); // name : varchar(20)
            $table->integer('sequence'); // Sequence : int
            $table->date('date_beg'); // DateBeg : date
            $table->date('date_end'); // DateEnd : date
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('periods');
    }
};
