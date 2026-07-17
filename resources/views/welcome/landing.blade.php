<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('page_title', config('app.name', 'Digital Application Portal'))</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="relative overflow-x-hidden bg-slate-50 font-sans antialiased text-slate-800">

    {{-- Background --}}
    <div class="fixed inset-0 -z-10 overflow-hidden">

        <div class="absolute inset-0 bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50"></div>

        <div class="absolute inset-0 opacity-[0.035]" style="
                background-image:
                    linear-gradient(rgb(15 23 42) 1px, transparent 1px),
                    linear-gradient(90deg, rgb(15 23 42) 1px, transparent 1px);
                background-size:48px 48px;">
        </div>

        <div class="absolute -top-44 -left-44 h-[36rem] w-[36rem] rounded-full bg-blue-400/20 blur-3xl"></div>

        <div class="absolute top-1/3 -right-44 h-[30rem] w-[30rem] rounded-full bg-violet-400/15 blur-3xl"></div>

        <div class="absolute bottom-0 left-1/4 h-[28rem] w-[28rem] rounded-full bg-cyan-300/15 blur-3xl"></div>

    </div>

    <div class="min-h-screen">

        <div class="mx-auto max-w-7xl px-6 py-16">

            {{-- Hero --}}
            <div class="mx-auto max-w-4xl text-center">

                <span
                    class="inline-flex items-center rounded-full bg-blue-100 px-4 py-1 text-sm font-semibold text-blue-700">
                    Enterprise Portal
                </span>

                <h1 class="mt-6 text-5xl font-bold tracking-tight text-slate-900">
                    Digital Application Portal
                </h1>

                <p class="mx-auto mt-6 max-w-3xl text-lg leading-8 text-slate-600">
                    Access all enterprise applications from a centralized portal.
                    Choose the environment below to access available systems.
                </p>

            </div>

            {{-- Navigation Tabs --}}
            <div class="mt-14 flex justify-center">

                <div class="inline-flex rounded-2xl border border-slate-200 bg-white p-1 shadow-sm">

                    <a href="{{ route('landing.production') }}" class="rounded-xl px-6 py-3 text-sm font-semibold transition
                        {{ request()->routeIs('landing.production')
    ? 'bg-emerald-600 text-white shadow'
    : 'text-slate-600 hover:bg-slate-100' }}">

                        Production

                    </a>

                    <a href="{{ route('landing.development') }}" class="rounded-xl px-6 py-3 text-sm font-semibold transition
                        {{ request()->routeIs('landing.development')
    ? 'bg-blue-600 text-white shadow'
    : 'text-slate-600 hover:bg-slate-100' }}">

                        Development

                    </a>

                </div>

            </div>

            {{-- Content --}}
            <div class="mt-12">

                @yield('content')

            </div>

        </div>

    </div>

    <x-floating-login-button />

</body>

</html>