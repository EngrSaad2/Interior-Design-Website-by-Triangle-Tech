@extends('admin.layout')

@section('title', 'Customer Inquiries & Leads')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-xl font-black text-slate-900 font-heading">Customer Inquiries &amp; Leads CMS</h1>
            <p class="text-xs text-slate-500 mt-1">Direct inquiries from free consultation modal, quote requests &amp; contact form.</p>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('admin.inquiries.index') }}" class="px-3 py-1.5 rounded-xl text-xs font-bold {{ !request('status') ? 'bg-slate-900 text-white' : 'bg-white text-slate-600 border border-slate-200' }}">
                All ({{ \App\Models\Inquiry::count() }})
            </a>
            <a href="{{ route('admin.inquiries.index', ['status' => 'new']) }}" class="px-3 py-1.5 rounded-xl text-xs font-bold {{ request('status') === 'new' ? 'bg-rose-600 text-white' : 'bg-white text-rose-600 border border-slate-200' }}">
                New ({{ \App\Models\Inquiry::where('status', 'new')->count() }})
            </a>
            <a href="{{ route('admin.inquiries.index', ['status' => 'contacted']) }}" class="px-3 py-1.5 rounded-xl text-xs font-bold {{ request('status') === 'contacted' ? 'bg-amber-600 text-white' : 'bg-white text-amber-600 border border-slate-200' }}">
                Contacted
            </a>
        </div>
    </div>

    <div class="bg-white rounded-3xl border border-slate-200 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 text-slate-500 uppercase tracking-wider font-semibold border-b border-slate-100">
                    <tr>
                        <th class="p-4">Customer</th>
                        <th class="p-4">Contact</th>
                        <th class="p-4">Service &amp; Budget</th>
                        <th class="p-4">Location &amp; Sqft</th>
                        <th class="p-4">Status</th>
                        <th class="p-4">Date</th>
                        <th class="p-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($inquiries as $inquiry)
                        <tr class="hover:bg-slate-50/80 transition-colors {{ $inquiry->status === 'new' ? 'bg-rose-50/30' : '' }}">
                            <td class="p-4 font-bold text-slate-800">
                                <div>{{ $inquiry->name }}</div>
                                @if($inquiry->status === 'new')
                                    <span class="inline-block mt-1 px-1.5 py-0.5 rounded text-[9px] font-extrabold uppercase tracking-wider bg-rose-100 text-rose-700">NEW LEAD</span>
                                @endif
                            </td>
                            <td class="p-4 font-mono text-slate-700 space-y-1">
                                <a href="tel:{{ $inquiry->phone }}" class="block font-bold hover:text-rose-600">
                                    <i class="fas fa-phone-alt text-[10px] text-slate-400 mr-1"></i>{{ $inquiry->phone }}
                                </a>
                                @php
                                    $cleanPhone = preg_replace('/[^0-9]/', '', $inquiry->phone);
                                @endphp
                                <a href="https://wa.me/{{ $cleanPhone }}" target="_blank" class="inline-flex items-center gap-1 text-[11px] text-emerald-600 hover:text-emerald-700 font-sans">
                                    <i class="fab fa-whatsapp"></i> Chat WhatsApp
                                </a>
                                @if($inquiry->email)
                                    <a href="mailto:{{ $inquiry->email }}" class="block text-[11px] text-slate-400 hover:text-slate-600 font-sans">
                                        {{ $inquiry->email }}
                                    </a>
                                @endif
                            </td>
                            <td class="p-4 text-slate-600">
                                <div class="font-bold text-slate-800">{{ $inquiry->service_type ?? 'Full Home Interior' }}</div>
                                @if($inquiry->budget)
                                    <span class="text-[11px] text-slate-500 block">Budget: {{ $inquiry->budget }}</span>
                                @endif
                            </td>
                            <td class="p-4 text-slate-600">
                                <div>{{ $inquiry->location ?? 'Dhaka' }}</div>
                                @if($inquiry->estimated_sqft)
                                    <span class="text-[11px] text-slate-400 font-mono">{{ $inquiry->estimated_sqft }} sqft</span>
                                @endif
                            </td>
                            <td class="p-4">
                                @if($inquiry->status === 'new')
                                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-rose-50 text-rose-600 border border-rose-200">New</span>
                                @elseif($inquiry->status === 'contacted')
                                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-50 text-amber-600 border border-amber-200">Contacted</span>
                                @elseif($inquiry->status === 'completed')
                                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-600 border border-emerald-200">Completed</span>
                                @else
                                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-slate-100 text-slate-600">Read</span>
                                @endif
                            </td>
                            <td class="p-4 text-slate-400 text-[11px]">
                                {{ $inquiry->created_at->format('d M Y') }}<br>
                                <span class="text-[10px]">{{ $inquiry->created_at->format('h:i A') }}</span>
                            </td>
                            <td class="p-4 text-right space-x-1">
                                <a href="{{ route('admin.inquiries.show', $inquiry->id) }}" class="p-2 rounded-lg bg-slate-100 hover:bg-rose-50 hover:text-rose-600 transition-colors inline-block" title="View details">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <form action="{{ route('admin.inquiries.destroy', $inquiry->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this inquiry?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 rounded-lg bg-slate-100 hover:bg-rose-50 hover:text-rose-600 transition-colors text-slate-500" title="Delete">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-8 text-center text-slate-400">
                                No inquiries found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t border-slate-100">
            {{ $inquiries->links() }}
        </div>
    </div>
</div>
@endsection
