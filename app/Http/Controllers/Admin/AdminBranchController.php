<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminBranchController extends Controller
{
    public function index()
    {
        $branches = Branch::orderBy('is_main_branch', 'desc')
            ->orderBy('sort_order', 'asc')
            ->paginate(15);
        return view('admin.branches.index', compact('branches'));
    }

    public function create()
    {
        return view('admin.branches.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:10|unique:branches',
            'description' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string|max:20',
            'email' => 'required|email',
            'manager_name' => 'required|string|max:255',
            'manager_phone' => 'required|string|max:20',
            'manager_email' => 'required|email',
            'whatsapp_number' => 'nullable|string|max:20',
            'whatsapp_message' => 'nullable|string',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'maps_url' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'operating_hours' => 'nullable|array',
            'services' => 'nullable|array',
            'is_main_branch' => 'nullable',
            'is_active' => 'nullable',
            'sort_order' => 'integer|min:0'
        ]);

        $data = $request->all();
        
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('branches', 'public');
        }

        $data['is_main_branch'] = $request->has('is_main_branch') || $request->input('is_main_branch') === 'on';
        $data['is_active'] = $request->has('is_active') || $request->input('is_active') === 'on';
        $data['sort_order'] = $request->sort_order ?? 0;

        Branch::create($data);

        return redirect()->route('admin.branches.index')
            ->with('success', 'Cabang berhasil ditambahkan!');
    }

    public function show(Branch $branch)
    {
        return view('admin.branches.show', compact('branch'));
    }

    public function edit(Branch $branch)
    {
        return view('admin.branches.edit', compact('branch'));
    }

    public function update(Request $request, Branch $branch)
    {
        $request->validate([
                'name' => 'required|string|max:255',
                'code' => 'required|string|max:10|unique:branches,code,' . $branch->id,
                'description' => 'required|string',
                'address' => 'required|string',
                'phone' => 'required|string|max:20',
                'email' => 'required|email',
                'manager_name' => 'required|string|max:255',
                'manager_phone' => 'required|string|max:20',
                'manager_email' => 'required|email',
                'whatsapp_number' => 'nullable|string|max:20',
                'whatsapp_message' => 'nullable|string',
                'latitude' => 'nullable|numeric|between:-90,90',
                'longitude' => 'nullable|numeric|between:-180,180',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
                'operating_hours' => 'nullable|array',
                'services' => 'nullable|array',
                'is_main_branch' => 'nullable',
                'is_active' => 'nullable',
                'sort_order' => 'integer|min:0'
            ]);

            $data = $request->all();
            
            if ($request->hasFile('image')) {
                if ($branch->image) {
                    Storage::disk('public')->delete($branch->image);
                }
                $data['image'] = $request->file('image')->store('branches', 'public');
            }

            $data['is_main_branch'] = $request->has('is_main_branch') || $request->input('is_main_branch') === 'on';
            $data['is_active'] = $request->has('is_active') || $request->input('is_active') === 'on';
            $data['sort_order'] = $request->sort_order ?? 0;

            $branch->update($data);

            return redirect()->route('admin.branches.index')
                ->with('success', 'Cabang berhasil diperbarui!');
    }

    public function destroy(Branch $branch)
    {
        if ($branch->image) {
            Storage::disk('public')->delete($branch->image);
        }
        
        $branch->delete();

        return redirect()->route('admin.branches.index')
            ->with('success', 'Cabang berhasil dihapus!');
    }
}
