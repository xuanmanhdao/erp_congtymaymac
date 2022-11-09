<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NguyenVatLieu extends Model
{
    use HasFactory;
    protected $table = 'nguyenvatlieu';
    protected $casts = [
        'MaNguyenVatLieu' => 'string',
    ];
    public $timestamps = false;
    protected $primaryKey = 'MaNguyenVatLieu';
    protected $fillable = [
        'MaNguyenVatLieu',
        'TenNguyenVatLieu',
        'SoLuong',
        'DonViTinh',
        'MaXuong',
        'MaDonViPhanPhoi',
    ];

    public function xuong(){
        return $this->belongsTo(Xuong::class, 'MaXuong', 'MaXuong');
    }

    public function donviphanphoi(){
        return $this->belongsTo(DonViPhanPhoi::class,'MaDonViPhanPhoi','MaDonViPhanPhoi');
    }

}
