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
