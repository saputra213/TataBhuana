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
        'hero_title',
        'hero_description',
        'hero_images',
        'social_media',
        'about_hero_title',
        'about_hero_subtitle',
        'about_main_text',
        'about_stat_cities',
        'about_stat_experience',
        'about_stat_projects',
        'about_feature_1',
        'about_feature_2',
        'about_feature_3',
        'about_service_1_title',
        'about_service_1_description',
        'about_service_2_title',
        'about_service_2_description',
        'about_service_3_title',
        'about_service_3_description',
        'about_service_4_title',
        'about_service_4_description',
        'about_vision_title',
        'about_vision_text',
        'about_mission_title',
        'about_mission_text'
    ];

    protected $casts = [
        'social_media' => 'array',
        'hero_images' => 'array'
    ];
}
