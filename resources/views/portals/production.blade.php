<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Production Portal - {{ config('app.name') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="relative overflow-x-hidden bg-slate-50 font-sans antialiased text-slate-800">

    {{-- Background --}}
    <div class="fixed inset-0 -z-10 overflow-hidden">

        {{-- Gradient --}}
        <div class="absolute inset-0 bg-gradient-to-br from-slate-50 via-emerald-50 to-green-50"></div>

        {{-- Grid Pattern --}}
        <div class="absolute inset-0 opacity-[0.035]" style="
                background-image:
                    linear-gradient(rgb(15 23 42) 1px, transparent 1px),
                    linear-gradient(90deg, rgb(15 23 42) 1px, transparent 1px);
                background-size:48px 48px;">
        </div>

        {{-- Blur --}}
        <div class="absolute -top-44 -left-44 h-[36rem] w-[36rem] rounded-full bg-emerald-400/20 blur-3xl"></div>

        <div class="absolute top-1/3 -right-40 h-[30rem] w-[30rem] rounded-full bg-green-400/15 blur-3xl"></div>

        <div class="absolute bottom-0 left-1/4 h-[28rem] w-[28rem] rounded-full bg-teal-300/15 blur-3xl"></div>

    </div>

    <div class="min-h-screen flex flex-col">

        <main class="flex-1">

            <div class="max-w-7xl mx-auto px-6 py-12">

                {{-- Hero --}}
                <div
                    class="relative overflow-hidden rounded-3xl border border-white/60 bg-white/70 p-10 shadow-sm backdrop-blur-xl">

                    <div class="absolute top-0 right-0 h-60 w-60 rounded-full bg-emerald-100 blur-3xl opacity-70">
                    </div>

                    <div class="relative">

                        <span
                            class="inline-flex items-center rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-700">

                            Production Environment

                        </span>

                        <h1 class="mt-5 text-4xl font-bold tracking-tight text-slate-900">

                            Production Application Portal

                        </h1>

                        <p class="mt-4 max-w-3xl text-base leading-7 text-slate-600">

                            Access live enterprise applications used for operational,
                            business and production activities.

                        </p>

                        <div class="mt-8 flex flex-wrap gap-3">

                            <span
                                class="rounded-full border border-emerald-200 bg-white px-4 py-2 text-sm text-slate-700">

                                Live Systems

                            </span>

                            <span
                                class="rounded-full border border-emerald-200 bg-white px-4 py-2 text-sm text-slate-700">

                                Enterprise

                            </span>

                            <span
                                class="rounded-full border border-emerald-200 bg-white px-4 py-2 text-sm text-slate-700">

                                Business

                            </span>

                            <span
                                class="rounded-full border border-emerald-200 bg-white px-4 py-2 text-sm text-slate-700">

                                Operational

                            </span>

                        </div>

                    </div>

                </div>

                {{-- Header --}}
                <div class="mt-10 mb-8 flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">

                    <div>

                        <h2 class="text-2xl font-bold text-slate-900">

                            Available Applications

                        </h2>

                        <p class="mt-2 text-sm text-slate-500">

                            {{ $applications->count() }}
                            application{{ $applications->count() > 1 ? 's' : '' }}
                            available in Production.

                        </p>

                    </div>

                    <div class="flex items-center gap-3">

                        <a href="{{ route('landing') }}"
                            class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2 text-sm font-medium text-slate-700 transition hover:border-slate-300 hover:bg-slate-100">

                            ← Back

                        </a>

                        @auth

                            <a href="{{ route('applications.index') }}"
                                class="inline-flex items-center gap-2 rounded-xl bg-emerald-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-emerald-700">

                                Manage Applications

                            </a>

                        @endauth

                    </div>

                </div>
                {{-- Applications --}}
                @if ($applications->isEmpty())

                    <div
                        class="rounded-3xl border border-dashed border-slate-300 bg-white/70 py-24 text-center backdrop-blur">

                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-5 h-14 w-14 text-slate-300" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">

                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h10" />

                        </svg>

                        <h3 class="text-xl font-semibold text-slate-700">
                            No Production Applications
                        </h3>

                        <p class="mt-2 text-slate-500">
                            There are currently no applications available in the
                            Production environment.
                        </p>

                    </div>

                @else

                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-3">

                        @foreach ($applications as $app)

                            <x-application-card :icon="$app->icon ? Storage::url($app->icon) : null" :name="$app->name"
                                :description="$app->description" :category="$app->category?->name"
                                :department="$app->department" :environment="$app->environment" :status="$app->status"
                                :url="$app->url" />

                        @endforeach

                    </div>

                @endif

            </div>

        </main>

        {{-- Footer --}}
        <footer class="border-t border-slate-200/70 bg-white/50 backdrop-blur">

            <div
                class="mx-auto flex max-w-7xl flex-col items-center justify-between gap-3 px-6 py-6 text-sm text-slate-500 md:flex-row">

                <div>
                    © {{ date('Y') }}
                    {{ config('app.name') }}.
                    All rights reserved.
                </div>

                <div class="flex items-center gap-5">

                    <span class="inline-flex items-center gap-2">

                        <span class="h-2 w-2 rounded-full bg-emerald-500"></span>

                        Production Environment

                    </span>

                </div>

            </div>

        </footer>

    </div>

    <x-floating-login-button />

</body>

</html>