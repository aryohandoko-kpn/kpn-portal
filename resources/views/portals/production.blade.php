@extends('welcome.landing')

@section('page_title', 'Production Portal')

@section('content')

    <div class="mb-8 flex items-center justify-between">

        <div>

            <h2 class="text-3xl font-bold text-slate-900">
                Production Applications
            </h2>

            <p class="mt-2 text-slate-600">
                {{ $applications->count() }} application{{ $applications->count() != 1 ? 's' : '' }} available in
                Production.
            </p>

        </div>

    </div>

    @if ($applications->isEmpty())

        <div class="rounded-3xl border border-dashed border-slate-300 bg-white py-20 text-center">

            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-14 w-14 text-slate-400" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">

                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 17L15 12l-5.25-5" />

            </svg>

            <h3 class="mt-4 text-lg font-semibold text-slate-700">
                No Applications Found
            </h3>

            <p class="mt-2 text-slate-500">
                There are currently no production applications available.
            </p>

        </div>

    @else

        <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-3">

            @foreach ($applications as $app)

                <a href="{{ $app->url }}" target="_blank"
                    class="group rounded-3xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:border-emerald-300 hover:shadow-xl">

                    <div class="flex items-start justify-between">

                        <div class="flex items-center gap-4">

                            @if($app->icon)

                                <img src="{{ Storage::url($app->icon) }}" class="h-14 w-14 rounded-xl object-cover">

                            @else

                                <div
                                    class="flex h-14 w-14 items-center justify-center rounded-xl bg-emerald-100 text-xl font-bold text-emerald-700">

                                    {{ strtoupper(substr($app->name, 0, 1)) }}

                                </div>

                            @endif

                            <div>

                                <h3 class="font-semibold text-slate-900">

                                    {{ $app->name }}

                                </h3>

                                <p class="text-sm text-slate-500">

                                    {{ $app->category?->name }}

                                </p>

                            </div>

                        </div>

                        <span class="rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-700">

                            {{ ucfirst($app->status) }}

                        </span>

                    </div>

                    <p class="mt-5 line-clamp-3 text-sm leading-6 text-slate-600">

                        {{ $app->description }}

                    </p>

                    <div class="mt-6 flex items-center justify-between">

                        <span class="text-sm text-slate-500">

                            {{ $app->department }}

                        </span>

                        <span class="font-semibold text-emerald-600 transition group-hover:translate-x-1">

                            Open →

                        </span>

                    </div>

                </a>

            @endforeach

        </div>

    @endif

@endsection