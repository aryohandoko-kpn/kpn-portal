<x-app-layout max-width="max-w-3xl">
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.applications.index') }}" class="inline-flex items-center justify-center h-9 w-9 rounded-lg text-slate-500
                      hover:bg-slate-100 hover:text-slate-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Application Detail</h2>
        </div>
    </x-slot>

    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-8">

        <div class="flex items-start gap-4 mb-6">
            <div class="h-16 w-16 rounded-xl bg-blue-50 flex items-center justify-center overflow-hidden shrink-0">
                @if ($application->icon)
                    <img src="{{ \Illuminate\Support\Facades\Storage::url($application->icon) }}"
                        class="h-full w-full object-cover">
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h12a2 2 0 012 2v2H4V6zm0 4h16v8a2 2 0
                                     01-2 2H6a2 2 0 01-2-2v-8z" />
                    </svg>
                @endif
            </div>
            <div>
                <h1 class="text-2xl font-semibold text-slate-900">{{ $application->name }}</h1>
                <p class="text-slate-500 mt-1">{{ $application->description }}</p>
            </div>
        </div>

        <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-4 text-sm mb-8 pt-6 border-t border-slate-100">
            <div>
                <dt class="text-slate-400">Category</dt>
                <dd class="font-medium text-slate-900">{{ $application->category?->name ?? '-' }}</dd>
            </div>
            <div>
                <dt class="text-slate-400">Department</dt>
                <dd class="font-medium text-slate-900">{{ $application->department ?: '-' }}</dd>
            </div>
            <div>
                <dt class="text-slate-400">Owner</dt>
                <dd class="font-medium text-slate-900">{{ $application->owner ?: '-' }}</dd>
            </div>
            <div>
                <dt class="text-slate-400">Environment</dt>
                <dd class="font-medium text-slate-900">{{ $application->environment }}</dd>
            </div>
            <div>
                <dt class="text-slate-400">Status</dt>
                <dd class="font-medium text-slate-900">{{ ucfirst($application->status) }}</dd>
            </div>
            <div>
                <dt class="text-slate-400">Last Updated</dt>
                <dd class="font-medium text-slate-900">{{ $application->updated_at->format('d M Y, H:i') }}</dd>
            </div>
        </dl>

        <a href="{{ $application->url }}" target="_blank" class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-5 py-3
                  text-sm font-semibold text-white hover:bg-blue-700 transition">
            Launch Application
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
            </svg>
        </a>
    </div>
</x-app-layout>