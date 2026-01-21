<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::where('status', 'completed')->orderBy('sort_order', 'asc');

        // Filter by project type
        if ($request->filled('type')) {
            $query->where('project_type', $request->type);
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('client_name', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%");
            });
        }

        $projects = $query->paginate(12);
        $profile = CompanyProfile::first();
        
        return view('projects.index', compact('projects', 'profile'));
    }

    public function show(Project $project)
    {
        $relatedProjects = Project::where('id', '!=', $project->id)
            ->where('status', 'completed')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
        $profile = CompanyProfile::first();

        return view('projects.show', compact('project', 'relatedProjects', 'profile'));
    }
}





