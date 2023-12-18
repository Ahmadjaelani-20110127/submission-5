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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pegawai', 100);
            $table->string('no_telp', 15)->nullable();
            $table->string('email', 32)->nullable();
            $table->string('nik', 32)->nullable();
            $table->timestamp('tgl_lahir')->nullable();
            $table->text('alamat')->nullable();
            $table->boolean('is_active')->nullable()->default(false);
            $table->boolean('is_deleted')->nullable()->default(false);
            $table->tinyInteger('created_by')->nullable();
            $table->tinyInteger('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};
