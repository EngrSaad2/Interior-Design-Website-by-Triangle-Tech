@extends('admin.layout')

@section('title', 'Inquiry Details #' . $inquiry->id)

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl font-black text-slate-900 font-heading">Lead / Inquiry Details #{{ $inquiry->id }}</h1>
            <p class="text-xs text-slate-500 mt-1">Received on {{ $inquiry->created_at->format('d M Y, h:i A') }}</p>
        </div>
        <a href="{{ route('admin.inquiries.index') }}" class="text-xs font-bold text-slate-500 hover:text-slate-800">
            &larr; Back to Inquiries
        </a>
    </div>

    <div class="bg-white rounded-3xl border border-slate-200 p-8 shadow-xs space-y-6">
        <!-- Lead summary card -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between p-4 rounded-2xl bg-slate-50 border border-slate-200 gap-4">
            <div>
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider block">Customer Name</span>
                <span class="text-lg font-black text-slate-900">{{ $inquiry->name }}</span>
            </div>
            <div class="flex items-center gap-2">
                <a href="tel:{{ $inquiry->phone }}" class="px-4 py-2 rounded-xl bg-slate-900 text-white font-bold text-xs flex items-center gap-2 hover:bg-slate-800">
                    <i class="fas fa-phone-alt"></i> Call
                </a>
                @php
                    $cleanPhone = preg_replace('/[^0-9]/', '', $inquiry->phone);
                @endphp
                <a href="https://wa.me/{{ $cleanPhone }}" target="_blank" class="px-4 py-2 rounded-xl bg-emerald-600 text-white font-bold text-xs flex items-center gap-2 hover:bg-emerald-500">
                    <i class="fab fa-whatsapp"></i> WhatsApp
                </a>
            </div>
        </div>

        <!-- Details Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
            <div class="p-4 rounded-2xl border border-slate-100 bg-slate-50/50">
                <span class="text-slate-400 font-bold uppercase tracking-wider block mb-1">Direct Phone</span>
                <span class="font-mono text-sm font-bold text-slate-800">{{ $inquiry->phone }}</span>
            </div>

            <div class="p-4 rounded-2xl border border-slate-100 bg-slate-50/50">
                <span class="text-slate-400 font-bold uppercase tracking-wider block mb-1">Email Address</span>
                <span class="text-sm font-bold text-slate-800">{{ $inquiry->email ?? 'Not provided' }}</span>
            </div>

            <div class="p-4 rounded-2xl border border-slate-100 bg-slate-50/50">
                <span class="text-slate-400 font-bold uppercase tracking-wider block mb-1">Requested Service</span>
                <span class="text-sm font-bold text-slate-800">{{ $inquiry->service_type ?? 'Full Home Interior' }}</span>
            </div>

            <div class="p-4 rounded-2xl border border-slate-100 bg-slate-50/50">
                <span class="text-slate-400 font-bold uppercase tracking-wider block mb-1">Estimated Budget</span>
                <span class="text-sm font-bold text-slate-800">{{ $inquiry->budget ?? 'Flexible / BOQ Needed' }}</span>
            </div>

            <div class="p-4 rounded-2xl border border-slate-100 bg-slate-50/50">
                <span class="text-slate-400 font-bold uppercase tracking-wider block mb-1">Apartment / House Location</span>
                <span class="text-sm font-bold text-slate-800">{{ $inquiry->location ?? 'Dhaka, Bangladesh' }}</span>
            </div>

            <div class="p-4 rounded-2xl border border-slate-100 bg-slate-50/50">
                <span class="text-slate-400 font-bold uppercase tracking-wider block mb-1">Apartment Size (Sqft)</span>
                <span class="text-sm font-bold text-slate-800">{{ $inquiry->estimated_sqft ? $inquiry->estimated_sqft . ' sqft' : 'Not specified' }}</span>
            </div>
        </div>

        @if($inquiry->message)
            <div>
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider block mb-2">Customer Message</span>
                <div class="p-4 rounded-2xl border border-slate-200 bg-slate-50 text-xs text-slate-700 leading-relaxed whitespace-pre-wrap">
                    {{ $inquiry->message }}
                </div>
            </div>
        @endif

        <!-- Status update form -->
        <div class="pt-4 border-t border-slate-100">
            <form action="{{ route('admin.inquiries.status', $inquiry->id) }}" method="POST" class="flex items-center gap-3">
                @csrf
                <span class="text-xs font-bold text-slate-700">Update Lead Status:</span>
                <select name="status" class="px-3 py-1.5 rounded-xl border border-slate-200 text-xs font-semibold focus:border-rose-500 focus:outline-none">
                    <option value="new" {{ $inquiry->status === 'new' ? 'selected' : '' }}>New</option>
                    <option value="read" {{ $inquiry->status === 'read' ? 'selected' : '' }}>Read</option>
                    <option value="contacted" {{ $inquiry->status === 'contacted' ? 'selected' : '' }}>Contacted</option>
                    <option value="completed" {{ $inquiry->status === 'completed' ? 'selected' : '' }}>Completed Handover</option>
                </select>
                <button type="submit" class="px-4 py-1.5 rounded-xl bg-slate-900 text-white font-bold text-xs hover:bg-slate-800 transition-colors">
                    Save Status
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
