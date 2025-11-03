<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Branch;

class ContactController extends Controller
{
    public function index()
    {
        $profile = \App\Models\Profile::first();
        $branches = Branch::where('is_active', true)->orderBy('is_main_branch', 'desc')->orderBy('sort_order', 'asc')->get();
        
        return view('contact', compact('profile', 'branches'));
    }
    
    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
        ]);

        // Here you can add email sending logic
        // For now, we'll just return a success message
        
        return redirect()->route('contact')->with('success', 'Pesan Anda berhasil dikirim! Kami akan segera menghubungi Anda.');
    }
}





