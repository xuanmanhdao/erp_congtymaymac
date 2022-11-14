<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;

    protected $table = 'sanpham';

    public $incrementing = false;

    // public $timestamps = false;
    public $timestamps = true;

    protected $primaryKey = 'MaSanPham';

    protected $keyType = 'string';

    const CREATED_AT = 'ThoiGianTao';
    const UPDATED_AT = 'ThoiGianCapNhat';
    
    protected $fillable = [
        'MaSanPham',
        'TenSanPham',
        'SoLuong',
        'DonViTinh',
        // 'Gia',
        'MoTaSanPham',
        'MaLoai',
        'MaLoaiQuyTrinh',
        'HinhAnh',
        'ThoiGianTao',
        'ThoiGianCapNhat'
    ];
}
