<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CropFieldSeason extends Model {
    use HasFactory;

    protected $table = 'crop_fields_season';

    protected $fillable = [
        'crop_field_id',
        'start_date',
        'end_date',
        'cereal_id',
        'variety_cereal',
    ];
}
