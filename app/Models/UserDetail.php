<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'salutation',
        'age',
        'occupation',
        'nationality',
        'ethnicity',
        'house_number',
        'village',
        'alley',
        'road',
        'subdistrict',
        'district',
        'province',
        'zipcode',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
