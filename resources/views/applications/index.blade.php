<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Applications</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Filters --}}
            <form method="GET" class="mb-6 flex flex-wrap gap-2">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search application..."
                    class="rounded-lg border-slate-300 text-sm focus:border-blue-500 focus:ring-blue-500 w-56">

                <select name="category_id"
                    class="rounded-lg border-slate-300 text-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="">All Categories</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected(request('category_id') == $category->id)>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>

                <select name="environment"
                    class="rounded-lg border-slate-300 text-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="">All Environments</option>
                    @foreach (['Production', 'Staging', 'Development'] as $env)
                        <option value="{{ $env }}" @selected(request('environment') === $env)>{{ $env }}</option>
                    @endforeach
                </select>

                <button type="submit"
                    class="rounded-lg bg-slate-100 px-4 py-2 text-sm font-medium text-slate-600 hover:bg-slate-200">
                    Filter
                </button>

                @if (request()->hasAny(['search', 'category_id', 'environment']))
                    <a href="{{ route('applications.index') }}"
                        class="rounded-lg px-4 py-2 text-sm font-medium text-slate-400 hover:text-slate-600">
                        Reset
                    </a>
                @endif
            </form>

            {{-- Grid --}}
            @if ($applications->isEmpty())
                <div class="rounded-xl border border-dashed border-slate-300 bg-white py-16 text-center">
                    <p class="text-slate-500 text-sm">No applications match your filter.</p>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 mb-6">
                    @foreach ($applications as $app)
                        <x-application-card :icon="$app->icon ? \Illuminate\Support\Facades\Storage::url($app->icon) : null"
                            :name="$app->name" :description="$app->description" :category="$app->category?->name"
                            :department="$app->department" :environment="$app->environment" :status="$app->status"
                            :url="route('applications.show', $app)" />
                    @endforeach
                </div>

                {{ $applications->links() }}
            @endif

        </div>
    </div>
</x-app-layout>