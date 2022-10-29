<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Xuong extends Model
{
    use HasFactory;

    protected $table = 'xuong';

    public $incrementing = false;

    public $timestamps = false;

    protected $primaryKey = 'MaXuong';

    protected $keyType = 'string';
    
    protected $fillable = [
        'MaXuong',
        'TenXuong',
        'DiaChi',
        'MoTaXuong'
    ];
}
