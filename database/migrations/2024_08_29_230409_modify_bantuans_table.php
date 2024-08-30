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
    public function up(): void
    {
        Schema::create('bantuans', function (Blueprint $table) {
            $table->id(); // Ini akan menghasilkan kolom id dengan tipe bigint unsigned
            $table->foreignId('id_warga')->constrained('wargas')->onDelete('cascade'); // Pastikan tipe data sesuai
            $table->decimal('total_bantuan', 15, 2);
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('bantuans');
    }
};
