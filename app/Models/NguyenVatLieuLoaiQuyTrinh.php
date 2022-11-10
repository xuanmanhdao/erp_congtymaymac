<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NguyenVatLieuLoaiQuyTrinh extends Model
{
    use HasFactory;

    protected $table = 'nguyenvatlieu_loaiquytrinh';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'MaLoaiQuyTrinh',
        'MaNguyenVatLieu',
    ];

    public function setLoaiQuyTrinh($loaiQuyTrinh)
    {
        $this->MaLoaiQuyTrinh = $loaiQuyTrinh;
    } 
     public function setNguyenVatLieu($nguyenVatLieu)
    {
        $this->MaNguyenVatLieu = $nguyenVatLieu;
    } 
}
