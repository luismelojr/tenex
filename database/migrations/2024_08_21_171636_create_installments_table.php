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
        Schema::create('installments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('carner_id')->constrained('carners')->cascadeOnDelete();
            $table->date('due_date');
            $table->float('amount');
            $table->integer('number');
            $table->boolean('down_payment')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('installments');
    }
};
