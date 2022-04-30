<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CropField extends Model {

    use HasFactory;

    protected $table = 'crop_fields';

    protected $fillable = [
        'name',
        'description',
        'qnt_hec',
        'location',
        'user_id',
    ];
}
