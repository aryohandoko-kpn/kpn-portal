{{-- resources/views/components/application-card.blade.php --}}

@props([
    'icon' => null,
    'name',
    'description' => '',
    'category' => null,
    'department' => null,
    'environment' => null,
    'status' => 'active',
    'url' => '#',
])

@php
$statusStyles = [
    'active' => 'bg-emerald-100 text-emerald-700',
    'inactive' => 'bg-slate-100 text-slate-600',
    'maintenance' => 'bg-amber-100 text-amber-700',
];

$statusClass = $statusStyles[$status] ?? $statusStyles['active'];
@endphp

<div
    class="group flex h-full flex-col rounded-2xl border border-slate-200 bg-white p-4 transition-all duration-200 hover:-translate-y-1 hover:border-blue-200 hover:shadow-lg">

    {{-- Header --}}
    <div class="flex items-start justify-between">

        <div class="flex items-center gap-3 min-w-0">

            <div
                class="flex h-11 w-11 items-center justify-center rounded-xl bg-slate-100 overflow-hidden shrink-0">

                @if($icon)
                    <img
                        src="{{ $icon }}"
                        alt="{{ $name }}"
                        class="h-6 w-6 object-contain">
                @else
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-5 w-5 text-slate-500"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="1.8">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M4 6h16M4 12h16M4 18h10"/>
                    </svg>
                @endif

            </div>

            <div class="min-w-0">
                <h3 class="truncate text-sm font-semibold text-slate-900">
                    {{ $name }}
                </h3>

                <p class="truncate text-xs text-slate-500">
                    {{ $description }}
                </p>
            </div>

        </div>

        <span class="rounded-full px-2 py-0.5 text-[10px] font-medium {{ $statusClass }}">
            {{ ucfirst($status) }}
        </span>

    </div>

    {{-- Metadata --}}
    <div class="mt-4 space-y-1 text-xs text-slate-500">

        @if($category)
            <div class="flex justify-between">
                <span>Category</span>
                <span class="font-medium text-slate-700">{{ $category }}</span>
            </div>
        @endif

        @if($department)
            <div class="flex justify-between">
                <span>Department</span>
                <span class="font-medium text-slate-700">{{ $department }}</span>
            </div>
        @endif

        @if($environment)
            <div class="flex justify-between">
                <span>Environment</span>
                <span class="font-medium text-slate-700">{{ $environment }}</span>
            </div>
        @endif

    </div>

    {{-- Footer --}}
    <div class="mt-auto pt-4">

        <a
            href="{{ $url }}"
            target="_blank"
            class="inline-flex w-full items-center justify-center gap-2 rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-xs font-semibold text-slate-700 transition-all hover:border-blue-200 hover:bg-blue-50 hover:text-blue-700">

            <svg xmlns="http://www.w3.org/2000/svg"
                 class="h-4 w-4"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor"
                 stroke-width="2">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M13 7h4m0 0v4m0-4L10 14"/>

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M5 5h6v2H7v10h10v-4h2v6H5V5z"/>

            </svg>

            Open Application

        </a>

    </div>

</div>