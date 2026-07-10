{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Application Portal') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-[#F8FAFC] text-slate-800">
    <div class="flex">

        {{-- Sidebar --}}
        <x-sidebar />

        {{-- Right side: top bar + content --}}
        <div class="flex-1 min-w-0 flex flex-col min-h-screen">

            {{-- Top bar --}}
            <header
                class=" justify-end sticky top-0 z-30 bg-white border-b border-slate-200 h-16 flex items-center px-4 sm:px-6 gap-4">
                {{-- Search --}}
                <div class="flex-1 max-w-md">
                    <div class="relative">
                        <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-2.5 h-4 w-4 text-slate-400"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z" />
                        </svg>
                        <input type="text" placeholder="Search..." class="w-full rounded-lg border-slate-200 bg-slate-50 pl-9 text-sm
                                      focus:border-blue-500 focus:ring-blue-500 focus:bg-white">
                    </div>
                </div>

                {{-- Notifications --}}
                <button type="button" class="relative text-slate-400 hover:text-slate-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 10-12 0v3.2c0 .5-.2 1-.6 1.4L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    <span class="absolute -top-0.5 -right-0.5 h-2 w-2 rounded-full bg-red-500"></span>
                </button>

                {{-- Profile dropdown (reuse Breeze's x-dropdown) --}}
                <x-dropdown width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center gap-2 text-sm text-slate-700 hover:text-slate-900">
                            <div
                                class="h-8 w-8 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center text-xs font-semibold">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                            <span class="hidden sm:block font-medium">{{ auth()->user()->name }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">Profile</x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                Log Out
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </header>

            {{-- Page Heading (breadcrumb-style) --}}
            @isset($header)
                <div class="bg-white border-b border-slate-100 px-4 sm:px-6 py-4">
                    {{ $header }}
                </div>
            @endisset

            {{-- Page Content --}}
            <main class="flex-1">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>

</html>