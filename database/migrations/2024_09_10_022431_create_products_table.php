<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama produk
            $table->decimal('price', 8, 2); // Harga produk
            $table->unsignedBigInteger('category_id'); // Relasi ke categories
            $table->unsignedBigInteger('user_id'); // Relasi ke users
            $table->text('description')->nullable(); // Deskripsi produk
            $table->timestamps();

            // Foreign key relasi ke categories dan users
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
