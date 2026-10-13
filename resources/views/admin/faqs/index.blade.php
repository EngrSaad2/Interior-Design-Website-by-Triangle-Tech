@extends('admin.layout')

@section('title', 'Frequently Asked Questions')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl font-black text-slate-900 font-heading">Frequently Asked Questions CMS</h1>
            <p class="text-xs text-slate-500 mt-1">Manage questions, detailed answers &amp; accordion ordering.</p>
        </div>
        <a href="{{ route('admin.faqs.create') }}" class="px-4 py-2.5 rounded-xl bg-rose-600 hover:bg-rose-500 text-white font-bold text-xs uppercase tracking-wider transition-all shadow-sm flex items-center gap-2">
            <i class="fas fa-plus"></i> Add New FAQ
        </a>
    </div>

    <div class="bg-white rounded-3xl border border-slate-200 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 text-slate-500 uppercase tracking-wider font-semibold border-b border-slate-100">
                    <tr>
                        <th class="p-4">Category</th>
                        <th class="p-4">Question</th>
                        <th class="p-4">Answer</th>
                        <th class="p-4">Order</th>
                        <th class="p-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($faqs as $faq)
                        <tr class="hover:bg-slate-50/80 transition-colors">
                            <td class="p-4">
                                <span class="px-2 py-0.5 rounded bg-slate-100 text-slate-700 font-medium">
                                    {{ $faq->category }}
                                </span>
                            </td>
                            <td class="p-4 font-bold text-slate-800 max-w-xs">
                                {{ $faq->question }}
                            </td>
                            <td class="p-4 text-slate-500 max-w-sm truncate">
                                {{ $faq->answer }}
                            </td>
                            <td class="p-4 font-mono font-bold text-slate-600">
                                {{ $faq->sort_order }}
                            </td>
                            <td class="p-4 text-right space-x-2">
                                <a href="{{ route('admin.faqs.edit', $faq->id) }}" class="p-2 rounded-lg bg-slate-100 hover:bg-rose-50 hover:text-rose-600 transition-colors inline-block" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.faqs.destroy', $faq->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this FAQ?');">
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
                            <td colspan="5" class="p-8 text-center text-slate-400">
                                No FAQs found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t border-slate-100">
            {{ $faqs->links() }}
        </div>
    </div>
</div>
@endsection
