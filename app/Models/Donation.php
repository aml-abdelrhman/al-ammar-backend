<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'charity_initiative_id',
        'amount',
        'donor_name',
        'payment_id',
        'status',
    ];

    // علاقة التبرع بمبادرة خيرية واحدة
    public function initiative()
    {
        return $this->belongsTo(CharityInitiative::class, 'charity_initiative_id');
    }
}