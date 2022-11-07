<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeHoach extends Model
{
    use HasFactory;
    protected $table = 'kehoach';
    protected $casts = [
        'MaKeHoach' => 'string',
    ];
    public $timestamps = false;
    protected $primaryKey = 'MaKeHoach';
    protected $fillable = [
        'MaKeHoach',
        'NgayBatDau',
        'NgayKetThuc',
        'NoiDungKeHoach',
        'GhiChu',
        'MaLoaiQuyTrinh',
        'MaXuong',
    ];

    public function xuong(){
        return $this->belongsTo(Xuong::class,'MaXuong','MaXuong'); 
    }

    public function quytrinh(){
        return $this->belongsTo(LoaiQuyTrinh::class, 'MaLoaiQuyTrinh', 'MaLoaiQuyTrinh');
    }
    
}
