<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DauVao extends Model
{
    use HasFactory;
    protected $table = 'dauvao';
    protected $casts = [
        'MaDauVao' => 'string',
    ];
    public $timestamps = false;
    protected $primaryKey = 'MaDauVao';
    protected $fillable = [
        'MaDauVao',
        'TenSPDauVao',
        'Loai',
        'HienTrang',
        'MauSac',
        'NgayNhan',
        'GhiChu',
    ];
    
}