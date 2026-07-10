{{-- resources/views/welcome.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'KPN ERP Portal') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="relative overflow-x-hidden bg-slate-50 font-sans antialiased text-slate-800">

    {{-- Background --}}
    <div class="fixed inset-0 -z-10 overflow-hidden">

        {{-- Gradient --}}
        <div class="absolute inset-0 bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50"></div>

        {{-- Grid Pattern --}}
        <div class="absolute inset-0 opacity-[0.035]" style="
                background-image:
                    linear-gradient(rgb(15 23 42) 1px, transparent 1px),
                    linear-gradient(90deg, rgb(15 23 42) 1px, transparent 1px);
                background-size: 48px 48px;">
        </div>

        {{-- Blur Blobs --}}
        <div class="absolute -top-44 -left-44 h-[36rem] w-[36rem] rounded-full bg-blue-400/20 blur-3xl">
        </div>

        <div class="absolute top-1/3 -right-40 h-[30rem] w-[30rem] rounded-full bg-violet-400/15 blur-3xl">
        </div>

        <div class="absolute bottom-0 left-1/4 h-[28rem] w-[28rem] rounded-full bg-cyan-300/15 blur-3xl">
        </div>

    </div>

    <div class="min-h-screen flex flex-col">

        <main class="flex-1">

            <div class="max-w-7xl mx-auto px-6 py-12">

                {{-- Hero --}}
                <div class="mb-12 rounded-3xl border border-white/60 bg-white/70 p-10 shadow-sm backdrop-blur-xl">

                    <span
                        class="inline-flex items-center rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-700">
                        Enterprise Application Portal
                    </span>

                    <h1 class="mt-5 text-4xl font-bold tracking-tight text-slate-900">
                        KPN ERP Portal
                    </h1>

                    <p class="mt-4 max-w-3xl text-base leading-7 text-slate-600">
                        Access all enterprise applications from a single portal.
                        Discover internal systems, business tools, and operational
                        platforms with a modern, centralized experience designed to
                        improve productivity and collaboration.
                    </p>

                </div>

                {{-- Header --}}
                <div class="mb-6 flex items-center justify-between">

                    <div>
                        <h2 class="text-xl font-semibold text-slate-900">
                            Available Applications
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            {{ $applications->count() }} application{{ $applications->count() != 1 ? 's' : '' }}
                            available
                        </p>
                    </div>

                    @auth
                        <a href="{{ route('applications.index') }}"
                            class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2 text-sm font-medium text-slate-700 transition hover:border-blue-200 hover:bg-blue-50 hover:text-blue-700">

                            Manage Applications

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>

                        </a>
                    @endauth

                </div>

                {{-- Applications --}}
                @if ($applications->isEmpty())

                    <div
                        class="rounded-3xl border border-dashed border-slate-300 bg-white/70 py-20 text-center backdrop-blur">

                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-4 h-12 w-12 text-slate-300" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h10" />
                        </svg>

                        <h3 class="text-lg font-semibold text-slate-700">
                            No Applications Available
                        </h3>

                        <p class="mt-2 text-sm text-slate-500">
                            Applications added by the administrator will appear here.
                        </p>

                    </div>

                @else

                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">

                        @foreach ($applications as $app)
                            <x-application-card :icon="$app->icon ? \Illuminate\Support\Facades\Storage::url($app->icon) : null"
                                :name="$app->name" :description="$app->description" :category="$app->category?->name"
                                :department="$app->department" :environment="$app->environment" :status="$app->status"
                                :url="$app->url" />
                        @endforeach

                    </div>

                @endif

            </div>

        </main>

    </div>

    <x-floating-login-button />

</body>

</html>