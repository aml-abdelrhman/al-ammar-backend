<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scholar extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'role',
        'desc',
        'tags',
        'image',
    ];

    protected $casts = [
        'tags' => 'array', // لتحويل الـ JSON تلقائياً إلى Array في لارافيل
    ];
}