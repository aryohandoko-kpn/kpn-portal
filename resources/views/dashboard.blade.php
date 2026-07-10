@php
    use Illuminate\Support\Facades\Storage;
@endphp

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
            <a class="inline-flex items-center gap-2 rounded-lg bg-white-600 px-4 py-2
                      text-sm font-semibold text-white transition">
                -
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        </div>
    </div>
</x-app-layout>