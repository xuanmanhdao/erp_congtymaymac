<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietXuatKho extends Model
{
    use HasFactory;

    protected $table = 'chitietxuatkho';

    public $timestamps = false;

    protected $fillable = [
        'MaXuatKho',
        'MaSanPham',
        'SoLuong',
        'DonViTinh',
        'ThanhTien',
        'Gia',
    ];

    public function setThanhTien($soLuong, $gia)
    {
        $this->ThanhTien = $soLuong * $gia;
    }
}
