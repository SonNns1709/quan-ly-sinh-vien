<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LopHoc extends Model
{
    protected $fillable = ['ma_lop', 'ten_lop', 'khoa'];

    public function sinhViens(): HasMany
    {
        return $this->hasMany(SinhVien::class);
    }
}
