<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agreement extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'sign_date',
        'is_adult',
        'agree_to_covid_recommendations',
        'data_is_valid',
        'agree_to_free_process_image'
    ];
}
