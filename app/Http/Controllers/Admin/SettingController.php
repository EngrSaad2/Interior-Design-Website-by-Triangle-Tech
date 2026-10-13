<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Services\ImageUploadService;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $fields = [
            'site_name',
            'site_tagline',
            'phone',
            'hotline',
            'factory_phone',
            'email',
            'office_address',
            'factory_address',
            'whatsapp',
            'facebook',
            'youtube',
            'linkedin',
            'pinterest',
            'map_embed_url',
            'meta_title',
            'meta_description',
        ];

        foreach ($fields as $field) {
            if ($request->has($field)) {
                Setting::set($field, $request->input($field));
            }
        }

        // Logo Upload
        if ($request->hasFile('logo')) {
            $path = ImageUploadService::uploadAsWebp($request->file('logo'), 'logo');
            Setting::set('logo', $path);
        }

        // White Logo Upload
        if ($request->hasFile('logo_white')) {
            $path = ImageUploadService::uploadAsWebp($request->file('logo_white'), 'logo_white');
            Setting::set('logo_white', $path);
        }

        // Favicon Upload
        if ($request->hasFile('favicon')) {
            $file = $request->file('favicon');
            $filename = 'favicon_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            Setting::set('favicon', 'uploads/' . $filename);
            @copy(public_path('uploads/' . $filename), public_path('favicon.ico'));
            @copy(public_path('uploads/' . $filename), public_path('favicon.png'));
        }

        return back()->with('success', 'Site settings updated successfully!');
    }
}
