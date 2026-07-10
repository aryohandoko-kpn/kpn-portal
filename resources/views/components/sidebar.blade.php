{{-- resources/views/components/sidebar.blade.php --}}
<aside class="hidden lg:flex flex-col shrink-0 w-64 bg-white border-r border-slate-200 h-screen sticky top-0">

    {{-- Brand --}}
    <div class="flex items-center gap-2 px-4 h-16 border-b border-slate-100">
        <x-application-logo class="h-7 w-auto text-blue-600 shrink-0" />
        <span class="font-semibold text-slate-900 whitespace-nowrap">
            KPN ERP PORTAL
        </span>
    </div>

    {{-- Nav --}}
    <nav class="flex-1 px-3 py-4 space-y-1 overflow-y-auto">

        <x-sidebar-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            <x-slot name="icon">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m4 12 8-8 8 8M6 10.5V19a1 1 0 0 0 1 1h3v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h3a1 1 0 0 0 1-1v-8.5" />
                </svg>
            </x-slot>
            Dashboard
        </x-sidebar-link>

        @if (auth()->user()?->isAdmin())
            <x-sidebar-link :href="route('admin.applications.index')" :active="request()->routeIs('admin.applications.*')">
                <x-slot name="icon">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                            d="M4.37 7.657c2.063.528 2.396 2.806 3.202 3.87 1.07 1.413 2.075 1.228 3.192 2.644 1.805 2.289 1.312 5.705 1.312 6.705M20 15h-1a4 4 0 0 0-4 4v1M8.587 3.992c0 .822.112 1.886 1.515 2.58 1.402.693 2.918.351 2.918 2.334 0 .276 0 2.008 1.972 2.008 2.026.031 2.026-1.678 2.026-2.008 0-.65.527-.9 1.177-.9H20M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </x-slot>
                Application Management
            </x-sidebar-link>

            <x-sidebar-link :href="route('admin.categories.index')" :active="request()->routeIs('admin.categories.*')">
                <x-slot name="icon">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15.583 8.445h.01M10.86 19.71l-6.573-6.63a.993.993 0 0 1 0-1.4l7.329-7.394A.98.98 0 0 1 12.31 4l5.734.007A1.968 1.968 0 0 1 20 5.983v5.5a.992.992 0 0 1-.316.727l-7.44 7.5a.974.974 0 0 1-1.384.001Z" />
                    </svg>
                </x-slot>
                Categories
            </x-sidebar-link>
        @else
            <x-sidebar-link :href="route('applications.index')" :active="request()->routeIs('applications.*')">
                <x-slot name="icon">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4 6a2 2 0 012-2h12a2 2 0 012 2v2H4V6zm0 4h16v8a2 2 0 01-2 2H6a2 2 0 01-2-2v-8z" />
                    </svg>
                </x-slot>
                Applications
            </x-sidebar-link>
        @endif

        <x-sidebar-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
            <x-slot name="icon">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-width="2"
                        d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
            </x-slot>
            Profile
        </x-sidebar-link>
    </nav>
</aside>