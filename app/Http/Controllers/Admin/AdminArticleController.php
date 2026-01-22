<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Services\WatermarkService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('published_at', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'category' => 'required|string|max:255',
            'author' => 'nullable|string|max:255',
            'keywords' => 'nullable|string|max:255',
            'excerpt' => 'nullable|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'is_published' => 'nullable',
            'published_at' => 'nullable|date'
        ]);

        $data = $request->only(['title', 'excerpt', 'content', 'published_at', 'category', 'author', 'keywords']);
        $data['is_published'] = $request->has('is_published') || $request->input('is_published') === 'on';

        $slugBase = $request->filled('slug') ? Str::slug($request->input('slug')) : Str::slug($data['title']);
        $slug = $slugBase;
        $counter = 1;
        while (Article::where('slug', $slug)->exists()) {
            $slug = $slugBase . '-' . $counter;
            $counter++;
        }
        $data['slug'] = $slug;

        if ($request->hasFile('image')) {
            $storedPath = $request->file('image')->store('articles', 'public');
            $data['image'] = $storedPath;
            WatermarkService::addWatermark($storedPath);
        }

        $article = Article::create($data);

        return redirect()->route('admin.articles.index')
            ->with('success', 'Artikel berhasil ditambahkan!');
    }

    public function show(Article $article)
    {
        return view('admin.articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'category' => 'required|string|max:255',
            'author' => 'nullable|string|max:255',
            'keywords' => 'nullable|string|max:255',
            'excerpt' => 'nullable|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'is_published' => 'nullable',
            'published_at' => 'nullable|date'
        ]);

        $data = $request->only(['title', 'excerpt', 'content', 'published_at', 'category', 'author', 'keywords']);
        $data['is_published'] = $request->has('is_published') || $request->input('is_published') === 'on';

        // Check if title changed or slug is provided and different
        $newSlugBase = $request->filled('slug') ? Str::slug($request->input('slug')) : Str::slug($data['title']);
        
        // Only update slug if it's explicitly changed via input or if title changed and no explicit slug provided
        if (($request->filled('slug') && $newSlugBase !== $article->slug) || 
            (!$request->filled('slug') && $article->title !== $data['title'])) {
            
            $slug = $newSlugBase;
            $counter = 1;
            while (Article::where('slug', $slug)->where('id', '!=', $article->id)->exists()) {
                $slug = $newSlugBase . '-' . $counter;
                $counter++;
            }
            $data['slug'] = $slug;
        }

        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            $storedPath = $request->file('image')->store('articles', 'public');
            $data['image'] = $storedPath;
            WatermarkService::addWatermark($storedPath);
        }

        $article->update($data);

        return redirect()->route('admin.articles.index')
            ->with('success', 'Artikel berhasil diperbarui!');
    }

    public function destroy(Article $article)
    {
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }
        $article->delete();

        return redirect()->route('admin.articles.index')
            ->with('success', 'Artikel berhasil dihapus!');
    }
}
