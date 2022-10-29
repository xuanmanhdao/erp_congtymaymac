<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VatTu extends Model
{
    use HasFactory;

    protected $table = 'vattu';

    public $incrementing = false;

    public $timestamps = false;

    protected $primaryKey = 'MaVatTu';

    protected $keyType = 'string';
    
    protected $fillable = [
        'MaVatTu',
        'TenVatTu',
        'SoLuong',
        'GiaVatTu',
        'MoTaVatTu',
        'MaXuong'
    ];
}
