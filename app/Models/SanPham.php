<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;

    protected $table = 'sanpham';

    public $incrementing = false;

    public $timestamps = false;

    protected $primaryKey = 'MaSanPham';

    protected $keyType = 'string';
    
    protected $fillable = [
        'MaSanPham',
        'TenSanPham',
        'SoLuong',
        'DonViTinh',
        'Gia',
        'MoTaSanPham',
        'MaLoai',
        'MaLoaiQuyTrinh'
    ];
}
