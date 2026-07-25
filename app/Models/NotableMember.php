<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class NotableMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'role',
        'desc',
        'image',
    ];

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? (filter_var($value, FILTER_VALIDATE_URL) ? $value : asset($value)) : null,
        );
    }
}