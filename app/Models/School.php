<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'hs_id',
        'director_id',
        'mec_id',
        'country_id',
        'region_id',
        'city_id',
        'name',
        'postal',
        'phone',
        'password',
        'email',
        'email2',
        'website',
        'fax',
        'address',
        'address_short',
        'latitude',
        'longitude',
        'plan_preference',
        'leads',
        'business_status',
        'google_user_ratings_total',
        'google_rating',
        'revisor',
        'active'
    ];
}
