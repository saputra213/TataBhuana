<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'description',
        'address',
        'phone',
        'email',
        'website',
        'about_us',
        'services',
        'logo',
        'hero_image',
        'social_media'
    ];

    protected $casts = [
        'social_media' => 'array'
    ];
}

