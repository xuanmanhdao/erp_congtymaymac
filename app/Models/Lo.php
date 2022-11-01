<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lo extends Model
{
    use HasFactory;
    protected $table = 'lo';
    protected $casts = [
        'MaLo' => 'string',
    ];
    public $timestamps = false;
    protected $primaryKey = 'MaLo';
    protected $fillable = [
        'MaLo',
        'TenLo',
        'SoLuong',
        'MaXuong',
        'TinhTrang',
        
    ];
    
}
