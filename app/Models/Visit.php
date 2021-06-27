<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $fillable = [
        'frontend_count',
        'admin_count',
        'ip',
        'user_agent',
        'id'
    ];
}
