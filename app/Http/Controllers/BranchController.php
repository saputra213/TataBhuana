<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::where('is_active', true)
            ->orderBy('is_main_branch', 'desc')
            ->orderBy('sort_order', 'asc')
            ->get();
        $profile = CompanyProfile::first();
        
        // Ambil kantor utama untuk map
        $mainBranch = Branch::where('is_active', true)
            ->where('is_main_branch', true)
            ->first();

        return view('branches.index', compact('branches', 'profile', 'mainBranch'));
    }

    public function show(Branch $branch)
    {
        if (!$branch->is_active) {
            abort(404);
        }
        $profile = CompanyProfile::first();

        return view('branches.show', compact('branch', 'profile'));
    }
}





