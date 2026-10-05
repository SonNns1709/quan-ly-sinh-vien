<?php

namespace Tests\Feature;

use App\Models\LopHoc;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SinhVienTest extends TestCase
{
    use RefreshDatabase;

    public function test_trang_danh_sach_sinh_vien_tra_ve_status_200(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get('/sinh-vien')
            ->assertStatus(200);
    }

    public function test_them_sinh_vien_moi_thanh_cong(): void
    {
        $user = User::factory()->create();
        $lop = LopHoc::create(['ma_lop' => 'TEST01', 'ten_lop' => 'Lop Test']);

        $this->actingAs($user)->post('/sinh-vien', [
            'mssv' => 'SV001',
            'ho_ten' => 'Nguyen Van A',
            'email' => 'nguyenvana@example.com',
            'lop_hoc_id' => $lop->id,
        ]);

        $this->assertDatabaseHas('sinh_viens', ['mssv' => 'SV001']);
    }
}
