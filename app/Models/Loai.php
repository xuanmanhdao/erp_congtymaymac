<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loai extends Model
{
    use HasFactory;

    protected $table = 'loai';

    public $incrementing = false;

    public $timestamps = false;

    protected $primaryKey = 'MaLoai';

    protected $keyType = 'string';
    
    protected $fillable = [
        'MaLoai',
        'TenLoai',
        'MauSac',
        'ViTriXep'
    ];

    public function sanPham(){
        return $this->hasMany(SanPham::class, 'MaLoai', 'MaLoai');
    }
}
