<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function index()
    {
        $profile = CompanyProfile::first();

        $footerItemsLines = '';
        $items = $profile?->footer_services_items;

        if (is_array($items) && count($items) > 0) {
            $lines = [];
            foreach ($items as $item) {
                $label = $item['label'] ?? '';
                $url = $item['url'] ?? '';
                if ($label !== '') {
                    $lines[] = $label . ' | ' . $url;
                }
            }
            $footerItemsLines = implode(PHP_EOL, $lines);
        } else {
            $defaultLines = [
                'Sewa Scaffolding | ' . route('scaffoldings.index'),
                'Jual Scaffolding | ' . route('scaffoldings.index'),
                'Katalog Produk | ' . route('scaffoldings.index'),
                'Galeri Proyek | ' . route('projects.index'),
                'Cabang Kami | ' . route('branches.index'),
                'Konsultasi | ' . route('contact'),
            ];
            $footerItemsLines = implode(PHP_EOL, $defaultLines);
        }

        return view('admin.footer.index', [
            'profile' => $profile,
            'footerItemsLines' => $footerItemsLines,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'footer_services_title' => 'nullable|string|max:255',
            'footer_services_items_text' => 'nullable|string',
            'footer_copyright_text' => 'nullable|string|max:255',
            'footer_company_name' => 'nullable|string',
            'footer_company_description' => 'nullable|string',
            'footer_contact_title' => 'nullable|string|max:255',
            'footer_contact_address' => 'nullable|string',
            'footer_contact_phone' => 'nullable|string|max:255',
            'footer_contact_email' => 'nullable|string|max:255',
        ]);

        $profile = CompanyProfile::first() ?? new CompanyProfile();

        $profile->footer_services_title = $request->footer_services_title;
        $profile->footer_copyright_text = $request->footer_copyright_text;
        $profile->footer_company_name = $request->footer_company_name;
        $profile->footer_company_description = $request->footer_company_description;
        $profile->footer_contact_title = $request->footer_contact_title;
        $profile->footer_contact_address = $request->footer_contact_address;
        $profile->footer_contact_phone = $request->footer_contact_phone;
        $profile->footer_contact_email = $request->footer_contact_email;

        $itemsText = trim((string) $request->footer_services_items_text);
        $items = [];

        if ($itemsText !== '') {
            $lines = preg_split("/\r\n|\r|\n/", $itemsText);

            foreach ($lines as $line) {
                $line = trim($line);

                if ($line === '') {
                    continue;
                }

                $parts = array_map('trim', explode('|', $line, 2));
                $label = $parts[0] ?? null;
                $url = $parts[1] ?? '';

                if ($label) {
                    $items[] = [
                        'label' => $label,
                        'url' => $url,
                    ];
                }
            }
        }

        $profile->footer_services_items = $items;

        $profile->save();

        return redirect()
            ->route('admin.footer.index')
            ->with('success', 'Konten footer berhasil diperbarui!');
    }
}
