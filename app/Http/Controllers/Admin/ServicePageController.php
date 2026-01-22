<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;

class ServicePageController extends Controller
{
    public function index()
    {
        $profile = CompanyProfile::first();
        return view('admin.services.index', compact('profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'service_sales_hero_title' => 'nullable|string|max:255',
            'service_sales_hero_subtitle' => 'nullable|string|max:255',
            'service_sales_intro_title' => 'nullable|string|max:255',
            'service_sales_intro_text' => 'nullable|string',
            'service_sales_section_title' => 'nullable|string|max:255',
            'service_sales_section_bullets' => 'nullable|string',
            'service_sales_extra_title' => 'nullable|string|max:255',
            'service_sales_extra_1_title' => 'nullable|string|max:255',
            'service_sales_extra_1_text' => 'nullable|string',
            'service_sales_extra_2_title' => 'nullable|string|max:255',
            'service_sales_extra_2_text' => 'nullable|string',
            'service_sales_side_title' => 'nullable|string|max:255',
            'service_sales_side_text' => 'nullable|string',
            'service_sales_side_button_text' => 'nullable|string|max:255',
            'service_sales_side_footer_text' => 'nullable|string',
            'service_rental_hero_title' => 'nullable|string|max:255',
            'service_rental_hero_subtitle' => 'nullable|string|max:255',
            'service_rental_intro_title' => 'nullable|string|max:255',
            'service_rental_intro_text' => 'nullable|string',
            'service_rental_section_title' => 'nullable|string|max:255',
            'service_rental_section_bullets' => 'nullable|string',
            'service_rental_extra_title' => 'nullable|string|max:255',
            'service_rental_extra_1_title' => 'nullable|string|max:255',
            'service_rental_extra_1_text' => 'nullable|string',
            'service_rental_extra_2_title' => 'nullable|string|max:255',
            'service_rental_extra_2_text' => 'nullable|string',
            'service_rental_side_title' => 'nullable|string|max:255',
            'service_rental_side_text' => 'nullable|string',
            'service_rental_side_button_text' => 'nullable|string|max:255',
            'service_rental_side_footer_text' => 'nullable|string',
            'service_delivery_hero_title' => 'nullable|string|max:255',
            'service_delivery_hero_subtitle' => 'nullable|string|max:255',
            'service_delivery_intro_title' => 'nullable|string|max:255',
            'service_delivery_intro_text' => 'nullable|string',
            'service_delivery_section_title' => 'nullable|string|max:255',
            'service_delivery_section_bullets' => 'nullable|string',
            'service_delivery_extra_title' => 'nullable|string|max:255',
            'service_delivery_extra_1_title' => 'nullable|string|max:255',
            'service_delivery_extra_1_text' => 'nullable|string',
            'service_delivery_extra_2_title' => 'nullable|string|max:255',
            'service_delivery_extra_2_text' => 'nullable|string',
            'service_delivery_side_title' => 'nullable|string|max:255',
            'service_delivery_side_text' => 'nullable|string',
            'service_delivery_side_button_text' => 'nullable|string|max:255',
            'service_delivery_side_footer_text' => 'nullable|string',
            'service_consultation_hero_title' => 'nullable|string|max:255',
            'service_consultation_hero_subtitle' => 'nullable|string|max:255',
            'service_consultation_intro_title' => 'nullable|string|max:255',
            'service_consultation_intro_text' => 'nullable|string',
            'service_consultation_section_title' => 'nullable|string|max:255',
            'service_consultation_section_bullets' => 'nullable|string',
            'service_consultation_extra_title' => 'nullable|string|max:255',
            'service_consultation_extra_1_title' => 'nullable|string|max:255',
            'service_consultation_extra_1_text' => 'nullable|string',
            'service_consultation_extra_2_title' => 'nullable|string|max:255',
            'service_consultation_extra_2_text' => 'nullable|string',
            'service_consultation_side_title' => 'nullable|string|max:255',
            'service_consultation_side_text' => 'nullable|string',
            'service_consultation_side_button_text' => 'nullable|string|max:255',
            'service_consultation_side_footer_text' => 'nullable|string',
        ]);

        $data = $request->only([
            'service_sales_hero_title',
            'service_sales_hero_subtitle',
            'service_sales_intro_title',
            'service_sales_intro_text',
            'service_sales_section_title',
            'service_sales_section_bullets',
            'service_sales_extra_title',
            'service_sales_extra_1_title',
            'service_sales_extra_1_text',
            'service_sales_extra_2_title',
            'service_sales_extra_2_text',
            'service_sales_side_title',
            'service_sales_side_text',
            'service_sales_side_button_text',
            'service_sales_side_footer_text',
            'service_rental_hero_title',
            'service_rental_hero_subtitle',
            'service_rental_intro_title',
            'service_rental_intro_text',
            'service_rental_section_title',
            'service_rental_section_bullets',
            'service_rental_extra_title',
            'service_rental_extra_1_title',
            'service_rental_extra_1_text',
            'service_rental_extra_2_title',
            'service_rental_extra_2_text',
            'service_rental_side_title',
            'service_rental_side_text',
            'service_rental_side_button_text',
            'service_rental_side_footer_text',
            'service_delivery_hero_title',
            'service_delivery_hero_subtitle',
            'service_delivery_intro_title',
            'service_delivery_intro_text',
            'service_delivery_section_title',
            'service_delivery_section_bullets',
            'service_delivery_extra_title',
            'service_delivery_extra_1_title',
            'service_delivery_extra_1_text',
            'service_delivery_extra_2_title',
            'service_delivery_extra_2_text',
            'service_delivery_side_title',
            'service_delivery_side_text',
            'service_delivery_side_button_text',
            'service_delivery_side_footer_text',
            'service_consultation_hero_title',
            'service_consultation_hero_subtitle',
            'service_consultation_intro_title',
            'service_consultation_intro_text',
            'service_consultation_section_title',
            'service_consultation_section_bullets',
            'service_consultation_extra_title',
            'service_consultation_extra_1_title',
            'service_consultation_extra_1_text',
            'service_consultation_extra_2_title',
            'service_consultation_extra_2_text',
            'service_consultation_side_title',
            'service_consultation_side_text',
            'service_consultation_side_button_text',
            'service_consultation_side_footer_text',
        ]);

        $profile = CompanyProfile::first();
        if ($profile) {
            $profile->update($data);
        } else {
            CompanyProfile::create($data);
        }

        return redirect()->route('admin.services.index')
            ->with('success', 'Konten halaman layanan berhasil diperbarui!');
    }
}
