@extends('admin.layout')

@section('title', 'Site Settings & Branding')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl font-black text-slate-900 font-heading">Site Settings &amp; Branding</h1>
            <p class="text-xs text-slate-500 mt-1">Configure company hotline, factory phone, addresses, logos &amp; social links.</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="text-xs font-bold text-slate-500 hover:text-slate-800">
            &larr; Back to Dashboard
        </a>
    </div>

    <div class="bg-white rounded-3xl border border-slate-200 p-8 shadow-xs">
        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Section 1: General Info -->
            <div>
                <h3 class="text-xs font-black uppercase tracking-wider text-rose-600 mb-4 pb-2 border-b border-slate-100 flex items-center gap-2">
                    <i class="fas fa-building"></i> Company Information
                </h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Company / Site Name</label>
                        <input type="text" name="site_name" value="{{ $settings['site_name'] ?? 'Triangle Interior Design' }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Site Tagline</label>
                        <input type="text" name="site_tagline" value="{{ $settings['site_tagline'] ?? 'Best Interior Design Company in Bangladesh' }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                    </div>
                </div>
            </div>

            <!-- Section 2: Contact & Phone Numbers -->
            <div>
                <h3 class="text-xs font-black uppercase tracking-wider text-rose-600 mb-4 pb-2 border-b border-slate-100 flex items-center gap-2">
                    <i class="fas fa-phone-alt"></i> Contact &amp; Hotlines
                </h3>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Direct Hotline *</label>
                        <input type="text" name="hotline" value="{{ $settings['hotline'] ?? '+8801810536303' }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none font-mono">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Factory Phone</label>
                        <input type="text" name="factory_phone" value="{{ $settings['factory_phone'] ?? '+8801810536303' }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none font-mono">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Official Email</label>
                        <input type="email" name="email" value="{{ $settings['email'] ?? 'info@triangleinterior.com' }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                    </div>
                </div>
            </div>

            <!-- Section 3: Addresses -->
            <div>
                <h3 class="text-xs font-black uppercase tracking-wider text-rose-600 mb-4 pb-2 border-b border-slate-100 flex items-center gap-2">
                    <i class="fas fa-map-marker-alt"></i> Addresses
                </h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Design Studio Address</label>
                        <textarea name="office_address" rows="2" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">{{ $settings['office_address'] ?? 'House 127 (2nd floor), Road 05, Mohakhali New DOHS Dhaka 1206, Bangladesh' }}</textarea>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Joinery Factory Address</label>
                        <textarea name="factory_address" rows="2" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">{{ $settings['factory_address'] ?? '1920, Koborsthan Road, East Badda, Dhaka 1212, Bangladesh' }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Section 4: Social Media & WhatsApp -->
            <div>
                <h3 class="text-xs font-black uppercase tracking-wider text-rose-600 mb-4 pb-2 border-b border-slate-100 flex items-center gap-2">
                    <i class="fas fa-share-alt"></i> Social Media &amp; Messaging
                </h3>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">WhatsApp Number</label>
                        <input type="text" name="whatsapp" value="{{ $settings['whatsapp'] ?? '8801810536303' }}" placeholder="8801810536303" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none font-mono">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Facebook URL</label>
                        <input type="url" name="facebook" value="{{ $settings['facebook'] ?? 'https://www.facebook.com/dit.interior/' }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">YouTube URL</label>
                        <input type="url" name="youtube" value="{{ $settings['youtube'] ?? 'https://www.youtube.com/@ditstudiobd' }}" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                    </div>
                </div>
            </div>

            <!-- Section 5: Logos & Favicon Upload -->
            <div>
                <h3 class="text-xs font-black uppercase tracking-wider text-rose-600 mb-4 pb-2 border-b border-slate-100 flex items-center gap-2">
                    <i class="fas fa-image"></i> Brand Assets &amp; Logos
                </h3>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Main Dark Logo</label>
                        <div class="p-3 bg-slate-50 border border-slate-200 rounded-2xl mb-2 flex items-center justify-center h-16">
                            <img src="{{ asset($settings['logo'] ?? 'images/triangle-logo.svg') }}" class="max-h-12 w-auto object-contain">
                        </div>
                        <input type="file" name="logo" accept="image/*" class="w-full text-[11px] text-slate-500 file:mr-2 file:py-1.5 file:px-3 file:rounded-xl file:border-0 file:text-[11px] file:font-bold file:bg-rose-50 file:text-rose-700 hover:file:bg-rose-100">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">White Logo (Footer / Dark Mode)</label>
                        <div class="p-3 bg-slate-900 border border-slate-800 rounded-2xl mb-2 flex items-center justify-center h-16">
                            <img src="{{ asset($settings['logo_white'] ?? 'images/triangle-logo-white.svg') }}" class="max-h-12 w-auto object-contain">
                        </div>
                        <input type="file" name="logo_white" accept="image/*" class="w-full text-[11px] text-slate-500 file:mr-2 file:py-1.5 file:px-3 file:rounded-xl file:border-0 file:text-[11px] file:font-bold file:bg-rose-50 file:text-rose-700 hover:file:bg-rose-100">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Favicon Icon</label>
                        <div class="p-3 bg-slate-50 border border-slate-200 rounded-2xl mb-2 flex items-center justify-center h-16">
                            <img src="{{ asset('favicon.ico') }}" class="w-8 h-8 object-contain">
                        </div>
                        <input type="file" name="favicon" accept=".ico,.png,.svg" class="w-full text-[11px] text-slate-500 file:mr-2 file:py-1.5 file:px-3 file:rounded-xl file:border-0 file:text-[11px] file:font-bold file:bg-rose-50 file:text-rose-700 hover:file:bg-rose-100">
                    </div>
                </div>
            </div>

            <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3">
                <button type="submit" class="px-8 py-3 rounded-xl bg-rose-600 hover:bg-rose-500 text-white font-bold text-xs uppercase tracking-wider transition-all shadow-md shadow-rose-600/20">
                    Save All Settings
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
