<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('sinh_viens', function (Blueprint $table) {
            $table->string('anh_dai_dien')->nullable()->after('dia_chi');
        });
    }

    public function down(): void
    {
        Schema::table('sinh_viens', function (Blueprint $table) {
            $table->dropColumn('anh_dai_dien');
        });
    }
};
