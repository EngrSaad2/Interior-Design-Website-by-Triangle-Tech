@extends('admin.layout')

@section('title', 'Add Client Review')

@section('content')
<div class="max-w-xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl font-black text-slate-900 font-heading">Add Client Review</h1>
            <p class="text-xs text-slate-500 mt-1">Publish verified homeowner feedback and rating.</p>
        </div>
        <a href="{{ route('admin.testimonials.index') }}" class="text-xs font-bold text-slate-500 hover:text-slate-800">
            &larr; Back to Reviews
        </a>
    </div>

    <div class="bg-white rounded-3xl border border-slate-200 p-8 shadow-xs">
        <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Client Name *</label>
                    <input type="text" name="client_name" required value="{{ old('client_name') }}" placeholder="e.g. Dr. Shofiul Islam" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Client Title / Flat Info</label>
                    <input type="text" name="client_title" value="{{ old('client_title') }}" placeholder="e.g. 2,400 sqft Flat" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Location</label>
                    <input type="text" name="location" value="{{ old('location', 'Uttara Sector 6, Dhaka') }}" placeholder="e.g. Gulshan 2, Dhaka" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Star Rating (1-5)</label>
                    <select name="rating" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">
                        <option value="5" selected>5 Stars (★★★★★)</option>
                        <option value="4">4 Stars (★★★★)</option>
                        <option value="3">3 Stars (★★★)</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Client Testimonial Quote *</label>
                <textarea name="comment" rows="4" required placeholder="Write the feedback quotation..." class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:border-rose-500 focus:outline-none">{{ old('comment') }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Client Avatar Photo</label>
                <input type="file" name="avatar" accept="image/*" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-rose-50 file:text-rose-700 hover:file:bg-rose-100">
            </div>

            <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.testimonials.index') }}" class="px-5 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs transition-colors">Cancel</a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-rose-600 hover:bg-rose-500 text-white font-bold text-xs uppercase tracking-wider transition-all shadow-sm">Save Review</button>
            </div>
        </form>
    </div>
</div>
@endsection
