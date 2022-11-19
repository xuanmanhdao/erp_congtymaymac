<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    use HasFactory;

    protected $table = 'nhanvien';

    public $incrementing = false;

    public $timestamps = false;

    protected $primaryKey = 'MaNhanVien';

    protected $keyType = 'string';

    protected $fillable = [
        'MaNhanVien',
        'TenNhanVien',
        'NgaySinh',
        'CanCuocCongDan',
        'GioiTinh',
        'DiaChi',
        'Email',
        'SoDienThoai',
        'MaChucVu',
        'MaXuong'
    ];

    public function chucvu()
    {
        return $this->belongsTo(ChucVu::class, 'MaChucVu', 'MaChucVu');
    }

    public function xuong()
    {
        return $this->belongsTo(Xuong::class, 'MaXuong', 'MaXuong');
    }

    public function xuatKho()
    {
        return $this->hasMany(XuatKho::class, 'MaNhanVien', 'MaNhanVien');
    }
}
