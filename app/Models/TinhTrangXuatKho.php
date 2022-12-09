<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TinhTrangXuatKho extends Model
{
    use HasFactory;
    protected $table = 'tinh_trang_xuat_kho';
    protected $casts = [
        'MaXuatKho' => 'string',
    ];
    public $timestamps = false;
    protected $primaryKey = 'MaXuatKho';
    protected $fillable = [
        'MaXuatKho',
        'TinhTrang',
        
    ];

    public function xuatkho()
    {
        return $this->belongsTo(XuatKho::class,'MaXuatKho','MaXuatKho');
    }
}
