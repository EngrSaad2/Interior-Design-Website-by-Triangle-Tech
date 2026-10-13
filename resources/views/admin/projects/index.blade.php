@extends('admin.layout')

@section('title', 'Projects Portfolio')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl font-black text-slate-900 font-heading">Projects Portfolio CMS</h1>
            <p class="text-xs text-slate-500 mt-1">Manage completed handover projects, photos, sqft, locations &amp; budgets.</p>
        </div>
        <a href="{{ route('admin.projects.create') }}" class="px-4 py-2.5 rounded-xl bg-rose-600 hover:bg-rose-500 text-white font-bold text-xs uppercase tracking-wider transition-all shadow-sm flex items-center gap-2">
            <i class="fas fa-plus"></i> Add New Project
        </a>
    </div>

    <div class="bg-white rounded-3xl border border-slate-200 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 text-slate-500 uppercase tracking-wider font-semibold border-b border-slate-100">
                    <tr>
                        <th class="p-4">Featured Photo</th>
                        <th class="p-4">Project Title</th>
                        <th class="p-4">Category</th>
                        <th class="p-4">Location &amp; Area</th>
                        <th class="p-4">Featured</th>
                        <th class="p-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($projects as $project)
                        <tr class="hover:bg-slate-50/80 transition-colors">
                            <td class="p-4">
                                <img src="{{ asset($project->featured_image ?? 'images/banner-1.webp') }}" class="w-16 h-12 rounded-xl object-cover border border-slate-200" onerror="this.src='{{ asset('images/banner-1.webp') }}'">
                            </td>
                            <td class="p-4 font-bold text-slate-800">
                                <div>{{ $project->title }}</div>
                                <span class="font-mono text-[10px] text-slate-400 font-normal">/projects/{{ $project->slug }}</span>
                            </td>
                            <td class="p-4 text-slate-600">
                                <span class="px-2 py-0.5 rounded bg-slate-100 text-slate-700 font-medium">
                                    {{ $project->category ?? 'Interior Design' }}
                                </span>
                            </td>
                            <td class="p-4 text-slate-500">
                                <div class="font-medium text-slate-700">{{ $project->location ?? 'Dhaka, Bangladesh' }}</div>
                                @if($project->area_sqft)
                                    <span class="text-[10px] text-slate-400">{{ $project->area_sqft }} sqft</span>
                                @endif
                            </td>
                            <td class="p-4">
                                @if($project->is_featured)
                                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-50 text-amber-700 border border-amber-200">Featured</span>
                                @else
                                    <span class="px-2 py-0.5 rounded-full text-[10px] text-slate-400">Standard</span>
                                @endif
                            </td>
                            <td class="p-4 text-right space-x-2">
                                <a href="{{ route('project.detail', $project->slug) }}" target="_blank" class="p-2 rounded-lg bg-slate-100 hover:bg-slate-200 transition-colors inline-block" title="View on site">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                                <a href="{{ route('admin.projects.edit', $project->id) }}" class="p-2 rounded-lg bg-slate-100 hover:bg-rose-50 hover:text-rose-600 transition-colors inline-block" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this project?');">
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
                                No projects found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t border-slate-100">
            {{ $projects->links() }}
        </div>
    </div>
</div>
@endsection
