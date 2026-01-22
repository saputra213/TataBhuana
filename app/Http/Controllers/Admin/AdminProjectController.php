<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Services\WatermarkService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('sort_order', 'asc')->paginate(15);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'client_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'project_type' => 'required|string|max:255',
            'status' => 'required|string|in:completed,ongoing,planning',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'challenges' => 'nullable|string',
            'solutions' => 'nullable|string',
            'results' => 'nullable|string',
            'is_featured' => 'nullable',
            'sort_order' => 'integer|min:0'
        ]);

        $data = $request->all();
        
        // Handle image uploads
        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $storedPath = $image->store('projects', 'public');
                $images[] = $storedPath;
                
                // Add watermark to image
                WatermarkService::addWatermark($storedPath);
            }
            $data['images'] = $images;
        }

        $data['is_featured'] = $request->has('is_featured') || $request->input('is_featured') === 'on';
        $data['sort_order'] = $request->sort_order ?? 0;

        Project::create($data);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Proyek berhasil ditambahkan!');
    }

    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'client_name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'project_type' => 'required|string|max:255',
            'status' => 'required|string|in:completed,ongoing,planning',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'challenges' => 'nullable|string',
            'solutions' => 'nullable|string',
            'results' => 'nullable|string',
            'is_featured' => 'nullable',
            'sort_order' => 'integer|min:0'
        ]);

        $data = $request->all();
        
        // Handle image uploads
        if ($request->hasFile('images')) {
            // Delete old images
            if ($project->images) {
                foreach ($project->images as $image) {
                    Storage::disk('public')->delete($image);
                }
            }
            
            $images = [];
            foreach ($request->file('images') as $image) {
                $storedPath = $image->store('projects', 'public');
                $images[] = $storedPath;
                
                // Add watermark to image
                WatermarkService::addWatermark($storedPath);
            }
            $data['images'] = $images;
        }

        $data['is_featured'] = $request->has('is_featured') || $request->input('is_featured') === 'on';
        $data['sort_order'] = $request->sort_order ?? 0;

        $project->update($data);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Proyek berhasil diperbarui!');
    }

    public function destroy(Project $project)
    {
        // Delete images
        if ($project->images) {
            foreach ($project->images as $image) {
                Storage::disk('public')->delete($image);
            }
        }
        
        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Proyek berhasil dihapus!');
    }
}




