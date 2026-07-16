<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Category Management
            </h2>
            <a href="{{ route('admin.categories.create') }}" class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2
                      text-sm font-semibold text-white hover:bg-blue-700 transition">
                + Add Category
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 rounded-lg bg-green-50 text-green-700 text-sm px-4 py-3 ring-1 ring-green-600/20">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">

                {{-- Toolbar --}}
                <div class="p-4 border-b border-slate-100">
                    <form method="GET" class="flex gap-2">
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Search category..." class="w-full max-w-xs rounded-lg border-slate-300 text-sm
                                      focus:border-blue-500 focus:ring-blue-500">
                        <button type="submit"
                            class="rounded-lg bg-slate-100 px-4 py-2 text-sm font-medium text-slate-600 hover:bg-slate-200">
                            Search
                        </button>
                    </form>
                </div>

                {{-- Table --}}
                <div class="overflow-x-auto">

                    <table class="min-w-full">

                        <thead class="border-b border-slate-200 bg-slate-50/80">

                            <tr>

                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                                    Category
                                </th>

                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                                    Description
                                </th>

                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                                    Status
                                </th>

                                <th
                                    class="px-6 py-4 text-right text-xs font-semibold uppercase tracking-wider text-slate-500">
                                    Action
                                </th>

                            </tr>

                        </thead>

                        <tbody class="divide-y divide-slate-100">

                            @forelse($categories as $category)

                                <tr class="transition hover:bg-blue-50/40">

                                    <td class="px-6 py-4">

                                        <div class="font-semibold text-slate-900">
                                            {{ $category->name }}
                                        </div>

                                    </td>

                                    <td class="px-6 py-4">

                                        <div class="max-w-lg line-clamp-2 text-sm text-slate-500">
                                            {{ $category->description ?: '-' }}
                                        </div>

                                    </td>

                                    <td class="px-6 py-4">

                                        @if($category->is_active)

                                            <span
                                                class="rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-semibold text-emerald-700">
                                                Active
                                            </span>

                                        @else

                                            <span
                                                class="rounded-full bg-slate-100 px-2.5 py-1 text-xs font-semibold text-slate-600">
                                                Inactive
                                            </span>

                                        @endif

                                    </td>

                                    <td class="px-6 py-4">

                                        <div class="flex justify-end gap-2">

                                            <a href="{{ route('admin.categories.edit', $category) }}"
                                                class="rounded-lg border border-blue-200 bg-blue-50 p-2 hover:bg-blue-100">

                                                <svg class="w-6 h-6 text-gray-800" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                                    viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                                                </svg>

                                            </a>

                                            <button x-data
                                                x-on:click="$dispatch('open-modal','confirm-delete-{{ $category->id }}')"
                                                class="rounded-lg border border-red-200 bg-red-50 p-2 hover:bg-red-100">

                                                <svg class="w-6 h-6 text-gray-800" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                                    viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                                </svg>


                                            </button>

                                        </div>

                                        {{-- Modal tetap gunakan modal yang sekarang --}}

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="4" class="px-6 py-16 text-center text-slate-400">
                                        No categories found.
                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

                {{-- Pagination --}}
                <div class="p-4 border-t border-slate-100">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>