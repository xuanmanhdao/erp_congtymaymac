<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatLieu extends Model
{
    use HasFactory;
    protected $table = 'chatlieu';
    protected $casts = [
        'MaChatLieu' => 'string',
    ];
    public $timestamps = false;
    protected $primaryKey = 'MaChatLieu';
    protected $fillable = [
        'MaChatLieu',
        'TenChatLieu',
        'MoTaChatLieu',
    ];
    
}
