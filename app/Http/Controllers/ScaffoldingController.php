<?php

namespace App\Http\Controllers;

use App\Models\Scaffolding;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;

class ScaffoldingController extends Controller
{
    public function index(Request $request)
    {
        $query = Scaffolding::where('is_available', true);
        
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }
        
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }
        
        switch ($request->sort) {
            case 'name':
                $query->orderBy('name', 'asc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }
        
        $userAgent = $request->header('User-Agent', '');
        $isMobile = preg_match('/Android|iPhone|iPad|iPod|Windows Phone|Mobi/i', $userAgent);
        $defaultPerPage = $isMobile ? 6 : 12;
        
        $perPage = (int) $request->input('per_page', $defaultPerPage);
        $scaffoldings = $query->paginate($perPage);
        $profile = CompanyProfile::first();
        return view('scaffoldings.index', compact('scaffoldings', 'profile'));
    }

    public function show(Scaffolding $scaffolding)
    {
        $profile = CompanyProfile::first();
        return view('scaffoldings.show', compact('scaffolding', 'profile'));
    }
}
