<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhapKho extends Model
{
   use HasFactory;
    protected $table = 'nhapkho';

    public $incrementing = true;

    public $timestamps = false;

    protected $primaryKey = 'MaNhapKho';

    protected $keyType = 'int';

    protected $fillable = [
        'MaNhapKho',
        'ThoiGianNhap',
        'TongGia',
        'GhiChu',
        'MaNhanVien',
        'MaDonViPhanPhoi',
    ];

     public function nhanvien()
     {
         return $this->belongsTo(NhanVien::class,'MaNhanVien','MaNhanVien');
     }

     public function donviphanphoi()
     {

         return $this->belongsTo(DonViPhanPhoi::class,'MaDonViPhanPhoi','MaDonViPhanPhoi');
     }
}