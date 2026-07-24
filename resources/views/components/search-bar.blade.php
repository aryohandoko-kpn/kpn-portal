@props(['placeholder' => 'Cari...', 'theme' => 'blue'])

@php
    $themeClasses = $theme === 'emerald'
        ? 'focus-within:border-emerald-400 focus-within:ring-emerald-100'
        : 'focus-within:border-blue-400 focus-within:ring-blue-100';

    $buttonClasses = $theme === 'emerald'
        ? 'bg-emerald-600 hover:bg-emerald-700'
        : 'bg-blue-600 hover:bg-blue-700';
@endphp

<form method="GET" action="{{ request()->url() }}" class="relative">

    @foreach(request()->except(['search', 'page']) as $key => $value)
        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
    @endforeach

    <div class="flex items-center gap-2 rounded-2xl border border-slate-200 bg-white p-2 shadow-sm
                {{ $themeClasses }} focus-within:ring-4 transition">

        <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5 shrink-0 text-slate-400" fill="none"
            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M21 21l-4.35-4.35m1.35-5.65a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>

        <input type="text" name="search" value="{{ request('search') }}" placeholder="{{ $placeholder }}"
            class="w-full border-0 bg-transparent text-sm text-slate-800 placeholder:text-slate-400 focus:outline-none focus:ring-0">

        @if(request('search'))
            <a href="{{ request()->fullUrlWithQuery(['search' => null]) }}"
                class="rounded-lg p-1 text-slate-400 hover:bg-slate-100 hover:text-slate-600 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </a>
        @endif

        <button type="submit"
            class="rounded-xl px-5 py-2.5 text-sm font-semibold text-white shadow transition {{ $buttonClasses }}">
            Cari
        </button>

    </div>
</form>