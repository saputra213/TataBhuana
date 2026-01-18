<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use App\Models\Scaffolding;
use App\Models\Branch;
use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $profile = CompanyProfile::first();
        $featuredScaffoldings = Scaffolding::where('is_available', true)
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();
        
        $featuredProjects = \App\Models\Project::where('is_featured', true)
            ->whereNotNull('images')
            ->orderBy('sort_order', 'asc')
            ->take(6)
            ->get();

        $latestArticles = Article::where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
        
        return view('home', compact('profile', 'featuredScaffoldings', 'featuredProjects', 'latestArticles'));
    }

    public function about()
    {
        $profile = CompanyProfile::first();
        return view('about', compact('profile'));
    }

    public function services()
    {
        $profile = CompanyProfile::first();
        $scaffoldings = Scaffolding::where('is_available', true)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('services', compact('profile', 'scaffoldings'));
    }

    public function serviceSales()
    {
        $profile = CompanyProfile::first();
        return view('services.sales', compact('profile'));
    }

    public function serviceRental()
    {
        $profile = CompanyProfile::first();
        return view('services.rental', compact('profile'));
    }

    public function serviceDelivery()
    {
        $profile = CompanyProfile::first();
        return view('services.delivery', compact('profile'));
    }

    public function serviceConsultation()
    {
        $profile = CompanyProfile::first();
        return view('services.consultation', compact('profile'));
    }

    public function contact()
    {
        $profile = CompanyProfile::first();
        $branches = Branch::where('is_active', true)->orderBy('is_main_branch', 'desc')->orderBy('sort_order', 'asc')->get();
        return view('contact', compact('profile', 'branches'));
    }
}
