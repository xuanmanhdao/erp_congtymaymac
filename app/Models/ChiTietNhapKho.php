<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietNhapKho extends Model
{
    use HasFactory;
    protected $table = 'chitietnhapkho';

    public $timestamps = false;

    protected $fillable = [
        'MaNhapKho',
        'MaNguyenVatLieu',
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
