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
    // public $timestamps = false;

    const CREATED_AT = 'ThoiGianTao';
    const UPDATED_AT = 'ThoiGianCapNhat';
    public $timestamps = true;

    protected $primaryKey = 'MaNguyenVatLieu';
    protected $fillable = [
        'MaNguyenVatLieu',
        'TenNguyenVatLieu',
        'MaChatLieu',
        'SoLuong',
        'DonViTinh',
        // 'MaXuong',
        // 'MaDonViPhanPhoi',
        'MoTaNguyenVatLieu',
        'ThoiGianTao',
        'ThoiGianCapNhat'
    ];

    // public function xuong(){
    //     return $this->belongsTo(Xuong::class, 'MaXuong', 'MaXuong');
    // }

    // public function donviphanphoi(){
    //     return $this->belongsTo(DonViPhanPhoi::class,'MaDonViPhanPhoi','MaDonViPhanPhoi');
    // }
    
    public function chatlieu(){
        return $this->belongsTo(ChatLieu::class,'MaChatLieu','MaChatLieu');
    }

}
