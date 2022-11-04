<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonViPhanPhoi extends Model
{
    use HasFactory;
    protected $table = 'donviphanphoi';
    protected $casts = [
        'MaDonViPhanPhoi' => 'string',
    ];
    public $timestamps = false;
    protected $primaryKey = 'MaDonViPhanPhoi';
    protected $fillable = [
        'MaDonViPhanPhoi',
        'TenDonViPhanPhoi',
        'DiaChi',
        'SoDienThoai',
        'Fax',
        'Email',
    ];
}
