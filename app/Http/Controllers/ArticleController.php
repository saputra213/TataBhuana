<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::where('is_published', true);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        $userAgent = $request->header('User-Agent', '');
        $isMobile = preg_match('/Android|iPhone|iPad|iPod|Windows Phone|Mobi/i', $userAgent);
        $perPage = $isMobile ? 5 : 9;

        $articles = $query->orderBy('published_at', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
        $profile = CompanyProfile::first();

        return view('articles.index', compact('articles', 'profile'));
    }

    public function show(Article $article)
    {
        if (!$article->is_published) {
            abort(404);
        }
        
        $article->load(['comments' => function($q) {
            $q->where('is_approved', true)->orderBy('created_at', 'desc');
        }]);

        $profile = CompanyProfile::first();
        $related = Article::where('is_published', true)
            ->where('id', '!=', $article->id)
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        $categories = Article::where('is_published', true)
            ->whereNotNull('category')
            ->where('category', '!=', '')
            ->select('category', DB::raw('count(*) as total'))
            ->groupBy('category')
            ->get();

        $tags = Article::where('is_published', true)
            ->whereNotNull('keywords')
            ->pluck('keywords')
            ->flatMap(function ($values) {
                return array_map('trim', explode(',', $values));
            })
            ->filter()
            ->unique()
            ->values();

        return view('articles.show', compact('article', 'related', 'profile', 'categories', 'tags'));
    }

    public function storeComment(Request $request, Article $article)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'content' => 'required|string',
        ]);

        $article->comments()->create([
            'name' => $request->name,
            'email' => $request->email,
            'content' => $request->content,
            'is_approved' => false
        ]);

        return back()->with('success', 'Komentar berhasil dikirim dan menunggu persetujuan admin.');
    }
}
