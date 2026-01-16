<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $profile = CompanyProfile::first();
        return view('admin.about.index', compact('profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'about_hero_title' => 'nullable|string|max:255',
            'about_hero_subtitle' => 'nullable|string|max:255',
            'about_main_text' => 'nullable|string',
            'about_stat_cities' => 'nullable|string|max:255',
            'about_stat_experience' => 'nullable|string|max:255',
            'about_stat_projects' => 'nullable|string|max:255',
            'about_feature_1' => 'nullable|string|max:255',
            'about_feature_2' => 'nullable|string|max:255',
            'about_feature_3' => 'nullable|string|max:255',
            'about_vision_title' => 'nullable|string|max:255',
            'about_vision_text' => 'nullable|string',
            'about_mission_title' => 'nullable|string|max:255',
            'about_mission_text' => 'nullable|string',
            'about_service_1_title' => 'nullable|string|max:255',
            'about_service_1_description' => 'nullable|string',
            'about_service_2_title' => 'nullable|string|max:255',
            'about_service_2_description' => 'nullable|string',
            'about_service_3_title' => 'nullable|string|max:255',
            'about_service_3_description' => 'nullable|string',
            'about_service_4_title' => 'nullable|string|max:255',
            'about_service_4_description' => 'nullable|string',
            'about_features' => 'nullable|array'
        ]);

        $data = $request->only([
            'about_hero_title',
            'about_hero_subtitle',
            'about_main_text',
            'about_stat_cities',
            'about_stat_experience',
            'about_stat_projects',
            'about_feature_1',
            'about_feature_2',
            'about_feature_3',
            'about_vision_title',
            'about_vision_text',
            'about_mission_title',
            'about_mission_text',
            'about_service_1_title',
            'about_service_1_description',
            'about_service_2_title',
            'about_service_2_description',
            'about_service_3_title',
            'about_service_3_description',
            'about_service_4_title',
            'about_service_4_description',
        ]);
        
        $data['about_features'] = $request->about_features ? array_filter($request->about_features) : [];

        $profile = CompanyProfile::first();
        if ($profile) {
            $profile->update($data);
        } else {
            CompanyProfile::create($data);
        }

        return redirect()->route('admin.about.index')
            ->with('success', 'Halaman Tentang Kami berhasil diperbarui!');
    }
}
