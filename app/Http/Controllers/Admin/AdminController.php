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
        $mainBranches = \App\Models\Branch::where('is_main_branch', true)->count();
        
        return view('admin.dashboard', compact(
            'scaffoldingCount', 
            'availableScaffolding',
            'projectCount',
            'completedProjects',
            'branchCount',
            'mainBranches'
        ));
    }

    public function profile()
    {
        $profile = CompanyProfile::first();
        return view('admin.profile.index', compact('profile'));
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
            'about_us' => 'required|string',
            'services' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'hero_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
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
}
