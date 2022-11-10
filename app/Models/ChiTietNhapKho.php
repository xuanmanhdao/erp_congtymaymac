<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietNhapKho extends Model
{
   use HasFactory;
    protected $table = 'chitietnhapkho';
    protected $casts = [
        'MaNhapKho' => 'string',
    ];
    public $timestamps = false;
    protected $primaryKey = 'MaNhapKho';
    protected $fillable = [
        'MaNhapKho',
        'MaNguyenVatLieu',
        'SoLuong',
        'DonViTinh',
        'ThanhTien',
       
    ];

    public function nguyenvatlieu()
    {
        return $this->belongsTo(NguyenVatLieu::class,'MaNguyenVatLieu','MaNguyenVatLieu');
    }

}
