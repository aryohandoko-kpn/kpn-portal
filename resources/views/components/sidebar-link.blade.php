{{-- resources/views/components/sidebar-link.blade.php --}}
@props(['href' => '#', 'active' => false, 'icon' => null])

<a href="{{ $href }}" {{ $attributes->class([
    'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition',
    'bg-blue-50 text-blue-700' => $active,
    'text-slate-600 hover:bg-slate-50 hover:text-slate-900' => !$active,
]) }}>
    <span class="shrink-0">{{ $icon }}</span>
    <span class="whitespace-nowrap">{{ $slot }}</span>
</a>