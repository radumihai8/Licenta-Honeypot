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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->integer('category_id');
            $table->string('image')->nullable();
            $table->integer('page_count')->nullable();
            $table->string('publisher')->nullable();
            $table->string('published_date')->nullable();
            $table->string('author_list')->nullable();
            $table->string('isbn')->nullable();
            $table->string('isbn13')->nullable();
            $table->decimal('price', 8, 2);
            $table->boolean('featured')->default(false);
            $table->integer('views')->default(0);
            $table->integer('sales')->default(0);
            $table->float('rating')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
