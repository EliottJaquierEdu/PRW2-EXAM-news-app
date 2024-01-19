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
        Schema::create('purchase_proposal', function (Blueprint $table) {
            $table->id();
            //TODO : Define whether bids go beyond 9'999'999.99 CHF
            $table->decimal("amount",9, 2);
            $table->string('email', 255);
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_proposal');
    }
};
