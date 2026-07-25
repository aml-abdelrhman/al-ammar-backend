<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DigitalLibraryBook extends Model
{
    use HasFactory;

    protected $table = 'digital_library_books';

    protected $fillable = [
        'title',
        'date',
        'size',
        'extension',
        'file_url',
    ];
}