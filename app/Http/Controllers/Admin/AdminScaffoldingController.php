<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Scaffolding;
use App\Services\WatermarkService;
use App\Services\ImageProcessingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminScaffoldingController extends Controller
{
    public function index()
    {
        $scaffoldings = Scaffolding::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.scaffoldings.index', compact('scaffoldings'));
    }

    public function create()
    {
        return view('admin.scaffoldings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|string|max:255',
            'rental_price' => 'nullable|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'dimensions' => 'required|string|max:255',
            'max_height' => 'required|integer|min:0',
            'max_load' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'specifications' => 'nullable|string'
        ]);

        $data = $request->all();
        // Set default values
        if (!isset($data['material'])) {
            $data['material'] = '-';
        }
        $data['stock_quantity'] = 999;
        $data['rental_price'] = 0;
        $data['sale_price'] = 0;
        $data['is_available'] = $request->has('is_available') ? 1 : 0;
        
        if ($request->hasFile('image')) {
            $storedPath = $request->file('image')->store('scaffoldings', 'public');
            $data['image'] = $storedPath;
            
            // Process image: resize to max 1200px width and white background
            ImageProcessingService::processProductImage($storedPath, 1200, 90);
            
            // Add watermark to image
            WatermarkService::addWatermark($storedPath);
        }

        Scaffolding::create($data);

        return redirect()->route('admin.scaffoldings.index')
            ->with('success', 'Scaffolding berhasil ditambahkan!');
    }

    public function show(Scaffolding $scaffolding)
    {
        return view('admin.scaffoldings.show', compact('scaffolding'));
    }

    public function edit(Scaffolding $scaffolding)
    {
        return view('admin.scaffoldings.edit', compact('scaffolding'));
    }

    public function update(Request $request, Scaffolding $scaffolding)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|string|max:255',
            'rental_price' => 'nullable|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'dimensions' => 'required|string|max:255',
            'max_height' => 'required|integer|min:0',
            'max_load' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'specifications' => 'nullable|string'
        ]);

        $data = $request->all();
        // Set default values
        if (!isset($data['material'])) {
            $data['material'] = '-';
        }
        $data['stock_quantity'] = 999;
        $data['rental_price'] = 0;
        $data['sale_price'] = 0;
        $data['is_available'] = $request->has('is_available') ? 1 : 0;
        
        if ($request->hasFile('image')) {
            if ($scaffolding->image) {
                Storage::disk('public')->delete($scaffolding->image);
            }
            $storedPath = $request->file('image')->store('scaffoldings', 'public');
            $data['image'] = $storedPath;
            
            // Process image: resize to max 1200px width and white background
            ImageProcessingService::processProductImage($storedPath, 1200, 90);
            
            // Add watermark to image
            WatermarkService::addWatermark($storedPath);
        }

        $scaffolding->update($data);

        return redirect()->route('admin.scaffoldings.index')
            ->with('success', 'Scaffolding berhasil diperbarui!');
    }

    public function destroy(Scaffolding $scaffolding)
    {
        if ($scaffolding->image) {
            Storage::disk('public')->delete($scaffolding->image);
        }
        
        $scaffolding->delete();

        return redirect()->route('admin.scaffoldings.index')
            ->with('success', 'Scaffolding berhasil dihapus!');
    }
}
