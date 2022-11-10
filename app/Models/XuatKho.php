<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XuatKho extends Model
{
    use HasFactory;

    protected $table = 'xuatkho';

    public $incrementing = true;

    public $timestamps = false;

    protected $primaryKey = 'MaXuatKho';

    protected $keyType = 'int';
    
    protected $fillable = [
        'MaXuatKho',
        'ThoiGianXuat',
        'TongGia',
        'GhiChu',
        'MaNhanVien',
        'MaXuong'
    ];
}
