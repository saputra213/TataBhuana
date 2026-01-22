<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function dashboard()
    {
        $scaffoldingCount = \App\Models\Scaffolding::count();
        $availableScaffolding = \App\Models\Scaffolding::where('is_available', true)->count();
        $projectCount = \App\Models\Project::count();
        $completedProjects = \App\Models\Project::where('status', 'completed')->count();
        $branchCount = \App\Models\Branch::where('is_active', true)->count();
        
        return view('admin.dashboard', compact(
            'scaffoldingCount', 
            'availableScaffolding',
            'projectCount',
            'completedProjects',
            'branchCount'
        ));
    }

    public function profile()
    {
        $profile = CompanyProfile::first();
        return view('admin.profile.index', compact('profile'));
    }

    public function hero()
    {
        $profile = CompanyProfile::first();
        $slides = is_array($profile?->hero_slides) ? $profile->hero_slides : [];
        return view('admin.hero.index', compact('profile', 'slides'));
    }

    public function home()
    {
        $profile = CompanyProfile::first();
        return view('admin.home.index', compact('profile'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'description' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string|max:20',
            'email' => 'required|email',
            'website' => 'nullable|url',
            'services' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'hero_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'replace_hero_images' => 'nullable|boolean',
            'hero_title' => 'nullable|string|max:255',
            'hero_description' => 'nullable|string',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'whatsapp' => 'nullable|string'
        ]);

        $data = $request->all();
        
        // Handle logo upload
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('company', 'public');
        }
        
        // Handle hero image upload
        if ($request->hasFile('hero_image')) {
            $data['hero_image'] = $request->file('hero_image')->store('company', 'public');
            \App\Services\ImageProcessingService::processHeroImage($data['hero_image'], 1920, 85);
        }

        // Handle multiple hero images
        if ($request->hasFile('hero_images')) {
            $newImages = [];
            foreach ($request->file('hero_images') as $image) {
                $storedPath = $image->store('company', 'public');
                \App\Services\ImageProcessingService::processHeroImage($storedPath, 1920, 85);
                $newImages[] = $storedPath;
            }
            $profileExisting = CompanyProfile::first();
            if ($request->boolean('replace_hero_images')) {
                if ($profileExisting && is_array($profileExisting->hero_images)) {
                    foreach ($profileExisting->hero_images as $oldImg) {
                        \Illuminate\Support\Facades\Storage::disk('public')->delete($oldImg);
                    }
                }
                $data['hero_images'] = $newImages;
            } else {
                $merged = [];
                if ($profileExisting && is_array($profileExisting->hero_images)) {
                    $merged = $profileExisting->hero_images;
                }
                $data['hero_images'] = array_values(array_unique(array_merge($merged, $newImages)));
            }
        }
        
        // Handle social media
        $data['social_media'] = [
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'whatsapp' => $request->whatsapp
        ];

        $profile = CompanyProfile::first();
        if ($profile) {
            $profile->update($data);
        } else {
            CompanyProfile::create($data);
        }

        return redirect()->route('admin.profile')
            ->with('success', 'Profil perusahaan berhasil diperbarui!');
    }

    public function updateHero(Request $request)
    {
        $validated = $request->validate([
            'slides' => 'nullable|array',
            'slides.*.title' => 'nullable|string|max:255',
            'slides.*.description' => 'nullable|string|max:1000',
            'slides.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'slides.*.button_text' => 'nullable|string|max:100',
            'slides.*.button_route' => 'nullable|string|in:contact,services,scaffoldings,projects,articles,about,branches,custom,none',
            'slides.*.button_url' => 'nullable|url',
        ]);

        $profile = CompanyProfile::first() ?? new CompanyProfile();
        $existingSlides = is_array($profile->hero_slides) ? $profile->hero_slides : [];
        $slidesData = [];

        if (isset($validated['slides']) && is_array($validated['slides'])) {
            foreach ($validated['slides'] as $index => $slide) {
                $current = $existingSlides[$index] ?? [];

                if ($request->hasFile("slides.$index.image")) {
                    $path = $request->file("slides.$index.image")->store('hero', 'public');
                    \App\Services\ImageProcessingService::processHeroImage($path, 1920, 85);
                    $current['image'] = $path;
                }

                if (isset($slide['title'])) {
                    $current['title'] = $slide['title'];
                }
                if (isset($slide['description'])) {
                    $current['description'] = $slide['description'];
                }
                if (isset($slide['button_text'])) {
                    $current['button_text'] = $slide['button_text'];
                }
                if (isset($slide['button_route'])) {
                    $current['button_route'] = $slide['button_route'];
                }
                if (isset($slide['button_url'])) {
                    $current['button_url'] = $slide['button_url'];
                }

                if (!empty($current['image']) || !empty($current['title']) || !empty($current['description'])) {
                    $slidesData[$index] = $current;
                }
            }
        }

        $profile->hero_slides = array_values($slidesData);
        if (!$profile->exists) {
            $profile->save();
        } else {
            $profile->save();
        }

        return redirect()->route('admin.hero')
            ->with('success', 'Hero beranda berhasil diperbarui!');
    }

    public function updateHome(Request $request)
    {
        $validated = $request->validate([
            'home_highlight_kicker' => 'nullable|string|max:255',
            'home_highlight_title' => 'nullable|string|max:255',
            'home_highlight_1_label' => 'nullable|string|max:255',
            'home_highlight_1_title' => 'nullable|string|max:255',
            'home_highlight_1_text' => 'nullable|string',
            'home_highlight_2_label' => 'nullable|string|max:255',
            'home_highlight_2_title' => 'nullable|string|max:255',
            'home_highlight_2_text' => 'nullable|string',
            'home_highlight_3_label' => 'nullable|string|max:255',
            'home_highlight_3_title' => 'nullable|string|max:255',
            'home_highlight_3_text' => 'nullable|string',
            'home_services_heading_title' => 'nullable|string|max:255',
            'home_services_heading_subtitle' => 'nullable|string|max:255',
            'home_services_1_title' => 'nullable|string|max:255',
            'home_services_2_title' => 'nullable|string|max:255',
            'home_services_3_title' => 'nullable|string|max:255',
            'home_services_4_title' => 'nullable|string|max:255',
            'home_features_heading_title' => 'nullable|string|max:255',
            'home_features_heading_subtitle' => 'nullable|string|max:255',
            'home_features_1_title' => 'nullable|string|max:255',
            'home_features_2_title' => 'nullable|string|max:255',
            'home_features_3_title' => 'nullable|string|max:255',
            'home_features_4_title' => 'nullable|string|max:255',
            'home_features_5_title' => 'nullable|string|max:255',
            'home_features_6_title' => 'nullable|string|max:255',
            'home_articles_heading_title' => 'nullable|string|max:255',
            'home_articles_heading_subtitle' => 'nullable|string|max:255',
            'home_projects_heading_title' => 'nullable|string|max:255',
            'home_cta_title' => 'nullable|string|max:255',
            'home_cta_subtitle' => 'nullable|string|max:255',
            'home_cta_button_text' => 'nullable|string|max:255',
        ]);

        $profile = CompanyProfile::first() ?? new CompanyProfile();
        $profile->fill($validated);
        $profile->save();

        return redirect()->route('admin.home')
            ->with('success', 'Konten beranda berhasil diperbarui!');
    }
}
