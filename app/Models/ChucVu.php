<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChucVu extends Model
{
    use HasFactory;

    protected $table = 'chucvu';

    public $incrementing = false;

    public $timestamps = false;

    protected $primaryKey = 'MaChucVu';

    protected $keyType = 'string';
    
    protected $fillable = [
        'MaChucVu',
        'TenChucVu',
        'MoTaChucVu'
    ];
}
