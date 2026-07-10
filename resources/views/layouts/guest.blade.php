<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'KPN ERP Portal') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-slate-100 text-slate-900">

    <div class="flex min-h-screen flex-col items-center justify-center px-6">

        {{-- Logo --}}
        <a href="/" class="mb-8 flex flex-col items-center gap-4">

            <div
                class="flex h-20 w-20 items-center justify-center rounded-2xl bg-blue-600 text-white shadow-lg shadow-blue-500/20">

                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">

                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M18 18V6h-5v12h5Zm0 0h2M4 18h2.5m3.5-5.5V12M6 6l7-2v16l-7-2V6Z" />

                </svg>

            </div>

            <div class="text-center">

                <h1 class="text-3xl font-bold tracking-tight text-slate-900">
                    KPN ERP Portal
                </h1>

                <p class="mt-1 text-sm text-slate-500">
                    Enterprise Application Portal
                </p>

            </div>

        </a>

        {{-- Authentication Card --}}
        <div class="w-full max-w-md rounded-2xl border border-slate-200 bg-white p-8 shadow-xl shadow-slate-200/50">

            {{ $slot }}

        </div>

    </div>

</body>

</html>