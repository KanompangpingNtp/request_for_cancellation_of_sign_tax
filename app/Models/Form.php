<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'guest_location',
        'request_date',
        'request_details',
        'status',
        'guest_salutation',
        'guest_name',
        'guest_age',
        'guest_nationality',
        'guest_ethnicity',
        'guest_house_number',
        'guest_village',
        'guest_alley',
        'guest_road',
        'guest_subdistrict',
        'guest_district',
        'guest_province',
        'guest_zipcode',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function attachments()
    {
        return $this->hasMany(FormAttachment::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function formDetailLocation()
    {
        return $this->hasOne(FormDetailLocation::class);
    }

    public function formDetail()
    {
        return $this->hasOne(FormDetail::class);
    }
}
