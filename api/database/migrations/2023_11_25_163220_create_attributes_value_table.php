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
        Schema::create('attributes_value', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('product_id')->constrained('product');
            $table->foreignId('product_category_id')->constrained('product_category');
            $table->foreignId('attribute_id')->constrained('attributes');
            $table->string('value');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attributes_value');
    }
};
