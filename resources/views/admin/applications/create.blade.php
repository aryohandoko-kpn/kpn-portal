<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add Application</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
                <form method="POST" action="{{ route('admin.applications.store') }}"
                      enctype="multipart/form-data" class="space-y-8">
                    @csrf

                    {{-- Section: Basic Info --}}
                    <div>
                        <h3 class="text-sm font-semibold text-slate-900 mb-4 pb-2 border-b border-slate-100">
                            Basic Information
                        </h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <x-input-label for="name" value="Application Name" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                              value="{{ old('name') }}" required autofocus />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="code" value="Application Code" />
                                <x-text-input id="code" name="code" type="text" class="mt-1 block w-full"
                                              value="{{ old('code') }}" required />
                                <x-input-error :messages="$errors->get('code')" class="mt-2" />
                            </div>

                            <div class="sm:col-span-2">
                                <x-input-label for="description" value="Description" />
                                <textarea id="description" name="description" rows="3"
                                          class="mt-1 block w-full rounded-lg border-slate-300 text-sm
                                                 focus:border-blue-500 focus:ring-blue-500">{{ old('description') }}</textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>

                            <div class="sm:col-span-2">
                                <x-input-label for="url" value="URL" />
                                <x-text-input id="url" name="url" type="url" class="mt-1 block w-full"
                                              value="{{ old('url') }}" placeholder="https://" required />
                                <x-input-error :messages="$errors->get('url')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    {{-- Section: Classification --}}
                    <div>
                        <h3 class="text-sm font-semibold text-slate-900 mb-4 pb-2 border-b border-slate-100">
                            Classification
                        </h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <x-input-label for="category_id" value="Category" />
                                <select id="category_id" name="category_id"
                                        class="mt-1 block w-full rounded-lg border-slate-300 text-sm
                                               focus:border-blue-500 focus:ring-blue-500">
                                    <option value="">-- Select Category --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="department" value="Department" />
                                <x-text-input id="department" name="department" type="text" class="mt-1 block w-full"
                                              value="{{ old('department') }}" />
                                <x-input-error :messages="$errors->get('department')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="owner" value="Owner" />
                                <x-text-input id="owner" name="owner" type="text" class="mt-1 block w-full"
                                              value="{{ old('owner') }}" />
                                <x-input-error :messages="$errors->get('owner')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="environment" value="Environment" />
                                <select id="environment" name="environment"
                                        class="mt-1 block w-full rounded-lg border-slate-300 text-sm
                                               focus:border-blue-500 focus:ring-blue-500" required>
                                    @foreach (['Production', 'Staging', 'Development'] as $env)
                                        <option value="{{ $env }}" @selected(old('environment') === $env)>{{ $env }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('environment')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    {{-- Section: Status & Display --}}
                    <div>
                        <h3 class="text-sm font-semibold text-slate-900 mb-4 pb-2 border-b border-slate-100">
                            Status & Display
                        </h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <x-input-label for="status" value="Status" />
                                <select id="status" name="status"
                                        class="mt-1 block w-full rounded-lg border-slate-300 text-sm
                                               focus:border-blue-500 focus:ring-blue-500" required>
                                    @foreach (['active' => 'Active', 'inactive' => 'Inactive', 'maintenance' => 'Maintenance'] as $value => $label)
                                        <option value="{{ $value }}" @selected(old('status') === $value)>{{ $label }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('status')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="display_order" value="Display Order" />
                                <x-text-input id="display_order" name="display_order" type="number" class="mt-1 block w-full"
                                    value="{{ old('display_order', 0) }}" min="0" />
                                <x-input-error :messages="$errors->get('display_order')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="icon" value="Upload Icon" />
                                <input id="icon" name="icon" type="file" accept="image/*"
                                       class="mt-1 block w-full text-sm text-slate-500
                                              file:mr-4 file:rounded-lg file:border-0 file:bg-blue-50
                                              file:px-4 file:py-2 file:text-sm file:font-medium file:text-blue-700
                                              hover:file:bg-blue-100">
                                <x-input-error :messages="$errors->get('icon')" class="mt-2" />
                            </div>

                            <div class="flex items-center gap-2 pt-6">
                                <input type="checkbox" id="is_active" name="is_active" value="1"
                                       {{ old('is_active', true) ? 'checked' : '' }}
                                       class="rounded border-slate-300 text-blue-600 focus:ring-blue-500">
                                <x-input-label for="is_active" value="Active" />
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 pt-2">
                        <x-primary-button>Save</x-primary-button>
                        <a href="{{ route('admin.applications.index') }}"
                           class="text-sm font-medium text-slate-500 hover:text-slate-700">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>