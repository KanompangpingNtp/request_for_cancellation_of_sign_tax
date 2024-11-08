<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'form_id',
        'detail_form_lastday',
        'detail_tax_size',
        'detail_tax_update',
        'detail_cause',
        'detail_since_the_date',
    ];

    // Relationships
    public function form()
    {
        return $this->belongsTo(Form::class);
    }
}
