<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SinhVien extends Model
{
    protected $fillable = [
        'mssv', 'ho_ten', 'ngay_sinh', 'gioi_tinh', 'email', 'sdt', 'dia_chi', 'lop_hoc_id', 'anh_dai_dien'
    ];

    public function lopHoc(): BelongsTo
    {
        return $this->belongsTo(LopHoc::class);
    }
}
