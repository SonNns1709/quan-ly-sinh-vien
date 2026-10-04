<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sinh_viens', function (Blueprint $table) {
            $table->id();
            $table->string('mssv')->unique();
            $table->string('ho_ten');
            $table->date('ngay_sinh')->nullable();
            $table->string('gioi_tinh')->nullable();
            $table->string('email')->unique();
            $table->string('sdt')->nullable();
            $table->string('dia_chi')->nullable();
            $table->foreignId('lop_hoc_id')->constrained('lop_hocs')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sinh_viens');
    }
};
