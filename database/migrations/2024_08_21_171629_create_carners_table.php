<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('carners', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->float('total_amount');
            $table->integer('installment_count');
            $table->date('first_due_date');
            $table->enum('frequency', ['monthly', 'weekly']);
            $table->float('down_payment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carners');
    }
};
