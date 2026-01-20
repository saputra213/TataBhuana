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
        
        if ($request->filled('material')) {
            $query->where('material', $request->material);
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
            case 'price_low':
                $query->orderBy('rental_price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('rental_price', 'desc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }
        
        $perPage = (int) $request->input('per_page', 12);
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
