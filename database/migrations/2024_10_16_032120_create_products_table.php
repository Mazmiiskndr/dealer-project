<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('category_id');
            $table->string('title', 191);
            $table->string('slug', 191)->unique();
            $table->json('tags')->nullable();
            $table->text('summary')->nullable();
            $table->longText('description');
            $table->string('thumbnail_image', 191);
            $table->decimal('price', 15, 2);
            $table->decimal('installment', 15, 2)->nullable();

            // Spesifikasi teknis motor
            // TODO: MASIH PERLU DI PERBAIKI DAN DISESUAIKAN
            $table->string('engine_type', 191);
            $table->integer('engine_capacity');
            $table->string('frame_type', 191);
            $table->string('dimension', 191);
            $table->string('fuel_capacity', 50);

            $table->timestamps();

            // Foreign key untuk kategori produk
            $table->foreign('category_id')
                ->references('id')
                ->on('product_categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
