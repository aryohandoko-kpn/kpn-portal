<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Digital Application Portal') }}</title>

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

        <div class="mx-auto flex min-h-screen max-w-7xl items-center px-6 py-16">

            <div class="w-full">

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
                        Choose the environment you want to access and start working
                        securely from a single place.
                    </p>

                </div>

                {{-- Portal Cards --}}
                <div class="mt-16 grid gap-8 lg:grid-cols-2">

                    {{-- Production --}}
                    <a href="{{ route('landing.production') }}"
                        class="group relative overflow-hidden rounded-3xl border border-emerald-100 bg-white/80 p-8 shadow-sm backdrop-blur transition duration-300 hover:-translate-y-2 hover:border-emerald-300 hover:shadow-2xl">

                        <div
                            class="absolute right-0 top-0 h-44 w-44 rounded-full bg-emerald-100 blur-3xl opacity-60 transition group-hover:opacity-90">
                        </div>

                        <div class="relative">

                            <div
                                class="mb-6 flex h-16 w-16 items-center justify-center rounded-2xl bg-emerald-100 text-emerald-700">

                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">

                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />

                                </svg>

                            </div>

                            <h2 class="text-3xl font-bold text-slate-900">
                                Production
                            </h2>

                            <p class="mt-4 text-slate-600 leading-7">
                                Live enterprise applications used by employees for
                                daily operational and business activities.
                            </p>

                            <ul class="mt-8 space-y-3 text-sm text-slate-600">

                                <li>✔ Live Systems</li>

                                <li>✔ Business Applications</li>

                                <li>✔ Operational Services</li>

                                <li>✔ Enterprise Platform</li>

                            </ul>

                            <div class="mt-10 inline-flex items-center gap-2 font-semibold text-emerald-700">

                                Open Production Portal

                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 transition group-hover:translate-x-1" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">

                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />

                                </svg>

                            </div>

                        </div>

                    </a>

                    {{-- Development --}}
                    <a href="{{ route('landing.development') }}"
                        class="group relative overflow-hidden rounded-3xl border border-blue-100 bg-white/80 p-8 shadow-sm backdrop-blur transition duration-300 hover:-translate-y-2 hover:border-blue-300 hover:shadow-2xl">

                        <div
                            class="absolute right-0 top-0 h-44 w-44 rounded-full bg-blue-100 blur-3xl opacity-60 transition group-hover:opacity-90">
                        </div>

                        <div class="relative">

                            <div
                                class="mb-6 flex h-16 w-16 items-center justify-center rounded-2xl bg-blue-100 text-blue-700">

                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">

                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16 18l6-6-6-6M8 6l-6 6 6 6" />

                                </svg>

                            </div>

                            <h2 class="text-3xl font-bold text-slate-900">
                                Development
                            </h2>

                            <p class="mt-4 text-slate-600 leading-7">
                                Sandbox, QA, UAT, staging and development
                                applications for testing and implementation.
                            </p>

                            <ul class="mt-8 space-y-3 text-sm text-slate-600">

                                <li>✔ Development Server</li>

                                <li>✔ QA Environment</li>

                                <li>✔ UAT Environment</li>

                                <li>✔ Sandbox Systems</li>

                            </ul>

                            <div class="mt-10 inline-flex items-center gap-2 font-semibold text-blue-700">

                                Open Development Portal

                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 transition group-hover:translate-x-1" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">

                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />

                                </svg>

                            </div>

                        </div>

                    </a>

                </div>

            </div>

        </div>

    </div>

    <x-floating-login-button />

</body>

</html>