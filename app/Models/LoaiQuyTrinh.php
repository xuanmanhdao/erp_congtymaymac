<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiQuyTrinh extends Model
{
    use HasFactory;

    protected $table = 'loaiquytrinh';
    protected $casts = [
        'MaLoaiQuyTrinh' => 'string',
    ];
    public $timestamps = false;
    protected $primaryKey = 'MaLoaiQuyTrinh';
    protected $fillable = [
        'MaLoaiQuyTrinh',
        'TenQuyTrinh',
        'MoTaQuyTrinh',
        'MaNguyenVatLieu',
    ];

    public function nguyenvatlieu(){
        return $this->belongsTo(NguyenVatLieu::class, 'MaNguyenVatLieu','MaNguyenVatLieu');
    }
}
