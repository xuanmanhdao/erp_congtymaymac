<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TinhTrangNhapKho extends Model
{
    use HasFactory;
    protected $table = 'tinh_trang_nhap_kho';
    protected $casts = [
        'MaNhapKho' => 'string',
    ];
    public $timestamps = false;
    protected $primaryKey = 'MaNhapKho';
    protected $fillable = [
        'MaNhapKho',
        'TinhTrang',
        
    ];

    public function nhapkho()
    {
        return $this->belongsTo(NhapKho::class,'MaNhapKho','MaNhapKho');
    }
}
