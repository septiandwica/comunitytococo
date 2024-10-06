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
        Schema::create('form_data', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama pembeli
            $table->string('phone'); // Nomor telepon pembeli
            $table->string('email'); // Email pembeli
            $table->integer('age'); // Usia pembeli
            $table->enum('gender', ['male', 'female']); // Jenis kelamin
            $table->enum('customer_type', ['single', 'bulk']); // Tipe pembelian: satuan atau grosir

            // Kolom untuk pembelian satuan
            $table->string('product_buy')->nullable(); // Produk yang dibeli (hanya berlaku untuk pembelian satuan)

            // Kolom untuk bulk order
            $table->integer('bulk_quantity')->nullable(); // Jumlah yang dibeli (hanya berlaku untuk bulk order)

            // Kolom umum lainnya
            $table->json('product_try'); // Produk yang ingin dicoba selanjutnya (disimpan dalam format JSON)
            $table->text('message')->nullable(); // Pesan dari pelanggan
            $table->enum('frequency', ['weekly', 'monthly', 'new-product']); // Frekuensi komunikasi yang diinginkan
            $table->timestamps(); // Waktu created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_data');
    }
};
