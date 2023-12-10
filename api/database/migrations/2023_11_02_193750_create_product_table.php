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
        Schema::create('product', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('category_id')->constrained('category');
            $table->foreignId('product_category_id')->constrained('product_category');
            $table->string('name',250);
            $table->float('price',8,2,true);
            $table->string('image',150)->nullable()->unique();
            $table->boolean('published')->default('0');
            $table->text('about');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
