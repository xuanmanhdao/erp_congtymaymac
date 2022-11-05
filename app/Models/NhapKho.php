<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhapKho extends Model
{
   use HasFactory;
    protected $table = 'nhapkho';
    protected $casts = [
        'MaNhapKho' => 'string',
    ];
    public $timestamps = false;
    protected $primaryKey = 'MaNhapKho';
    protected $fillable = [
        'MaNhapKho',
        'ThoiGianNhap',
        'TongGia',
        'GhiChu',
        'MaNhanVien',
        'MaDonViPhanPhoi',
    ];
}
