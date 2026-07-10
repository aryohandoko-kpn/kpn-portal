<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Category</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
                <form method="POST" action="{{ route('admin.categories.update', $category) }}" class="space-y-5">
                    @csrf
                    @method('PUT')

                    <div>
                        <x-input-label for="name" value="Category Name" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                      value="{{ old('name', $category->name) }}" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="description" value="Description" />
                        <textarea id="description" name="description" rows="3"
                                  class="mt-1 block w-full rounded-lg border-slate-300 text-sm
                                         focus:border-blue-500 focus:ring-blue-500">{{ old('description', $category->description) }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <div class="flex items-center gap-2">
                        <input type="checkbox" id="is_active" name="is_active" value="1"
                               {{ old('is_active', $category->is_active) ? 'checked' : '' }}
                               class="rounded border-slate-300 text-blue-600 focus:ring-blue-500">
                        <x-input-label for="is_active" value="Active" />
                    </div>

                    <div class="flex items-center gap-3 pt-2">
                        <x-primary-button>Update</x-primary-button>
                        <a href="{{ route('admin.categories.index') }}"
                           class="text-sm font-medium text-slate-500 hover:text-slate-700">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>