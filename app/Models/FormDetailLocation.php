<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormDetailLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'form_id',
        'detail_location_name_tag',
        'detail_location_house_number',
        'detail_location_village',
        'detail_location_alley',
        'detail_location_road',
        'detail_location_subdistrict',
        'detail_location_district',
        'detail_location_province',
        'detail_location_phone_number'
    ];

    // Relationships
    public function form()
    {
        return $this->belongsTo(Form::class);
    }
}
