@extends('admin.layout')

@section('title', 'Client Testimonials')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl font-black text-slate-900 font-heading">Client Reviews &amp; Testimonials CMS</h1>
            <p class="text-xs text-slate-500 mt-1">Manage homeowner feedback, star ratings, quotes, and avatars on homepage.</p>
        </div>
        <a href="{{ route('admin.testimonials.create') }}" class="px-4 py-2.5 rounded-xl bg-rose-600 hover:bg-rose-500 text-white font-bold text-xs uppercase tracking-wider transition-all shadow-sm flex items-center gap-2">
            <i class="fas fa-plus"></i> Add New Review
        </a>
    </div>

    <div class="bg-white rounded-3xl border border-slate-200 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 text-slate-500 uppercase tracking-wider font-semibold border-b border-slate-100">
                    <tr>
                        <th class="p-4">Avatar</th>
                        <th class="p-4">Client Name &amp; Title</th>
                        <th class="p-4">Location</th>
                        <th class="p-4">Rating</th>
                        <th class="p-4">Quote</th>
                        <th class="p-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($testimonials as $t)
                        <tr class="hover:bg-slate-50/80 transition-colors">
                            <td class="p-4">
                                <img src="{{ asset($t->avatar ?? 'images/clients.jpg') }}" class="w-12 h-12 rounded-full object-cover border border-slate-200" onerror="this.src='{{ asset('images/clients.jpg') }}'">
                            </td>
                            <td class="p-4 font-bold text-slate-800">
                                <div>{{ $t->client_name }}</div>
                                <span class="text-[11px] text-slate-400 font-normal">{{ $t->client_title ?? 'Homeowner' }}</span>
                            </td>
                            <td class="p-4 text-slate-600">
                                {{ $t->location ?? 'Dhaka, Bangladesh' }}
                            </td>
                            <td class="p-4 text-amber-500 font-bold">
                                @for($i = 0; $i < $t->rating; $i++)
                                    <i class="fas fa-star text-[10px]"></i>
                                @endfor
                            </td>
                            <td class="p-4 text-slate-600 max-w-xs truncate">
                                "{{ $t->comment }}"
                            </td>
                            <td class="p-4 text-right space-x-2">
                                <a href="{{ route('admin.testimonials.edit', $t->id) }}" class="p-2 rounded-lg bg-slate-100 hover:bg-rose-50 hover:text-rose-600 transition-colors inline-block" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.testimonials.destroy', $t->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete review?');">
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
                            <td colspan="6" class="p-8 text-center text-slate-400">
                                No reviews found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t border-slate-100">
            {{ $testimonials->links() }}
        </div>
    </div>
</div>
@endsection
