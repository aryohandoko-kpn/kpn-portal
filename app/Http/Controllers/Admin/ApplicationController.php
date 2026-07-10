<?php
// app/Http/Controllers/Admin/ApplicationController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;
use App\Models\Application;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ApplicationController extends Controller
{
    public function index(Request $request): View
    {
        $applications = Application::query()
            ->with('category')
            ->when($request->search, fn($q) => $q->where('name', 'like', "%{$request->search}%"))
            ->when($request->category_id, fn($q) => $q->where('category_id', $request->category_id))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $categories = Category::where('is_active', true)->get();

        return view('admin.applications.index', compact('applications', 'categories'));
    }

    public function create(): View
    {
        $categories = Category::where('is_active', true)->get();

        return view('admin.applications.create', compact('categories'));
    }

    public function store(StoreApplicationRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('application-icons', 'public');
        }

        Application::create($data);

        return redirect()
            ->route('admin.applications.index')
            ->with('success', 'Application created successfully.');
    }

    public function edit(Application $application): View
    {
        $categories = Category::where('is_active', true)->get();

        return view('admin.applications.edit', compact('application', 'categories'));
    }

    public function update(UpdateApplicationRequest $request, Application $application): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('icon')) {
            if ($application->icon) {
                Storage::disk('public')->delete($application->icon);
            }
            $data['icon'] = $request->file('icon')->store('application-icons', 'public');
        }

        $application->update($data);

        return redirect()
            ->route('admin.applications.index')
            ->with('success', 'Application updated successfully.');
    }

    public function destroy(Application $application): RedirectResponse
    {
        if ($application->icon) {
            Storage::disk('public')->delete($application->icon);
        }

        $application->delete();

        return redirect()
            ->route('admin.applications.index')
            ->with('success', 'Application deleted successfully.');
    }
}